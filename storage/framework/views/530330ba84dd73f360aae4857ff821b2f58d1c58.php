<section class="main-style-page">
    <div class="header-page-rules flex-box flex-justify-space">
        <div class="item-header-page-rules">
            <img class="img-item-page-rules" src="<?php echo e(asset("site-v2/img/img1-ruls.svg")); ?>" alt="">
            <img class="img-mo-item-page-rules" src="<?php echo e(asset("site-v2/img/img1-ruls-mobile.svg")); ?>" alt="">
        </div>

        <div class="detalit-page-rules">
            <div class="header-item-page-rules">
                <span>قوانین</span>

                <span class="color-blue">فارس گیمر</span>
            </div>

            <div class="message-item-page-rules">
                <span><?php echo $description; ?></span>
            </div>
        </div>
    </div>

    <div class="message-page-rules">
        <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-page-rules flex-box flex-justify-space flex-right">
                <div class="counter-item-rules flex-box">
                    <!-- اعداد این قسمت خودشون وارد میشن و نیاز به بک اند نداره -->
                    <span class="counter-rules-item-number"></span>
                </div>

                <div class="message-item-rules flex-box">
                    <span><?php echo $rule->value; ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="my-2">
            <?php echo $physicalDescription; ?>

        </div>

        <?php $__currentLoopData = $physicalRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-page-rules flex-box flex-justify-space flex-right">
                <div class="counter-item-rules flex-box">
                    <!-- اعداد این قسمت خودشون وارد میشن و نیاز به بک اند نداره -->
                    <span class="counter-rules-item-number"></span>
                </div>

                <div class="message-item-rules flex-box">
                    <span><?php echo $rule->value; ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/settings/rules-component.blade.php ENDPATH**/ ?>