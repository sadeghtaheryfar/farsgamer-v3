<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('XotmlFH')) {
    $componentId = $_instance->getRenderedChildComponentId('XotmlFH');
    $componentTag = $_instance->getRenderedChildComponentTagName('XotmlFH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XotmlFH');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('XotmlFH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar3', [])->html();
} elseif ($_instance->childHasBeenRendered('sIxfCML')) {
    $componentId = $_instance->getRenderedChildComponentId('sIxfCML');
    $componentTag = $_instance->getRenderedChildComponentTagName('sIxfCML');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sIxfCML');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar3', []);
    $html = $response->html();
    $_instance->logRenderedChild('sIxfCML', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.top-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main id="main">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo e(TawkTo::widgetCode('5f2946912da87279037e4523')); ?>

</body>
</html><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/layouts/site3.blade.php ENDPATH**/ ?>