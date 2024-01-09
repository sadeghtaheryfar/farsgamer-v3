<div>
    <div class="grid gap-4 xl:grid-cols-12 xl:items-start">
        <?php if(Cart::isEmpty()): ?>
            <div class="xl:col-start-1 xl:col-end-13 2xl:col-end-13 xl:row-span-full overflow-hidden">
                <div class="p-4 lg:p-6 bg-white rounded-2xl">
                    <div class="grid gap-4 py-10 justify-center justify-items-center py-4">
                        <img class="w-60" src="<?php echo e(asset('site/svg/empty-cart.svg')); ?>" alt="">
                        <p class="font-bold text-2xl text-red">سبد خرید خالی است</p>
                    </div>
                </div>
            </div>

    </div>
    <?php else: ?>
        <div class="xl:col-start-1 xl:col-end-9 2xl:col-end-10 xl:row-span-full overflow-hidden">
            <div class="cart-nav cart-nav--first-active overflow-x-auto">
                <div class="cart-nav__item">
                    <div class="cart-nav__item-circle"></div>
                    <div class="cart-nav__item-info">
                        <i class="icon-basket"></i>
                        <span>سبد خرید</span>
                    </div>
                </div>
                <div class="cart-nav__item">
                    <div class="cart-nav__item-circle"></div>
                    <div class="cart-nav__item-info">
                        <i class="icon-user"></i>
                        <span>مشخصات سفارش</span>
                    </div>
                </div>
                <div class="cart-nav__item">
                    <div class="cart-nav__item-circle"></div>
                    <div class="cart-nav__item-info">
                        <i class="icon-bag"></i>
                        <span>جزئیات سفارش</span>
                    </div>
                </div>
            </div>

            <!-- Product's in the Cart -->
            <div class="p-4 lg:p-6 bg-white rounded-2xl">
                <div class="table-wrapper">
                    <table>
                        <thead class="mb-4 text-sm">
                        <tr class="text-gray-500">
                            <th>محصول</th>
                            <th></th>
                            <th>تعداد</th>
                            <th>جمع جزء</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="h-2 last:h-0"></tr>
                            <tr class="border-0">
                                <td class="bg-gray-50 rounded-r-2xl w-28 h-28 py-4">
                                    <img class="rounded-xl min-w-28 min-h-28" src="<?php echo e(asset($item->image)); ?>" alt="">
                                </td>
                                <td class="bg-gray-50 py-4">
                                    <h3 class="font-semibold mb-2 text-sm"><?php echo e($item->title); ?></h3>
                                        <ul class="text-sm">
                                            <?php $__currentLoopData = $item->form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($form['type'] != 'paragraph'): ?>
                                                    <li class="flex gap-1">
                                                        <span><?php echo $form['label']; ?> </span>
                                                        <span class="font-medium"><?php echo e($form['value']); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                </td>
                                <td class="bg-gray-50 py-4">
                                    <label>
                                        <input class="text-field w-16 h-10 bg-white" type="number" min="1" wire:model="quantities.<?php echo e($key); ?>">
                                    </label>
                                </td>
                                <td class="bg-gray-50 py-4">
                                    <div class="flex items-center gap-1 whitespace-nowrap">
                                        <p class="text-lg font-semibold"><?php echo e(number_format($item->total())); ?></p>
                                        <p class="text-sm">تومان</p>
                                    </div>
                                </td>
                                <td class="bg-gray-50 rounded-l-2xl py-4">
                                    <button class="text-red hover:text-opacity-70 focus:text-opacity-70 transition-colors duration-200"
                                            wire:click="delete(<?php echo e($key); ?>)">
                                        <i class="icon-cancel"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Dashbaord Menu -->
        <div class="xl:col-start-9 xl:col-end-13 2xl:col-start-10 xl:row-span-full">
            <div class="p-4 lg:p-6 bg-white rounded-2xl">
                <div class="flex items-center gap-4">

                    <?php if(auth()->guard()->check()): ?>
                        <div class="w-12 h-12 relative mt-2">
                            <img class="w-16 h-16 absolute inset-0 top-auto" src="<?php echo e(asset('site/svg/avatar.svg')); ?>" alt="avatar">
                        </div>
                        <p class="font-bold text-lg capitalize"><?php echo e(auth()->user()->username); ?></p>
                    <?php endif; ?>

                    <?php if(auth()->guard()->guest()): ?>
                        <img class="rounded-xl w-14" src="<?php echo e(asset('site/images/guest-user.jpg')); ?>" alt="">
                        <a class="btn font-semibold h-14 w-full bg-gradient-to-l from-primary to-yellow text-white border-0 transition-colors
                               duration-200 hover:from-yellow hover:to-primary" href="<?php echo e(route('auth')); ?>">ورود <span>/</span> عضویت</a>
                    <?php endif; ?>
                </div>
                <hr class="border-gray-200 my-4">
                <h2 class="font-semibold text-gray-500 mb-2">جمع کل سبد خرید</h2>

                <div class="bg-gray-50 rounded-xl mt-2 text-sm">
                    <div class="flex items-center justify-between p-2">
                        <p>جمع جزء</p>
                        <div class="flex items-center gap-1">
                            <p class="font-semibold"><?php echo e(number_format(Cart::price())); ?></p>
                            <p>تومان</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-2">
                        <p>تخفیف</p>
                        <div class="flex items-center gap-1">
                            <p class="font-semibold"><?php echo e(number_format(Cart::discount())); ?></p>
                            <p>تومان</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-2 border-t border-gray-300">
                        <p>جمع کل</p>
                        <div class="flex items-center gap-1">
                            <p class="font-semibold"><?php echo e(number_format(Cart::total())); ?></p>
                            <p>تومان</p>
                        </div>
                    </div>
                </div>

                <a href="<?php echo e(route('cart.payment')); ?>" class="btn form-submit btn-primary btn-2xl w-full mt-4">ادامه تسویه حساب</a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/carts/cart-component.blade.php ENDPATH**/ ?>