<section class="grid gap-4 mt-4 md:grid-cols-3">
    <?php $__currentLoopData = $tripleItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($item['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($item['image'])); ?>" alt=""></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/triple-item.blade.php ENDPATH**/ ?>