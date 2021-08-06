<?php $__env->startSection('title','500 Page'); ?>
<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-500.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section p-0 m-0 height-100vh section-500">
  <div class="row">
    <!-- 404 -->
    <div class="col s12 center-align white">
      <img src="<?php echo e(asset('images/gallery/error-2.png')); ?>" alt="" class="bg-image-500">
      <h1 class="error-code m-0">500</h1>
      <h6 class="mb-2">BAD REQUEST</h6>
      <a class="btn waves-effect waves-light gradient-45deg-deep-purple-blue gradient-shadow mb-4"
        href="<?php echo e(asset('ecommerce')); ?>">Back
        TO Home</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\page-500.blade.php ENDPATH**/ ?>