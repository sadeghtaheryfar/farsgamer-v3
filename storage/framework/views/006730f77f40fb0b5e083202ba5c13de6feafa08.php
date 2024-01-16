<div>
    <section class="relative p-4 xs:p-6 lg:p-8 lg:py-12 lg:pr-6 lg:pl-6 bg-white rounded-2xl text-gray-600 font-medium overflow-hidden">

        <img class="hidden lg:block absolute top-16 right-6 w-12" src="<?php echo e(asset('site/svg/circle-grid-long.svg')); ?>" alt="">
        <img class="hidden lg:block absolute pattern2 w-10" src="<?php echo e(asset('site/svg/circle-grid-medium.svg')); ?>" alt="">
        <img class="hidden lg:block absolute -top-36 -left-28 max-w-64 lg:max-w-lg opacity-30" src="<?php echo e(asset('site/svg/circle-in-circle.svg')); ?>" alt="">
        <img class="hidden lg:block absolute pattern" src="<?php echo e(asset('site/svg/circle-in-circle-2.svg')); ?>" alt="">

		<img class="hidden lg:block absolute pattern3" src="<?php echo e(asset('site/svg/Mask Group 16.svg')); ?>" alt="">
		<img class="hidden lg:block absolute pattern4" src="<?php echo e(asset('site/svg/Group 653.svg')); ?>" alt="">

        <div class="relative grid gap-4 overflow-hidden lg:gap-8">
            <div class="grid gap-4 bg-white rounded-2xl overflow-hidden sm:grid-cols-2 md:order-2 xl:grid-cols-3 xl:gap-x-12">
                <div class="grid p-3 bg-primary bg-opacity-10 rounded-2xl sm:col-span-full xl:col-span-1">
                    <div class="p-4 bg-primary rounded-2xl text-white justify-center items-center grid max-h-24">
                        <i class="icon-location flex items-center justify-center text-3xl"></i>
                        <p>آدرس</p>
                    </div>
                    <p class="px-4 pt-3 pb-2 text-center h-full flex items-center justify-center text-sm"><?php echo e($address); ?></p>
                </div>
                <div class="grid p-3 bg-primary bg-opacity-10 rounded-2xl sm:col-start-1 sm:col-end-2 xl:col-span-1">
                    <div class="p-4 bg-primary rounded-2xl text-white justify-center items-center grid max-h-24">
                        <i class="icon-mail flex items-center justify-center text-3xl"></i>
                        <p>ایمیل</p>
                    </div>
                    <p class="px-4 pt-3 pb-2 text-center h-full flex items-center justify-center"><?php echo e($email); ?></p>
                </div>
                <div div class="grid p-3 bg-primary bg-opacity-10 rounded-2xl sm:col-start-2 sm:col-end-3 xl:col-span-1">
                    <div class="p-4 bg-primary rounded-2xl text-white justify-center items-center grid max-h-24">
                        <i class="icon-phone flex items-center justify-center text-3xl"></i>
                        <p>تلفن تماس</p>
                    </div>
                    <p class="px-4 pt-3 pb-2 text-center h-full flex items-center justify-center"><?php echo e($phone); ?></p>
                </div>
            </div>

            <div class="grid gap-4 md:order-1 xl:grid-cols-12 xl:gap-6">
                <div class="pb-8 xl:col-start-1 xl:col-end-6">
                    <div class="basic-image-slider swiper-container rounded-2xl bg-white overflow-hidden relative">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide w-full">
                                    <img class="rounded-2xl" src="<?php echo e(asset($slide)); ?>" alt="">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="swiper-pagination bottom-0"></div>
                    </div>
                </div>
                <div class="xl:p-2 xl:col-start-6 xl:col-end-13 leading-7"><?php echo $description; ?></div>
            </div>
        </div>

		<div class="team-list" dir="ltr">
           <div class="row">
                <div class="manager" dir="rtl">
						<?php if(isset($admin->name)): ?>
						<div class="single-case">
							<div class="team-image">
							</div>
							<?php if($admin->image): ?>
							<img src="<?php echo e($admin->image ?? ''); ?>" alt="">
							<?php endif; ?>
						</div>
						<?php endif; ?>
                        <div class="team-detail">
                            <h3>تیم فارس گیمر</h3>
                            <b><?php echo e($admin->name ?? ''); ?></b>
                            <br>
                            <small><?php echo e($admin->task ?? ''); ?></small>
                        </div>
                   
                </div>
                <?php for ($i = 0; $i < ceil(count($teams)/6); $i++) : ?>
                    <div class="row" id="team-list">
                        <?php for ($j = $i*6; $j < $i*6+6; $j++) : ?>
                            <?php if(isset($teams[$j])): ?>
								<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="team">
                                    <div class="case">
                                        <div class="team-image">
                                        </div>
										
                                        <img src="<?php echo e($teams[$j]['image']); ?>" alt="">
                                        <b><?php echo e($teams[$j]['name']); ?></b>
                                        <br>
                                        <small><?php echo e($teams[$j]['task']); ?></small>
                                    </div>
                                </div>
                            </div>
							<?php endif; ?>
							
                        <?php endfor; ?>
                    </div>

                <?php endfor; ?>
            </div>
        </div>

		<div class="relative grid gap-4 pb-10 pt-2">
			<div class=" p-4 lg:p-6 mb-8  rounded-2xl">
				<form class="mb-5">
				<fieldset class="border p-4 grid gap-8 md:grid-cols-2">
  					<legend  class="float-none w-auto"><small>ثبت درخواست برای پنل همکاری:</small></legend>
					<div>
						<label>نام
							<input class="text-field" type="text" placeholder="نام" wire:model.defer="name">
						</label>
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
						<label>نام خانوادگی
							<input class="text-field" type="text" placeholder="نام خانوادگی" wire:model.defer="family">
						</label>
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
						<label>ایمیل
							<input class="text-field" type="email" placeholder="ایمیل" wire:model.defer="email">
						</label>
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
					<div>
						<label>شماره همراه
							<input class="text-field" type="tel" placeholder="شماره همراه" wire:model.defer="mobile" >
						</label>
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
					
						
					</fieldset>
				</form>
				<?php if(!empty($result)): ?>
				<small class="d-block alert alert-<?php echo e($alert); ?>"><?php echo e($result); ?></small>	
				<?php endif; ?>
				<button class="btn form-submit btn-primary btn-2xl  mt-2" wire:click="newPartner()"
                    wire:loading.attr="disabled">ثبت درخواست</button>
				
			</div>
		</div>
    </section>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/settings/contact-us-component.blade.php ENDPATH**/ ?>