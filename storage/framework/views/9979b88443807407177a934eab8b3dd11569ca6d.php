<?php $__env->startSection('title','404 Page'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-404.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section section-404 p-0 m-0 height-100vh">
  <div class="row">
    <!-- 404 -->
    <div class="col s12 center-align white">
      <img src="<?php echo e(asset('images/gallery/error-2.png')); ?>" class="bg-image-404" alt="">
      <h1 class="error-code m-0">404</h1>
      <h6 class="mb-2">BAD REQUEST</h6>
      <a class="btn waves-effect waves-light gradient-45deg-deep-purple-blue gradient-shadow mb-4"
        href="<?php echo e(url('/')); ?>">Back
        TO Home</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\page-404.blade.php ENDPATH**/ ?>