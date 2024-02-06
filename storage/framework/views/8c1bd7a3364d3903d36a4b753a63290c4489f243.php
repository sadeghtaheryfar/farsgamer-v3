<header wire:ignore.self>
    <section id="box-header" style="padding-right: 1.5rem;">
        <section id="right-header">
            <div id="box-menu-dashboard-pc">
                <svg id="nave-menu-item-icon" class="open-menu-mobile" xmlns="http://www.w3.org/2000/svg" width="20"
                    height="18" viewBox="0 0 20 18" fill="none">
                    <path
                        d="M19.2308 2.27344H0.769231C0.348718 2.27344 0 1.75812 0 1.13672C0 0.515312 0.348718 0 0.769231 0H19.2308C19.6513 0 20 0.515312 20 1.13672C20 1.75812 19.6513 2.27344 19.2308 2.27344Z"
                        fill="#292D32" />
                    <path
                        d="M19.2308 9.85156H0.769231C0.348718 9.85156 0 9.33625 0 8.71484C0 8.09344 0.348718 7.57812 0.769231 7.57812H19.2308C19.6513 7.57812 20 8.09344 20 8.71484C20 9.33625 19.6513 9.85156 19.2308 9.85156Z"
                        fill="#292D32" />
                    <path
                        d="M19.2308 17.4297H0.769231C0.348718 17.4297 0 16.9144 0 16.293C0 15.6716 0.348718 15.1562 0.769231 15.1562H19.2308C19.6513 15.1562 20 15.6716 20 16.293C20 16.9144 19.6513 17.4297 19.2308 17.4297Z"
                        fill="#292D32" />
                </svg>
            </div>

            <div class="margin-horizontal-2">
                <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('site/images/logo.png')); ?>" alt="لوگو"></a>
            </div>

            <form class="hidden lg:block relative w-64">
                <div id="box-search-header">
                    <label for="q" wire:click="updateSearch()">
                        <img src="<?php echo e(asset('site-v2/img/search.svg')); ?>" id="icon-search-header" alt="">
                    </label>

                    <input class="input-search-header" id="q" type="text"
                        placeholder="جستجو در محصولات فارس گیمر" wire:keydown.enter="updateSearch()"
                        wire:model.lazy="q">
                </div>
            </form>
        </section>

        <section id="left-header">
            <div id="box-icon-notif">
                <div id="icon-notif" class="nav-right-icon open-menu">
                    <img src="<?php echo e(asset('site-v2/img/notification.svg')); ?>" alt="">

                    <?php if(count($userNotifications) + count($notifications) > 0): ?>
                        <span
                            class="number-notif-cart open-menu"><?php echo e(count($userNotifications) + count($notifications)); ?></span>
                    <?php endif; ?>
                </div>

                <div id="box-show-notif" class="hide-item over-menu">
                    <div id="box-notif">
                        <div id="header-box-notif">
                            <span>اعلانات</span>

                            <img class="clothe-menu icon-exit-notif" src="<?php echo e(asset('site-v2/img/add.svg')); ?>"
                                alt="">
                        </div>

                        <div class="message-box-notif">
                            <div class="header-message-notif">
                                <div class="item-personal-notif">
                                    <span id="header-one-notif" class="item-notif item-notif-active personal">پیام های
                                        عمومی<span style="color: red;">(<?php echo e(count($notifications)); ?>)</span></span>
                                </div>

                                <?php if(auth()->guard()->check()): ?>
                                    <div class="item-general-notif">
                                        <span id="header-two-notif" class="item-notif general"> پیام های
                                            شخصی <span style="color: red;">(<?php echo e(count($userNotifications)); ?>)</span></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div id="message-notif-personal">
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif"><?php echo e(jalaliDate($item->created_at, 'diffForHumans')); ?></span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span><?php echo e($item->message); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div id="message-notif-general" class="hide-item">
                                <?php $__currentLoopData = $userNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif"><?php echo e(jalaliDate($item->created_at, 'diffForHumans')); ?></span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span><?php echo e($item->message); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div id="box3-notif">
                            <a href="dash-notifications.html"><span>دیدن همه اعلانات</span></a>
                        </div>
                    </div>
                </div>

                <div id="box-notif-clothe" class="exit-menu hide-item"></div>
            </div>

            <a href="<?php echo e(route('cart')); ?>">
                <div class="nav-right-icon cart-icon">
                    <img src="<?php echo e(asset('site-v2/img/shopping-cart.svg')); ?>" alt="">

                    <?php if($basketCount > 0): ?>
                        <span class="number-notif-cart"><?php echo e($basketCount); ?></span>
                    <?php endif; ?>
                </div>
            </a>

            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <div class="nav-right-icon login-icon">
                        <img src="<?php echo e(asset('site-v2/img/user.svg')); ?>" alt="">
                        <span class="text-nav"><?php echo e(Auth::user()->name); ?></span>
                    </div>
                </a>
            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('auth')); ?>">
                    <div class="nav-right-icon login-icon">
                        <img src="<?php echo e(asset('site-v2/img/user.svg')); ?>" alt="">
                        <span class="text-nav">ورود / ثبت نام</span>
                    </div>
                </a>
            <?php endif; ?>
        </section>
    </section>

    <div id="box-header-mobile-asli">
        <section id="box-header-mobile">
            <section id="right-header">
                <img id="nave-menu-item-icon" class="open-menu-mobile" src="<?php echo e(asset('site-v2/img/menu.svg')); ?>"
                    alt="">
            </section>

            <section id="center-header">
                <a href="<?php echo e(route('home')); ?>"><img id="logo-mobile"
                        src="<?php echo e(asset('site-v2/img/logo-farsgamer.png')); ?>" alt="لوگو"></a>
            </section>

            <section id="left-header">
                <div class="nav-right-icon-mobile clothe-menu-mobile">
                    <img src="<?php echo e(asset('site-v2/img/notification.svg')); ?>" alt="">

                    <?php if(count($userNotifications) + count($notifications) > 0): ?>
                        <span
                            class="number-notif-cart-mobile"><?php echo e(count($userNotifications) + count($notifications)); ?></span>
                    <?php endif; ?>
                </div>

                <div id="notif-mobile">
                    <div id="box-notif-mobile" class="hide-item">
                        <div id="header-box-notif">
                            <span>اعلانات</span>

                            <img class="icon-exit-notif clothe-menu-mobile" src="<?php echo e(asset('site-v2/img/add.svg')); ?>"
                                alt="">
                        </div>

                        <div class="message-box-notif">
                            <div class="header-message-notif">
                                <div class="item-personal-notif personal-mobile">
                                    <span id="header-three-notif" class="item-notif item-notif-active">پیام های عمومی
                                        <span style="color: red;">(<?php echo e(count($notifications)); ?>)</span>
                                    </span>
                                </div>

                                <?php if(auth()->guard()->check()): ?>
                                    <div class="item-general-notif general-mobile">
                                        <span id="header-four-notif" class="item-notif"> پیام های شخصی
                                            <span style="color: red;"> (<?php echo e(count($userNotifications)); ?>) </span></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div id="message-notif-general-mobile" class="hide-item">
                                <?php $__currentLoopData = $userNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif"><?php echo e(jalaliDate($item->created_at, 'diffForHumans')); ?></span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span><?php echo e($item->message); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div id="message-notif-personal-mobile">
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif"><?php echo e(jalaliDate($item->created_at, 'diffForHumans')); ?></span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span><?php echo e($item->message); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <?php if(auth()->guard()->check()): ?>
                            <div id="box3-notif">
                                <a href="dash-notifications.html"><span>دیدن همه اعلانات</span></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </section>

        <section id="box2-header-mobile">
            <section id="right-header-mobile">
                <form class="lg:block relative">
                    <div id="box-search-header-mobile">
                        <label for="q" wire:click="updateSearch()">
                            <img src="<?php echo e(asset('site-v2/img/search.svg')); ?>" id="icon-search-header" alt="">
                        </label>

                        <input class="input-search-header-mobile" id="q" type="search"
                            placeholder="جستجو در محصولات" wire:model.lazy="q" wire:keydown.enter="updateSearch()">
                    </div>
                </form>
            </section>

            <section id="left-header">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>">
                        <div class="nav-two-left-icon-mobile">
                            <img src="<?php echo e(asset('site-v2/img/user.svg')); ?>" alt="">
                            <span class="text-nav"><?php echo e(Auth::user()->name); ?></span>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('auth')); ?>">
                        <div class="nav-two-left-icon-mobile">
                            <img src="<?php echo e(asset('site-v2/img/user.svg')); ?>" alt="">
                            <span class="text-nav">ورود</span>
                        </div>
                    </a>
                <?php endif; ?>

                <a href="<?php echo e(route('cart')); ?>" class="nav-left-icon-mobile">
                    <div>
                        <img src="<?php echo e(asset('site-v2/img/shopping-cart.svg')); ?>" alt="">

                        <?php if($basketCount > 0): ?>
                            <span class="number-notif-cart-mobile"><?php echo e($basketCount); ?></span>
                        <?php endif; ?>
                    </div>
                </a>
            </section>
        </section>
    </div>
</header>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/layouts/header2.blade.php ENDPATH**/ ?>