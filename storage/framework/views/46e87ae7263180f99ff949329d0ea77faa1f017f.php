<sidebar id="sidebar">
    <div id="sidebar__content">
        <a id="sidebar__logo"
            class="hidden px-6 pr-8 h-16 items-center lg:h-20 lg:absolute lg:-top-20 lg:right-0 lg:left-0 lg:bg-white"
            href="/">
            <div class="flex">
                <img class="lg:w-34" src="<?php echo e(asset('site/images/logo.png')); ?>" alt="لوگو">
            </div>
        </a>
        <div id="sidebar__scrollable-content" class="overflow-y-auto max-h-full px-4 pb-6">

            <form class="flex mt-4 lg:hidden relative w-full">
                <input id="search-two" class="text-field h-12 pr-10 pl-2 text-sm w-full" type="text"
                    placeholder="جستجو در محصولات فارس گیمر" wire:keydown.enter="updateSearch()"
                    wire:model.lazy="search">
                <label class="absolute h-full top-0 right-2 bottom-0 flex items-center justify-center mb-0 cursor-text"
                    for="search-two" wire:click="updateSearch()">
                    <i class="icon-search w-8 flex items-center justify-center text-gray2-700"></i>
                </label>
            </form>

            <nav class="py-4">
                <ul>
                    <li>
                        <a class="nav-menu-item" href="https://www.farsgamer.com/shop">
                            <i class="nav-menu-item__icon icon-controler"></i>
                            <span class="nav-menu-item__title store-lable">فروشگاه</span>
                            <i class="fas fa-chevron-left" style="margin-right: 70px;"></i>
                        </a>

                    </li>
                    <hr class="border-gray-200 mb-4 mt-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('home'),'icon' => 'icon-home','href' => ''.e(route('home')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('home')),'icon' => 'icon-home','href' => ''.e(route('home')).'']); ?>
                        خانه
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('faqs'),'icon' => 'icon-search','href' => ''.e(route('faqs')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('faqs')),'icon' => 'icon-search','href' => ''.e(route('faqs')).'']); ?>
                        پیگیری سفارش
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('faq'),'icon' => 'icon-question-answer','href' => ''.e(route('faq')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('faq')),'icon' => 'icon-question-answer','href' => ''.e(route('faq')).'']); ?>
                        سوالات متداول
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('rules'),'icon' => 'icon-law','href' => ''.e(route('rules')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('rules')),'icon' => 'icon-law','href' => ''.e(route('rules')).'']); ?>
                        قوانین
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('contact-us'),'icon' => 'icon-mail','href' => ''.e(route('contact-us')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('contact-us')),'icon' => 'icon-mail','href' => ''.e(route('contact-us')).'']); ?>
                        ارتباط با ما
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('why-us'),'icon' => 'icon-fortnite','href' => ''.e(route('why-us')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('why-us')),'icon' => 'icon-fortnite','href' => ''.e(route('why-us')).'']); ?>
                        چرا فارس گیمر
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs(['articles', 'articles.show']),'icon' => 'icon-articles','href' => ''.e(route('articles')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['articles', 'articles.show'])),'icon' => 'icon-articles','href' => ''.e(route('articles')).'']); ?>
                        مقالات
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </ul>
            </nav>

            <hr class="border-gray-200 mb-4">

            <div>

                <ul class="grid gap-2 order-details">

                    <li>
                        <i class="last-orders"></i>
                        <p>
                            <b><?php echo e($ordersLasts); ?></b>
                            <small>سفارش تکمیل شده 24 ساعت اخیر</small>
                        <p>
                    </li>
                    <li>
                        <i class="online-orders"></i>
                        <p>
                            <b><?php echo e($ordersOnlines); ?></b>
                            <small>سفارش در حال انجام</small>
                        <p>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</sidebar>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/layouts/sidebar.blade.php ENDPATH**/ ?>