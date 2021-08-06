<?php $__env->startSection('title','Fullscreen Slider'); ?>


<?php $__env->startSection('content'); ?>
<div class="slider fullscreen">
    <ul class="slides">
        <li>
            <img src="<?php echo e(asset('images/gallery/46.jpg')); ?>" class="responsive-img" alt="sample img">
            <!-- random image -->
            <div class="caption center-align">
                <h3 class="white-text">This is our big tagline</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="<?php echo e(asset('images/gallery/47.jpg')); ?>" class="responsive-img" alt="sample img">
            <!-- random image -->
            <div class="caption left-align">
                <h3 class="white-text">Left Aligned</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="<?php echo e(asset('images/gallery/48.jpg')); ?>" class="responsive-img" alt="sample img">
            <!-- random image -->
            <div class="caption right-align">
                <h3 class="white-text">Right Aligned</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
    </ul>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/fullscreen-slider.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\fullscreen-slider-demo.blade.php ENDPATH**/ ?>