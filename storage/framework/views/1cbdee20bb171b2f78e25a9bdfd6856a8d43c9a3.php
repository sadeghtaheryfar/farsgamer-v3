<div wire:init="getNumber">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'انبار','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'انبار','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
	<?php if(session()->get("depot-verify",false)): ?>
	 
    <div class="content d-flex flex-column-fluid">
        <div class="container">
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'storeDepot','size' => 'modal-xl','title' => ''.e($title).'']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'storeDepot','size' => 'modal-xl','title' => ''.e($title).'']); ?>
                <div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.validation-errors','data' => []]); ?>
<?php $component->withName('admin.forms.validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			 <?php $__errorArgs = ['none'];
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'product2','label' => 'ای دی یا عنوان محصول','required' => 'true','wire:input' => 'searchKeyword()','wire:model' => 'product']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'product2','label' => 'ای دی یا عنوان محصول','required' => 'true','wire:input' => 'searchKeyword()','wire:model' => 'product']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<div class="col-lg-12">
				<?php $__currentLoopData = $guest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<button class="btn btn-link" wire:click="setSearch('<?php echo e($key); ?>')"><?php echo e($item); ?>-(id:<?php echo e($key); ?>)</button>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<br>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'price2','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'price2','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if($action == 'exit'): ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'exit_price2','label' => 'قیمت فروش(تومان)','required' => 'true','wire:model.defer' => 'exit_price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'exit_price2','label' => 'قیمت فروش(تومان)','required' => 'true','wire:model.defer' => 'exit_price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'track_id2','label' => 'کد سفارش','wire:model.defer' => 'track_id']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'track_id2','label' => 'کد سفارش','wire:model.defer' => 'track_id']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<h2 class="my-2">لایسنس های اماده استفاده :</h2>
					<div class="table-responsive col-12 p-4">
						<table class="table table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>عنوان</th>
							</tr>
							</thead>
							<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $product_license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($loop->iteration); ?></td>
									<td oncopy="copy('<?php echo e($item); ?>')">
										
										<?php echo e($item); ?>

									
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td class="text-center" colspan="3">
										دیتایی جهت نمایش وجود ندارد
									</td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>
					</div>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'count3','label' => 'تعداد','wire:model.defer' => 'count2']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'count3','label' => 'تعداد','wire:model.defer' => 'count2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php endif; ?>
			
				<?php if($action == 'enter'): ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'licenses','label' => 'لاینسیس ها','help' => 'لاینسیس ها را با کاما از هم جدا کنید','wire:model.defer' => 'licenses']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'licenses','label' => 'لاینسیس ها','help' => 'لاینسیس ها را با کاما از هم جدا کنید','wire:model.defer' => 'licenses']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'status2','disabled' => true,'label' => 'وضعیت','options' => $statuses,'required' => 'true','wire:model.defer' => 'status']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'status2','disabled' => true,'label' => 'وضعیت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statuses),'required' => 'true','wire:model.defer' => 'status']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'category2','disabled' => true,'label' => 'دسته بندی','options' => $data,'required' => 'true','wire:model.defer' => 'category']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'category2','disabled' => true,'label' => 'دسته بندی','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data),'required' => 'true','wire:model.defer' => 'category']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.lfm-standalone','data' => ['id' => 'media2','disabled' => true,'label' => 'تصویر','image' => $media,'wire:model' => 'media']]); ?>
<?php $component->withName('admin.forms.lfm-standalone'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'media2','disabled' => true,'label' => 'تصویر','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($media),'wire:model' => 'media']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'description2','label' => 'توضیحات','wire:model.defer' => 'description']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'description2','label' => 'توضیحات','wire:model.defer' => 'description']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                 <?php $__env->slot('footer'); ?> 
                    <button type="button" class="btn btn-primary" wire:click="storeDepot()">ثبت</button>
                   
                 <?php $__env->endSlot(); ?>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'showDetails','size' => 'modal-xl','title' => 'جزئیات محصول']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'showDetails','size' => 'modal-xl','title' => 'جزئیات محصول']); ?>
				<!-- <div class="col-12">
					<button wire:click="$set('license_tab','not_used')" class="btn btn-sm btn-info">ایسنس های قابل استفاده</button>
					<button wire:click="$set('license_tab','used')" class="btn btn-sm btn-info">لایسنس های استفاده شده</button>
					<button wire:click="$set('license_tab','deleted')" class="btn btn-sm btn-info">لایسنس های حذف شده</button>
				</div> -->
            	<div>
					<h2 class="my-2"><?php echo e($product_name); ?></h2>
				<div class="col-12 p-4">
				<h2 class="my-2">تاریخچه ورودی</h2>
				<?php $__currentLoopData = $enter_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-12 border">
						<p class="p-2"><?php echo e($loop->iteration); ?> # تعداد <?php echo e($price->count); ?> عدد به قیمت <?php echo e(number_format((int)$price->price)); ?> تومان  </p>
						</div>
													
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<hr>
				<div class="col-12 p-4">
				<h2 class="my-2">یادداشت ها</h2>
				<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(!empty($item->description)): ?>
						<div class="col-12 border">
							<p class="p-2"><?php echo e($item->description); ?></p>
							<small class="text-info"><?php echo e(jalaliDate($item->updated_at, '%d %B %Y')); ?></small>
						</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				
				
				<h2 class="my-2">لایسنس های قابل استفاده</h2>
				<div class="table-responsive col-12 p-4">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $product_license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
									
									<?php echo e($item); ?>

								
								</td>
                                <td>
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.delete-table','data' => ['onclick' => 'deleteLicenseItem('.e($key).')']]); ?>
<?php $component->withName('admin.delete-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['onclick' => 'deleteLicenseItem('.e($key).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

               <?php $__env->slot('footer'); ?> 
                    
                   
                 <?php $__env->endSlot(); ?>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'editDepot','size' => 'modal-xl','title' => ''.e($title).'']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'editDepot','size' => 'modal-xl','title' => ''.e($title).'']); ?>
                <div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.validation-errors','data' => []]); ?>
<?php $component->withName('admin.forms.validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			 	<?php $__errorArgs = ['none'];
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'product','disabled' => true,'label' => 'ای دی یا عنوان محصول','required' => 'true','wire:input' => 'searchKeyword()','wire:model' => 'product']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'product','disabled' => true,'label' => 'ای دی یا عنوان محصول','required' => 'true','wire:input' => 'searchKeyword()','wire:model' => 'product']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<div class="col-lg-12">
				<?php $__currentLoopData = $guest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<button class="btn btn-link" wire:click="setSearch('<?php echo e($key); ?>')"><?php echo e($item); ?>-(id:<?php echo e($key); ?>)</button>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<br>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'count2','label' => 'تعداد','required' => 'true','wire:model.defer' => 'count']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'count2','label' => 'تعداد','required' => 'true','wire:model.defer' => 'count']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if($action == 'exit'): ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'exit_price','label' => 'قیمت فروش(تومان)','required' => 'true','wire:model.defer' => 'exit_price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'exit_price','label' => 'قیمت فروش(تومان)','required' => 'true','wire:model.defer' => 'exit_price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'track_id','label' => 'کد سفارش','wire:model.defer' => 'track_id']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'track_id','label' => 'کد سفارش','wire:model.defer' => 'track_id']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php endif; ?>
				<?php if($action == 'enter'): ?>

					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'status','disabled' => true,'label' => 'وضعیت','options' => $statuses,'required' => 'true','wire:model.defer' => 'status']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'status','disabled' => true,'label' => 'وضعیت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statuses),'required' => 'true','wire:model.defer' => 'status']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'category','disabled' => true,'label' => 'دسته بندی','options' => $data,'required' => 'true','wire:model.defer' => 'category']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'category','disabled' => true,'label' => 'دسته بندی','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data),'required' => 'true','wire:model.defer' => 'category']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.lfm-standalone','data' => ['id' => 'media','disabled' => true,'label' => 'تصویر','image' => $media,'wire:model' => 'media']]); ?>
<?php $component->withName('admin.forms.lfm-standalone'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'media','disabled' => true,'label' => 'تصویر','image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($media),'wire:model' => 'media']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if($action == 'exit'): ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'description','label' => 'توضیحات','wire:model.defer' => 'description']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'description','label' => 'توضیحات','wire:model.defer' => 'description']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php endif; ?>
                 <?php $__env->slot('footer'); ?> 
                    <button type="button" class="btn btn-primary" wire:click="storeItem()">ثبت</button>
                    
                 <?php $__env->endSlot(); ?>
				
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
          <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
						<div class="col-md-8 col-sm-12">
                            <button class="btn btn-primary" wire:click="$set('tab','depot')">انبار</button>
							<button class="btn btn-primary" wire:click="$set('tab','report')">گزارشات</button>
							
                        </div>
                        <div class="col-md-4 col-sm-12 text-left">
                            <button class="btn btn-success" wire:click="addStoreDepot('فرم ورود')">فرم ورود</button>
							<button class="btn btn-danger" wire:click="addStoreDepot('فرم خروج')">فرم خروج</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php echo $__env->make('admin.components.advanced-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'category_id','label' => 'دسته','options' => $data,'wire:model' => 'cat']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'category_id','label' => 'دسته','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data),'wire:model' => 'cat']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'order_id','label' => 'کد سفارش','wire:model' => 'order_id']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'order_id','label' => 'کد سفارش','wire:model' => 'order_id']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'product_status','label' => 'وضعیت','options' => $statuses,'wire:model' => 'product_status']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'product_status','label' => 'وضعیت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statuses),'wire:model' => 'product_status']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if($tab == 'report'): ?>
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<button class="btn btn-outline-primary" wire:click="$set('report','products')">محصولات</button>
							<button class="btn btn-outline-primary" wire:click="$set('report','enter')">ورودی</button>
							<button class="btn btn-outline-primary" wire:click="$set('report','exit')">خروجی</button>
                        </div>
                    </div>
					<?php endif; ?>
                    <div class="row">
						<?php if($tab == 'depot'): ?>
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>انبار</h3>
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th>عنوان</th>
										<th>تعداد</th>
										<th>دسته بندی</th>
										<th>قیمت خرید</th>
										<th>سرمایه کل</th>
										<th>وضعیت</th>
										<th>تاریخ</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td><?php echo e(iteration($loop, $perPage)); ?></td>
											<td><?php echo e(@$item->product->title); ?></td>
											<td><?php echo e($item->product->licenses ? @$item->product->licenses->where('is_used',0)->count() : ''); ?></td>
											<td><?php echo e(@$item->categories->title); ?></td>
											<td>
											<?php $__currentLoopData = $item->price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($key > 5): ?>
													<?php break; ?>
												<?php endif; ?>	

												<p class="p-2">تعداد <?php echo e($price->count); ?> عدد به قیمت <?php echo e(number_format((int)$price->price)); ?> </p>
												<hr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</td>
											<td><?php echo e(number_format($item->fund)); ?> تومان</td>
											<td><?php echo e($item->product->status_label); ?></td>
											<td><?php echo e(jalaliDate($item->created_at, '%d %B %Y %H:%m')); ?></td>
											<td>
												<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['wire:click' => 'showDetails('.e($item->id).')']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'showDetails('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
												<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.delete-table','data' => ['onclick' => 'deleteItems('.e($item->id).')']]); ?>
<?php $component->withName('admin.delete-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['onclick' => 'deleteItems('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<td class="text-center" colspan="9">
												دیتایی جهت نمایش وجود ندارد
											</td>
										<?php endif; ?>
									<tr>
									</tr> 
									</tbody>
								</table>
							</div>
							<?php echo e($all->links('admin.components.pagination')); ?>

						</div>
						<?php elseif($report == 'enter' || is_null($report)): ?>
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>ورودی</h3>
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th>عنوان</th>
										<th>دسته بندی</th>
										<th>توسط</th>
										<th>تعداد</th>
										<th>قیمت خرید</th>
										<th>توضیحات</th>
										<th>لایسنس ها</th>
										<th>تاریخ</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $enter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e(iteration($loop, $perPage)); ?></td>
										<td><?php echo e(@$item->depotItem->product->title); ?></td>
										<td><?php echo e(@$item->categories->title); ?></td>
										<td><?php echo e(@$item->user->name.' '.@$item->user->family); ?></td>
										<td><?php echo e(@$item->count); ?></td>
										<td><?php echo e(@$item->price ? number_format($item->price).' تومان' : '-'); ?></td>
										<td><?php echo e(@$item->description); ?></td>
										<td>
											<?php echo e(@$item->licenses); ?>

										</td>
										<td><?php echo e(jalaliDate($item->created_at, '%d %B %Y %H:%m')); ?></td>
										<td>
											<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['wire:click' => 'editCase('.e($item->id).')']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'editCase('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                         	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.delete-table','data' => ['onclick' => 'deleteItem('.e($item->id).')']]); ?>
<?php $component->withName('admin.delete-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['onclick' => 'deleteItem('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    	</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<td class="text-center" colspan="10">
											دیتایی جهت نمایش وجود ندارد
										</td>
									<?php endif; ?>
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							<?php echo e($enter->links('admin.components.pagination')); ?>

						</div>
						<?php elseif($report == 'exit'): ?>
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>خروجی</h3>
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th>عنوان</th>
										<th>کد سفارش</th>
										<th>دسته بندی</th>
										<th>توسط</th>
										<th>تعداد</th>
										<th>تاریخ</th>
										<th>قیمت خرید</th>
										<th>قیمت فروش</th>
										<th>کد سفارش</th>
										<th>توضیحات</th>
										<th>لایسنس ها</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $exit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td><?php echo e(iteration($loop, $perPage)); ?></td>
											<td><?php echo e(@$item->depotItem->product->title); ?></td>
											<td><?php echo e(@$item->track_id); ?></td>
											<td><?php echo e(@$item->categories->title); ?></td>
											<td><?php echo e(@$item->user->name.' '.@$item->user->family); ?></td>
											<td><?php echo e(@$item->count); ?></td>
											<td><?php echo e(jalaliDate($item->created_at, '%d %B %Y %H:%m')); ?></td>
											<td><?php echo e(number_format(@$item->price)); ?></td>
											<td><?php echo e(number_format(@$item->exit_price)); ?></td>
											<td><?php echo e($item->track_id ?? ''); ?></td>
											<td><?php echo e(@$item->description); ?></td>
											<td>
											<?php echo e(@$item->licenses); ?>

											</td>
											<td>
											 	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['wire:click' => 'editCase('.e($item->id).')']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'editCase('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
												<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.delete-table','data' => ['onclick' => 'deleteItem('.e($item->id).')']]); ?>
<?php $component->withName('admin.delete-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['onclick' => 'deleteItem('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
												<div style="display: inline-block;background: #f3f6f9;width: 35px;height: 33px;position: relative;top: 5px;right: -7px;border-radius: 4px;">
										<a href="<?php echo e(route('admin.factor',['id' => $item->id])); ?>">
											<i data-container="body" data-toggle="popover" data-placement="top"
                                         class="flaticon-eye fa-2x" style=" top: 1px;position: relative;left: -4px;"></i>

										 
										</a>
										</div>
										
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<td class="text-center" colspan="12">
												دیتایی جهت نمایش وجود ندارد
											</td>
										<?php endif; ?>
									<tr>
									</tr> 
									</tbody>
								</table>
							</div>
							<?php echo e($exit->links('admin.components.pagination')); ?>

						</div>
						<?php elseif($report == 'products'): ?>
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>محصولات</h3>
								
								<table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>قیمت</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><a href="<?php echo e(route('products.show', $item->slug)); ?>"><?php echo e($item->title); ?></a></td>
                                    <td><?php echo e(number_format($item->price)); ?> تومان</td>
                                    <td><?php echo e($item->status_label); ?></td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['href' => ''.e(route('admin.products.store',
                                            ['action'=>'edit', 'id' => $item->id])).'']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.products.store',
                                            ['action'=>'edit', 'id' => $item->id])).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                       
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="5">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
							</div>
							<?php echo e($products->links('admin.components.pagination')); ?>

						</div>
						<?php endif; ?>
					</div>
                  
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>

        function deleteItem(id) {
            Swal.fire({
                title: 'حذف کالا!',
                text: 'آیا از حذف کالا اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                window.livewire.find('<?php echo e($_instance->id); ?>').call('delete', id)
                }
            })
        }
		function deleteItems(id) {
            Swal.fire({
                title: 'حذف کالا!',
                text: 'آیا از حذف کالا اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                window.livewire.find('<?php echo e($_instance->id); ?>').call('deletes', id)
                }
            })
        }

		Livewire.on('verify-code', data => {
			Swal.fire({
				title: 'کد ارسال شده را وارد نمایید',
				input: 'password',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'بررسی',
				showLoaderOnConfirm: true,
				preConfirm: (login) => {
					window.livewire.find('<?php echo e($_instance->id); ?>').call('checkCode',login)
				},
				allowOutsideClick: () => !Swal.isLoading()
				}).then((result) => {
			})
    	})

		Livewire.on('getNumber', data => {
			Swal.fire({
			title: 'شماره را وارد نمایید',
			input: 'text',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			confirmButtonText: 'بررسی',
			showLoaderOnConfirm: true,
			preConfirm: (login) => {
				window.livewire.find('<?php echo e($_instance->id); ?>').call('verify',login)
			},
			allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
			})
		})


		function deleteLicenseItem(id) {
            Swal.fire({
                title: 'حذف لاینسیس!',
                text: 'آیا از حذف لاینسیس اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                window.livewire.find('<?php echo e($_instance->id); ?>').call('deleteLicense', id)
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/depot/index-digital-depot.blade.php ENDPATH**/ ?>