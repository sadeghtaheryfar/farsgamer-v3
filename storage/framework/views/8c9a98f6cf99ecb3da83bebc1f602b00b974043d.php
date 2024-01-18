<sidebar id="sidebar" > 
    <div id="sidebar__content">
       
        <div id="sidebar__scrollable-content" class="overflow-y-auto max-h-full px-4 pb-6">


            <form class="flex mt-4 lg:hidden relative w-full">
                <input id="search-two" class="text-field h-12 pr-10 pl-2 text-sm w-full" type="text" placeholder="جستجو در محصولات فارس گیمر"
                       wire:keydown.enter="updateSearch()" wire:model.lazy="search">
                <label class="absolute h-full top-0 right-2 bottom-0 flex items-center justify-center mb-0 cursor-text" for="search-two" wire:click="updateSearch()">
                    <i class="icon-search w-8 flex items-center justify-center text-gray2-700"></i>
                </label>
            </form>
            <nav class="py-4">
                <ul style="margin-right: -4px;">
					<div>
					<li>
						<a class="nav-menu-item">
							<i class="nav-menu-item__icon icon-controler"></i>
							<span class="nav-menu-item__title store-lable">فروشگاه</span>
							<i class="fas fa-chevron-left" style="margin-right: 70px;"></i>
						</a>
						<small class="menu_proucts">محصولات</small>
					</li>
						<div style="position: unset;" class="menu r_menu r_menu_height">
							<div class="container">
								<div class="row">
									<div class="col-lg-5 col-sm-12 col-12 bg-white px-0">
										<div class="base-category col-12 py-2">
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="category">
													<div class="d-flex align-items-center justify-content-start" data-id="<?php echo e($item['id']); ?>">
														<div class="px-2"><img src="<?php echo e(asset($item['icon'] )); ?>" alt=""></div>
														<a data-id="<?php echo e($item['id']); ?>" href="" class="d-none d-lg-block d-xl-block">
															<?php echo e(@$item['window'] ? $item['window']['slug'] : $item['title']); ?>

														</a>
														<a data-id="<?php echo e($item['id']); ?>" class="d-block d-lg-none d-xl-none position-relative" style="z-index: -1;">
															<?php echo e(@$item['window'] ? $item['window']['slug'] : $item['title']); ?>

														</a>
													</div>
													<div class="d-block d-lg-none d-xl-none">
														<div class="sub-categories">
															<div class="sub_category" data-response-id="<?php echo e($item['id']); ?>">
																<ul>
																	<li>
																		<div class="px-2">
																			<a href="<?php echo e(route('index.categories',$item['slug'])); ?>">همه محصولات این دسته</a>
																			<i class="fas fa-chevron-left text-secondary"></i>
																		</div>
																	</li>
																	<?php $__currentLoopData = $item['children_recursive']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li>
																		<div class="px-2">
																			<a href="<?php echo e(route('index.categories',$item2['slug'])); ?>">
																				<?php echo e(@$item2['window'] ? $item2['window']['slug'] : $item2['title']); ?>

																			</a>
																			<i class="fas fa-chevron-left text-secondary"></i>
																		</div>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																</ul>
															</div>
														</div>
													</div>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</div>
									</div>

									<div id="sub-categories" class="col-lg-7 d-none d-lg-block d-xl-block bg-white px-0">
										<div class="sub-categories">
											<?php $__currentLoopData = array_column($categories, 'children_recursive'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="sub_category" id="<?php echo e($item[0]['parent_id']); ?>">
													<ul>
														<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li>
																<div class="px-2">
																	<a href="<?php echo e(route('index.categories',$value['slug'])); ?>">
																		<?php echo e(@$value['window'] ? $value['window']['slug'] : $value['title']); ?>

																	</a>
																</div>
															</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
						<div class="menu hidden_menu">
							<div class="container">
								<div class="row">
									<div class="col-lg-5 col-sm-12 col-12 bg-white px-0">
										<div class="base-category col-12 py-2">
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="category">
												<div class="d-flex align-items-center justify-content-start" data-id="<?php echo e($item['id']); ?>">
													<div data-id="<?php echo e($item['id']); ?>" class="px-2"><img src="<?php echo e(asset($item['icon'] )); ?>"></div>
													<a data-id="<?php echo e($item['id']); ?>" href="<?php echo e(route('index.categories',$item['slug'])); ?>" class="d-none d-lg-block d-xl-block">
														<?php echo e(@$item['window'] ? $item['window']['slug'] : $item['title']); ?>

													</a>
													<a data-id="<?php echo e($item['id']); ?>" href="<?php echo e(route('index.categories',$item['slug'])); ?>" class="d-block d-lg-none d-xl-none position-relative" style="z-index: -1;">
													
														<?php echo e(@$item['window'] ? $item['window']['slug'] : $item['title']); ?>

													</a>
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>

									<div id="sub-categories" class="col-lg-7 d-none d-lg-block d-xl-block bg-white px-0">
										<div class="sub-categories">
										<?php $__currentLoopData = array_column($categories, 'children_recursive'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(!empty($item)): ?>
												<div class="sub_category" id="c<?php echo e($item[0]['parent_id']); ?>">
													<ul>
														<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li>
																<div class="px-2">
																	<a href="<?php echo e(route('index.categories',$value['slug'])); ?>">
																	<?php echo e(@$value['window'] ? $value['window']['slug'] : $value['title']); ?>

																	</a>
																</div>
															</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
												</div>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</div>
									</div>

								</div>
							</div>
						</div>
					<hr class="border-gray-200 mb-4 mt-4" style="margin-right: 8px;">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.sidebar-link','data' => ['active' => request()->routeIs('home'),'icon' => 'icon-home','href' => ''.e(route('home')).'']]); ?>
<?php $component->withName('site.sidebar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('home')),'icon' => 'icon-home','href' => ''.e(route('home')).'']); ?>
                        <span class="store-lable">خانه</span>
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
						<span class="store-lable">پیگیری سفارش</span>
                          
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
						<span class="store-lable">سوالات متداول</span>
                         
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
						<span class="store-lable">قوانین</span>
                        
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
					<span class="store-lable">ارتباط با ما</span>
                          
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
						<span class="store-lable"> چرا فارس گیمر</span>
                         
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
						<span class="store-lable">   مقالات</span>
                        
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
									<small class="store-lable">سفارش تکمیل شده 24 ساعت اخیر</small>
								<p>
							</li>
							<li>
								<i class="online-orders"></i>
								<p>
									<b><?php echo e($ordersOnlines); ?></b>
									<small class="store-lable">سفارش در حال انجام</small>
								<p>
							</li>
                   
                </ul>
            </div>

        </div>
    </div>
</sidebar><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/layouts/sidebar2.blade.php ENDPATH**/ ?>