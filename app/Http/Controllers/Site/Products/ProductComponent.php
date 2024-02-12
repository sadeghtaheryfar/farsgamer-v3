<?php

namespace App\Http\Controllers\Site\Products;

use App\Http\Controllers\Cart\Facades\Cart;
use App\Http\Controllers\FormBuilder\Facades\FormBuilder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;
use App\Models\CategoryParameter;
use App\Models\CategoryParameterProduct;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ProductComponent extends Component
{
	use WithFileUploads , WithPagination;

    public $readyToLoad = false;
    public $isLoaded = false;

    public $product;
    public $form, $price, $priceWithDiscount;
    public $avg , $start_lottery  ;
    public $quantity = 1;
    public $questionsCount = 0, $commentsCount = 5 ;
    public $prePageComment = 6, $prePageQuestion = 6;

    public $relatedProducts ;
    public $banners , $detail_display;
	public $parameters = [],$parametersValue = [] , $file , $needUpload = false , $needConfirm = false , $showLaw = false , $lawOK = false;

    public function mount($slug)
    {

		$this->start_lottery = Setting::getSingleRow('lottery');

        $this->product = Product::where('slug', $slug)->fgtal()->where('status', '!=', Product::STATUS_DRAFT)->firstOrFail();


		$product_parameters = $this->product->parameter()->get();
		$parameters =  CategoryParameter::where('category_id',$this->product->category_id)->get();
		foreach($parameters as $key => $parameter)
		{
			foreach ($product_parameters as $key2 => $product_parameter)
			{
				$atrValue = CategoryParameterProduct::where('product_id',$this->product->id)->where('parameter_id',$parameter->id)->firstOrFail()->value;
				if ($product_parameter->id == $parameter->id && !empty($atrValue))
				{
					$this->parametersValue[$parameter->id] = $atrValue;
					$this->parameters[$parameter->id] = $parameter;
				} 
			}
		}


        SEOMeta::setTitle('خرید ' . $this->product->title . ' - فارس گیمر');
        SEOMeta::setDescription($this->product->seo_description);

        OpenGraph::setTitle('خرید ' . $this->product->title . ' - فارس گیمر');
		$this->commentsCount = Comment::where('commentable_type', 'product')->whereIn('commentable_id', [$this->product->id])->isConfirmed()->count();
        OpenGraph::setDescription($this->product->seo_description);
		SEOMeta::addMeta('author', 'محمد علی رسولی', 'name');
		SEOMeta::addMeta('robots', 'index,follow', 'name');
		SEOMeta::addMeta('keywords', $this->product->seo_keywords , 'name');

        TwitterCard::setTitle('خرید ' . $this->product->title . ' - فارس گیمر');
        TwitterCard::setDescription($this->product->seo_description);

		$this->needUpload = $this->product->type == Product::TYPE_CARD;
		if ($this->needUpload ) {
			$this->needConfirm = true;
		}
       


			if (!empty($this->product->seo_questions)){
				foreach (explode('|' ,  $this->product->seo_questions) as $item) {
					$questionConetnt = explode(':',$item);
					$question[] = [
						'@type' => 'Question',
						'name' => $questionConetnt[0] ? str_replace("\n",'',$questionConetnt[0]) : '',
						'acceptedAnswer' =>
						[
							'@type' => 'Answer',
							'text' => $questionConetnt[1] ?? ''
						]
					]; 
				}
				JsonLd::addValue('mainEntity', $question ?? '')
				->setType('FAQPage')
				->generate();
			}

		// JsonLdMulti::generate();
        $this->form = $this->product->form;
        $this->price = $this->product->price;
        $this->priceWithDiscount = $this->product->price_with_discount;
		$this->detail_display = $this->product->detail_display;
        $this->avg = $this->product->comments()->isConfirmed()->avg('rating');
        $this->questionsCount = $this->product->questions()->isConfirmed()->count();

        $category = Category::find($this->product->category_id);

        if ($category->parent_id) {
            $category = $category->parent->subCategories()->pluck('id');
        } else {
            $category = $category->subCategories()->pluck('id');
        }

        $this->relatedProducts = Product::with('category')->whereIn('category_id', $category)
            ->where('status', Product::STATUS_AVAILABLE)
            ->inRandomOrder()->take(8)->get();

        $this->banners = Setting::whereIn('name',
            ['product_small_one', 'product_small_two', 'product_small_three', 'product_small_four'])
            ->get()->pluck('value', 'id')->toArray();

    }

	public function confirmLaw()
	{
		$this->lawOK = true;
		$this->showLaw = false;
	}

    public function updatedQuantity()
    {
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);
        $this->calculatePrice();
    }

    public function updatedForm()
    {
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);
        $this->calculatePrice();
    }

    public function render()
    {
        if ($this->readyToLoad && !$this->isLoaded) {
            $products = [];
            foreach ($this->form as $item) {
                foreach ($item['options'] as $optionKey => $option) {
                    if (isset($option['license']) && $option['license'] != '') {
                        $products[] = $option['license'];
                    }
                }
            }

            $productsID = Product::whereIn('slug', $products)->get()->pluck('id')->toArray();
            $comments = Comment::where('commentable_type', 'product')
                ->with('user')
                ->whereIn('commentable_id', array_merge($productsID, [$this->product->id]))
                ->isConfirmed()
                ->orderBy('created_at', 'DESC')
                ->paginate($this->prePageComment)->setPageName('comments');

            $this->commentsCount = Comment::where('commentable_type', 'product')
                ->with('user')
                ->whereIn('commentable_id', array_merge($products, [$this->product->id]))
                ->isConfirmed()->count();

            $questions = $this->product->questions()->isConfirmed()->whereNull('parent_id')->orderBy('created_at', 'DESC')
                ->paginate($this->prePageQuestion)->setPageName('questions');

            $this->isLoaded = true;
        }

		$law = '';

		if ($this->needUpload) {
			$law = Setting::where('name','cart-rules')->paginate(5);
			// dd($law);
		}

        return view('site.products.product-component', [
            'comments' => $this->readyToLoad ? ($comments ?? []) : [],
            'questions' => $this->readyToLoad ? ($questions ?? []) : [],
			'law' => $law
			])
            ->extends('site.layouts.product');
    }

    public function loadMore($pageName)
    {
        if ($pageName == 'questions')
            $this->prePageQuestion += 15;
        elseif ($pageName = 'comments')
            $this->prePageComment += 15;

        $this->isLoaded = false;
    }

    private function calculatePrice()
    {
        foreach ($this->form as $key => $item) {
            foreach ($item['options'] as $optionKey => $option) {
                if ($option['value'] == $item['value'] && isset($option['license']) && $option['license'] != '') {
                    $product = Product::where('slug', $option['license'])->first();
					if (!empty($product->price) && !empty($product->discount_amount))
                    	$this->form[$key]['options'][$optionKey]['price'] = $product->price - $product->discount_amount;
					elseif(!empty($product->price))
						$this->form[$key]['options'][$optionKey]['price'] = $product->price;
					else $this->form[$key]['options'][$optionKey]['price'] = 0;
                }
            }
        }
        $form = collect($this->form);
        $formPrice = $form->reduce(function ($total, $item) {
            $formItem = $item;
            $selectedValue = $item['value'];
			// if ($formItem['type'] == 'range') {
			// 			dd($selectedValue);
			// 	}
            $options = collect($item['options'] ?? []);
            if ($formItem['type'] == 'range' && $selectedValue >= ($formItem['options'][0]['value'] ?? 0) && $selectedValue <= (end($formItem['options'])['value'] ?? 1) )  {
                $total += $selectedValue * $formItem['formBasePrice'];
            }
            $optionPrice = $options->reduce(function ($total, $item) use ($selectedValue, $formItem) {
                $price = 0;
				
                if (FormBuilder::isVisible($this->form, $formItem) && ($item['value'] == $selectedValue ) )  {
					if (!$this->product->const_price) {
						@$price = $total + $item['price'] * ($this->product->currency->amount ?? 1) ;
					} else {
						@$price = $total + $item['price'];
					}
					

                    if (isset($option['license']) && $option['license'] != '') {
                        $product = Product::where('slug', $option['license'])->first();
                        $price = $product->price - $product->discount_amount;
                    }
                }

                return $total + $price;
            }, 0);

            return $total + $optionPrice;
        }, 0);

        $this->price = round(($this->product->price + $formPrice) * $this->quantity);
        $this->priceWithDiscount = round(($this->product->price_with_discount + $formPrice) * $this->quantity);
    }

    public function addToCart()
    {
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);

        //check if available
        if ($this->product->status != Product::STATUS_AVAILABLE && $this->product->status != Product::STATUS_TOWARDS_THE_END) {
            return;
        }

        //check quantity
        if (!is_null($this->product->quantity) && $this->product->quantity < $this->quantity) {
            $this->addError('error', 'موجودی محصول به اتمام رسیده');
            return;
        }

        //validate form
        $this->resetErrorBag();
        foreach ($this->form as $key => $item) {
            if (FormBuilder::isVisible($this->form, $item) && $item['required'] && strlen($item['value']) == 0) {
                $this->addError('form.' . $key . '.error', __('validation.required', ['attribute' => '']));
            }
        }

        if (sizeof($this->getErrorBag()) > 0) {
            $this->addError('error', 'موارد خواسته شده را تکمیل کنید');
            return;
        }
		$image = '';

		if ($this->product->type == Product::TYPE_CARD ) {

			if ($this->needConfirm && !$this->showLaw && !$this->lawOK) {
				$this->showLaw = true;
				$this->addError('error', 'لطفا قوانین را تایید نمایید');
				return;
			}

			$fields = [
            	'file' => ['required','image','mimes:jpg,jpeg,png,PNG,JPG,JPEG','max:1024'],
        	];
			$messages = [
				'file' => 'تصویر احراز هویت',
			];
			$this->validate($fields,[],$messages);

			$image = Storage::disk('media')->put('cart',$this->file);
			
			unset($this->file);
        }


		// dd($image);


        Cart::add($this->product, $this->quantity, $this->form , $image);
        redirect()->route('cart');
    }

	private function uploadFile()
	{
        $this->user->image = 'storage/'.$this->disk->put('profiles',$this->file);
	}
}
