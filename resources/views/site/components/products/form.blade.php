<form class="form-submit-disable" wire:submit.prevent="addToCart()">
    @include('site.components.products.form-builder')

    <div class="flex items-center gap-2">
        <label for="quantity">تعداد</label>
        <div class="relative">
            <input id="quantity" class="text-field w-20" type="number" min="1" wire:model="quantity">
            @error('quantity')
                <small class="text-red">{{ $message }}</small>
            @enderror
        </div>
    </div>

    @if ($priceWithDiscount == 0)
        <div class="price-form-product flex-box flex-column flex-aling-left">
            <span>قیمت متغییر</span>
        </div>
    @else
        @if ($product->is_active_discount)
            <div class="price-form-product flex-box flex-column flex-aling-left">
                <span>{{ number_format($priceWithDiscount) }}</span>

                <span>تومان</span>

                <div class="flex">
                    <p class="line-through text-gray2-700 flex items-center justify-end ml-2">
                        {{ number_format($price) }}</p>
                    <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs flex items-center width-auto">
                        {{ $product->discount_percentage }}%</div>
                </div>
            </div>
        @else
            <div class="price-form-product flex-box flex-column flex-aling-left">
                <span>{{ number_format($priceWithDiscount) }}</span>

                <span>تومان</span>
            </div>
        @endif
    @endif

    <div>
        @if (
            $product->status == \App\Models\Product::STATUS_AVAILABLE ||
                $product->status == \App\Models\Product::STATUS_TOWARDS_THE_END)
            <button class="input-submit-style" type="submit" wire:loading.attr="disabled">افزودن به سبد خرید</button>
        @elseif($product->status == \App\Models\Product::STATUS_COMING_SOON)
            <input class="input-submit-style" type="submit" disabled wire:loading.attr="disabled"
                value="{{ \App\Models\Product::getProductsStatus()[$product->status] }}">
        @elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE)
            <input class="input-submit-style" type="submit" disabled wire:loading.attr="disabled"
                value="{{ \App\Models\Product::getProductsStatus()[$product->status] }}">
        @endif
    </div>
    @error('error')
        <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
    @enderror



    <div class="hide-item-mobile">
        <section class="box-add-cart-mobile-prudect flex-box flex-justify-space">
            <div class="btn-add-cart-mobile-prudect flex-box">
                <a class="flex-box" href="#left-main-product-tablet">افزودن به سبد خرید</a>
            </div>

            <div class="price-add-cart-mobile-prudect flex-box flex-column flex-left flex-aling-left">
                <div>
                    <span>قیمت</span>
                </div>

                @if ($product->is_active_discount)
                    <div>
                        <span>{{ number_format($priceWithDiscount) }}</span>

                        <span>تومان</span>

                        <div class="flex">
                            <p class="line-through text-gray2-700 flex items-center justify-end ml-2">
                                {{ number_format($price) }}</p>
                            <div
                                class="bg-red text-white rounded-full py-0.5 px-2 text-xs flex items-center width-auto">
                                {{ $product->discount_percentage }}%</div>
                        </div>
                    </div>
                @else
                    <div>
                        <span>{{ number_format($priceWithDiscount) }}</span>

                        <span>تومان</span>
                    </div>
                @endif
            </div>
        </section>
    </div>
</form>
