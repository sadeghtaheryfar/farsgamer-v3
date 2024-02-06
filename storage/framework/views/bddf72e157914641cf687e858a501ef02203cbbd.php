<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header2', [])->html();
} elseif ($_instance->childHasBeenRendered('pqHTw3w')) {
    $componentId = $_instance->getRenderedChildComponentId('pqHTw3w');
    $componentTag = $_instance->getRenderedChildComponentTagName('pqHTw3w');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pqHTw3w');
} else {
    $response = \Livewire\Livewire::mount('site.header2', []);
    $html = $response->html();
    $_instance->logRenderedChild('pqHTw3w', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar2', [])->html();
} elseif ($_instance->childHasBeenRendered('k0iGXUl')) {
    $componentId = $_instance->getRenderedChildComponentId('k0iGXUl');
    $componentTag = $_instance->getRenderedChildComponentTagName('k0iGXUl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('k0iGXUl');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar2', []);
    $html = $response->html();
    $_instance->logRenderedChild('k0iGXUl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <main style="padding: 0px !important;margin:0px !important">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <section class="my-footer-dashboard">
        <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <div id="toast-copy">
        <div id="show-toast-copy" class="flex-box height-max">
            <span>متن با موفقیت کپی شد .</span>

            <div id="time-toast-copy"></div>
        </div>
    </div>

    <script type="text/javascript">
        ! function() {
            var i = "0d89pV",
                a = window,
                d = document;

            function g() {
                var g = d.createElement("script"),
                    s = "https://www.goftino.com/widget/" + i,
                    l = localStorage.getItem("goftino_" + i);
                g.async = !0, g.src = l ? s + "?o=" + l : s;
                d.getElementsByTagName("head")[0].appendChild(g);
            }
            "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !
                1);
        }();
    </script>
    <script src="<?php echo e(asset('site-v2/js/script.js')); ?>"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/layouts/dashboard.blade.php ENDPATH**/ ?>