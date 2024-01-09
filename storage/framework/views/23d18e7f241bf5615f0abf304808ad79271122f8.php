<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('FmozMJx')) {
    $componentId = $_instance->getRenderedChildComponentId('FmozMJx');
    $componentTag = $_instance->getRenderedChildComponentTagName('FmozMJx');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FmozMJx');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('FmozMJx', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
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
                <label for="email">ایمیل</label>
                <input id="email" class="text-field" type="email" placeholder="ایمیل" wire:model.defer="email">
                <?php $__errorArgs = ['email'];
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

			<div class="col-12">
                <label for="password">گذرواژه </label>
                    <input id="password" class="text-field" type="password" placeholder="گذرواژه" wire:model.defer="password">
                <?php $__errorArgs = ['password'];
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
			<br>
            <div>
                <button class="btn form-submit btn-primary btn-xl" type="submit">ثبت اطلاعات</button>
            </div>
        </form>
		<div class=" mx-auto col-12 mt-4">
				<?php if(auth()->user()->auth_status == App\Models\User::UESR_PENDING): ?>
					<div class="alert alert-info">
						<h4> <strong> نتیجه احراز هویت :</strong> </h4>
						<small class="mr-1"> در حال بررسی<small>
					</div>
				<?php elseif(auth()->user()->auth_status == App\Models\User::USER_REJECT_AUTH): ?>
					<div class="alert alert-danger">
						<h4> <strong> نتیجه احراز هویت :</strong> </h4>
						<small class="mr-1"><?php echo e(auth()->user()->checkedBy->full_name ?? 'سیستم'); ?> : <?php echo e(auth()->user()->auth_result); ?><small>
					</div>
				<?php elseif(auth()->user()->auth_status == App\Models\User::USER_OK): ?>
					<div class="alert alert-success">
						<h4> <strong> نتیجه احراز هویت :</strong> </h4>
						<small class="mr-1"><?php echo e(auth()->user()->checkedBy->full_name ?? 'سیستم'); ?> : <?php echo e(auth()->user()->auth_result); ?><small>
					</div>	
				<?php endif; ?>
			</div>

		<?php if(auth()->user()->auth_status == App\Models\User::USER_NEED_AUTH || auth()->user()->auth_status == App\Models\User::USER_REJECT_AUTH): ?>
		<fieldset class="border ">
  					<legend class="float-none  w-auto"><small>احراز هویت:</small></legend>
			<div class="row  lg:p-3 mx-1">
				<div class=" mx-auto col-12 shadow-none p-3 mb-4 bg-light rounded-lg border d-flex justify-content-center align-items-center">
					<p class="text-center text-black p-0 m-0">
						<?php echo e($auth_description); ?>

					</p>
				</div>

				<div class="row col-12">
					<div class="col-lg-6 mx-auto col-12 shadow-none overflow-hidden p-3 mb-4 bg-light rounded-lg border d-flex justify-content-center align-items-center">
						<?php if(!is_null($file)): ?>
							<img class="w-50" src="<?php echo e($file->temporaryUrl()); ?>">
						<?php else: ?>
							<img class="w-50" src="<?php echo e(asset($auth_image_pattern)); ?>" alt="تصویر نمونه احراز هویت">
						<?php endif; ?>
						
					</div>
					
					<div class="col-lg-6 mx-auto col-12 shadow-none overflow-hidden p-3 mb-3 bg-light rounded-lg border d-flex justify-content-center align-items-center">
						<div class="user_image rounded-lg overflow-hidden d-flex justify-content-center align-items-center">
							<form class="text-center py-5" >
							<div x-data="{ isUploading: false, progress: 0 }"
								x-on:livewire-upload-start="isUploading = true"
								x-on:livewire-upload-finish="isUploading = false"
								x-on:livewire-upload-error="isUploading = false"
								x-on:livewire-upload-progress="progress = $event.detail.progress">
								<input type="file" wire:model="file" <?php echo e(auth()->user()->auth_status == App\Models\User::UESR_PENDING ? 'disabled' : ''); ?> id="user_image" class="d-none">
								
							
								
								<div class="text-center">
									<img class="mx-auto" src="<?php echo e(asset('site/svg/upload.svg')); ?>" alt="">
								</div>
								<div class="mt-4 text-center">
									<h2>
										<strong>
											محل آپلود تصویر 
										</strong>
									</h2>
									<h6 class="pt-2">
										حداکثر حجم آپلود عکس 1 مگابایت
									</h6>
									<?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p>
											<small class="text-red"><?php echo e($message); ?></small>
										</p>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mt-4">
									<label for="user_image" class="btn px-5 d-block">
										انتخاب فایل
									</label>
								</div>
								<div class="mt-2" x-show="isUploading">
									در حال اپلود تصویر...
									
								</div>
								</div>
							</form>
							
						</div>
					</div>
				
				<div>

				<div class="mb-3 p-0  col-12">
					<button class="btn form-submit btn-primary btn-xl" wire:click="auth()">ارسال احراز هویت </button>
				</div>
				
				
			</div>

		</fieldset>
		<?php endif; ?>

		
			
	
		 

    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/dashboard/profile-component.blade.php ENDPATH**/ ?>