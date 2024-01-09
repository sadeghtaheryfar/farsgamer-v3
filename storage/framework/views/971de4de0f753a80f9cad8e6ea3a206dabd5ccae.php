<div>
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'addMoney','size' => 'modal-xl','title' => 'واریز ارز']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'addMoney','size' => 'modal-xl','title' => 'واریز ارز']); ?>
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
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'currency_id','label' => 'ارز','options' => $currencies->pluck('title','id'),'wire:model.defer' => 'currency_id']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'currency_id','label' => 'ارز','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currencies->pluck('title','id')),'wire:model.defer' => 'currency_id']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'currency_count','label' => 'تعداد','required' => 'true','wire:model.defer' => 'currency_count']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'currency_count','label' => 'تعداد','required' => 'true','wire:model.defer' => 'currency_count']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'currency_price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'currency_price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'currency_price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'currency_price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					 <?php $__env->slot('footer'); ?> 
						<button type="button" class="btn btn-primary" wire:click="storeMoney()">ثبت</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
					 <?php $__env->endSlot(); ?>
				</div>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'withrawMoney','size' => 'modal-xl','title' => 'برداشت ارز']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'withrawMoney','size' => 'modal-xl','title' => 'برداشت ارز']); ?>
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
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'currency_id','label' => 'ارز','options' => $currencies->pluck('title','id'),'wire:model.defer' => 'currency_id']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'currency_id','label' => 'ارز','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currencies->pluck('title','id')),'wire:model.defer' => 'currency_id']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'currency_count','label' => 'تعداد','required' => 'true','wire:model.defer' => 'currency_count']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'currency_count','label' => 'تعداد','required' => 'true','wire:model.defer' => 'currency_count']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'currency_price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'currency_price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'currency_price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'currency_price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.select2','data' => ['id' => 'currency_product','label' => 'محصول','data' => $data['product'],'wire:model.defer' => 'currency_product']]); ?>
<?php $component->withName('admin.forms.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'currency_product','label' => 'محصول','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['product']),'wire:model.defer' => 'currency_product']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					
					
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'currency_description','label' => 'توضیحات','wire:model.defer' => 'currency_description']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'currency_description','label' => 'توضیحات','wire:model.defer' => 'currency_description']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					 <?php $__env->slot('footer'); ?> 
						<button type="button" class="btn btn-primary" wire:click="storeWithrawMoney()">ثبت</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
					 <?php $__env->endSlot(); ?>
				</div>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.modal','data' => ['id' => 'editHistory','size' => 'modal-xl','title' => ' ویرایش']]); ?>
<?php $component->withName('admin.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'editHistory','size' => 'modal-xl','title' => ' ویرایش']); ?>
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
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'edit_currency_id','label' => 'ارز','options' => $currencies->pluck('title','id'),'wire:model.defer' => 'edit_currency_id']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'edit_currency_id','label' => 'ارز','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currencies->pluck('title','id')),'wire:model.defer' => 'edit_currency_id']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'edit_currency_count','label' => 'تعداد','required' => 'true','wire:model.defer' => 'edit_currency_count']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'edit_currency_count','label' => 'تعداد','required' => 'true','wire:model.defer' => 'edit_currency_count']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'number','id' => 'edit_currency_price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'edit_currency_price']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','id' => 'edit_currency_price','label' => '(تومان)قیمت خرید','required' => 'true','wire:model.defer' => 'edit_currency_price']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'edit_currency_description','label' => 'توضیحات','wire:model.defer' => 'edit_currency_description']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'edit_currency_description','label' => 'توضیحات','wire:model.defer' => 'edit_currency_description']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					 <?php $__env->slot('footer'); ?> 
						<button type="button" class="btn btn-primary" wire:click="storeEditItems()">ثبت</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
					 <?php $__env->endSlot(); ?>
				</div>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'کیف پول ارز ','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'کیف پول ارز ','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

	<div class="content d-flex flex-column-fluid">
		<div class="container">

			<div class="card mb-5">
                <div class="card-body">
                    <div class="row">
						<div class="col-md-8 col-sm-12">
                           
							
                        </div>
                        <div class="col-md-4 col-sm-12 text-left">
                            <button class="btn btn-success" wire:click="addMoney()">واریز ارز</button>
							<button class="btn btn-success" wire:click="withrawMoney()">برداشت ارز</button>
                        </div>
                    </div>
                </div>
            </div>

			<div class="card">
				<div class="card-body">
					<?php echo $__env->make('admin.components.advanced-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'currency','label' => 'ارز','options' => $currencies->pluck('title','id'),'wire:model' => 'currency']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'currency','label' => 'ارز','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currencies->pluck('title','id')),'wire:model' => 'currency']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<div class="form-group col-12">
                        <label for="category">دسته بندی</label>
                        <select id="category" class="form-control" wire:model="category">
                            <option value="" selected>انتخاب کنید...</option>
                            <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" class="h5"><?php echo e($category->title); ?></option>
                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subCategory->id); ?>"><?php echo e($subCategory->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if(isset($help)): ?>
                            <small class="text-muted"><?php echo e($help); ?></small>
                        <?php endif; ?>
                    </div>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<h3>موجودی</h3>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>ارز</th>
											<th>موجودی</th>
											<th>ارزش موجودی</th>
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e(iteration($loop, $perPage)); ?></td>
										<td><?php echo e($item->title); ?></td>
										<td><?php echo e($item->history->sum('count')); ?></td>
										<td><?php echo e(number_format( $item->fund)); ?> تومان</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<h3>تاریخچه واریز/برداشت</h3>
								<div class="col-12 p-4">
									<button class="btn btn-success" wire:click="$set('tab','deposit')">واریز</button>
									<button class="btn btn-danger" wire:click="$set('tab','harvest')">برداشت</button>
									<button class="btn btn-danger" wire:click="$set('tab','deleted')">حذف شدها</button>
									<button class="btn btn-info" wire:click="$set('tab','')">همه</button>
								</div>
								<?php if($tab == 'deleted'): ?>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>ارز</th>
											<th>تعداد</th>
											<th>قیمت </th>
											<th>ثبت شده توسط </th>
											<th>حذف شده توسط </th>
											<th> تاریخ حذف</th>
											<th>محصول</th>
											<th>قیمت کل</th>
											<th>تراکنش</th>
											<th>توضیحات</th>
											
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $currencies_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e(iteration($loop, $perPage)); ?></td>
										<td><?php echo e(!is_null($item->currency) ? $item->currency->title : '-'); ?></td>
										<td><?php echo e($item->count); ?></td>
										<td><?php echo e(number_format($item->amount)); ?> تومان</td>
										<td><?php echo e($item->user->username); ?></td>
										<td><?php echo e($item->user_deleted ? $item->user_deleted->username : ''); ?></td>
										<td><?php echo e(jalaliDate($item->deleted_at, '%d %B %Y - %H:%M:%S')); ?></td>
										<td><?php echo e($item->product ?? '-'); ?></td>
										<td><?php echo e(number_format($item->amount*$item->count)); ?> تومان</td>
										<td><?php echo e($item->count > 0 ? 'واریز' : 'برداشت'); ?></td>
										<td><?php echo e($item->description ?? '-'); ?></td>
										
									
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
								<?php else: ?>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>ارز</th>
											<th>تعداد</th>
											<th>قیمت </th>
											<th>توسط </th>
											<th>تاریخ</th>
											<th>محصول</th>
											<th>قیمت کل</th>
											<th>تراکنش</th>
											<th>توضیحات</th>
											<th>عملیات</th>
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $currencies_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e(iteration($loop, $perPage)); ?></td>
										<td><?php echo e(!is_null($item->currency) ? $item->currency->title : '-'); ?></td>
										<td><?php echo e($item->count); ?></td>
										<td><?php echo e(number_format($item->amount)); ?> تومان</td>
										<td><?php echo e($item->user->username); ?></td>
										<td><?php echo e(jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')); ?></td>
										<td><?php echo e($item->product ?? '-'); ?></td>
										<td><?php echo e(number_format($item->amount*$item->count)); ?> تومان</td>
										<td><?php echo e($item->count > 0 ? 'واریز' : 'برداشت'); ?></td>
										<td><?php echo e($item->description ?? '-'); ?></td>
										
										<td>
											<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['wire:click' => 'editItems('.e($item->id).')']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'editItems('.e($item->id).')']); ?>
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
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
								<?php endif; ?>
							</div>
							<?php echo e($currencies_row->links('admin.components.pagination')); ?>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
<?php $__env->startPush('scripts'); ?>
    <script>


		function deleteItems(id) {
            Swal.fire({
                title: 'حذف ردیف!',
                text: 'آیا از حذف ردیف اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                window.livewire.find('<?php echo e($_instance->id); ?>').call('deleteItems', id)
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/wallets/index-wallet.blade.php ENDPATH**/ ?>