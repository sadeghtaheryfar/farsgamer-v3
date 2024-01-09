<div>
    <?php if($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_REGISTER): ?>
        <?php echo $__env->make('site.components.auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_LOGIN): ?>
        <?php echo $__env->make('site.components.auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_VERIFY): ?>
        <?php echo $__env->make('site.components.auth.verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/auth/auth.blade.php ENDPATH**/ ?>