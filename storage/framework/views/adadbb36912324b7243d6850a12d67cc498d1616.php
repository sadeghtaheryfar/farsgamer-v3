<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('7XP5p6t')) {
    $componentId = $_instance->getRenderedChildComponentId('7XP5p6t');
    $componentTag = $_instance->getRenderedChildComponentTagName('7XP5p6t');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7XP5p6t');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('7XP5p6t', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('w0vpZXb')) {
    $componentId = $_instance->getRenderedChildComponentId('w0vpZXb');
    $componentTag = $_instance->getRenderedChildComponentTagName('w0vpZXb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('w0vpZXb');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('w0vpZXb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.top-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main id="main">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script type="text/javascript">
  !function(){var i="0d89pV",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<script src="<?php echo e(asset('site-v2/js/script.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/layouts/site.blade.php ENDPATH**/ ?>