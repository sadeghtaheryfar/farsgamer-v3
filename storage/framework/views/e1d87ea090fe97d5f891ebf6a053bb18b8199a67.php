<?php if (! ($breadcrumbs->isEmpty())): ?>
    <ol class="breadcrumb mb-4">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!is_null($breadcrumb->url) && !$loop->last): ?>
                <li class="breadcrumb__link"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                <span>/</span>
            <?php else: ?>
                <li class="breadcrumb__link"><?php echo e($breadcrumb->title); ?></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
<?php endif; ?>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/components/breadcrumb.blade.php ENDPATH**/ ?>