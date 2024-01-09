<section class="bg-white p-4 lg:p-6 rounded-2xl">
    <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 2md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="post-box" href="<?php echo e(route('articles.show', $article->slug)); ?>">
                <img class="post-box__image" src="<?php echo e(asset($article->image)); ?>" alt="">
                <div class="post-box__content">
                    <h3 class="post-box__title"><?php echo e($article->title); ?></h3>
					<h5 class="post-category"><?php echo e(!empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی'); ?></h5>
                    <div class="post-box__btn">مشاهده</div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($articles->links('site.components.pagination')); ?>

</section>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/articles/articles-component.blade.php ENDPATH**/ ?>