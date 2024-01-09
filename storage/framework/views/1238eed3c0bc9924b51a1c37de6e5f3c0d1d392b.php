<div class="relative p-8 mt-8 bg-white rounded-2xl overflow-hidden md:mt-0">
    <div class="container px-0 max-w-5xl">
        <img class="absolute top-0 left-0 max-w-xl opacity-80" src="<?php echo e(asset('site/svg/wave.svg')); ?>">
        <img class="absolute bottom-0 right-0 max-w-64 lg:max-w-xs" src="<?php echo e(asset('site/svg/circle-in-circle-5.svg')); ?>">

        <div class="pt-8 pb-20">
            <h2 class="text-lg font-semibold text-center mb-8">سوالات متداول</h2>
            <ol class="relative grid gap-4 grid-cols-1 xs:grid-cols-2 md:grid-cols-3 p-5">
				<?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<a class="grid gap-9 text-center p-4 pb-11 bg-gray-100 rounded-2xl transition duration-200 hover:bg-gray-200 focus:bg-gray-200" href="<?php echo e(route('faq')); ?>#<?php echo e($category); ?>" title="برای دیدن سوالات کلیک کنید">
							<img class="rounded-2xl w-full height-150" src="<?php echo e(asset($images[$i++])); ?>" alt="<?php echo e($category); ?>">
							<h2 class="font-bold mt-3"><?php echo e($category); ?></h2>
						</a>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
			
    
    
			<ol class="relative grid gap-12 mt-20">
				<?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li id="<?php echo e($category); ?>" class="accordion accordion--group">
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
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ol>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/settings/faqs-component.blade.php ENDPATH**/ ?>