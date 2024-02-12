<section id="main-dashboard" class="flex-box flex-justify-space" style="align-items: normal;">
    <livewire:site.dashboard.sidebar />

    <section id="left-dashboard">
        <div class="box-header-dashboard flex-box flex-justify-space">
            <div class="right-header-dashboard width-max flex-box flex-justify-space">
                <div class="box-wallet-dashboard flex-box flex-right">
                    <div class="box-icon-wallet-dashboard flex-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.97 16.08C20.73 18.75 18.8 20.5 16 20.5H7C4.24 20.5 2 18.26 2 15.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.51 16.75 3.55C19.14 3.83 20.76 5.5 20.97 7.92C21 8.21 20.76 8.45 20.47 8.45H18.92C17.96 8.45 17.07 8.82 16.43 9.48C15.67 10.22 15.29 11.26 15.38 12.3C15.54 14.12 17.14 15.55 19.04 15.55H20.47C20.76 15.55 21 15.79 20.97 16.08Z"
                                fill="#292D32" />
                            <path
                                d="M22.0002 10.97V13.03C22.0002 13.58 21.5602 14.03 21.0002 14.05H19.0402C17.9602 14.05 16.9702 13.26 16.8802 12.18C16.8202 11.55 17.0602 10.96 17.4802 10.55C17.8502 10.17 18.3602 9.94995 18.9202 9.94995H21.0002C21.5602 9.96995 22.0002 10.42 22.0002 10.97Z"
                                fill="#292D32" />
                        </svg>
                    </div>

                    <div>
                        <span>موجودی کیف پول</span>
                    </div>
                </div>

                <div class="box-price-wallet-dashboard">
                    <span>{{ number_format(auth()->user()->balance) }}</span>

                    <span>تومان</span>
                </div>
            </div>

            <div class="margin-horizontal-1"></div>

            <form class="col-span-full w-full xl:max-w-88" wire:submit.prevent="chargeWallet()">
                <div class="left-header-dashboard width-max">
                    <input class="input-hover" type="number" placeholder="مبلغ به تومان" name="amount" wire:model.defer="amount" min="0">
                    <input type="submit" value="شارژ کیف پول">
                </div>

                @error('amount')
                    <small style="font-size: 0.8rem!important;" class="text-red"> {{ $message }}</small>
                @enderror
            </form>
        </div>

        <div class="box-last-order-dashboard">
            <div class="header-last-order-dashboard">
                <span>ترکنش های اخیر</span>
            </div>

            <div class="box-item-last-order-dashboard">
                @foreach ($transactions as $item)
                    <div class="item-last-order-dashboard flex-box flex-justify-space margin-vetical-1">
                        <div class="flex-box flex-justify-space flex-aling-auto width-max-mobile">
                            <div class="box-detalist-last-order-dashboard flex-box flex-right">
                                <div class="box-time-order-dashboard flex-box flex-column">
                                    <span>{{ jalaliDate($item->created_at, '%d') }}</span>

                                    <span>{{ jalaliDate($item->created_at, '%B') }}</span>
                                </div>

                                @if ($item->type == 'deposit')
                                    <div class="box-time-text-order-dashboard">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.19 0H5.81C2.17 0 0 2.17 0 5.81V14.18C0 17.83 2.17 20 5.81 20H14.18C17.82 20 19.99 17.83 19.99 14.19V5.81C20 2.17 17.83 0 14.19 0ZM6.47 8.98C6.76 8.69 7.24 8.69 7.53 8.98L9.25 10.7V4.51C9.25 4.1 9.59 3.76 10 3.76C10.41 3.76 10.75 4.1 10.75 4.51V10.7L12.47 8.98C12.76 8.69 13.24 8.69 13.53 8.98C13.82 9.27 13.82 9.75 13.53 10.04L10.53 13.04C10.46 13.11 10.38 13.16 10.29 13.2C10.2 13.24 10.1 13.26 10 13.26C9.9 13.26 9.81 13.24 9.71 13.2C9.62 13.16 9.54 13.11 9.47 13.04L6.47 10.04C6.18 9.75 6.18 9.28 6.47 8.98ZM16.24 15.22C14.23 15.89 12.12 16.23 10 16.23C7.88 16.23 5.77 15.89 3.76 15.22C3.37 15.09 3.16 14.66 3.29 14.27C3.42 13.88 3.84 13.66 4.24 13.8C7.96 15.04 12.05 15.04 15.77 13.8C16.16 13.67 16.59 13.88 16.72 14.27C16.84 14.67 16.63 15.09 16.24 15.22Z"
                                                fill="#009829" />
                                        </svg>

                                        <span>واریز</span>
                                    </div>
                                @else
                                    <div class="box-time-text-order-dashboard">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.19 0H5.81C2.17 0 0 2.17 0 5.81V14.18C0 17.83 2.17 20 5.81 20H14.18C17.82 20 19.99 17.83 19.99 14.19V5.81C20 2.17 17.83 0 14.19 0ZM6.47 6.98L9.47 3.98C9.54 3.91 9.62 3.86 9.71 3.82C9.89 3.74 10.1 3.74 10.28 3.82C10.37 3.86 10.45 3.91 10.52 3.98L13.52 6.98C13.81 7.27 13.81 7.75 13.52 8.04C13.37 8.19 13.18 8.26 12.99 8.26C12.8 8.26 12.61 8.19 12.46 8.04L10.74 6.32V12.51C10.74 12.92 10.4 13.26 9.99 13.26C9.58 13.26 9.24 12.92 9.24 12.51V6.32L7.52 8.04C7.23 8.33 6.75 8.33 6.46 8.04C6.17 7.75 6.18 7.28 6.47 6.98ZM16.24 15.22C14.23 15.89 12.12 16.23 10 16.23C7.88 16.23 5.77 15.89 3.76 15.22C3.37 15.09 3.16 14.66 3.29 14.27C3.42 13.88 3.85 13.66 4.24 13.8C7.96 15.04 12.05 15.04 15.77 13.8C16.16 13.67 16.59 13.88 16.72 14.27C16.84 14.67 16.63 15.09 16.24 15.22Z"
                                                fill="#3D42DF" />
                                        </svg>

                                        <span>برداشت</span>
                                    </div>
                                @endif
                            </div>

                            <div class="box-message-order-dashboard flex-box width-max-mobile">
                                <span>{{ $item->meta['description'] }}</span>
                            </div>
                        </div>

                        <div class="flex-box width-max-mobile flex-left">
                            @if ($item->type == 'deposit')
                                <div class="box-price-order-dashboard">
                                    <span dir="ltr">+{{ number_format($item->amount) }}</span>

                                    <span>تومان</span>
                                </div>
                            @else
                                <div class="box-price-order-dashboard" style="background-color: red">
                                    <span dir="ltr">{{ number_format($item->amount) }}</span>

                                    <span>تومان</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</section>
