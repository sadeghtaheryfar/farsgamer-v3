<h1 class="mb-4 text-2xl font-bold">ورود به فارس گیمر</h1>

<form action="" wire:submit.prevent="verify">

    <p>کد ارسالی به شماره <?php echo e($mobile); ?> را وارد کنید</p>

    <label class="font-semibold mt-4" for="password">کد تایید</label>
    <input type="text" id="password" placeholder="کد تایید" class="text-field" wire:model.defer="password">
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

    <button class="btn btn-xl w-full form-submit btn-primary mt-4 font-semibold" type="submit">ورود</button>
</form>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/auth/verify.blade.php ENDPATH**/ ?>