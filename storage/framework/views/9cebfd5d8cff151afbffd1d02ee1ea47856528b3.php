<?php if($paginator->hasPages()): ?>
    <ul class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
           
        <?php else: ?>
            <li>
                <button type="button" class="btn btn-sm btn-primary bordered  px-5" style="font-size:12px" wire:click="previousPage">
                    قبلی
                </button>
            </li>
        <?php endif; ?>
        

        
        <?php if($paginator->hasMorePages()): ?>
            <li>
                <button type="button" class="btn btn-sm btn-primary bordered px-5" style="font-size:12px" wire:click="nextPage">
                    بعدی
                </button>
            </li>
        <?php else: ?>
            
        <?php endif; ?>
    </ul>
<?php endif; ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/components/pagination2.blade.php ENDPATH**/ ?>