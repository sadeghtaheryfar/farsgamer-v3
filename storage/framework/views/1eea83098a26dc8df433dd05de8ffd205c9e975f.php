<?php if($table === false): ?>
<div class="relative p-4 bg-white rounded-2xl overflow-hidden xl:flex xl:p-8 xl:pt-0 xl:items-start">
	<div class="grid justify-center gap-8 max-w-2xl mx-auto xl:pt-8 xl:mr-0 xl:items-start xl:gap-12">
		<div>
			<h1 class="text-lg font-semibold">پیگیری سفارش</h1>
			<p class="text-sm mt-4">
		
			فارس گیمری عزیز، در صورتی که در وب سایت سفارشی ثبت کرده اید و قصد دارید تا از آخرین وضعیت انجام آن مطلع شوید، میتوانید از طریق این قسمت سفارش خود را پیگیری کنید.
			<br>
			<br>
<b>کد سفارش چیست؟ </b>
<br>
زمانی که شما سفارش ثبت میکنید، از طریق پیامک و ایمیل برای شما کد سفارش ارسال خواهد شد که به صورت FAG-** می باشد.
جهت پیگیری سفارش شما به این کد نیاز دارید.
<br>
<span style="color:#3d42df">*در صورت بروز هرگونه مشکل و وجود ابهام یا سوال تیم پشتیبانی ما در خدمت شما هستند*</span>
			</p>
		</div>
		
		<div class="grid gap-6 w-full max-w-sm mx-auto">
			<form class="grid gap-6 w-full max-w-sm mx-auto">
				<div>
				<label class="font-semibold mr-2" for="tracking-code">کد سفارش</label>
				<input class="text-field dir-ltr" wire:model="code" type="text" wire:keydown.enter="showOrder()" name="tracking-code" id="tracking-code" placeholder="FAG کد سفارش بدون">
				</div>
				<div>
					<label class="font-semibold mr-2" for="phone">شماره همراه</label>
					<input class="text-field dir-ltr" wire:model="phoneNumber" wire:keydown.enter="showOrder()" type="text" name="phone" id="phone" autocomplete="tel" placeholder="09*********">
				</div>
				<div class="flex">
					<?php if($alert): ?>
						<i id="search-order-alert"></i><p class="text-danger-alert"><?php echo e($alert); ?></p>
					<?php endif; ?>
				</div>
			<button wire:click="showOrder" type="button" class="btn btn-primary form-submit font-semibold text-lg mt-4"><?php echo e($search); ?></button>
			</form>
		</div>
	</div>
	<div class="hidden xl:block">
		<img src="<?php echo e(asset('site/images/spiderman.png')); ?>" alt="عکس مرد عنکبوتی">
	</div>
</div>
<?php endif; ?>
<?php if($table === true): ?>
<div class="relative grid gap-4 overflow-hidden bg-white rounded-2xl xl:grid-cols-12 xl:gap-8 xl:bg-transparent">
    <div class="xl:col-start-1 xl:col-end-9 2xl:col-end-10 xl:row-span-full overflow-hidden xl:bg-white xl:rounded-2xl">
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            <h1 class="font-semibold text-lg mb-4">پیگیری سفارش</h1>
			<ol class="grid gap-4">
				<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="odd:bg-gray-50 p-4 rounded-2xl border border-gray-100 font-medium">
						<a class="flex gap-4 items-center">
							<img class="rounded-xl w-24" src="<?php echo e(asset($item->product->image)); ?>">
							<h3><?php echo e($item->product->title); ?></h3>
						</a>
						<p class="mt-4 text-sm text-red-400"><?php echo e($item->status_label); ?></p>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ol>
        </div>
    </div>

    <div class="border-t border-gray-200 pt-4 xl:border-none xl:pt-0 xl:col-start-9 xl:col-end-13 2xl:col-start-10 xl:row-span-full xl:bg-white xl:rounded-2xl">
        <div class="p-4 rounded-2xl lg:p-6 bg-white">
		
            <div class="bg-gray-50 text-primary border border-primary rounded-2xl text-center" wire:ignore>
                <p class="px-3 py-2">زمان تحویل</p>
                <p class="px-3 py-2 font-medium border-t border-primary text-2xl" data-countdown="<?php echo e($singleOrder->delivery_time); ?>"></p>
            </div>
		
            <ul class="my-6 space-y-2 text-base">
                <li class="flex items-center justify-between">
                    <p class="text-gray-500 font-semibold">شماره سفارش</p>
                    <p class="dir-ltr font-semibold"><span class="text-gray2-700"></span><span class="font-isans-ed select-all">FAG-<?php echo e($code); ?></span></p>
                </li>
                <li class="flex items-center justify-between">
                    <p class="text-gray-500 font-semibold">تاریخ</p>
                    <p class="font-semibold"><?php echo e(jalaliDate($singleOrder->created_at,'%d %B %Y')); ?></p>
					
                </li>
            </ul>
			<?php if(count($userNotifications) > 0): ?>
            <p class="text-red text-sm text-center">شما <?php echo e(count($userNotifications)); ?> پیام از پشتیبانی دارید</p>
           <a href="<?php echo e(route('dashboard.notifications')); ?>" class="btn btn-primary w-full h-12.5 mt-2 text-lg font-semibold">مشاهده پیام</a>
		   <?php endif; ?>
        </div>
    </div>
</div>

<?php endif; ?>



<?php $__env->startPush('scripts'); ?>
    <script>
	window.livewire.on('showOrder', () => {
     $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%H:%M:%S'));
            });
        });
	});
	
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/settings/faqs-orders-detail-component.blade.php ENDPATH**/ ?>