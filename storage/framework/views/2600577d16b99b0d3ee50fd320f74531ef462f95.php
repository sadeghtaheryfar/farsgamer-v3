<?php $__env->startSection('styles'); ?>
    <style>
        img {
            width: 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>
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

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>مسبب : <?php echo e($log->causer_id ?? 'سیستم'); ?></p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>موضوع : <?php echo e($log->subject_type); ?></p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>عملیات : <?php echo e($log->description); ?></p>
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

                        <?php $__currentLoopData = $log->changes['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2">
                                <h4><?php echo e($key); ?></h4>
                            </div>
                            <div class="col-md-5">
                                <?php if(is_array($item)): ?>
                                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $innerKey => $innerItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($innerKey); ?> : </span>
                                        <span><?php echo $innerItem; ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php echo $item; ?>

                                <?php endif; ?>
                            </div>
                            <div class="col-md-5">
                                <?php if(isset($log->changes['old'])): ?>
                                    <?php echo $log->changes['old'][$key]; ?>

                                <?php endif; ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/logs/show-log.blade.php ENDPATH**/ ?>