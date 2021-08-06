<?php

use App\Models\Course;
?>




<?php $__env->startSection('title','User Activity Log'); ?>

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
                                        color: #8b62b5;">User Activity Log</h5></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                      <div class="row">
                          <div class="col m6 s12">
                              <div class="input-field">

                              </div>
                          </div>
                        </div>



                        <div  class="responsive-table">
                          <?php if(isset($activity_log) && count($activity_log) > 0): ?>

                     <table  class="table invoice-data-table white border-radius-4 pt-1">

                       <tbody >

                       <tr>
                         <thead>
        <th>User Name</th>
        <th>Login Time</th>
        <th>Logout Time</th>
                         </thead>

                       </tr>

                       <tbody >
                            <?php $__currentLoopData = $activity_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
      <td><?php echo e($key->user_name); ?></td>
    <?php  if ($key->login_time== '') {?>
      <td>-</td>
    <?php } ?>

      <td><?php echo e(Carbon\Carbon::parse($key->login_time)->format('h:i:s A jS  F Y ')); ?></td>
      <?php  if ($key->logout_time== '') {?>
        <td>-</td>
      <?php } ?>
      <td><?php echo e(Carbon\Carbon::parse($key->logout_time)->format('h:i:s A jS  F Y ')); ?></td>

    </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                       <?php else: ?>
                              <div class="card-content " style="text-align: center;">
                                  <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                      <div class=" card-content green-text">
                                          <p>No Data Found</p>
                                      </div>
                                  </div>
                              </div>
                              <?php endif; ?>
                     </table>


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

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\RegisterUser\ActivityLog.blade.php ENDPATH**/ ?>