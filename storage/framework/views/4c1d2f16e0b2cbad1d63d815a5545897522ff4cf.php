<section class="bg-white p-4 xs:p-8 rounded-2xl overflow-hidden relative">
    <h1 class="text-lg font-semibold text-center mb-8">سوالات متداول</h1>
    <img class="absolute inset-0 right-auto max-w-full w-80 z-0" src="<?php echo e(asset('site/svg/wave.svg')); ?>" alt="">
    <img class="absolute -bottom-32 -right-10 max-w-64 lg:max-w-xs z-0" src="<?php echo e(asset('site/svg/circle-in-circle-5.svg')); ?>" alt="">
    <div class="grid gap-12 relative">
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="accordion accordion--group">
                <div class="accordion__group-header">
                    <p class="accordion__group-header-title"><?php echo e($category); ?></p>
                </div>
                <div class="accordion-list" style="width: 100%">
                    <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item" x-data="{ open: false }">
                            <h2 class="accordion-header" @click="open = !open">
                                <button type="button" class="accordion-button" x-bind:class="{ 'collapsed': !open }">
                                    <?php echo e($question['question']); ?>

                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" x-bind:class="{ 'show': open }">
                                <div class="accordion-body"><?php echo $question['answer']; ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/settings/faqs-component.blade.php ENDPATH**/ ?>