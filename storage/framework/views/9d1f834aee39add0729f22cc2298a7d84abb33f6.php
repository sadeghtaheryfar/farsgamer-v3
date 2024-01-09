<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('tlZdsZE')) {
    $componentId = $_instance->getRenderedChildComponentId('tlZdsZE');
    $componentTag = $_instance->getRenderedChildComponentTagName('tlZdsZE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tlZdsZE');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('tlZdsZE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-6 xl:col-start-5 2xl:col-start-4 2md:col-end-13 h-full">
        <?php if($message): ?>
            <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e($message); ?></p>
        <?php endif; ?>
        <form class="grid gap-8 md:grid-cols-2 lg:p-4" wire:submit.prevent="update()">
            <div>
                <label for="name">نام</label>
                <input id="name" class="text-field" type="text" placeholder="نام" wire:model.defer="name">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="family">نام خانوادگی</label>
                <input id="family" class="text-field" type="text" placeholder="نام خانوادگی" wire:model.defer="family">
                <?php $__errorArgs = ['family'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="username">نام کاربری</label>
                    <input id="username" class="text-field" type="text" placeholder="نام کاربری" wire:model.defer="username">
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="mobile">شماره همراه</label>
                <input id="mobile" class="text-field" type="tel" placeholder="شماره همراه" wire:model.defer="mobile" disabled>
                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="account-name">نام صاحب حساب</label>
                <input id="account-name" class="text-field" type="text" placeholder="نام صاحب حساب" wire:model.defer="accountName">
                <?php $__errorArgs = ['accountName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="account-bank">نام بانک</label>
                <input id="account-bank" class="text-field" type="text" placeholder="نام بانک" wire:model.defer="accountBank">
                <?php $__errorArgs = ['accountBank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="account-cart">شماره کارت</label>
                <input id="account-cart" class="text-field" type="text" placeholder="شماره کارت" wire:model.defer="accountCart">
                <?php $__errorArgs = ['accountCart'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="account-sheba">شماره شبا</label>
                <input id="account-sheba" class="text-field" type="text" placeholder="شماره شبا" wire:model.defer="accountSheba">
                <?php $__errorArgs = ['accountSheba'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <button class="btn form-submit btn-primary btn-xl" type="submit">ثبت اطلاعات</button>
            </div>
        </form>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/dashboard/profile-component.blade.php ENDPATH**/ ?>