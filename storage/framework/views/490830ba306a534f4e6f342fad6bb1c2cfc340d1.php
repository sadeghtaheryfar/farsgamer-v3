<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'فرم','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'فرم','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

    <div class="d-flex flex-column-fluid">
        <div class="container">

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
            </div>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => 'فرم','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'فرم','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
				
               
                	<div class="table-responsive">
                        <table class="table table-striped">
                           	<tr>
						    	<td>فرم گزارش</td>
                                <td><?php echo e($form->form_title); ?></td>
                            </tr>
							<tr>
						    	<td>بازه زمانی</td>
                                <td><?php echo e($form->form_cron); ?></td>
                            </tr>
							<tr>
						    	<td>کاربر</td>
                                <td><?php echo e($form->user->username); ?></td>
                            </tr>
							<tr>
						    	<td>شماره گاربر</td>
                                <td><?php echo e($form->user->mobile); ?></td>
                            </tr>
							<tr>
						    	<td>تاریخ ارسال</td>
                                <td><?php echo e(jalaliDate($form->created_at)); ?></td>
                            </tr>
							<tr>
						    	<td>تاریخ ویرایش</td>
                                <td><?php echo e(jalaliDate($form->updated_at)); ?></td>
                            </tr>
							<tr>
						    	<td>تاریخ پاسخ</td>
                                <td><?php echo e($form->answerd_at ? jalaliDate($form->answerd_at) : ''); ?></td>
                            </tr>
                        </table>
                    </div>
               		<div class="form-group col-12">
						<?php if(sizeof($form->forms) > 0): ?>
							<div class="row">
								<div class="form-group col-12 d-flex justify-content-between">
									<div>سوالات</div>
								</div>
								<?php $__currentLoopData = $form->forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(($form['type'] ?? '') != 'paragraph'): ?>
											<div class="form-group col-4">
												<td ><?php echo $form['label'] ?? ''; ?></td>
											</div>
											<div class="form-group col-6  p-0 m-0 ">
												<span class="copy_text p-0 m-0">
													<?php echo e($form['value'] ?? ''); ?>

												</span>
											</div>
										<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						<?php endif; ?>
					</div>
              

               	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'status','label' => 'وضعیت','options' => $data['status'],'required' => 'true','wire:model.defer' => 'status']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'status','label' => 'وضعیت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['status']),'required' => 'true','wire:model.defer' => 'status']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'note','label' => 'پیام','wire:model.defer' => 'note']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note','label' => 'پیام','wire:model.defer' => 'note']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/reports/store-admin-forms.blade.php ENDPATH**/ ?>