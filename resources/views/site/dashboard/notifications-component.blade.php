<section id="main-dashboard" class="flex-box flex-justify-space" style="align-items: normal;">
    <livewire:site.dashboard.sidebar />

    <section id="left-dashboard">
        <div class="box-header-dash-comments flex-box flex-right">
            @if (count($notifications) > 0)
                <div class="item-header-dash-comments header-dash-comments-active flex-box">
                    <span>پیام های عمومی</span>

                    <span style="color: red">({{ count($notifications) }})</span>
                </div>
            @endif

            @if (count($userNotifications) > 0)
                <div class="item-header-dash-comments flex-box">
                    <span>پیام های شخصی</span>

                    <span style="color: red">({{ count($userNotifications) }})</span>
                </div>
            @endif
        </div>

        <div class="box-message-dash-comments">
            <div class="item-message-dash-comments">
                @foreach ($notifications as $item)
                    <div class="item-notif-dash-notif margin-vetical-1">
                        <div class="header-box-notif-dash-notif flex-box flex-justify-space">
                            <div class="flex-box">
                                <div class="icon-box-notif-header-dash-notif flex-box flex-column">
                                    <img src="img/frame2.svg" alt="">

                                    <span>سیستم</span>
                                </div>

                                <div class="time-box-notif-header-dash-notif flex-box">
                                    <div></div>

                                    <span>{{ jalaliDate($item->created_at, 'diffForHumans') }}</span>
                                </div>
                            </div>

                            <div class="detalist-box-notif-header-dash-notif">
                                <span>پشتیبانی</span>

                                <svg class="arrow-box-notif-header-dash-notif" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM16.06 11.17L12.53 14.7C12.38 14.85 12.19 14.92 12 14.92C11.81 14.92 11.62 14.85 11.47 14.7L7.94 11.17C7.65 10.88 7.65 10.4 7.94 10.11C8.23 9.82 8.71 9.82 9 10.11L12 13.11L15 10.11C15.29 9.82 15.77 9.82 16.06 10.11C16.35 10.4 16.35 10.87 16.06 11.17Z"
                                        fill="#3D42DF" />
                                </svg>
                            </div>
                        </div>

                        <div class="box-message-notif-dash-notif hide-item">
                            <div class="item-message-notif-dash-notif margin-vetical-1">
                                <span>{{ $item->message }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="item-message-dash-comments hide-item">
                @foreach ($userNotifications as $item)
                    <div class="item-notif-dash-notif margin-vetical-1">
                        <div class="header-box-notif-dash-notif flex-box flex-justify-space">
                            <div class="flex-box">
                                <div class="icon-box-notif-header-dash-notif flex-box flex-column">
                                    <img src="img/frame2.svg" alt="">

                                    <span>سیستم</span>
                                </div>

                                <div class="time-box-notif-header-dash-notif flex-box">
                                    <div></div>

                                    <span>{{ jalaliDate($item->created_at, 'diffForHumans') }}</span>
                                </div>
                            </div>

                            <div class="detalist-box-notif-header-dash-notif">
                                <span>پشتیبانی</span>

                                <svg class="arrow-box-notif-header-dash-notif" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM16.06 11.17L12.53 14.7C12.38 14.85 12.19 14.92 12 14.92C11.81 14.92 11.62 14.85 11.47 14.7L7.94 11.17C7.65 10.88 7.65 10.4 7.94 10.11C8.23 9.82 8.71 9.82 9 10.11L12 13.11L15 10.11C15.29 9.82 15.77 9.82 16.06 10.11C16.35 10.4 16.35 10.87 16.06 11.17Z"
                                        fill="#3D42DF" />
                                </svg>
                            </div>
                        </div>

                        <div class="box-message-notif-dash-notif hide-item">
                            <div class="item-message-notif-dash-notif margin-vetical-1">
                                <span>{{ $item->note }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</section>
