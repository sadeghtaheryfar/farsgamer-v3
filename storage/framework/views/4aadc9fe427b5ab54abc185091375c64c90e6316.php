<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header2', [])->html();
} elseif ($_instance->childHasBeenRendered('0HJQ5Xf')) {
    $componentId = $_instance->getRenderedChildComponentId('0HJQ5Xf');
    $componentTag = $_instance->getRenderedChildComponentTagName('0HJQ5Xf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0HJQ5Xf');
} else {
    $response = \Livewire\Livewire::mount('site.header2', []);
    $html = $response->html();
    $_instance->logRenderedChild('0HJQ5Xf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar2', [])->html();
} elseif ($_instance->childHasBeenRendered('yDW7G06')) {
    $componentId = $_instance->getRenderedChildComponentId('yDW7G06');
    $componentTag = $_instance->getRenderedChildComponentTagName('yDW7G06');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yDW7G06');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar2', []);
    $html = $response->html();
    $_instance->logRenderedChild('yDW7G06', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.top-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main id="main2">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo e(TawkTo::widgetCode('5f2946912da87279037e4523')); ?>

</body>
</html><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/layouts/site2.blade.php ENDPATH**/ ?>