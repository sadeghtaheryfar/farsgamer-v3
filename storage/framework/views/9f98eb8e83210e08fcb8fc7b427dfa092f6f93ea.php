<h1 class="mb-4 text-2xl font-bold">ورود به فارس گیمر</h1>

<form action="" wire:submit.prevent="login">

    <label class="font-semibold" for="mobile">شماره همراه</label>
    <div class="relative">
        <input type="tel" id="mobile" placeholder="*********09" class="text-field" maxlength="11"
            wire:model.defer="mobile">

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
    <!-- <label class="font-semibold" for="username">نام کاربری</label>
    <div class="relative">
        <input type="text" id="username" placeholder="نام کاربری" class="text-field"  wire:model.defer="username">
    </div>
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
 -->
    <button class="btn btn-xl w-full form-submit btn-primary mt-4 font-semibold" type="submit">ورود</button>
</form>

<p class="mt-8 text-center">
    <span>حساب کاربری ندارید؟ </span>
    <button class="link link-transition font-semibold"
        wire:click="$set('mode', '<?php echo e(\App\Http\Controllers\Site\Auth\AuthComponent::MODE_REGISTER); ?>')">ثبت نام
    </button>
</p>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/auth/login.blade.php ENDPATH**/ ?>