<div class="2md:col-start-1 2md:col-end-5 xl:col-end-4 2xl:col-end-3">

<a href="<?php echo e(route('home')); ?>" class="bg-white p-4 mb-4 rounded-2xl flex items-center justify-center gap-2 link-transition hover:text-primary-deep">
        <i class="icon-arrow-right-square"></i>
        <p>بازگشت به خانه</p>
    </a>

    <div class="bg-white p-4 mb-8 rounded-2xl 2md:mb-0">
        <div class="bg-gray-50 pt-4 p-2 rounded-2xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 relative">
                    <img class="w-16 h-16 absolute inset-0 top-auto" src="<?php echo e(asset('site/svg/avatar.svg')); ?>" alt="آواتار">
                </div>
                <div>
                    <h2 class="font-bold">سلام <span class="capitalize text-primary"><?php echo e(auth()->user()->username); ?></span></h2>
                    <p class="text-sm">خوش آمدی</p>
                </div>
            </div>
            <hr class="border-gray-100 my-2">
            <form class="grid gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="icon-star-outline text-xl text-gray-900 w-10 h-10 flex items-center justify-center rounded-xl bg-yellow"></i>
                        <p>امتیاز من</p>
                        <p class="font-bold"><?php echo e($score); ?></p>
                    </div>
                    <button type="button" class="btn btn-primary btn-outline btn-sm" wire:click="changeScore()">تبدیل به پول</button>
                </div>
                <?php $__errorArgs = ['errorScore'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['successScore'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </form>
        </div>
        <nav class="mt-4" wire:ignore>
            <ul>
                <li>
                    <a class="nav-menu-item <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard'
                                ? 'nav-menu-item--active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="nav-menu-item__icon icon-dashboard"></i>
                        <span class="nav-menu-item__title">داشبورد</span>
                    </a>
                </li>
                <li>
                    <a class="nav-menu-item <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.orders'
                                ? 'nav-menu-item--active' : ''); ?>" href="<?php echo e(route('dashboard.orders')); ?>">
                        <i class="nav-menu-item__icon icon-controler"></i>
                        <span class="nav-menu-item__title">سفارشات من</span>
                    </a>
                </li>
                <li>
                    <a class="nav-menu-item <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.profile'
                                ? 'nav-menu-item--active' : ''); ?>" href="<?php echo e(route('dashboard.profile')); ?>">
                        <i class="nav-menu-item__icon icon-user"></i>
                        <span class="nav-menu-item__title">پروفایل</span>
                    </a>
                </li>
                <li>
                    <a class="nav-menu-item <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.comments'
                                ? 'nav-menu-item--active' : ''); ?>" href="<?php echo e(route('dashboard.comments')); ?>">
                        <i class="nav-menu-item__icon icon-comment"></i>
                        <span class="nav-menu-item__title">نظرات من</span>
                    </a>
                </li>
                <li>
                    <a class="nav-menu-item <?php echo e(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard.notifications'
                                ? 'nav-menu-item--active' : ''); ?>" href="<?php echo e(route('dashboard.notifications')); ?>">
                        <i class="nav-menu-item__icon icon-comment"></i>
                        <span class="nav-menu-item__title">اعلانات</span>
                    </a>
                </li>
                <li class="border-t border-gray-200 mt-2 pt-2">
                    <a class="nav-menu-item" href="<?php echo e(route('logout')); ?>">
                        <i class="nav-menu-item__icon icon-exit"></i>
                        <span class="nav-menu-item__title">خروج از حساب</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/dashboard/sidebar.blade.php ENDPATH**/ ?>