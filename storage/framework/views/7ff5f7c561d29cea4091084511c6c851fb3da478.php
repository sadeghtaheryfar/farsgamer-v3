<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'سفارش','mode' => $mode,'createAble' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'createAble' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => 'سفارش','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
                <div class="form-group col-6">
                    <div class="row">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'اطلاعات کاربر']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'اطلاعات کاربر']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <div class="form-group col-12">
                            <p>نام : <?php echo e($model->name ?? ''); ?></p>
                        </div>
                        <div class="form-group col-12">
                            <p>نام خانوادگی : <?php echo e($model->family ?? ''); ?></p>
                        </div>
                        <div class="form-group col-12">
                            <p>موبایل : <?php echo e($model->mobile ?? ''); ?></p>
                        </div>
                        <div class="form-group col-12">
                            <p>ایمیل : <?php echo e($model->email ?? ''); ?></p>
                        </div>
                        <div class="form-group col-12">
                            <p>توضیحات : <?php echo e($model->description ?? ''); ?></p>
                        </div>
                    </div>
                </div>
                <div class="form-group col-6">
                    <div class="row">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'اطلاعات پرداخت']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'اطلاعات پرداخت']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <div class="form-group col-12">
                            <p>مجموع : <?php echo e(number_format($model->price ?? 0)); ?> تومان</p>
                        </div>
                        <div class="form-group col-12">
                            <p>تخفیف : <?php echo e(number_format($model->discount ?? 0)); ?> تومان</p>
                        </div>
                        <div class="form-group col-12">
                            <p>کیف پول : <?php echo e(number_format($model->wallet_pay ?? 0)); ?> تومان</p>
                        </div>
                        <div class="form-group col-12">
                            <p>پرداخت شده : <?php echo e(number_format($model->total_price ?? 0)); ?> تومان</p>
                        </div>
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'type','label' => 'وضعیت سفارش','options' => [
            \App\Models\Order::STATUS_HOLD => 'در انتظار بررسی توسط پشتیبانی',
            \App\Models\Order::STATUS_SPEED_PLUS => 'اسپید پلاس',
            \App\Models\Order::STATUS_DELAY => 'تاخیر در انجام',
            \App\Models\Order::STATUS_PROCESSING => 'در حال انجام توسط تیم ثبت سفارشات',
            \App\Models\Order::STATUS_STORE => 'درحال آماده سازی در انبار',
            \App\Models\Order::STATUS_FAILED => 'در حال بررسی توسط مشتری',
            \App\Models\Order::STATUS_POST => 'ارسال توسط پست',
            \App\Models\Order::STATUS_CANCELLED => 'لغو شده - پرداخت نشده',
            \App\Models\Order::STATUS_REFUNDED => 'مسترد شده',
            \App\Models\Order::STATUS_COMPLETED => 'تکمیل شده',
        ],'required' => 'true','wire:model.defer' => 'orderStatus']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'type','label' => 'وضعیت سفارش','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
            \App\Models\Order::STATUS_HOLD => 'در انتظار بررسی توسط پشتیبانی',
            \App\Models\Order::STATUS_SPEED_PLUS => 'اسپید پلاس',
            \App\Models\Order::STATUS_DELAY => 'تاخیر در انجام',
            \App\Models\Order::STATUS_PROCESSING => 'در حال انجام توسط تیم ثبت سفارشات',
            \App\Models\Order::STATUS_STORE => 'درحال آماده سازی در انبار',
            \App\Models\Order::STATUS_FAILED => 'در حال بررسی توسط مشتری',
            \App\Models\Order::STATUS_POST => 'ارسال توسط پست',
            \App\Models\Order::STATUS_CANCELLED => 'لغو شده - پرداخت نشده',
            \App\Models\Order::STATUS_REFUNDED => 'مسترد شده',
            \App\Models\Order::STATUS_COMPLETED => 'تکمیل شده',
        ]),'required' => 'true','wire:model.defer' => 'orderStatus']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'محصولات']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'محصولات']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                <?php $__currentLoopData = $model->details ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group col-3 p-3 bg-secondary">
                        #<?php echo e(iteration($loop, $perPage)); ?>

                    </div>
                    <div class="form-group col-3 p-3 bg-secondary">
                        نام : <?php echo e($item->product->title); ?>

                    </div>
                    <div class="form-group col-3 p-3 bg-secondary">
                        تعداد : <?php echo e($item->quantity); ?>

                    </div>
                    <div class="form-group col-3 p-3 bg-secondary">
                        مبلغ :<?php echo e(number_format($item->price)); ?> تومان
                    </div>

                    <div class="form-group col-6">
                        <?php if($item->licenses != ''): ?>
                            <div class="row">
                                <div class="form-group col-12 d-flex justify-content-between">
                                    <div>فرم</div>
                                </div>
                                <?php $__currentLoopData = $item->form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group col-4">
                                        <td><?php echo $form['label']; ?></td>
                                    </div>
                                    <div class="form-group col-4">
                                        <td><?php echo e($form['value']); ?></td>
                                    </div>
                                    <div class="form-group col-4">
                                        <td><?php echo e(number_format($form['price'] ?? 0)); ?> تومان</td>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group col-6">
                        <div class="row">
                            <?php if($item->product->type == \App\Models\Product::TYPE_INSTANT_DELIVERY): ?>
                                <div class="form-group col-12 d-flex justify-content-between">
                                    <div>لایسنسیس</div>
                                    <?php if($item->quantity != sizeof($item->licenses)): ?>
                                        <button class="btn btn-success" wire:click="completeLicenses(<?php echo e($item->id); ?>)">کامل کردن لاینسیس ها</button>
                                    <?php endif; ?>
                                </div>
                                <?php $__currentLoopData = $item->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group col-12">
                                        <?php echo e($license); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'یادداشت ها']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'یادداشت ها']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>یادداشت</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $notes ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                <td><?php echo e($item->note); ?></td>
                                <td><?php echo e($item->is_user_note ? 'عمومی' : 'خصوصی'); ?></td>
                                <td>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.delete-table','data' => ['wire:click' => 'deleteNote('.e($key).')']]); ?>
<?php $component->withName('admin.delete-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'deleteNote('.e($key).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'note','label' => 'یادداشت','rows' => '5','wire:model.defer' => 'sendNote']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note','label' => 'یادداشت','rows' => '5','wire:model.defer' => 'sendNote']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'note_type','label' => 'نوع یادداشت','options' => ['0'=>'خصوصی', '1'=>'عمومی'],'wire:model.defer' => 'noteType']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note_type','label' => 'نوع یادداشت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['0'=>'خصوصی', '1'=>'عمومی']),'wire:model.defer' => 'noteType']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <div class="form-group col-12">
                    <button class="btn btn-success" wire:click="sendNote">ثبت</button>
                </div>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'پیامک ها']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'پیامک ها']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>پیامک</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $sms ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                <td><?php echo e($item->message); ?></td>
                                <td><?php echo e($item->status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        <?php endif; ?>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'sms','label' => 'پیامک','rows' => '5','wire:model.defer' => 'sendSms']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sms','label' => 'پیامک','rows' => '5','wire:model.defer' => 'sendSms']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <div class="form-group col-12">
                    <button class="btn btn-success" wire:click="sendSms">ثبت</button>
                </div>

             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

            <div class="card">
                <div class="card-body">

                    <div class="form-group col-12 d-flex justify-content-between">
                        <?php $__currentLoopData = \App\Models\Order::getOrdersStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($status == $key): ?>
                                <button type="button" class="btn btn-link disabled" wire:click="$set('status', '<?php echo e($key); ?>')"><?php echo e($item); ?> (<?php echo e($statusCount[$key]); ?>)</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-link" wire:click="$set('status', '<?php echo e($key); ?>')"><?php echo e($item); ?> (<?php echo e($statusCount[$key]); ?>)</button>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php echo $__env->make('admin.components.advanced-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
                                <th>وضعیت</th>
                                <th>مبلغ</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->tracking_code); ?></td>
                                    <td><?php echo e($item->status_label); ?></td>
                                    <td><?php echo e(number_format($item->price)); ?> تومان</td>
                                    <td><?php echo e(jalaliDate($item->created_at)); ?></td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['wire:click' => 'edit('.e($item->id).')']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'edit('.e($item->id).')']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="6">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($orders->links('admin.components.pagination')); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/admin/orders/order-component.blade.php ENDPATH**/ ?>