<div class="width-max">
    <div class="header-detalist-product">
        <span>{{ $product->title }}</span>

        <div class="box-point-header-detalist-product flex-box flex-right">
            <x-site.rating-star :rating="$avg" />
            @if ($avg > 0)
                <span class="text-sm">(از {{ $commentsCount }} کاربر)</span>
            @endif

            @if ($start_lottery)
                <li>
                    <i class="rating-stars__filled-star icon-star-filled mr-1"></i>
                    <span class="mr-1">شما با خرید این محصول <strong>{{ $product->lottery }}</strong> شانس دریافت
                        میکنید</span>
                </li>
            @endif
        </div>

        <div>
            <span>شما با خرید این محصول <strong>{{ $product->score }}</strong> امتیاز دریافت میکنید</span>
        </div>
    </div>

    @if ($product->quantity > 0)
        <div class="remaining-header-detalist-product">
            <span>تنها {{ $product->quantity }} عدد در انبار باقی مانده</span>
        </div>
    @endif

    <div class="description-header-detalist-product">
        <ul dir="rtl">
            @if ($detail_display == 0)
                <li>{!! $product->short_description !!}</li>
            @elseif($detail_display == 1)
                <ul dir="rtl">
                    @foreach ($parameters as $key => $item)
                        @if (!empty(@$item->name))
                            <li>
                                <p>
                                    <span style="font-size:14px">
                                        <strong>-</strong>
                                        {{ @$item->name }} : {{ @$parametersValue[$key] }}
                                    </span>
                                </p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @elseif($detail_display == 2)
                <li>{!! $product->short_description !!}</li>
                <ul dir="rtl">
                    @foreach ($parameters as $key => $item)
                        @if (!empty(@$item->name))
                            <li>
                                <p>
                                    <span style="font-size:14px">
                                        <strong>-</strong>
                                        {{ @$item->name }} : {{ @$parametersValue[$key] }}
                                    </span>
                                </p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </ul>
    </div>
</div>