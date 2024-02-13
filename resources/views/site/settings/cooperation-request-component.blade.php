<div>
    <section id="box-slider-request" class="main-style-page flex-box flex-justify-space">
        <div id="box-img-defult-request-mobile" class="width-max">
            <div id="box-img-request-mobile">
                <img id="img1-defult-request-m" src="{{ asset('media/cooperation-request/3m.png') }}" alt="">
                <img id="img2-defult-request-m" src="{{ asset('media/cooperation-request/4m.png') }}" alt="">
                <img id="img3-defult-request-m" src="{{ asset('media/cooperation-request/5m.png') }}" alt="">
                <img id="img0-defult-request-m" src="{{ asset('media/cooperation-request/2m.png') }}" alt="">
                <img id="img4-defult-request-m" src="{{ asset('media/cooperation-request/1m.png') }}" alt="">
            </div>
        </div>

        <div class="item-slider-request">
            <div class="message-right-faqs">
                <form id="form-request" class="form-submit-disable">
                    <div class="header-message-right-faqs">
                        <span>درخواست پنل همکاری</span>
                    </div>

                    <div>
                        <label for="name-request">نام</label>

                        <input class="input-style" type="text" id="name-request" placeholder="نام"
                            wire:model.defer="name">

                        @error('name')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="last-name-request">نام خانوداگی</label>

                        <input class="input-style" type="text" id="last-name-request" placeholder="نام خانوادگی"
                            wire:model.defer="family">

                        @error('family')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="email-request">ایمیل</label>

                        <input class="input-style" type="email" id="email-request" placeholder="ایمیل"
                            wire:model.defer="email">

                        @error('email')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="number-request">شماره همراه</label>

                        <input class="input-style" type="number" id="number-request" placeholder="شماره همراه"
                            wire:model.defer="mobile">

                        @error('mobile')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <br>

                    @if (!empty($result))
                        <small class="d-block alert alert-{{ $alert }}">{{ $result }}</small>
                    @endif

                    <div>
                        <input class="input-submit-style" type="submit" value="ثبت" data-bs-toggle="modal"
                            data-bs-target="#modal-request" wire:click="newPartner()" wire:loading.attr="disabled">
                    </div>
                </form>
            </div>
        </div>

        <div class="item-slider-request
                            flex-box flex-justify-space">
            <div class="width-max">
                <div id="box-img-defult-request">
                    <img id="img1-defult-request" src="{{ asset('media/cooperation-request/15.png') }}" alt="">
                    <img id="img2-defult-request" src="{{ asset('media/cooperation-request/16.png') }}" alt="">
                    <img id="img3-defult-request" src="{{ asset('media/cooperation-request/17.png') }}" alt="">
                    <img id="img0-defult-request" src="{{ asset('media/cooperation-request/14.png') }}" alt="">
                    <img id="img4-defult-request" src="{{ asset('media/cooperation-request/7.png') }}" alt="">
                </div>
            </div>

            <div id="box-item-slider-request">
                <div class="swiper mySwiper-page-request Swiper-slider-request">
                    <div class="swiper-wrapper box-swiper-slider-request">
                        <div class="swiper-slide slider-request slider-request-color1">
                            <img src="{{ asset('media/cooperation-request/13.png') }}" alt="">
                        </div>

                        <div class="swiper-slide slider-request slider-request-color2">
                            <img src="{{ asset('media/cooperation-request/1.png') }}" alt="">
                        </div>

                        <div class="swiper-slide slider-request slider-request-color3">
                            <img src="{{ asset('media/cooperation-request/2.png') }}" alt="">
                            <img src="{{ asset('media/cooperation-request/4.png') }}" alt="">
                        </div>

                        <div class="swiper-slide slider-request slider-request-color4">
                            <img src="{{ asset('media/cooperation-request/5.png') }}" alt="">
                            <img src="{{ asset('media/cooperation-request/6.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-style-page main-style-article">
        <div>
            <p>{{ $description }}</p>
        </div>
    </section>
</div>
