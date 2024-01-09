<h1 class="mb-8 text-2xl font-bold">ثبت نام در فارس گیمر</h1>

<form action="" wire:submit.prevent="register">

    <label class="font-semibold mr-2" for="mobile">شماره همراه</label>
    <div class="relative">
        <input type="tel" id="mobile" placeholder="*********09" class="text-field" maxlength="11" wire:model.defer="mobile">
        <svg class="absolute left-4 inset-y-center w-4 h-4">
            <use xlink:href="#svg-iran-flag"></use>
        </svg>
    </div>
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

    <label class="font-semibold mt-4 mr-2" for="username">نام کاربری</label>
    <input type="text" id="username" placeholder="نام کاربری" class="text-field" wire:model.defer="username">
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

    <button class="btn btn-xl w-full form-submit btn-primary mt-4 font-semibold" type="submit">ثبت نام</button>
</form>

<p class="mt-8">
    <span>حساب کاربری دارید؟</span>
    <button class="link link-transition font-semibold"
            wire:click="$set('mode', '<?php echo e(\App\Http\Controllers\Site\Auth\AuthComponent::MODE_LOGIN); ?>')">وارد شوید
    </button>
</p><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/auth/register.blade.php ENDPATH**/ ?>