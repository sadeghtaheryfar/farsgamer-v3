<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('zYBWLV0')) {
    $componentId = $_instance->getRenderedChildComponentId('zYBWLV0');
    $componentTag = $_instance->getRenderedChildComponentTagName('zYBWLV0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zYBWLV0');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('zYBWLV0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 2xl:col-start-3 h-full">
        <?php if($verifiedTransaction): ?>
            <?php if($isSuccessful): ?>
                <p class="bg-light-green px-4 py-2 text-center rounded-2xl mb-4 font-medium"><?php echo e($message); ?></p>
            <?php else: ?>
                <p class="bg-pink px-4 py-2 text-center rounded-2xl mb-4 font-medium"><?php echo e($message); ?></p>
            <?php endif; ?>
        <?php endif; ?>
        <div class="p-4 bg-gray-50 rounded-2xl">
            <div class="grid grid-cols-2 gap-4 border-b border-gray-200 pb-4 mb-4 xl:flex xl:justify-between xl:items-center xl:border-0">

                <div class="flex items-center gap-2">
                    <i class="icon-wallet text-xl text-gray-900 w-10 h-10 flex items-center justify-center rounded-xl bg-yellow"></i>
                    <h1>موجودی کیف پول:</h1>
                </div>
                <p class="flex items-center gap-1 justify-end text-primary">
                    <span class="text-lg font-bold tracking-tighter"><?php echo e(number_format(auth()->user()->balance)); ?></span>
                    <span class="text-sm">تومان</span>
                </p>

                <form class="col-span-full w-full xl:max-w-88" wire:submit.prevent="chargeWallet()">
                    <div class="relative">
                        <input class="text-field text-sm w-full" type="number" min="0" placeholder="مبلغ به تومان" wire:model.defer="amount">
                        <button type="submit" class="btn btn-primary absolute top-0 bottom-0 left-0 text-sm">شارژ کیف پول</button>
                    </div>
                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </form>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead class="text-sm text-gray-500">
                    <tr>
                        <th>تاریخ</th>
                        <th>مبلغ</th>
                        <th>نوع تراکنش</th>
                        <th>جزئیات</th>
                    </tr>
                    </thead>
                    <tbody class="text-black">
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="comment__date">
                                    <span class="comment__date-day"><?php echo e(jalaliDate($item->created_at, '%d')); ?></span>
                                    <span class="comment__date-month"><?php echo e(jalaliDate($item->created_at, '%B')); ?></span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap">
                                <span class="flex items-center gap-1"><span class="font-semibold"><?php echo e(number_format($item->amount)); ?></span><span
                                            class="text-sm">تومان</span></span>
                            </td>
                            <td><?php echo e($item->type == 'withdraw' ? 'برداشت' : 'واریز'); ?></td>
                            <td class="min-w-32"><?php echo e($item->meta['description']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/dashboard/dashboard-component.blade.php ENDPATH**/ ?>