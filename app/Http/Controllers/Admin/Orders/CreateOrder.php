<?php
namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Smsir;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FormBuilder\Facades\FormBuilder;
use Illuminate\Support\Facades\Log;

class CreateOrder extends BaseComponent
{
	use AuthorizesRequests;

	public $user_number , $product_id , $product_title , $wallet = 0 , $reduction = 0 , $total = 0 , $final_total , $key , $item = [];
    public $user , $user_wallet = 0 , $quantity = 1;
    public $details , $form = [] , $product;

	public function mount()
    {
    	$this->authorize('edit_orders');
		$this->setMode(self::MODE_CREATE);
		$this->newDetailsArray();
		$this->data['product'] = Product::all()->pluck('title','id');
    }

	public function updatedProductId()
    {
		$this->quantity = 1;
        if (!empty($this->product_id)) {
            $product = Product::findOrFail($this->product_id);
			$this->product = $product;
            $this->total = $product->price;
            $this->final_total = $product->price_with_discount;
            $this->reduction = $product->discount_amount_fixed;
            $this->product_title = $product->title;
			$this->form = $product->form;
            if ($this->calculateWallet() >= $this->final_total) {
                $this->wallet = $this->final_total;
                $this->final_total = 0;
            }
        } else {
            $this->wallet = 0;
            $this->reduction = 0;
            $this->final_total = 0;
            $this->total = 0;
        }
        $this->updatedWallet();
    }

	public function updatedWallet()
    {
        $this->final_total = $this->calculateTotal();
        $this->user_wallet = $this->calculateWallet();
    }

    public function updatedReduction()
    {
        $this->final_total = $this->calculateTotal();
    }

	public function updatedQuantity()
	{
		$this->final_total = $this->calculateTotal();
	}

	public function updatedUserNumber()
    {
        $this->validateUser();
        if ($this->details->count() == 0) {
            $this->user = User::where('mobile',$this->user_number)->first();
            $this->user_wallet = $this->calculateWallet();
        }
    }

	public function addDetails()
    {
        $this->validateUser();
        $this->reset('item');
        $this->resetDetails();
        $this->updatedWallet();
        $this->key = -1;
		$this->emit('showModel', ['details']);
    }

	public function deleteDetail($key)
    {
        $this->details = $this->details->reject(function ($value , $k)  use ($key) {
            return $k == $key;
        });
        $this->emitNotify('محصول با موقیت حذف شد');
    }

	public function editDetails($key)
    {
        $this->validateUser();
        $this->reset('item');
        $this->item = $this->details->first(function($v , $k) use($key){
            return $k == $key;
        });
        $this->product_id = $this->item['product_id'];
		$product = Product::findOrFail($this->product_id);
		$this->product = $product;
        $this->wallet = $this->item['wallet_amount'];
        $this->reduction = $this->item['reduction_amount'];
        $this->total = $this->item['total_amount'];
        $this->final_total = $this->item['final_total_amount'];
		$this->quantity = $this->item['quantity'];
        $this->key = $key;
		$this->form = $this->item['form'];
		$this->emit('showModel', ['details']);
    }

	public function storeDetails()
    {
        $this->validate([
            'product_id' => ['required','exists:products,id'],
            'wallet' => ['required','between:0,9999999999999.99999'],
            'reduction' => ['required','between:0,9999999999999.99999'],
			'quantity' => ['required','integer','between:0,9999999999999']
        ],[],[
            'product_id' => 'محصول',
            'wallet' => 'مبلغ کیف پول',
            'reduction' => 'مبلغ تخفیف',
			'quantity' => 'تعداد'
        ]);
        

        if ($this->key == -1) {
            $this->details->push([
                'product_id' => $this->product_id,
                'wallet_amount' => (int)$this->wallet,
                'reduction_amount' => (int)$this->reduction,
                'final_total_amount' => $this->calculateTotal(),
                'total_amount' => $this->total,
                'product_title' => $this->product_title,
				'quantity' => $this->quantity,
				'form' => $this->form
            ]);
        } else {
            $this->item['product_id'] = $this->product_id;
            $this->item['wallet_amount'] = (int)$this->wallet;
            $this->item['reduction_amount'] = (int)$this->reduction;
            $this->item['final_total_amount'] = $this->calculateTotal();
			$this->item['quantity'] = $this->quantity;
            $this->item['total_amount'] = $this->total;
            $this->item['product_title'] = $this->product_title;
			$this->item['form'] = $this->form;
            $this->details[$this->key] = $this->item;
        }
		$this->emit('hideModel', ['details']);
    }

	public function store()
    {
		// $this->emitNotify('این بخش در مراحل ازمایش می باشد','warning');
        $this->validateUser();
        $this->validate([
            'details' => ['required','array','min:1']
        ] , [] , [
            'details' => 'محصول'
        ]);
		$price = 0;
		foreach ($this->details as $value) {
			$price = $price + $value['quantity']*$value['total_amount'];
		}

        $order = [
            'user_id' => $this->user->id,
			'name' => $this->user->name ?? 'نامشخص',
			'family' => $this->user->family ?? 'نامشخص',
			'mobile' => $this->user->mobile,
			'email' => $this->user->email ?? '1',
            'user_ip' => 'نامشخص',
            'price' => $price,
			'discount' => $this->details->sum('reduction_amount'),
			'voucher_amount' => 0,
			'wallet_pay' => $this->details->sum('wallet_amount'),
            'total_price' => $this->details->sum('final_total_amount'),    
        ];
        try {
            DB::beginTransaction();
            $order = Order::create($order);
            foreach ($this->details as $value) {
                OrderDetail::create([
                    'product_id' => $value['product_id'],
                    'product_data' => json_encode(['id' => $value['product_id'], 'title' =>  $value['product_title']]),
                    'price' => $value['final_total_amount'],
                    'status' => Order::STATUS_PROCESSING,
                    'quantity' => $value['quantity'],
                    'order_id' => $order->id,
					'form' => json_encode($value['form']),
					'licenses' => []
                ]);
            }
            DB::commit();
            if ($this->details->sum('wallet_amount') > 0)
                $this->user->forceWithdraw($this->details->sum('wallet_amount'), ['description' => 'بابت سفارش ' . $order->tracking_code]);
            $this->emitNotify('دوره با موفقیت برای شما ثبت شد');
            $this->reset(['user','user_number','user_wallet']);
            $this->newDetailsArray();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
			Log::error('order: '.$e->getMessage());
            $this->emitNotify('خطا در هنگام ثبت سفارش','warning');
            return false;
        }
    }

	public function newDetailsArray() 
    {
        $this->details = collect([]);
    }

	public function resetDetails()
    {
        $this->reset(['product_id','wallet','reduction','total','key','final_total','form']);
    }

	public function resetInputs()
    {
        $this->resetDetails();
    }

	public function render()
    {

        return view('admin.orders.create-order')->extends('admin.layouts.admin');
    }

	public function updatedForm()
    {
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);
        $this->final_total = $this->calculateTotal();
    }

    private function calculateTotal()
    {
		foreach ($this->form as $key => $item) {
            foreach ($item['options'] as $optionKey => $option) {
                if ($option['value'] == $item['value'] && isset($option['license']) && $option['license'] != '') {
                    $product = Product::where('slug', $option['license'])->first();
                    $this->form[$key]['options'][$optionKey]['price'] = $product->price - $product->discount_amount;
                }
            }
        }
        $form = collect($this->form);
        $formPrice = $form->reduce(function ($total, $item) {

            $formItem = $item;
            $selectedValue = $item['value'];
            $options = collect($item['options'] ?? []);
            $optionPrice = $options->reduce(function ($total, $item) use ($selectedValue, $formItem) {
                $price = 0;
                if (FormBuilder::isVisible($this->form, $formItem) && $item['value'] == $selectedValue) {
					if ($this->product->const_price)
						@$price = $total + $item['price'];
					else
                    	@$price = $total + $item['price'] * ($this->product->currency->amount ?? 1);

                    if (isset($option['license']) && $option['license'] != '') {
                        $product = Product::where('slug', $option['license'])->first();
                        $price = $product->price - $product->discount_amount;
                    }
                }

                return $total + $price;
            }, 0);

            return $total + $optionPrice;
        }, 0);

        return ($this->total+$formPrice)*$this->quantity - (int)$this->wallet - (int)$this->reduction;
    }

    private function calculateWallet()
    {
        return $this->user->wallet->balance - (int)$this->wallet - ($this->details->sum('wallet_amount') ??0 - $this->item['wallet_amount']??0 );
    }

    private function validateUser()
    {
        $this->validate([
            'user_number' => ['required','exists:users,mobile'],
        ],[],[
            'user_number' => 'شماره کاربر',
        ]);
    }
}