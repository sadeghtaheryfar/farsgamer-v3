<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'محصولات','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'محصولات','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

    <div class="content d-flex flex-column-fluid" >
        <div class="container">
            <div class="card">
                <div class="card-body">
				<div class="form-group col-12">
                        <label for="category">دسته بندی</label>
                        <select id="category" class="form-control" wire:model="category">
                            <option value="" selected>انتخاب کنید...</option>
                            <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->slug); ?>" class="h5"><?php echo e($category->title); ?></option>
                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subCategory->slug); ?>"><?php echo e($subCategory->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if(isset($help)): ?>
                            <small class="text-muted"><?php echo e($help); ?></small>
                        <?php endif; ?>
                    </div>
					 <?php echo $__env->make('admin.components.advanced-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <br>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<fieldset class="border my-4">
							<legend class="float-none w-auto mr-3"><strong><?php echo e($key); ?>:</strong></legend>
							<div class="row p-3">
							
							<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-12 col-md-3 rounded-3">
									<div class="card card-custom gutter-b shadow rounded-2">
										<div class="card-header ">
											<div class="card-title m-auto w-100 text-center">
												<h3 class="card-label m-auto">
													<?php echo e($value->title); ?>

													
												</h3>
											
											</div>
											<strong class="d-block m-auto w-100 text-center">قیمت : <?php echo e(number_format($value->partner_price)); ?> تومان</strong>
										</div>
										<div class="card-body text-center">
											<a href="<?php echo e(route('partner.store.new.orders',$value->id)); ?>" class="btn btn-outline-secondary"><i class="icon-basket"></i> خرید محصول</a>
										</div>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</fieldset>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/partner/orders/new-order.blade.php ENDPATH**/ ?>