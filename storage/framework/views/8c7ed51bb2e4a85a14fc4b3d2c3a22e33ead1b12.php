<div class="lg:z-0 lg:grid lg:items-start lg:text-sm">
    <div>
        <h1 class="font-bold text-xl mb-2 sm:text-2xl lg:text-xl"><?php echo e($product->title); ?></h1>
        <div class="flex items-center gap-2 mb-4">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.rating-star','data' => ['rating' => $avg]]); ?>
<?php $component->withName('site.rating-star'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($avg)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <span class="text-sm">(از <?php echo e($commentsCount); ?> کاربر)</span>
        </div>
        <ul class="space-y-2">
            <li>شما با خرید این محصول <?php echo e($product->score); ?> امتیاز دریافت میکنید</li>
            <li><?php echo $product->short_description; ?></li>
        </ul>
    </div>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/products/info.blade.php ENDPATH**/ ?>