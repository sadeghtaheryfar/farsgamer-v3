<div>
   

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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
				
					
                	
               		<div class="col-12">
					   <?php if($base_form->status != \App\Models\AdminForm::OK): ?> 
							<div class="col-12 py-3 text-center">
								<img alt="Logo" class="mx-auto" src="http://container.elfiro.com/images/622df373b1c52.png">
							</div>
					   			<?php if($base_form->form->message): ?>
									<p class="alert alert-warning"><?php echo e($base_form->form->message); ?></p>
								<?php endif; ?>

								<?php if($base_form->note && $base_form->status == \App\Models\AdminForm::REJECTED): ?>
									<p class="alert alert-danger"><?php echo e($base_form->note); ?></p>
								<?php elseif($base_form->note): ?>
									<p class="alert alert-info"><?php echo e($base_form->note); ?></p>
								<?php endif; ?>
							<div class="container border rounded my-2 text-right">
								<div class="row">
									<div class="col-md-12 fg_bg d-flex align-items-center justify-content-between py-3 text-white">
										<p class="m-0 ">نام کاربر :  <?php echo e($base_form->user->full_name); ?></p>
										<p class="m-0"><?php echo e($base_form->form_title); ?></p>
										<p class="m-0 border-left pr-5">تاریخ : <?php echo e(jalaliDate($base_form->created_at)); ?></p>
									</div>
									<?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
										<?php if($item['type'] == 'textArea'): ?>
											<?php if(FormBuilder::isVisible($form, $item)): ?>
											<div class="col-md-12 fg_border bg-white d-flex align-items-center py-4">
												<div class="form-group w-100">
													<label class="font-weight-bold" for="<?php echo e($key); ?>"><?php echo $item['label']; ?></label>
													<textarea name="<?php echo e($item['name']); ?>" id="<?php echo e($key); ?>" class="form-control fg_border_inputs" placeholder="<?php echo e($item['placeholder']); ?>" rows="4" wire:model.defer="form.<?php echo e($key); ?>.value"></textarea>
													<?php $__errorArgs = ['form.'.$key.'.error'];
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
											</div>
											<?php endif; ?>
										<?php endif; ?>
										
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<div class="col-md-12 fg_border bg-white d-flex align-items-center justify-content-center py-2">
										<div class="text-center">
											<button wire:click="update()" style="
    width: 100px;
" class="btn text-white px-4 my-3 fg_bg">ثبت</button>
											<p class="font-weight-bold">"تمامی این گزارش به صورت محرمانه در اختیار مدیریت مجموعه قرار خواهد گرفت"</p>
										</div>
									</div>
								</div>
							</div>
						 
						<?php endif; ?>	 
						
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
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/reports/store-my-forms.blade.php ENDPATH**/ ?>