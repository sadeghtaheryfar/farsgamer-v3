<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'لاگ','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'لاگ','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
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
					<?php if($tab == 'logs' || !isset($tab)): ?>
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'user_id','label' => 'شناسه','wire:model' => 'filterId']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'user_id','label' => 'شناسه','wire:model' => 'filterId']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'user_id','label' => 'شناسه کاربر','wire:model' => 'filterUserId']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'user_id','label' => 'شناسه کاربر','wire:model' => 'filterUserId']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'subject_type','label' => 'موضوع','wire:model' => 'filterSubjectType']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'subject_type','label' => 'موضوع','wire:model' => 'filterSubjectType']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'subject_id','label' => 'شناسه موضوع','wire:model' => 'filterSubjectId']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'subject_id','label' => 'شناسه موضوع','wire:model' => 'filterSubjectId']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'description','label' => 'عملیات','wire:model' => 'filterDescription']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'description','label' => 'عملیات','wire:model' => 'filterDescription']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
					<?php elseif($tab == 'wallet'): ?>
						<div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'filterUserMobile','label' => 'شماره کاربر','wire:model' => 'filterUserMobile']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'filterUserMobile','label' => 'شماره کاربر','wire:model' => 'filterUserMobile']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
					<?php endif; ?>
                    </div>
					<div class="row">
						<div class="col-12">
						<?php if(Auth::user()->hasRole('super_admin')): ?>
                           	<button wire:click="$set('tab','logs')" class="btn btn-primary">لاگ ها</button>
							<button wire:click="$set('tab','copies')" class="btn btn-primary">گزارش کپی ها</button>
							<button wire:click="$set('tab','hash')" class="btn btn-primary">هش ها</button>
							<button wire:click="$set('tab','wallet')" class="btn btn-primary">کیف پول</button>
						<?php endif; ?>
                        </div>
					</div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
				<?php if($tab == 'logs' || !isset($tab)): ?>
                    <?php echo $__env->make('admin.components.advanced-table', ['searchAble' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>شناسه</th>
                                <th>شناسه کاربر</th>
                                <th>موضوع</th>
                                <th>عملیات</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->id); ?></td>
                                    <td>
                                        <?php if(is_null($item->causer_id)): ?>
                                            سیستم
                                        <?php else: ?>
                                            <a href="<?php echo e(route('admin.users.store',['action'=>'edit', 'id' => $item->causer_id])); ?>"/>
                                            <?php echo e($item->causer_id); ?>

                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->subject_type); ?> (<?php echo e($item->subject_id); ?>)</td>
                                    <td><?php echo e($item->description); ?></td>
                                    <td><?php echo e(jalaliDate($item->created_at, '%d %B %Y')); ?></td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['href' => ''.e(route('admin.logs.show', $item->id)).'']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.logs.show', $item->id)).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					<?php if(!empty($logs)): ?>
                   	 <?php echo e($logs->links('admin.components.pagination')); ?>

					<?php endif; ?>
				<?php elseif($tab == 'copies' && Auth::user()->hasRole('super_admin')): ?>
						<?php echo $__env->make('admin.components.advanced-table', ['searchAble' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
					 <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>شناسه</th>
								<th>محصول</th>
                                <th>توسط</th>
								<th>لایسنس</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            <?php $__empty_1 = true; $__currentLoopData = $copies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->id); ?></td>
									<td><a href="<?php echo e(route('admin.products.store',['edit',$item->product->id])); ?>"><?php echo e($item->product->title); ?></a></td>
                                    <td><a href="<?php echo e(route('admin.users.store',['edit',$item->user->id])); ?>"><?php echo e($item->user->family ? ($item->user->name.' '.$item->user->family) : $item->user->username); ?></a></td>
									<td><?php echo e($item->text); ?></td>
                                    <td><?php echo e(jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					<?php echo e($copies->links('admin.components.pagination')); ?>

				<?php elseif($tab == 'hash' && Auth::user()->hasRole('super_admin')): ?>	
					<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
								<th>کاربر</th>
                                <th>وضعیت</th>
								<th>پسورد وارد شده</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->order_id ?? 'صفحه محصول'); ?></td>
									<td><?php echo e($item->user->family ? ($item->user->name.' '.$item->user->family) : $item->user->username); ?></td>
									<td><?php echo e($item->status); ?></td>
									<td><?php echo e($item->value); ?></td>
                                    <td><?php echo e(jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
						<?php echo e($requests->links('admin.components.pagination')); ?>

				<?php elseif($tab == 'wallet' && Auth::user()->hasRole('super_admin')): ?>		
					<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>درگاه</th>
								<th>مبلغ(تومان)</th>
								<th>کد درگاه</th>
								<th>کاربر</th>
								<th>نام کاربری</th>
								<th>موبایل کاربر</th>
                                <th>تاریخ</th>
								 <th>توضیحات</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            <?php $__empty_1 = true; $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->payment_gateway); ?></td>
									<td><?php echo e(number_format($item->amount)); ?></td>
									<td><?php echo e($item->payment_ref); ?></td>
									<td><?php echo e($item->user->name.' '.$item->user->family); ?></td>
									<td><?php echo e($item->user->username); ?></td>
									<td><?php echo e($item->user->mobile); ?></td>
                                    <td><?php echo e(jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')); ?></td>
									<td><?php echo e($item->status_message); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
						<?php echo e($wallets->links('admin.components.pagination')); ?>

				<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/logs/index-log.blade.php ENDPATH**/ ?>