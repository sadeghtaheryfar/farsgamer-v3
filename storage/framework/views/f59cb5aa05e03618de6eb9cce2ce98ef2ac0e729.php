<div>
	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'کیف پول','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'کیف پول','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <div class="content d-flex flex-column-fluid" >
        <div class="container">
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => 'کیف پول']]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'کیف پول']); ?>
				<?php if($verifiedTransaction): ?>
						<?php if($isSuccessful): ?>
							<p class="bg-light-green px-4 py-2 text-center rounded-2xl mb-4 font-medium"><?php echo e($message); ?></p>
						<?php else: ?>
							<p class="bg-pink px-4 py-2 text-center rounded-2xl mb-4 font-medium"><?php echo e($message); ?></p>
						<?php endif; ?>
					<?php endif; ?>
					<div class="col-12">

							<div class="d-flex align-items-center pb-4">
								
								<h1>موجودی کیف پول  : </h1>
								<span > <?php echo e(number_format(auth()->user()->balance)); ?> </span>
								<span class="text-sm">تومان</span>
							</div>
						

							<form class="form-group" wire:submit.prevent="chargeWallet()">
								<div class="d-flex align-items-center">
									<input class="form-control" type="number" min="0" placeholder="مبلغ به تومان" wire:model.defer="amount">
									<button type="submit" class="btn btn-primary rounded-0">شارژ کیف پول</button>
								</div>
								<?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<small class="text-red"> <?php echo e($message); ?></small> 
								
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</form>
						</div>

						<div class="table-responsive">
							<table class="table table-striped">
								<thead class="text-sm text-gray-500">
								<tr>
									<th>#</th>
									<th>تاریخ</th>
									<th>مبلغ</th>
									<th>نوع تراکنش</th>
									<th>جزئیات</th>
								</tr>
								</thead>
								<tbody class="text-black">
								<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<?php echo e($loop->iteration); ?>

										</td>
										<td>
											<?php echo e(jalaliDate($item->created_at, '%Y/%m/%d')); ?>

										</td>
										<td class="whitespace-nowrap">
											<span class="flex items-center gap-1"><span class="font-semibold"><?php echo e(number_format($item->amount)); ?></span><span
														class="text-sm">تومان</span></span>
										</td>
										<td><?php echo e($item->type == 'withdraw' ? 'برداشت' : 'واریز'); ?></td>
										<td class="min-w-32"><?php echo e($item->meta['description']); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
			 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
		
		</div>
    </div>
</div>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/partner/wallets/index-wallet.blade.php ENDPATH**/ ?>