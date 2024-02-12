<div class="position-relative">
    <div class="container-fluid p-0">
        <div>
            <div class="header_content" wire:ignore>
                <div class="window-header" style=" background-image: url('{{ asset($mainImage) }}');">
                    <div class="window-header-content">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="window-header-image py-2">
                                    <img src="{{ asset($picture) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                <div class="window-content">
                                    <h3>{{ $name }}</h3>
                                    <div class="window-details">
                                        <span> محصولات : {{ $productsCount }}</span>
                                        <span>سفارشات در حال ثبت : {{ $orders }}</span>
                                    </div>
                                    <div class="col-12">
                                        {!! $text !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="window-tabs">
                <div class="tab-control" wire:ignore>
                    <ul>
                        @if (!empty($windows->id))
                            <li data-id="window" class="{{ !empty($active_slide) ? 'active' : '' }}">ویترین
                            </li>
                        @endif
                        <li data-id="skin"
                            class="{{ empty($windows->id) ? 'active' : '' }} {{ !empty($active_slide2) ? 'active' : '' }}">
                            محصولات</li>
                        <li></li>
                    </ul>
                </div>
                <div class="tabs">
                    @if (!empty($windows->id))
                        <div class="slide window {{ $active_slide }}" id="window" wire:ignore>
                            <div class="window-product">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-0 bg-white">
                                        <div class="window-product-slider">
                                            <img src="{{ $windows->slider }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-0">
                                        <div class="window-product-dtails">
                                            <h3>{{ $mainProduct->title }}</h3>
                                            <div class="col-12">

                                                {!! preg_replace('~>\s+<~', '><', $windows->description) !!}

                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('products.show', ['slug' => $mainProduct->slug]) }}"
                                                    class="btn btn-primary">خرید</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="window-sliders" wire:ignore>

                                @foreach ($windows->sliders()->get() as $slider)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="slider-header">
                                                <div class="slider-name">
                                                    <img src="{{ asset($slider->logo) }}" alt="">
                                                    <h3>{{ $slider->title }}</h3>
                                                </div>
                                                <!-- <a href="">مشاهده همه<i></i></a> -->
                                            </div>
                                            <div class="slider-body">
                                                <div class="containers">
                                                    <div class="swiper-container pb-4">
                                                        <div class="swiper-wrapper">
                                                            @foreach (explode(',', $slider->products) as $item)
                                                                @php
                                                                    $product = \App\Models\Product::where('slug', trim(preg_replace('/\s\s+/', ' ', $item)))->first();
                                                                @endphp
                                                                @if (isset($product->id))
                                                                    <div class="swiper-slide">
                                                                        @include('site.components.products.product-box')
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    @endif
                    <div class="slide skin {{ empty($windows->id) ? 'active_slide' : '' }} {{ $active_slide2 }}"
                        id="skin" wire:ignore.self>
                        <div class="skin-product" wire:ignore.self>
                            <div class="row" wire:ignore.self>
                                <div class="col-lg-3 col-md-4 d-none d-lg-block d-xl-block" wire:ignore.self>
                                    <div class="col-12">

                                        <div class="filters mt-1">
                                            <div class=" form-switch d-flex align-items-center py-2 px-1">
                                                <div class="product-checkbox d-flex align-items-center">

                                                    <input type="checkbox" {{ $level == 1 ? 'checked' : '' }}
                                                        id="switchD" value="1">

                                                    <label style="right:-1px" wire:click="levelTest" for="switchD"
                                                        class="mb-0">Toggle</label>
                                                    <span class="mr-2" style="font-size:15px"> کالا های
                                                        موجود</span>
                                                </div>
                                            </div>
                                            <div class="sidenav mt-4" wire:ignore.self>
                                                <div class="col-12 form-group py-1 px-2 filter_groups mb-3"
                                                    wire:ignore.self>
                                                    <button class="dropdown-btn px-2 py-2 text-black">
                                                        <i class="fa fa-caret-down"></i>
                                                        <strong>
                                                            محدوده قیمت
                                                        </strong>
                                                    </button>
                                                    <div class="dropdown-container mt-2" wire:ignore.self>
                                                        <div class="d-flex align-items-center py-1" wire:ignore.self>
                                                            <div class="price-range desk p-0" wire:ignore.self>
                                                                <span>محدوده قیمت</span>
                                                                <div class="col-12">
                                                                    <input type="range" wire:model.defer="priceRange"
                                                                        wire:change="priceRanges">
                                                                </div>
                                                                <br>
                                                                <div
                                                                    class="text-center d-flex align-items-center justify-content-between">
                                                                    <small>از</small>
                                                                    <input value="0" disabled type="text"
                                                                        class="p-1">
                                                                    <small>تا</small>
                                                                    <input value="{{ number_format($range) }}" disabled
                                                                        class="p-1" type="text">
                                                                    <small>تومان</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (!empty($sub_categories))
                                                    <div class="col-12 form-group py-1 px-2 filter_groups mb-3"
                                                        wire:ignore>
                                                        <button class="dropdown-btn px-2 py-2 text-black">
                                                            <i class="fa fa-caret-down"></i>
                                                            <strong>
                                                                دسته بندی ها
                                                            </strong>
                                                        </button>
                                                        <div class="dropdown-container mt-2">
                                                            <div class="d-flex align-items-center py-1">
                                                                <input class="form-check-input" value=""
                                                                    name="sub_categoryd" type="radio"
                                                                    id="sub_categoryd" wire:model="sub_category">
                                                                <label class="mb-0 mx-2 form-check-label"
                                                                    for="sub_categoryd">همه</label>
                                                            </div>
                                                            @foreach ($sub_categories as $key => $item)
                                                                <div class="d-flex align-items-center py-1">
                                                                    <input class="form-check-input"
                                                                        value="{{ $item['id'] }}"
                                                                        name="sub_category" type="radio"
                                                                        id="sub_category{{ $item['id'] }}d"
                                                                        wire:model="sub_category">
                                                                    <label class="mb-0 mx-2 form-check-label"
                                                                        for="sub_category{{ $item['id'] }}d">{{ $item['title'] }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                                @foreach ($groups as $key => $item)
                                                    <div class="col-12 form-group py-1 px-2 filter_groups mb-3"
                                                        wire:ignore>
                                                        <button class="dropdown-btn px-2 py-2 text-black">
                                                            <i class="fa fa-caret-down"></i>
                                                            <strong>
                                                                {{ $item['title'] }}
                                                            </strong>
                                                        </button>
                                                        <div class="dropdown-container mt-2">
                                                            @foreach ($item['filters'] as $key => $filter)
                                                                <div class="d-flex align-items-center py-1">
                                                                    <input type="checkbox"
                                                                        class="big-checkbox form-check-input"
                                                                        id="fliter{{ $filter['id'] }}d"
                                                                        wire:model="filter.{{ $filter['id'] }}">
                                                                    <label class="mb-0 mx-2 form-check-label"
                                                                        for="fliter{{ $filter['id'] }}d">{{ $filter['title'] }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-lg-none d-xl-none px-0" wire:ignore>
                                    <div class="col-12 mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button class="btn-filter mr-3" id="btn-advanced-search">
                                                جستوجو پیشرفته
                                                <i></i>
                                            </button>
                                            <button class="btn-filter mx-2" id="btn-filter">
                                                مرتب سازی بر اساس
                                                <i></i>
                                            </button>
                                        </div>
                                        <div class="position-fixed filter-panel" wire:ignore>
                                            <div class="filter p-3">
                                                <div
                                                    class="filter-row d-flex align-items-center justify-content-between">
                                                    <b class="text-secondary">مرتب سازی بر اساس</b>
                                                    <i class="fas fa-times text-secondary close-filter"></i>
                                                </div>
                                                <div class="filter-row d-flex align-items-center">
                                                    <input class="form-check-input" wire:model="most_amount"
                                                        value="desc" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label text-secondary me-1"
                                                        for="flexRadioDefault1">
                                                        گران ترین
                                                    </label>
                                                </div>
                                                <div class="filter-row d-flex align-items-center">
                                                    <input class="form-check-input" wire:model="most_amount"
                                                        value="asc" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label text-secondary me-1"
                                                        for="flexRadioDefault2">
                                                        ارزان ترین
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="advanced-search p-0">
                                                <div
                                                    class="advanced-search-header px-3 py-2 d-flex align-items-center justify-content-between resp_header_height">
                                                    <small class="px-1">{{ $name }} </small>
                                                    <i class="fas fa-times text-secondary close-filter"></i>
                                                </div>
                                                <div
                                                    class="bg-white px-3 py-2 d-flex align-items-center justify-content-between resp_button_height">
                                                    <button class="btn-filter" id="clear-filter"
                                                        wire:click="clear_filter">
                                                        پاک کردن همه
                                                    </button>
                                                    <div class=" form-switch d-flex align-items-center p-1">
                                                        <div class="product-checkbox d-flex">
                                                            <small style="font-size:12px"> کالا های
                                                                موجود</small>
                                                            <input type="checkbox" {{ $level == 1 ? 'checked' : '' }}
                                                                id="switch" value="1">
                                                            <label wire:click="levelTest" for="switch"
                                                                class="mb-0">Toggle</label>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="filters mx-2 my-2 resp_filter_height">
                                                    <div class="sidenav" wire:ignore>
                                                        <div class="col-12 form-group py-1 px-2 filter_groups mb-3">
                                                            <button class="dropdown-btn px-2 py-2 text-black">
                                                                <i class="fa fa-caret-down"></i>
                                                                <strong>
                                                                    محدوده قیمت
                                                                </strong>
                                                            </button>
                                                            <div class="dropdown-container mt-2">
                                                                <div class="d-flex align-items-center py-1">
                                                                    <div class="price-range res p-0">
                                                                        <span>محدوده قیمت</span>
                                                                        <div class="col-12">

                                                                            <input type="range"
                                                                                wire:model.defer="priceRange"
                                                                                id="rangeInput"
                                                                                onchange="priceRange()">
                                                                            <input type="hidden"
                                                                                value="{{ $max }}"
                                                                                id="max-range">
                                                                        </div>

                                                                        <br>
                                                                        <div class="text-center">
                                                                            <small>از</small>
                                                                            <input value="0" disabled
                                                                                type="text" class="py-1 px-2">
                                                                            <small>تا</small>
                                                                            <input value="{{ number_format($range) }}"
                                                                                class="py-1 px-2" id="range-show"
                                                                                disabled type="text">
                                                                            <small>تومان</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if (!empty($sub_categories))
                                                            <div
                                                                class="col-12 form-group py-1 px-2 filter_groups mb-3">
                                                                <button class="dropdown-btn px-2 py-2 text-black">
                                                                    <i class="fa fa-caret-down"></i>
                                                                    <strong>
                                                                        دسته بندی ها
                                                                    </strong>
                                                                </button>
                                                                <div class="dropdown-container mt-2">
                                                                    <div class="d-flex align-items-center py-1">
                                                                        <input class="form-check-input" value="all"
                                                                            name="sub_categorym" type="radio"
                                                                            id="sub_categorym"
                                                                            wire:model="sub_category">
                                                                        <label class="mb-0 mx-2 form-check-label"
                                                                            for="sub_categorym">همه</label>
                                                                    </div>
                                                                    @foreach ($sub_categories as $key => $item)
                                                                        <div class="d-flex align-items-center py-1">
                                                                            <input class="form-check-input"
                                                                                value="{{ $item['id'] }}"
                                                                                name="sub_categorym" type="radio"
                                                                                id="sub_category{{ $item['id'] }}m"
                                                                                wire:model="sub_category">
                                                                            <label class="mb-0 mx-2 form-check-label"
                                                                                for="sub_category{{ $item['id'] }}m">{{ $item['title'] }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @foreach ($groups as $key => $item)
                                                            <div class="col-12 form-group py-2 filter_groups mb-3">
                                                                <button class="dropdown-btn px-2 py-2 text-black">
                                                                    <i class="fa fa-caret-down"></i>
                                                                    <strong>
                                                                        {{ $item['title'] }}
                                                                    </strong>
                                                                </button>
                                                                <div class="dropdown-container mt-2">
                                                                    @foreach ($item['filters'] as $key => $filter)
                                                                        <div class="d-flex align-items-center py-1">
                                                                            <input type="checkbox"
                                                                                class="big-checkbox form-check-input"
                                                                                id="fliter{{ $filter['id'] }}m"
                                                                                wire:model="filter.{{ $filter['id'] }}">
                                                                            <label class="mb-0 mx-2 form-check-label"
                                                                                for="fliter{{ $filter['id'] }}m">{{ $filter['title'] }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="apply-filter" wire:click="apply_filter()">
                                                    جستوجو پیشرفته
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 p-1">
                                    <div class="col-12 mb-3" wire:ignore>
                                        <div class="skin-ordering d-none d-lg-flex d-xl-flex">
                                            <i></i>
                                            <span> : مرتب سازی بر اساس </span>

                                            <input wire:model="most_amount" type="radio" class="btn-check"
                                                value="desc" name="options" id="option1" autocomplete="off"
                                                checked>
                                            <label class="btn btn-primary mt-2" for="option1">گران
                                                ترین</label>

                                            <input wire:model="most_amount" type="radio" class="btn-check"
                                                value="asc" name="options" id="option4" autocomplete="off">
                                            <label class="btn btn-primary mt-2" for="option4">ارزان
                                                ترین</label>
                                        </div>
                                    </div>
                                    <div class="col-12" wire:ignore.self>
                                        <div class="skin-product-box" wire:ignore.self>
                                            <div
                                                class="grid gap-4 grid-cols-2 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-4 2xl:grid-cols-5 relative">

                                                @foreach ($products as $product)
                                                    @include('site.components.products.product-box')
                                                @endforeach


                                            </div>
                                            {!! $link !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            new Swiper('.swiper-container', {
                loop: true,
                nextButton: '.d-none',
                prevButton: '.d-none',
                slidesPerView: 6,
                paginationClickable: true,
                spaceBetween: 30,
                breakpoints: {
                    1920: {
                        slidesPerView: 7,
                        spaceBetween: 30
                    },
                    1028: {
                        slidesPerView: 5,
                        spaceBetween: 25
                    },
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    1: {
                        slidesPerView: 1,
                        spaceBetween: 250
                    }
                }
            });
        });
    </script>
@endpush
