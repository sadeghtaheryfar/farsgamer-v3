<section class="bg-white p-4 xs:p-6 rounded-2xl text-gray-700 font-light leading-7">
    <div class="text-center">
        <h1 class="text-lg bg-light-green p-2 rounded-xl inline-block font-medium">* استفاده از سایت به منزله پذیرش این توافق نامه است *</h1>
    </div>

    <?php echo $description; ?>


    <ul class="bg-gray-50 mt-8 divide-y divide-gray-200 rounded-2xl text-black">
        <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="px-2 py-6 flex gap-4">
                <div class="bg-light-green min-w-8 h-8 rounded-lg leading-none flex items-center justify-center"><?php echo e($loop->iteration); ?></div>
                <div><?php echo $rule->value; ?></div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php echo $physicalDescription; ?>


    <ul class="bg-gray-50 mt-8 divide-y divide-gray-200 rounded-2xl text-black">
        <?php $__currentLoopData = $physicalRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="px-2 py-6 flex gap-4">
                <div class="bg-light-green min-w-8 h-8 rounded-lg leading-none flex items-center justify-center"><?php echo e($loop->iteration); ?></div>
                <div><?php echo $rule->value; ?></div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</section>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/settings/rules-component.blade.php ENDPATH**/ ?>