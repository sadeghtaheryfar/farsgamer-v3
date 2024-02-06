<section id="right-dashboard">
    <a href="<?php echo e(route('home')); ?>" class="hover-menu-dashboard box-exit-dashboard flex-box">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9.02 2.84004L3.63 7.04004C2.73 7.74004 2 9.23004 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.29004 21.19 7.74004 20.2 7.05004L14.02 2.72004C12.62 1.74004 10.37 1.79004 9.02 2.84004Z"
                stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 17.99V14.99" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>

        <span class="mr-2">بازگشت به خانه</span>
    </a>

    <div id="box-menu-dashboard">
        <div class="box-menu-name-dashboard flex-box flex-right">
            <div class="min-w-12 min-h-12">
                <img class="w-12 h-12" src="<?php echo e(asset('site/svg/avatar.svg')); ?>"alt="آواتار">
            </div>

            <div class="flex-box w-full justify-content-start">
                <span class="box-sidbar-user-name-dashboard"><?php echo e(auth()->user()->username); ?></span>
            </div>
        </div>


        <form>

            <div class="box-point-dashboard flex-box flex-justify-space">
                <div class="flex-box">
                    <div class="box-coin-point-dashboard flex-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 22.75C8 22.75 4.75 19.88 4.75 16.35V12.65C4.75 12.24 5.09 11.9 5.5 11.9C5.91 11.9 6.25 12.24 6.25 12.65C6.25 15.27 8.72 17.25 12 17.25C15.28 17.25 17.75 15.27 17.75 12.65C17.75 12.24 18.09 11.9 18.5 11.9C18.91 11.9 19.25 12.24 19.25 12.65V16.35C19.25 19.88 16 22.75 12 22.75ZM6.25 16.46C6.32 19.11 8.87 21.25 12 21.25C15.13 21.25 17.68 19.11 17.75 16.46C16.45 17.87 14.39 18.75 12 18.75C9.61 18.75 7.56 17.87 6.25 16.46Z"
                                fill="#292D32" />
                            <path
                                d="M12 13.75C9.24 13.75 6.75999 12.51 5.54999 10.51C5.02999 9.66 4.75 8.67 4.75 7.65C4.75 5.93 5.52 4.31 6.91 3.09C8.27 1.9 10.08 1.25 12 1.25C13.92 1.25 15.72 1.9 17.09 3.08C18.48 4.31 19.25 5.93 19.25 7.65C19.25 8.67 18.97 9.65 18.45 10.51C17.24 12.51 14.76 13.75 12 13.75ZM12 2.75C10.44 2.75 8.98001 3.27 7.89001 4.23C6.83001 5.15 6.25 6.37 6.25 7.65C6.25 8.4 6.44999 9.1 6.82999 9.73C7.77999 11.29 9.76 12.25 12 12.25C14.24 12.25 16.22 11.28 17.17 9.73C17.56 9.1 17.75 8.4 17.75 7.65C17.75 6.37 17.17 5.15 16.1 4.21C15.01 3.27 13.56 2.75 12 2.75Z"
                                fill="#292D32" />
                            <path
                                d="M12 18.75C7.87 18.75 4.75 16.13 4.75 12.65V7.65C4.75 4.12 8 1.25 12 1.25C13.92 1.25 15.72 1.9 17.09 3.08C18.48 4.31 19.25 5.93 19.25 7.65V12.65C19.25 16.13 16.13 18.75 12 18.75ZM12 2.75C8.83 2.75 6.25 4.95 6.25 7.65V12.65C6.25 15.27 8.72 17.25 12 17.25C15.28 17.25 17.75 15.27 17.75 12.65V7.65C17.75 6.37 17.17 5.15 16.1 4.21C15.01 3.27 13.56 2.75 12 2.75Z"
                                fill="#292D32" />
                        </svg>
                    </div>

                    <div class="box-number-point-dashboard">
                        <span><?php echo e($score); ?></span>

                        <span>امتیاز</span>
                    </div>
                </div>

                <div>
                    <a wire:loading.attr="disabled" wire:click="changeScore()" class="btn-chenge-point-dashboard">تبدیل
                        به
                        پول</a>
                </div>
            </div>

            <?php $__errorArgs = ['errorScore'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small style="font-size: 0.8rem!important;" class="text-red"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['successScore'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small style="font-size: 0.8rem!important;" class="text-green"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </form>

        <div class="box-item-menu-dashboard">
            <ul>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <li
                        class="hover-menu-dashboard flex-box flex-right <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard' ? ' item-menu-dashboard-active' : ''); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>داشبورد</span>
                    </li>
                </a>

                <a href="<?php echo e(route('dashboard.orders')); ?>">
                    <li
                        class="hover-menu-dashboard flex-box flex-right <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.orders' ? ' item-menu-dashboard-active' : ''); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.31055 14.7L10.8105 16.2L14.8105 12.2" stroke="#374151" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z"
                                stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V16C21 20 20 22 15 22H9C4 22 3 20 3 16V10C3 5.44002 4.67 4.20002 8 4.02002"
                                stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>سفارشات من</span>
                    </li>
                </a>

                <a href="<?php echo e(route('dashboard.profile')); ?>">
                    <li
                        class="flex-box flex-right <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.profile' ? ' item-menu-dashboard-active' : ''); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18 18.86H17.24C16.44 18.86 15.68 19.17 15.12 19.73L13.41 21.42C12.63 22.19 11.36 22.19 10.58 21.42L8.87 19.73C8.31 19.17 7.54 18.86 6.75 18.86H6C4.34 18.86 3 17.53 3 15.89V4.97998C3 3.33998 4.34 2.01001 6 2.01001H18C19.66 2.01001 21 3.33998 21 4.97998V15.89C21 17.52 19.66 18.86 18 18.86Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M11.9999 10.0001C13.2868 10.0001 14.33 8.95687 14.33 7.67004C14.33 6.38322 13.2868 5.34009 11.9999 5.34009C10.7131 5.34009 9.66992 6.38322 9.66992 7.67004C9.66992 8.95687 10.7131 10.0001 11.9999 10.0001Z"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 15.6601C16 13.8601 14.21 12.4001 12 12.4001C9.79 12.4001 8 13.8601 8 15.6601"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>پروفایل</span>
                    </li>
                </a>

                <a href="<?php echo e(route('dashboard.comments')); ?>">
                    <li
                        class="hover-menu-dashboard flex-box flex-right <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.comments' ? ' item-menu-dashboard-active' : ''); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.5 19H8C4 19 2 18 2 13V8C2 4 4 2 8 2H16C20 2 22 4 22 8V13C22 17 20 19 16 19H15.5C15.19 19 14.89 19.15 14.7 19.4L13.2 21.4C12.54 22.28 11.46 22.28 10.8 21.4L9.3 19.4C9.14 19.18 8.77 19 8.5 19Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M7 8H17" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M7 13H13" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>نظرات من</span>
                    </li>
                </a>

                <a href="<?php echo e(route('dashboard.notifications')); ?>">
                    <li
                        class="hover-menu-dashboard flex-box flex-right <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.notifications' ? ' item-menu-dashboard-active' : ''); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0206 2.91003C8.71058 2.91003 6.02058 5.60003 6.02058 8.91003V11.8C6.02058 12.41 5.76058 13.34 5.45058 13.86L4.30058 15.77C3.59058 16.95 4.08058 18.26 5.38058 18.7C9.69058 20.14 14.3406 20.14 18.6506 18.7C19.8606 18.3 20.3906 16.87 19.7306 15.77L18.5806 13.86C18.2806 13.34 18.0206 12.41 18.0206 11.8V8.91003C18.0206 5.61003 15.3206 2.91003 12.0206 2.91003Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" />
                            <path
                                d="M13.8699 3.19994C13.5599 3.10994 13.2399 3.03994 12.9099 2.99994C11.9499 2.87994 11.0299 2.94994 10.1699 3.19994C10.4599 2.45994 11.1799 1.93994 12.0199 1.93994C12.8599 1.93994 13.5799 2.45994 13.8699 3.19994Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M15.0195 19.0601C15.0195 20.7101 13.6695 22.0601 12.0195 22.0601C11.1995 22.0601 10.4395 21.7201 9.89953 21.1801C9.35953 20.6401 9.01953 19.8801 9.01953 19.0601"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" />
                        </svg>

                        <span>اعلانات</span>
                    </li>
                </a>

                <?php if(auth()->user()->hasRole('همکار')): ?>
                    <a href="<?php echo e(route('partner.orders')); ?>">
                        <li class="hover-menu-dashboard flex-box flex-right">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 18.86H17.24C16.44 18.86 15.68 19.17 15.12 19.73L13.41 21.42C12.63 22.19 11.36 22.19 10.58 21.42L8.87 19.73C8.31 19.17 7.54 18.86 6.75 18.86H6C4.34 18.86 3 17.53 3 15.89V4.97998C3 3.33998 4.34 2.01001 6 2.01001H18C19.66 2.01001 21 3.33998 21 4.97998V15.89C21 17.52 19.66 18.86 18 18.86Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M11.9999 10.0001C13.2868 10.0001 14.33 8.95687 14.33 7.67004C14.33 6.38322 13.2868 5.34009 11.9999 5.34009C10.7131 5.34009 9.66992 6.38322 9.66992 7.67004C9.66992 8.95687 10.7131 10.0001 11.9999 10.0001Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M16 15.6601C16 13.8601 14.21 12.4001 12 12.4001C9.79 12.4001 8 13.8601 8 15.6601"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <span>پنل همکاری</span>
                        </li>
                    </a>
                <?php endif; ?>

                <div class="boarder-exit-dashboard"></div>

                <a href="<?php echo e(route('logout')); ?>">
                    <li class="hover-menu-dashboard flex-box flex-right">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0996 7.55999C14.7896 3.95999 12.9396 2.48999 8.88961 2.48999H8.75961C4.28961 2.48999 2.49961 4.27999 2.49961 8.74999V15.27C2.49961 19.74 4.28961 21.53 8.75961 21.53H8.88961C12.9096 21.53 14.7596 20.08 15.0896 16.54"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.00086 12H20.3809" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M18.15 8.65002L21.5 12L18.15 15.35" stroke="#292D32" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span>خروج</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/dashboard/sidebar.blade.php ENDPATH**/ ?>