<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto " id="kt_brand">

        <a href="#" class="brand-logo">
            <img alt="Logo" src="<?php echo e(asset('site/images/farsgamer.png')); ?>"/>
        </a>

        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
				<span class="svg-icon svg-icon svg-icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none"
                                                                                                                            fill-rule="evenodd"><polygon
                                    points="0 0 24 0 24 24 0 24"/><path
                                    d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                    fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/><path
                                    d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                    transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/></g></svg>
                </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
				<?php if(request()->routeIs(['cart.checkout','partner.wallet','partner.orders','partner.setting','partner.profile','partner.new.orders','partner.order','partner.store.new.orders','partner.dashboard'])): ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('partner.dashboard')).'','active' => request()->routeIs('partner.dashboard'),'icons' => 'flaticon-home-2']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.dashboard')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('partner.dashboard')),'icons' => 'flaticon-home-2']); ?>داشبورد <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('partner.new.orders')).'','active' => request()->routeIs(['partner.new.orders','partner.store.new.orders']),'icons' => 'fa fa-plus']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.new.orders')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['partner.new.orders','partner.store.new.orders'])),'icons' => 'fa fa-plus']); ?>سفارش جدید
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('partner.orders')).'','active' => request()->routeIs(['partner.orders','partner.order']),'icons' => 'flaticon2-box-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.orders')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['partner.orders','partner.order'])),'icons' => 'flaticon2-box-1']); ?>سفارش های من
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('partner.profile')).'','active' => request()->routeIs('partner.profile'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.profile')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('partner.profile')),'icons' => 'flaticon-settings-1']); ?>پروفایل 
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('partner.wallet')).'','active' => request()->routeIs('partner.wallet'),'icons' => 'flaticon-coins']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.wallet')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('partner.wallet')),'icons' => 'flaticon-coins']); ?>کیف پول 
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('partner.setting')).'','active' => request()->routeIs('partner.setting'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.setting')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('partner.setting')),'icons' => 'flaticon-settings-1']); ?>تنظیمات 
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('dashboard')).'','active' => request()->routeIs('dashboard'),'icons' => 'flaticon2-user-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('dashboard')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard')),'icons' => 'flaticon2-user-1']); ?>پنل کاربری
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php else: ?>
				
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.dashboard')).'','active' => request()->routeIs('admin.dashboard'),'icons' => 'flaticon-home-2']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.dashboard')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.dashboard')),'icons' => 'flaticon-home-2']); ?><?php echo e(auth()->user()->translate('داشبورد')); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<li class="menu-section">
                    <h4 class="menu-text">بخش شخصی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('dashboard')).'','active' => request()->routeIs('dashboard'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('dashboard')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard')),'icons' => 'flaticon-user']); ?>پروفایل <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.my.forms')).'','active' => request()->routeIs('admin.my.forms'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.my.forms')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.my.forms')),'icons' => 'flaticon-user']); ?>گزارش های من (<?php echo e(auth()->user()->forms()->where('status',\App\Models\AdminForm::PENDING)->count()); ?>) <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<li class="menu-section">
                    <h4 class="menu-text">بخش عمومی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_manager')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.products.order')).'','active' => request()->routeIs('admin.products.order'),'icons' => 'flaticon2-box-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.products.order')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.products.order')),'icons' => 'flaticon2-box-1']); ?><?php echo e(auth()->user()->translate('سفارشات شما')); ?>

                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_orders')): ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.multiplesidebar-link','data' => ['title' => ''.e(auth()->user()->translate('سفارشات')).'','active' => request()->routeIs(['admin.orders']),'icons' => 'flaticon2-box-1']]); ?>
<?php $component->withName('admin.multiplesidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('سفارشات')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['admin.orders'])),'icons' => 'flaticon2-box-1']); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.orders')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.orders'),'icons' => 'flaticon2-box-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.orders')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.orders')),'icons' => 'flaticon2-box-1']); ?><?php echo e(auth()->user()->translate('همه')); ?>

                            (<?php echo e(\App\Models\OrderDetail::where('status', \App\Models\Order::STATUS_PROCESSING)->orWhere('status', \App\Models\Order::STATUS_DELAY)->count()); ?>)
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php $__currentLoopData = \App\Models\Category::whereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.orders', ['category' => $item->id])).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.orders'),'icons' => 'flaticon2-box-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.orders', ['category' => $item->id])).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.orders')),'icons' => 'flaticon2-box-1']); ?><?php echo e(auth()->user()->translate($item->title)); ?>

                                (<?php echo e(\App\Models\OrderDetail::whereHas('product', function ($query) use ($item){
            return $query->whereHas('category', function ($query) use ($item){
                return $query->where('parent_id', $item->id);
            });
        })->where(function($query) {
            return $query->where('status', \App\Models\Order::STATUS_PROCESSING)->orWhere('status', \App\Models\Order::STATUS_DELAY);
        })->count()); ?>)
                             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_comments')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.comments')).'','active' => request()->routeIs('admin.comments'),'icons' => 'flaticon-comment']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.comments')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.comments')),'icons' => 'flaticon-comment']); ?>نظرات
                        (<?php echo e(\App\Models\Comment::where('is_confirmed', 0)->count()); ?>)
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_questions')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.questions')).'','active' => request()->routeIs('admin.questions'),'icons' => 'flaticon-chat']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.questions')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.questions')),'icons' => 'flaticon-chat']); ?>پرسش و پاسخ
                        (<?php echo e(\App\Models\Question::where('is_confirmed', 0)->count()); ?>)
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_tickets')): ?>	
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.ticket')).'','active' => request()->routeIs(['admin.ticket','admin.store.ticket']),'icons' => 'fas fa-ticket-alt']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.ticket')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['admin.ticket','admin.store.ticket'])),'icons' => 'fas fa-ticket-alt']); ?>تیکت ها
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<li class="menu-section">
                    <h4 class="menu-text">بخش خصوصی و فنی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_articles')): ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.multiplesidebar-link','data' => ['title' => 'مقالات','active' => request()->routeIs(['admin.articles','admin.articlesCat']),'icons' => 'flaticon-notepad']]); ?>
<?php $component->withName('admin.multiplesidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'مقالات','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['admin.articles','admin.articlesCat'])),'icons' => 'flaticon-notepad']); ?>
					
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.articles')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.articles'),'icons' => 'flaticon-notepad']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.articles')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.articles')),'icons' => 'flaticon-notepad']); ?>مقالات 
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.articlesCat')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.articlesCat'),'icons' => 'flaticon-notepad']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.articlesCat')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.articlesCat')),'icons' => 'flaticon-notepad']); ?>دسته بندی
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.guaranteed')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.guaranteed'),'icons' => 'flaticon-notepad']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.guaranteed')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.guaranteed')),'icons' => 'flaticon-notepad']); ?>سایت های تضمین شده 
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>	
				 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_currencies')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.currencies')).'','active' => request()->routeIs('admin.currencies'),'icons' => 'flaticon-coins']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.currencies')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.currencies')),'icons' => 'flaticon-coins']); ?><?php echo e(auth()->user()->translate('واحد پول')); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.wallet')).'','active' => request()->routeIs('admin.wallet'),'icons' => 'flaticon-coins']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.wallet')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.wallet')),'icons' => 'flaticon-coins']); ?>کیف پول <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_vouchers')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.vouchers')).'','active' => request()->routeIs('admin.vouchers'),'icons' => 'flaticon-price-tag']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.vouchers')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.vouchers')),'icons' => 'flaticon-price-tag']); ?>کدهای تخفیف <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>

				
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_users')): ?>

					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.partners')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.partners'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.partners')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.partners')),'icons' => 'flaticon-user']); ?>همکار ها
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.multiplesidebar-link','data' => ['title' => 'کاربران ('.e(App\Models\User::where('auth_status',App\Models\User::UESR_PENDING)->count()).')','active' => request()->routeIs(['admin.users','admin.roles']),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.multiplesidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'کاربران ('.e(App\Models\User::where('auth_status',App\Models\User::UESR_PENDING)->count()).')','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['admin.users','admin.roles'])),'icons' => 'flaticon-user']); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.users')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.users'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.users')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.users')),'icons' => 'flaticon-user']); ?>  کاربران (<?php echo e(App\Models\User::where('auth_status',App\Models\User::UESR_PENDING)->count()); ?>)
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.roles')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.roles'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.roles')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.roles')),'icons' => 'flaticon-user']); ?>نقش ها
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						
                        <?php if(auth()->user()->hasRole('administrator')): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.transaction')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.transaction'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.transaction')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.transaction')),'icons' => 'flaticon-user']); ?>تراکنش ها
                             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php endif; ?>
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_products')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.products')).'','active' => request()->routeIs('admin.products'),'icons' => 'flaticon2-box-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.products')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.products')),'icons' => 'flaticon2-box-1']); ?><?php echo e(auth()->user()->translate('محصولات وب سایت ')); ?>

                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('depot')): ?>	
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.depot')).'','active' => request()->routeIs('admin.depot'),'icons' => 'fas fa-warehouse']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.depot')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.depot')),'icons' => 'fas fa-warehouse']); ?>انبار
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_lottery')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.lottery')).'','active' => request()->routeIs('admin.lottery'),'icons' => 'flaticon-doc']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.lottery')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.lottery')),'icons' => 'flaticon-doc']); ?>پنل قرعه کشی <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_categories')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.categories')).'','active' => request()->routeIs('admin.categories'),'icons' => 'flaticon-list-3']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.categories')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.categories')),'icons' => 'flaticon-list-3']); ?><?php echo e(auth()->user()->translate('دسته ها')); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<li class="menu-section">
                    <h4 class="menu-text">بخش گزارشات</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports','report_manager')): ?>	
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.multiplesidebar-link','data' => ['title' => 'گزارش کار ها','active' => request()->routeIs(['admin.forms','admin.forms.store','admin.admin.forms', 'admin.admin.forms.store']),'icons' => 'flaticon-list']]); ?>
<?php $component->withName('admin.multiplesidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'گزارش کار ها','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['admin.forms','admin.forms.store','admin.admin.forms', 'admin.admin.forms.store'])),'icons' => 'flaticon-list']); ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports')): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.forms')).'','icons' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.forms')]]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.forms')).'','icons' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.forms'))]); ?>گزارشات
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						<?php endif; ?>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.admin.forms')).'','icons' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.admin.forms')]]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.admin.forms')).'','icons' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.admin.forms'))]); ?>بایگانی ها
											  (<?php echo e(\App\Models\AdminForm::where('status',\App\Models\AdminForm::PENDING)->count()); ?>)
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        
                        
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('license')): ?>	
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.license')).'','active' => request()->routeIs('admin.license'),'icons' => 'flaticon-layer']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.license')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.license')),'icons' => 'flaticon-layer']); ?><?php echo e(auth()->user()->translate('لایسنس ها')); ?>

                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_logs')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.logs')).'','active' => request()->routeIs('admin.logs'),'icons' => 'flaticon-doc']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.logs')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.logs')),'icons' => 'flaticon-doc']); ?>لاگ ها <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_analytics')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.analytics.vouchers')).'','active' => request()->routeIs('admin.analytics.vouchers'),'icons' => 'flaticon-pie-chart-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.analytics.vouchers')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.analytics.vouchers')),'icons' => 'flaticon-pie-chart-1']); ?>آمار کدهای تخفیف
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php if(auth()->user()->hasRole('مدیر محصول')): ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.users')).'','active' => request()->routeIs('admin.users'),'icons' => 'flaticon-user']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.users')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.users')),'icons' => 'flaticon-user']); ?><?php echo e(auth()->user()->translate('کارمندان')); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				<?php endif; ?>
				<li class="menu-section">
                    <h4 class="menu-text">بخش نظیمات عمومی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.myLanguage')).'','active' => request()->routeIs('admin.myLanguage'),'icons' => 'flaticon-map-location']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.myLanguage')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.myLanguage')),'icons' => 'flaticon-map-location']); ?> languages
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_settings')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.teams')).'','active' => request()->routeIs('admin.teams'),'icons' => 'flaticon-user-ok']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.teams')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.teams')),'icons' => 'flaticon-user-ok']); ?>تیم ما <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.windows')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.windows'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.windows')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.windows')),'icons' => 'flaticon-settings-1']); ?>ویترین ها 
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.faqs')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.faqs'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.faqs')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.faqs')),'icons' => 'flaticon-settings-1']); ?>سوالات متداول
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.notifications')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.notifications'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.notifications')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.notifications')),'icons' => 'flaticon-settings-1']); ?>اعلانات
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.languages')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.languages'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.languages')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.languages')),'icons' => 'flaticon-settings-1']); ?>زبان ها
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                	<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_settings')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.multiplesidebar-link','data' => ['title' => 'تنظیمات','active' => request()->routeIs(['admin.settings','admin.homes','admin.faqs', 'admin.rules','admin.windows','admin.languages']),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.multiplesidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'تنظیمات','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs(['admin.settings','admin.homes','admin.faqs', 'admin.rules','admin.windows','admin.languages'])),'icons' => 'flaticon-settings-1']); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.settings')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.settings'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.settings')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.settings')),'icons' => 'flaticon-settings-1']); ?>تنظیمات
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.homes')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.homes'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.homes')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.homes')),'icons' => 'flaticon-settings-1']); ?>صفحه اصلی
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.banner')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.banner'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.banner')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.banner')),'icons' => 'flaticon-settings-1']); ?>بنر ها
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.rules')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.rules'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.rules')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.rules')),'icons' => 'flaticon-settings-1']); ?>قوانین
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.physical')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.physical'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.physical')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.physical')),'icons' => 'flaticon-settings-1']); ?>قوانین محصولات فیزیکی
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.card')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.card'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.card')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.card')),'icons' => 'flaticon-settings-1']); ?>قوانین کارت ها
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.streams')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.streams'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.streams')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.streams')),'icons' => 'flaticon-settings-1']); ?>استریمرها
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('admin.sms')).'','icon' => 'menu-bullet menu-bullet-dot','active' => request()->routeIs('admin.sms'),'icons' => 'flaticon-settings-1']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.sms')).'','icon' => 'menu-bullet menu-bullet-dot','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.sms')),'icons' => 'flaticon-settings-1']); ?>پیامک
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
				<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.sidebar-link','data' => ['href' => ''.e(route('logout')).'','active' => request()->routeIs('logout'),'icons' => 'flaticon-logout']]); ?>
<?php $component->withName('admin.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('logout')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('logout')),'icons' => 'flaticon-logout']); ?>خروج <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            </ul>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/components/sidebar.blade.php ENDPATH**/ ?>