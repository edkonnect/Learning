



<?php $__env->startSection('title','Assessment Test'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
//echo '<pre>';
//print_r($getStudents);
//die;
?>

<?php $__env->startSection('content'); ?>

<div class="col s12">
        <div class="container">

          <div class="section">
    <!-- Snow Editor start -->
    <section class="snow-editor">
                         <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="card-action">
              <div class="col m6 s12">
                <div class="card-title ">
              <h5 style="font-weight: bold;
                color: #8b62b5;">ASSESSMENT TEST</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                      <a href="<?php echo e(url('/assessment')); ?>" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                          Go Back
                      </a>
                    </div>
                    <div class="card-content">
                        <div class="section section-data-tables">
                            <div class="row">
                                <div class="col s12" id="quizData">
                                    <?php $__currentLoopData = $getAssessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <iframe src="<?php echo e($val->assmt_url); ?>" height="500" width="100%" style="border:0"></iframe>";
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

        <div class="content-overlay"></div>
      </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\assessment\assessmentTest.blade.php ENDPATH**/ ?>