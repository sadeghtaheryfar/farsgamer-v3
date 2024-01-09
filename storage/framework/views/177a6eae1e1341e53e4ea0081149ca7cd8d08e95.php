
<section class="grid gap-4 mt-4 2xs:grid-cols-2 sm:grid-cols-3">
    <?php $__currentLoopData = $tripleItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($item['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($item['image'])); ?>" alt=""></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section> 
 <section class="box-voice-security my-5">
        <div class="image-box-voice-security">
            <img class="hide-mobile" src="https://farsgamer.com/media/6479b502b3c4c.jpg" alt="">

            <img class="hide-pc" src="https://farsgamer.com/media/647a3c29a5356.jpg" alt="" />
        </div>

        <div class="item-box-voice-security">
            <img src="https://farsgamer.com/media/647625d6004b0.png" alt="">

            <audio controls>
                <source src="https://farsgamer.com/site/videos/Sequence%2001.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </section><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/homes/triple-item.blade.php ENDPATH**/ ?>