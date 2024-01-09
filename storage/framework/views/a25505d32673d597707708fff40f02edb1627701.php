<sidebar id="sidebar">
    <div id="sidebar__content">
        <a id="sidebar__logo" class="hidden px-6 pr-8 h-16 items-center lg:h-20 lg:absolute lg:-top-20 lg:right-0 lg:left-0 lg:bg-white" href="/">
            <div class="flex">
                <img class="lg:w-34" src="<?php echo e(asset('site/images/logo.png')); ?>" alt="لوگو">
            </div>
        </a>
        <div id="sidebar__scrollable-content" class="overflow-y-auto max-h-full px-4 pb-6">








            <nav class="py-4">
                <ul>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('home'),'icon' => 'icon-home','href' => ''.e(route('home')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('home')),'icon' => 'icon-home','href' => ''.e(route('home')).'']); ?>
                        خانه
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs(['products', 'products.show']),'icon' => 'icon-controler','href' => ''.e(route('products')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['products', 'products.show'])),'icon' => 'icon-controler','href' => ''.e(route('products')).'']); ?>
                        فروشگاه
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('faqs'),'icon' => 'icon-question-answer','href' => ''.e(route('faqs')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('faqs')),'icon' => 'icon-question-answer','href' => ''.e(route('faqs')).'']); ?>
                        سوالات متداول
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('rules'),'icon' => 'icon-law','href' => ''.e(route('rules')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('rules')),'icon' => 'icon-law','href' => ''.e(route('rules')).'']); ?>
                        قوانین
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('contact-us'),'icon' => 'icon-mail','href' => ''.e(route('contact-us')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('contact-us')),'icon' => 'icon-mail','href' => ''.e(route('contact-us')).'']); ?>
                        ارتباط با ما
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('why-us'),'icon' => 'icon-fortnite','href' => ''.e(route('why-us')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('why-us')),'icon' => 'icon-fortnite','href' => ''.e(route('why-us')).'']); ?>
                        چرا فارس گیمر
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs(['articles', 'articles.show']),'icon' => 'icon-articles','href' => ''.e(route('articles')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['articles', 'articles.show'])),'icon' => 'icon-articles','href' => ''.e(route('articles')).'']); ?>
                        مقالات
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </ul>
            </nav>



























        </div>
    </div>
</sidebar><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/layouts/sidebar.blade.php ENDPATH**/ ?>