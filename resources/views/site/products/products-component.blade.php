<div>
    <section>
        <div class="flex flex-wrap items-center gap-4 mb-8">

            <div class="select-box" x-data="{ open: false , category: 'همه' }" x-bind:class="{ 'open': open }">
                <div class="select-box__head" @click="open = true">
                    <div class="select-box__head-content">
                        <div class="flex gap-2 items-center max-w-48 overflow-hidden">
                            <i class="select-field__icon icon-product"></i>
                            <span class="select-box__title" x-text="category"></span>
                        </div>
                        <i class="icon-angle-down"></i>
                    </div>
                </div>
                <ul class="select-box__options-list" @click="open = false" @click.away="open = false">
                    <li value="0" class="select-box__option" x-on:click="category = 'همه';$wire.set('category', 'all')"><strong>همه</strong></li>
                    @foreach($categories as $item)
                        <li value="{{$item->id}}" class="select-box__option"
                            x-on:click="category = '{{$item->title}}';$wire.set('category', '{{$item->slug}}')"><strong>{{$item->title}}</strong></li>
                        @foreach($item->subCategories as $subCategory)
                            <li value="{{$subCategory->id}}" class="select-box__option"
                                x-on:click="category = '{{$subCategory->title}}';$wire.set('category', '{{$subCategory->slug}}')">{{$subCategory->title}}</li>
                        @endforeach
                    @endforeach
                </ul>
            </div>

            {{--Sortable--}}
            <div class="select-box" x-data="{ open: false , sort: 'جدید ترین' }" x-bind:class="{ 'open': open }">
                <div class="select-box__head" @click="open = true">
                    <div class="select-box__head-content">
                        <div class="flex gap-2 items-center max-w-48 overflow-hidden">
                            <i class="select-field__icon icon-filter"></i>
                            <span class="select-box__title" x-text="sort">جدید ترین</span>
                        </div>
                        <i class="icon-angle-down"></i>
                    </div>
                </div>
                <ul class="select-box__options-list" @click="open = false" @click.away="open = false">
                    @foreach($sortable as $key => $value)
                        <li value="{{$key}}" class="select-box__option" x-on:click="sort = '{{$value}}';$wire.set('sort', '{{$key}}')">{{$value}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{--Products--}}
        <div class="grid gap-4 grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 relative">
            @foreach($products as $product)
                @include('site.components.products.product-box')
            @endforeach
        </div>

        {!! $link !!}
    </section>

    <section class="grid gap-4 mt-4 sm:grid-cols-2">
        @foreach($banners as $banner)
        <a href="{{$banner['url']}}" class="flex"><img class="w-full rounded-lg" src="{{asset($banner['image'])}}" alt=""></a>
        @endforeach
    </section>
</div>