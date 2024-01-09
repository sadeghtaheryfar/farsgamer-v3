<div wire:init="$set('readyToLoad', true)">

    <?php echo e(Breadcrumbs::view('site.components.breadcrumb', 'products.show', $product)); ?>


    <section class="overflow-hidden rounded-2xl bg-white pb-4 lg:pb-12">
        <div class="relative overflow-hidden">
            <img class="w-full" src="<?php echo e(asset($product->category->image ?? '')); ?>" alt="">
            <div class="single-product-poster-overlayer absolute inset-0"></div>
        </div>
        <div class="px-4 max-w-3xl mt-8 mx-auto sm:mt-4 md:mt-0 lg:-mt-16 lg:items-center xl:-mt-20 2xl:-mt-24 2xl:max-w-4xl">
            <div class="grid gap-8 lg:gap-0 xl:flex xl:gap-8" wire:ignore>
			
                <div>
                    <?php echo $__env->make('site.components.products.image-gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
				
                <?php echo $__env->make('site.components.products.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
			
            <?php echo $__env->make('site.components.products.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
		
    </section>

    <?php echo $__env->make('site.homes.best-sellers',
        ['products' => $relatedProducts,
         'title' => 'محصولات مرتبط',
          'route' => route('products'),
          'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('site.components.products.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="grid gap-4 mt-4 2xs:grid-cols-2 md:grid-cols-4">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>


	<div>

	<?php if($needUpload): ?>
	
 
	<div class="popup" data-popup="popup-1" wire:ignore.self>
    <div class="popup-inner">
        <h1 class="py-2">
		<strong>قوانین استفاده </strong>
		</h1>
		
       <div class="popup-scroll">
	   	<ul class="check-list">
		   <?php $__currentLoopData = $law; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class"my-2 d-flex">
					<span>-  </span>  <?php echo $item->value; ?>

				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php echo e($law->links('site.components.pagination2')); ?>

		</ul>
			
		</div>
		<?php if($page == $law->lastPage() ): ?>
		<div class="form-check d-flex py-4">
			<input class="form-check" type="checkbox" value="1" wire:model.defer="lawOK" id="flexCheckDefault">
			<label class="form-check-label" style="font-size:12px;margin-top: 3px;
    margin-right: 5px;" for="flexCheckDefault">
				قوانین را خوانده ام و قبول می کنم
			</label>
		</div>
		<?php endif; ?>
        <p><a class="btn btn-sm btn-danger" data-popup-close="popup-1" href="#">بستن</a></p>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
	<?php endif; ?>

	</div>

</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/products/product-component.blade.php ENDPATH**/ ?>