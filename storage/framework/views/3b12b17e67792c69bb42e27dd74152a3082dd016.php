<div >
    <?php if($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_REGISTER): ?>
        <?php echo $__env->make('site.components.auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_LOGIN): ?>
        <?php echo $__env->make('site.components.auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_VERIFY): ?>
        <?php echo $__env->make('site.components.auth.verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        Livewire.on('timer', function (data) {
            $('#clock').countdown(data.data)
                .on('update.countdown', function(event) {
                    var format = '%M:%S';
                    if(event.offset.totalDays > 0) {
                        format = '%-d روز ' + format;
                    }
                    if(event.offset.weeks > 0) {
                        format = '%-w هفته ' + format;
                    }
                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $(this).html('اتمام زمان!')
                        .parent().addClass('disabled');
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('canSendAgain')
                });
        })

    </script>
   
<?php $__env->stopPush(); ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/auth/auth.blade.php ENDPATH**/ ?>