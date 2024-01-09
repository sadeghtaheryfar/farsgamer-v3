<?php if($paginator->hasPages()): ?>
    <ul class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <li>
                <button class="pagination__btn">
                    <i class="icon-angle-right"></i>
                </button>
            </li>
        <?php else: ?>
            <li>
                <button type="button" class="pagination__btn" wire:click="previousPage">
                    <i class="icon-angle-right"></i>
                </button>
            </li>
        <?php endif; ?>
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(is_string($element)): ?>
                <li>
                    <button type="button" class="pagination__btn"><?php echo e($element); ?></button>
                </li>
            <?php endif; ?>

            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li>
                            <button type="button" class="pagination__btn pagination__btn--active" wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></button>
                        </li>
                    <?php else: ?>
                        <li>
                            <button type="button" class="pagination__btn" wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></button>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li>
                <button type="button" class="pagination__btn" wire:click="nextPage">
                    <i class="icon-angle-left"></i>
                </button>
            </li>
        <?php else: ?>
            <li>
                <button type="button" class="pagination__btn">
                    <i class="icon-angle-left"></i>
                </button>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/components/pagination.blade.php ENDPATH**/ ?>