<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $setting_name;
    public $url;
    public $image;
	public $priority;
    public $home_slider;
    public $triple_item;
    public $bestSeller, $fortnite , $physical, $steam,$article;
    public $giftCarts;
    public $imageSpecialDiscount;
    public $slugOneSpecialDiscount;
    public $slugTwoSpecialDiscount , $idcase;
    public $slugThreeSpecialDiscount;
//    public $slugFourSpecialDiscount;
    // public $social;
    public $footer_description;

    public function mount()
    {
        $this->mode = self::MODE_UPDATE;
        $this->imageSpecialDiscount = Setting::getSingleRow('image_special_discount');
        $this->slugOneSpecialDiscount = Setting::getSingleRow('slug_one_special_discount');
        $this->slugTwoSpecialDiscount = Setting::getSingleRow('slug_two_special_discount');
        $this->slugThreeSpecialDiscount = Setting::getSingleRow('slug_three_special_discount');
//        $this->slugFourSpecialDiscount = Setting::getSingleRow('slug_four_special_discount');
        $this->footer_description = Setting::getSingleRow('footer_description');
    }

    public function render()
    {
		
        $this->authorize('show_settings');


		$this->article = Setting::where('name', 'home_article')->get()->pluck('value', 'id');
        $this->home_slider = Setting::where('name', 'home_slider')->get()->pluck('value', 'id','priority');
        $this->triple_item = Setting::where('name', 'triple_item')->get()->pluck('value', 'id');

        $this->bestSeller = Setting::where('name', 'best_seller')->get()->pluck('value', 'id');
        $this->fortnite = Setting::where('name', 'fortnite')->get()->pluck('value', 'id');
        $this->physical = Setting::where('name', 'physical')->get()->pluck('value', 'id');
        $this->steam = Setting::where('name', 'steam')->get()->pluck('value', 'id');

        $this->giftCarts = Setting::where('name', 'gift_carts')->get()->pluck('value', 'id');
        $social = Setting::whereIn('name', ['telegram', 'instagram', 'facebook', 'twitter'])->get()->pluck('value', 'id');

        return view('admin.settings.home-component',['social'=>$social])
            ->extends('admin.layouts.admin');
    }
	

    public function update()
    {
        $this->authorize('edit_settings');
        $this->saveInDatabase();

        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }

    public function saveInDatabase()
    {
        Setting::updateOrCreate(['name' => 'image_special_discount'], ['value' => $this->imageSpecialDiscount]);
        Setting::updateOrCreate(['name' => 'slug_one_special_discount'], ['value' => $this->slugOneSpecialDiscount]);
        Setting::updateOrCreate(['name' => 'slug_two_special_discount'], ['value' => $this->slugTwoSpecialDiscount]);
        Setting::updateOrCreate(['name' => 'slug_three_special_discount'], ['value' => $this->slugThreeSpecialDiscount]);
//        Setting::updateOrCreate(['name' => 'slug_four_special_discount'], ['value' => $this->slugFourSpecialDiscount]);
        Setting::updateOrCreate(['name' => 'footer_description'], ['value' => $this->footer_description]);
    }

    public function delete($id)
    {
		
        $this->authorize('delete_settings');

        Setting::findOrFail($id)->delete();

        $this->emitNotify('تنظیمات با موفقیت حذف شد');
    }
	

    public function addProductUrl($name)
    {
        $this->setting_name = $name;
        $this->resetErrorBag();
        $this->reset(['url']);
        $this->emit('showModel', ['productUrl']);
    }

    public function storeProductUrl()
    {

		if ($this->setting_name == 'home_article') {
			$this->validate([
            	'url' => ['required', 'exists:articles,slug'],
        	]);
		} else {
  			$this->validate([
            	'url' => ['required', 'exists:products,slug'],
        	]);
		}
      

        Setting::create([
            'name' => $this->setting_name,
            'value' => $this->url
        ]);

        $this->emit('hideModel', ['productUrl']);
        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }

    public function addImageWithUrl($name)
    {
        $this->setting_name = $name;
        $this->resetErrorBag();
        $this->reset(['url', 'image']);
        $this->emit('showModel', ['imageWithUrl']);
    }

	
	public function editBanner($id)
	{
		$this->setting_name = 'home_slider';
		$case = Setting::find($id);
		
		$this->idcase = $id;
		$this->url = $case['value']['url'];
		$this->image = $case['value']['image'];
		$this->priority = $case['priority'];
		$this->emit('showModel', ['imageWithUrlEdit']);
		// dd($id);
	}


    public function editImageWithUrl()
    {
        $this->validate([
            'url' => ['required', 'url'],
            'image' => ['required', 'string', 'max:250']
        ]);

        if (in_array($this->setting_name, ['telegram', 'instagram', 'facebook', 'twitter'])) {
            if (Setting::where('name', $this->setting_name)->exists()) {
                $this->addError('social', __('validation.unique', ['attribute' => $this->setting_name]));
                return;
            }
        }

		$case = Setting::find($this->idcase);
		
		$case->name = $this->setting_name;
		$case->value = json_encode(['url' => $this->url, 'image' => $this->image]);
		$case->priority = $this->priority;
		$case->save();
      

        $this->emit('hideModel', ['imageWithUrlEdit']);
        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }

    public function storeImageWithUrl()
    {
        $this->validate([
            'url' => ['required', 'url'],
            'image' => ['required', 'string', 'max:250']
        ]);

        if (in_array($this->setting_name, ['telegram', 'instagram', 'facebook', 'twitter'])) {
            if (Setting::where('name', $this->setting_name)->exists()) {
                $this->addError('social', __('validation.unique', ['attribute' => $this->setting_name]));
                return;
            }
        }

        Setting::create([
            'name' => $this->setting_name,
            'value' => json_encode(['url' => $this->url, 'image' => $this->image])
        ]);

        $this->emit('hideModel', ['imageWithUrl']);
        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }

 
}