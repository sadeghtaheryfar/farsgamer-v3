<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BannerComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $homeBigOneImage;
    public $homeBigOne;
    public $homeMediumTwoImage;
    public $homeMediumTwo;
    public $homeMediumThreeImage;
    public $homeMediumThree;
    public $homeBigFourImage;
    public $homeBigFour;
    public $homeSmallFiveImage;
    public $homeSmallFive;
    public $homeSmallSixImage;
    public $homeSmallSix;
    public $homeSmallSevenImage;
    public $homeSmallSeven;
    public $homeSmallEightImage;
    public $homeSmallEight;

    public $productSmallOneImage;
    public $productSmallOne;
    public $productSmallTwoImage;
    public $productSmallTwo;
    public $productSmallThreeImage;
    public $productSmallThree;
    public $productSmallFourImage;
    public $productSmallFour;

    public $productsMediumOneImage;
    public $productsMediumOne;
    public $productsMediumTwoImage;
    public $productsMediumTwo;

    public function mount()
    {
        $this->mode = self::MODE_UPDATE;
    }

    public function render()
    {
        $this->authorize('show_settings');

        $data = Setting::getSingleRow('home_big_one');
        $this->homeBigOne = $data['url'] ?? '';
        $this->homeBigOneImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_medium_two');
        $this->homeMediumTwo = $data['url'] ?? '';
        $this->homeMediumTwoImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_medium_three');
        $this->homeMediumThree = $data['url'] ?? '';
        $this->homeMediumThreeImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_big_four');
        $this->homeBigFour = $data['url'] ?? '';
        $this->homeBigFourImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_small_five');
        $this->homeSmallFive = $data['url'] ?? '';
        $this->homeSmallFiveImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_small_six');
        $this->homeSmallSix = $data['url'] ?? '';
        $this->homeSmallSixImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_small_seven');
        $this->homeSmallSeven = $data['url'] ?? '';
        $this->homeSmallSevenImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('home_small_eight');
        $this->homeSmallEight = $data['url'] ?? '';
        $this->homeSmallEightImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('product_small_one');
        $this->productSmallOne = $data['url'] ?? '';
        $this->productSmallOneImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('product_small_two');
        $this->productSmallTwo = $data['url'] ?? '';
        $this->productSmallTwoImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('product_small_three');
        $this->productSmallThree = $data['url'] ?? '';
        $this->productSmallThreeImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('product_small_four');
        $this->productSmallFour = $data['url'] ?? '';
        $this->productSmallFourImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('products_medium_one');
        $this->productsMediumOne = $data['url'] ?? '';
        $this->productsMediumOneImage = $data['image'] ?? '';

        $data = Setting::getSingleRow('products_medium_two');
        $this->productsMediumTwo = $data['url'] ?? '';
        $this->productsMediumTwoImage = $data['image'] ?? '';

        return view('admin.settings.banner-component')
            ->extends('admin.layouts.admin');
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->validate(
            [
                'homeBigOneImage' => ['nullable', 'string', 'max:250'],
                'homeBigOne' => ['nullable', 'url'],
                'homeMediumTwoImage' => ['nullable', 'string', 'max:250'],
                'homeMediumTwo' => ['nullable', 'url'],
                'homeMediumThreeImage' => ['nullable', 'string', 'max:250'],
                'homeMediumThree' => ['nullable', 'url'],
                'homeBigFourImage' => ['nullable', 'string', 'max:250'],
                'homeBigFour' => ['nullable', 'url'],
                'homeSmallFiveImage' => ['nullable', 'string', 'max:250'],
                'homeSmallFive' => ['nullable', 'url'],
                'homeSmallSixImage' => ['nullable', 'string', 'max:250'],
                'homeSmallSix' => ['nullable', 'url'],
                'homeSmallSevenImage' => ['nullable', 'string', 'max:250'],
                'homeSmallSeven' => ['nullable', 'url'],
                'homeSmallEightImage' => ['nullable', 'string', 'max:250'],
                'homeSmallEight' => ['nullable', 'url'],
                'productSmallOneImage' => ['nullable', 'string', 'max:250'],
                'productSmallOne' => ['nullable', 'url'],
                'productSmallTwoImage' => ['nullable', 'string', 'max:250'],
                'productSmallTwo' => ['nullable', 'url'],
                'productSmallThreeImage' => ['nullable', 'string', 'max:250'],
                'productSmallThree' => ['nullable', 'url'],
                'productSmallFourImage' => ['nullable', 'string', 'max:250'],
                'productSmallFour' => ['nullable', 'url'],
                'productsMediumOneImage' => ['nullable', 'string', 'max:250'],
                'productsMediumOne' => ['nullable', 'url'],
                'productsMediumTwoImage' => ['nullable', 'string', 'max:250'],
                'productsMediumTwo' => ['nullable', 'url'],
            ],
            [],
            [
                'homeBigOneImage' => '',
                'homeBigOne' => '',
                'homeMediumTwoImage' => '',
                'homeMediumTwo' => '',
                'homeMediumThreeImage' => '',
                'homeMediumThree' => '',
                'homeBigFourImage' => '',
                'homeBigFour' => '',
                'homeSmallFiveImage' => '',
                'homeSmallFive' => '',
                'homeSmallSixImage' => '',
                'homeSmallSix' => '',
                'homeSmallSevenImage' => '',
                'homeSmallSeven' => '',
                'homeSmallEightImage' => '',
                'homeSmallEight' => '',
                'productSmallOneImage' => '',
                'productSmallOne' => '',
                'productSmallTwoImage' => '',
                'productSmallTwo' => '',
                'productSmallThreeImage' => '',
                'productSmallThree' => '',
                'productSmallFourImage' => '',
                'productSmallFour' => '',
                'productsMediumOneImage' => '',
                'productsMediumOne' => '',
                'productsMediumTwoImage' => '',
                'productsMediumTwo' => '',
            ]
        );

        $this->saveInDatabase();

        $this->emitNotify('بنر با موفقیت ویرایش شد');
    }

    public function saveInDatabase()
    {
        Setting::updateOrCreate(['name' => 'home_big_one'], ['value' => json_encode(['url' => $this->homeBigOne, 'image' => $this->homeBigOneImage])]);
        Setting::updateOrCreate(['name' => 'home_medium_two'], ['value' => json_encode(['url' => $this->homeMediumTwo, 'image' => $this->homeMediumTwoImage])]);
        Setting::updateOrCreate(['name' => 'home_medium_three'], ['value' => json_encode(['url' => $this->homeMediumThree, 'image' => $this->homeMediumThreeImage])]);
        Setting::updateOrCreate(['name' => 'home_big_four'], ['value' => json_encode(['url' => $this->homeBigFour, 'image' => $this->homeBigFourImage])]);
        Setting::updateOrCreate(['name' => 'home_small_five'], ['value' => json_encode(['url' => $this->homeSmallFive, 'image' => $this->homeSmallFiveImage])]);
        Setting::updateOrCreate(['name' => 'home_small_six'], ['value' => json_encode(['url' => $this->homeSmallSix, 'image' => $this->homeSmallSixImage])]);
        Setting::updateOrCreate(['name' => 'home_small_seven'], ['value' => json_encode(['url' => $this->homeSmallSeven, 'image' => $this->homeSmallSevenImage])]);
        Setting::updateOrCreate(['name' => 'home_small_eight'], ['value' => json_encode(['url' => $this->homeSmallEight, 'image' => $this->homeSmallEightImage])]);

        Setting::updateOrCreate(['name' => 'product_small_one'], ['value' => json_encode(['url' => $this->productSmallOne, 'image' => $this->productSmallOneImage])]);
        Setting::updateOrCreate(['name' => 'product_small_two'], ['value' => json_encode(['url' => $this->productSmallTwo, 'image' => $this->productSmallTwoImage])]);
        Setting::updateOrCreate(['name' => 'product_small_three'], ['value' => json_encode(['url' => $this->productSmallThree, 'image' => $this->productSmallThreeImage])]);
        Setting::updateOrCreate(['name' => 'product_small_four'], ['value' => json_encode(['url' => $this->productSmallFour, 'image' => $this->productSmallFourImage])]);

        Setting::updateOrCreate(['name' => 'products_medium_one'], ['value' => json_encode(['url' => $this->productsMediumOne, 'image' => $this->productsMediumOneImage])]);
        Setting::updateOrCreate(['name' => 'products_medium_two'], ['value' => json_encode(['url' => $this->productsMediumTwo, 'image' => $this->productsMediumTwoImage])]);
    }

    protected function resetInputs()
    {
        //
    }
}