<?php if($paginator->hasPages()): ?>
    <div class="text-center">
        <button class="btn btn-primary" type="button" wire:click="loadMore('<?php echo e($paginator->getPageName()); ?>')">نمایش بیشتر</button>
    </div>
<?php endif; ?><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/load-more.blade.php ENDPATH**/ ?>