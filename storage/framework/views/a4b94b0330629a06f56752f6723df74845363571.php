<?php $__env->startSection('title','Tour'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/shepherd-js/shepherd-theme-default.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/extra-components-tour.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- Tour start -->
<div class="section">
  <div class="card-panel">
    <a href="https://github.com/shipshapecode/shepherd" target="_blank">Shepherd</a> is a JavaScript library for guiding
    users through your app. It uses Tether, another open source library, to render dialogs for each tour "step".
    Among many things, Tether makes sure your steps never end up off screen or cropped by an overflow.
  </div>
  <div class="row">
    <div class="col s12">
      <div class="card-panel">
        <h6 class="mt-0">Tour</h6>
        <!--Tour start button -->
        <button class="btn waves-effect waves-light" id="tour">Start Tour</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/shepherd-js/shepherd.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/extra-components-tour.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\extra-components-tour.blade.php ENDPATH**/ ?>