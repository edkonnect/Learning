




<?php $__env->startSection('title','Uploaded Files'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>

<?php $__env->startSection('content'); ?>
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
                                        color: #8b62b5;">UPLOADED FILES</h5></div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($files) && !empty($files)): ?>
                    <?php
                    //echo '<pre>';
                    //print_r($files); die;
                    ?>
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileNames): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($fileNames!='.' && $fileNames!='..'): ?>

                    <div class="row" style="margin-top:60px;">
                        <div class="input-field col m1 s1">

                        </div>
                        <div class="input-field col m6 s6">
                            <label>
                                <a href= "<?php echo e(url('/').'/SATENG/'.$fileNames); ?>" ><?php echo e($fileNames); ?></a>
                            </label>
                        </div>

                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="card-content">
                      <div class="row">
                          <div class="col m6 s12">
                              <div class="input-field">

                              </div>
                          </div>
                        </div>

                </div>

            </div>
        </div>
    </div>
    </section>
</div>

            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('vendor-script'); ?>
            <script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('page-script'); ?>
            <script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/grade/SatEng.blade.php ENDPATH**/ ?>