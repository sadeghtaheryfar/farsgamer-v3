<div>
    <x-admin.subheader title="بنر ها" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="بنر" :mode="$mode">
                <x-admin.forms.header title="صفحه اصلی"/>
                <x-admin.forms.lfm-standalone id="home-big-1" label="بنر بزرگ زیر گیف کارت ها" required="true" :image="$homeBigOneImage" wire:model.defer="homeBigOneImage"/>
                <x-admin.forms.input type="text" id="home-big-url-1" label="آدرس" required="true" wire:model.defer="homeBigOne"/>
                <x-admin.forms.lfm-standalone id="home-medium-2" label="بنر متوسط زیر محصولات فورتنایت" required="true" :image="$homeMediumTwoImage" wire:model.defer="homeMediumTwoImage"/>
                <x-admin.forms.input type="text" id="home-medium-url-2" label="آدرس" required="true" wire:model.defer="homeMediumTwo"/>
                <x-admin.forms.lfm-standalone id="home-medium-3" label="بنر متوسط زیر محصولات فورتنایت" required="true" :image="$homeMediumThreeImage" wire:model.defer="homeMediumThreeImage"/>
                <x-admin.forms.input type="text" id="home-medium-url-3" label="آدرس" required="true" wire:model.defer="homeMediumThree"/>
                <x-admin.forms.lfm-standalone id="home-big-4" label="بنر بزرگ زیر محصولات فیزیکی" required="true" :image="$homeBigFourImage" wire:model.defer="homeBigFourImage"/>
                <x-admin.forms.input type="text" id="home-big-url-4" label="آدرس" required="true" wire:model.defer="homeBigFour"/>
                <x-admin.forms.lfm-standalone id="home-small-5" label="بنر کوچک زیر شبکه اجتماعی" required="true" :image="$homeSmallFiveImage" wire:model.defer="homeSmallFiveImage"/>
                <x-admin.forms.input type="text" id="home-small-url-5" label="آدرس" required="true" wire:model.defer="homeSmallFive"/>
                <x-admin.forms.lfm-standalone id="home-small-6" label="بنر کوچک زیر شبکه اجتماعی" required="true" :image="$homeSmallSixImage" wire:model.defer="homeSmallSixImage"/>
                <x-admin.forms.input type="text" id="home-small-url-6" label="آدرس" required="true" wire:model.defer="homeSmallSix"/>
                <x-admin.forms.lfm-standalone id="home-small-7" label="بنر کوچک زیر شبکه اجتماعی" required="true" :image="$homeSmallSevenImage" wire:model.defer="homeSmallSevenImage"/>
                <x-admin.forms.input type="text" id="home-small-url-7" label="آدرس" required="true" wire:model.defer="homeSmallSeven"/>
                <x-admin.forms.lfm-standalone id="home-small-8" label="بنر کوچک زیر شبکه اجتماعی" required="true" :image="$homeSmallEightImage" wire:model.defer="homeSmallEightImage"/>
                <x-admin.forms.input type="text" id="home-small-url-8" label="آدرس" required="true" wire:model.defer="homeSmallEight"/>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="صفحه محصولات"/>
                <x-admin.forms.lfm-standalone id="products-medium-1" label="بنر متوسط" required="true" :image="$productsMediumOneImage" wire:model.defer="productsMediumOneImage"/>
                <x-admin.forms.input type="text" id="products-medium-url-1" label="آدرس" required="true" wire:model.defer="productsMediumOne"/>
                <x-admin.forms.lfm-standalone id="products-medium-2" label="بنر متوسط" required="true" :image="$productsMediumTwoImage" wire:model.defer="productsMediumTwoImage"/>
                <x-admin.forms.input type="text" id="products-medium-url-2" label="آدرس" required="true" wire:model.defer="productsMediumTwo"/>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="صفحه محصول"/>
                <x-admin.forms.lfm-standalone id="product-small-1" label="بنر کوچک" required="true" :image="$productSmallOneImage" wire:model.defer="productSmallOneImage"/>
                <x-admin.forms.input type="text" id="product-small-url-1" label="آدرس" required="true" wire:model.defer="productSmallOne"/>
                <x-admin.forms.lfm-standalone id="product-small-2" label="بنر کوچک" required="true" :image="$productSmallTwoImage" wire:model.defer="productSmallTwoImage"/>
                <x-admin.forms.input type="text" id="product-small-url-2" label="آدرس" required="true" wire:model.defer="productSmallTwo"/>
                <x-admin.forms.lfm-standalone id="product-small-3" label="بنر کوچک" required="true" :image="$productSmallThreeImage" wire:model.defer="productSmallThreeImage"/>
                <x-admin.forms.input type="text" id="product-small-url-3" label="آدرس" required="true" wire:model.defer="productSmallThree"/>
                <x-admin.forms.lfm-standalone id="product-small-4" label="بنر کوچک" required="true" :image="$productSmallFourImage" wire:model.defer="productSmallFourImage"/>
                <x-admin.forms.input type="text" id="product-small-url-4" label="آدرس" required="true" wire:model.defer="productSmallFour"/>

            </x-admin.forms.form>
        </div>
    </div>
</div>