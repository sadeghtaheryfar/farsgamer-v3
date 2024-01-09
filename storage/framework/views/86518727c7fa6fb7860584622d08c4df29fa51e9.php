<?php if($paginator->hasPages()): ?>
    <div class="text-center">
        <button class="btn btn-primary" type="button" wire:click="loadMore('<?php echo e($paginator->getPageName()); ?>')">نمایش بیشتر</button>
    </div>
<?php endif; ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/components/load-more.blade.php ENDPATH**/ ?>