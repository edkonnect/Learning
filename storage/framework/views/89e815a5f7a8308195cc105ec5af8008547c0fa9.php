<?php $__env->startSection('title','Maintenance Page'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-maintenance.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section p-0 m-0 height-100vh section-maintenance">
  <div class="row">
    <!-- Maintenance -->
    <div id="maintenance" class="col s12 center-align white">
      <img src="<?php echo e(asset('images/gallery/maintenance.png')); ?>" class="responsive-img maintenance-img" alt="">
      <h4 class="error-code">This page is under maintenance</h4>
      <h6 class="mb-2 mt-2">We're sorry for the inconvenience. <br> Please check back later.</h6>
      <a class="btn waves-effect waves-light" href="<?php echo e(asset('ecommerce')); ?>">Back TO Home</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\page-maintenance.blade.php ENDPATH**/ ?>