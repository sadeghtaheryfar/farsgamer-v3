<?php if($paginator->hasPages()): ?>
    <nav aria-label="Pagination Navigation">
        <ul class="pagination justify-content-center mt-2">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item previous disabled">
                    <button class="page-link"><i class="bx bx-chevron-right"></i></button>
                </li>
            <?php else: ?>
                <li class="page-item previous">
                    <button class="page-link" wire:click="previousPage"><i class="bx bx-chevron-right"></i></button>
                </li>
            <?php endif; ?>
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(is_string($element)): ?>
                    <li class="page-item disabled">
                        <button class="page-link"><?php echo e($element); ?></button>
                    </li>
                <?php endif; ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active disabled">
                                <button class="page-link" wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></button>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <button class="page-link" wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></button>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item next">
                    <button class="page-link" wire:click="nextPage"><i class="bx bx-chevron-left"></i></button>
                </li>
            <?php else: ?>
                <li class="page-item next disabled">
                    <button class="page-link"><i class="bx bx-chevron-left"></i></button>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/admin/components/pagination.blade.php ENDPATH**/ ?>