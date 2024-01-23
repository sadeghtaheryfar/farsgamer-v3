<section class="main-style-page">
    <div class="header-page-faq">
        <span>دسته بندی ها</span>
    </div>

    <div id="box-category-faq" class="flex-box flex-wrap flex-right">
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-category-faq">
                <a href="<?php echo e(route('faq')); ?>#<?php echo e($category); ?>">
                    <div class="show-item-category-faq">
                        <div class="img-item-category-faq">
                            <img src="<?php echo e(asset($images[$i++])); ?>" alt="<?php echo e($category); ?>">
                        </div>

                        <div class="header-item-category-faq">
                            <span><?php echo e($category); ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="<?php echo e($category); ?>" class="box-acaredon-faq">
            <div class="header-acaredon-box-faq">
                <span><?php echo e($category); ?></span>
            </div>

			<?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="box-acaredon-faq">
                <div class="toggle-box-acaredon-faq width-max">
                    <div class="box-header-acaredon-faq width-max flex-box flex-justify-space">
                        <div class="header-acaredon-faq">
                            <span><?php echo e($question['question']); ?></span>
                        </div>

                        <div>
                            <div class="box-icon-acaredon-faq">
                                <img class="icon-open-faq-massage" src="<?php echo e(asset("site-v2/img/arrow-square-up.svg")); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-acaredon-faq-massage hide-acardeon">
                    <div class="box-bottom-faq-massage">
                        <div class="box-massage-faq-massage">
                            <?php echo $question['answer']; ?>

                        </div>
                    </div>
                </div>
            </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>


<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/settings/faqs-component.blade.php ENDPATH**/ ?>