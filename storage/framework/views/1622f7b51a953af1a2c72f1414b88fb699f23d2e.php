<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('k3pvE9L')) {
    $componentId = $_instance->getRenderedChildComponentId('k3pvE9L');
    $componentTag = $_instance->getRenderedChildComponentTagName('k3pvE9L');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('k3pvE9L');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('k3pvE9L', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('h6lCdBd')) {
    $componentId = $_instance->getRenderedChildComponentId('h6lCdBd');
    $componentTag = $_instance->getRenderedChildComponentTagName('h6lCdBd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('h6lCdBd');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('h6lCdBd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.top-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main style="overflow: unset">
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('site-v2/js/script.js')); ?>"></script>
<?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/layouts/cart.blade.php ENDPATH**/ ?>