<section class="main-style-page">
    <div class="header-page-rules flex-box flex-justify-space">
        <div class="item-header-page-rules">
            <img class="img-item-page-rules" src="{{ asset("site-v2/img/img1-ruls.svg") }}" alt="">
            <img class="img-mo-item-page-rules" src="{{ asset("site-v2/img/img1-ruls-mobile.svg") }}" alt="">
        </div>

        <div class="detalit-page-rules">
            <div class="header-item-page-rules">
                <span>قوانین</span>

                <span class="color-blue">فارس گیمر</span>
            </div>

            <div class="message-item-page-rules">
                <span>{!! $description !!}</span>
            </div>
        </div>
    </div>

    <div class="message-page-rules">
        @foreach ($rules as $rule)
            <div class="item-page-rules flex-box flex-justify-space flex-right">
                <div class="counter-item-rules flex-box">
                    <!-- اعداد این قسمت خودشون وارد میشن و نیاز به بک اند نداره -->
                    <span class="counter-rules-item-number"></span>
                </div>

                <div class="message-item-rules flex-box">
                    <span>{!! $rule->value !!}</span>
                </div>
            </div>
        @endforeach

        <div class="my-2">
            {!! $physicalDescription !!}
        </div>

        @foreach ($physicalRules as $rule)
            <div class="item-page-rules flex-box flex-justify-space flex-right">
                <div class="counter-item-rules flex-box">
                    <!-- اعداد این قسمت خودشون وارد میشن و نیاز به بک اند نداره -->
                    <span class="counter-rules-item-number"></span>
                </div>

                <div class="message-item-rules flex-box">
                    <span>{!! $rule->value !!}</span>
                </div>
            </div>
        @endforeach
    </div>
</section>
