<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('ByjOmWo')) {
    $componentId = $_instance->getRenderedChildComponentId('ByjOmWo');
    $componentTag = $_instance->getRenderedChildComponentTagName('ByjOmWo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ByjOmWo');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('ByjOmWo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('nBC3OdN')) {
    $componentId = $_instance->getRenderedChildComponentId('nBC3OdN');
    $componentTag = $_instance->getRenderedChildComponentTagName('nBC3OdN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nBC3OdN');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('nBC3OdN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
</body>
</html><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/layouts/site.blade.php ENDPATH**/ ?>