<header id="header" wire:ignore.self>
    <div class="container-base flex items-center justify-between gap-4">
        <div class="flex items-center gap-4 lg:gap-8">
            <button id="burger">
                <div></div>
                <div></div>
            </button>
            <a href="<?php echo e(route('home')); ?>" id="header__logo" class="h-16 flex items-center lg:h-20">
                <img src="<?php echo e(asset('site/images/logo.png')); ?>" class="w-24 2xs:w-28 lg:w-32" alt="لوگو">
            </a>
            <form class="hidden lg:block relative w-64">
                <input id="search" class="text-field h-12 pr-10 text-sm w-76" type="text" placeholder="جستجو در محصولات فارس گیمر" wire:model.defer="search">
                <label class="absolute h-full top-0 right-2 bottom-0 flex items-center justify-center mb-0 cursor-text" for="search" wire:click="updateSearch()">
                    <i class="icon-search w-8 flex items-center justify-center text-gray2-700"></i>
                </label>
            </form>
        </div>
        <div class="flex items-center gap-4">

            <div class="announcements">
                <a class="header-widget announcements__toggle-btn">
                    <i class="icon-bell header-widget__icon"></i>
                    <?php if(count($userNotifications) + count($notifications) > 0): ?>
                        <div class="header-widget__bobble"><?php echo e(count($userNotifications) + count($notifications)); ?></div>
                    <?php endif; ?>
                </a>
                <div easytab class="announcements__menu hidden" wire:ignore.self x-data="{activeTab: 1}">
                    <div class="announcements__menu-head">
                        <ul class="flex pt-2">
                            <li easytab-tab @click="activeTab = 1" x-bind:class="{ 'active': activeTab == 1 }">اطلاعیه عمومی (<?php echo e(count($notifications)); ?>)</li>
                            <?php if(auth()->guard()->check()): ?>
                                <li easytab-tab @click="activeTab = 2" x-bind:class="{ 'active': activeTab == 2 }" wire:click="readNotifications()">اطلاعیه شما (<?php echo e(count($userNotifications)); ?>)</li>
                            <?php endif; ?>
                        </ul>
                        <button class="announcements__close-btn">
                            <i class="icon-cancel"></i>
                        </button>
                    </div>
                    <div class="py-2">
                        <div easytab-content x-bind:class="{ 'active': activeTab == 1 }">
                            <ul>
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="group flex items-start gap-2 py-3 px-2 border-r-3 border-transparent bg-white transition duration-200 ease-in-out hover:bg-gray2-50 focus:bg-gray2-50 hover:border-primary focus:border-primary">
                                            <div class="min-w-9 min-h-9 max-w-9 max-h-9 flex items-center justify-center rounded-full bg-gray2-50 group-hover:bg-white group-focus:bg-white">
                                                <img class="w-5 -mr-0.5" src="<?php echo e(asset('site/svg/logo-ninja.svg')); ?>" alt="لوگو نینجا">
                                            </div>
                                            <div>
                                                <p class="font-semibold text-primary text-sm">پشتیبانی</p>
                                                <p class="mt-1 text-xs"><?php echo e($item->message); ?></p>
                                                <p class="text-gray-700 mt-3 text-xs"><?php echo e(jalaliDate($item->created_at, 'diffForHumans')); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php if(auth()->guard()->check()): ?>
                            <div easytab-content x-bind:class="{ 'active': activeTab == 2 }">
                                <ul>
                                    <?php $__currentLoopData = $userNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="group flex items-start gap-2 py-3 px-2 border-r-3 border-transparent bg-white transition duration-200 ease-in-out hover:bg-gray2-50 focus:bg-gray2-50 hover:border-primary focus:border-primary">
                                                <div class="min-w-9 min-h-9 max-w-9 max-h-9 flex items-center justify-center rounded-full bg-gray2-50 group-hover:bg-white group-focus:bg-white">
                                                    <img class="w-5 -mr-0.5" src="<?php echo e(asset('site/svg/logo-ninja.svg')); ?>" alt="لوگو نینجا">
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-primary text-sm">پشتیبانی</p>
                                                    <p class="mt-1 text-xs"><?php echo e($item->note); ?></p>
                                                    <p class="text-gray-700 mt-3 text-xs"><?php echo e(jalaliDate($item->created_at, 'diffForHumans')); ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <a href="<?php echo e(route('cart')); ?>" class="w-7.5 h-7.5 flex items-center justify-center relative  transition duration-200 hover:text-primary focus:text-primary">
                <i class="icon-basket text-xl"></i>
                <?php if($basketCount > 0): ?>
                    <div class="absolute -right-0.5 -top-0.5 bg-red text-white leading-0 text-center w-4 h-4 rounded-full
                 text-xs flex items-center justify-center"><?php echo e($basketCount); ?></div>
                <?php endif; ?>
            </a>

            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('auth')); ?>"
                   class="h-7.5 flex items-center justify-center relative gap-2 text-sm transition duration-200 hover:text-primary focus:text-primary">
                    <i class="icon-user"></i>
                    <p>ورود/عضویت</p>
                </a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>"
                   class="h-7.5 flex items-center justify-center relative gap-2 text-sm transition duration-200 hover:text-primary focus:text-primary">
                    <i class="icon-user text-xl"></i>
                    <p>داشبورد</p>
                </a>
            <?php endif; ?>
            <span class="hidden sm:flex pr-4 border-r border-gray2-500 text-sm">
                <a href="tel:<?php echo e($phone); ?>"><?php echo e($phone); ?></a>
            </span>
        </div>
    </div>
</header><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/layouts/header.blade.php ENDPATH**/ ?>