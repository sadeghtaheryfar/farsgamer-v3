<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('ZuXMAHE')) {
    $componentId = $_instance->getRenderedChildComponentId('ZuXMAHE');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZuXMAHE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZuXMAHE');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('ZuXMAHE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main id="main" class="main--dashboard">
    <?php echo $__env->yieldContent('content'); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/layouts/dashboard.blade.php ENDPATH**/ ?>