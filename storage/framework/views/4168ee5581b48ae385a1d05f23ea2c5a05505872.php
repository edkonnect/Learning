<?php

use App\Models\Course;
?>




<?php $__env->startSection('title','Upload Assessment Result'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/sweetalert/sweetalert.css')); ?>">

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
      <div id="sessionData">
          <?php if(Session::has('success')): ?>

          <div class="card-alert card green lighten-5">
              <div class="card-content green-text">
                  <p>SUCCESS : <?php echo e(Session::get('success')); ?></p>
              </div>
              <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <?php endif; ?>
          <?php if(Session::has('error')): ?>

          <div class="card-alert card red lighten-5">
              <div class="card-content red-text">
                  <p>FAILED : <?php echo e(Session::get('error')); ?></p>
              </div>
              <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <?php endif; ?>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="card-action">
                            <div class="col m6 s12">
                                <div class="card-title ">
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">ASSESSMENT RESULT</h5></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">


                        <div class="row">
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="student" name="student" required="1" onchange="return getCourse(this.value);">
                                      <option value="">Select Student</option>
                                        <?php $__currentLoopData = $getStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <h5>Course</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getAssessment(this.value);">
                                        <option value="">Select Course</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    <div id="Assessment">
                      <div  class="responsive-table">
                        <?php if(isset($getAssessment) && count($getAssessment) > 0): ?>

                      <table  class="table invoice-data-table white border-radius-4 pt-1">

                      <tbody >

                      <tr>
                       <thead>
                         <th>Topic </th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Status</th>
                      <th>Upload Result</th>
                       </thead>

                      </tr>

                      <tbody >
                          <?php $__currentLoopData = $getAssessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                      <td><?php echo e($val->topic_name); ?></td>
                      <td><?php echo e(Carbon\Carbon::parse($val->start_date)->format(' jS  F Y ')); ?></td>
                      <td><?php echo e(Carbon\Carbon::parse($val->end_date)->format(' jS  F Y ')); ?></td>
                      <?php
                      $status= '';
                      if (isset($val->status)) {
                          if ($val->status == '1') {
                              $status = 'Completed';
                          }
                          if ($val->status == '0') {
                              $status = 'Not Completed';
                          }

                      }
                      ?>
                    <?php if ($val->status == '0') { ?>  <td style = "color:red;"><?php echo e($status); ?></td>   <?php  }?>
                      <?php if ($val->status == '1') { ?>  <td style = "color:green;"><?php echo e($status); ?></td>   <?php  }?>
                      <?php if ($val->status == '0') { ?>
                      <td><a href="<?php echo e(url('/assessment/upload-result-pdf',['id'=>$val->id])); ?>"    class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</a></td>
                  <?php  }?>
                  <?php if ($val->status == '1') { ?>
                  <td><a href="<?php echo e(url('/assessment/upload-result-pdf',['id'=>$val->id])); ?>"  disabled  class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</a></td>
              <?php  }?>


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
    </div>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
            $(document).ready(function () {
            <?php if(isset($data)): ?>
                    var data = "<?php echo $data; ?>";
            $('#course').html(data);
            <?php endif; ?>
            });
            function getCourse(val) {
            $('#quizData').css('display', 'none');
            $.ajax({
            type: "post",
                    url: '<?php echo e(url("/")); ?>' + '/session-notes/getCourse',
                    data: {'stud_id': val, '_token': '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                    $('#course').html(data);
                    }
            });
            }
      function getAssessment() {

        var studentID = $("#student").val();
        var course = $("#course").val();
        $.ajax({
    data:{'studentID':studentID, 'course':course, '_token': '<?php echo e(csrf_token()); ?>'},
              type: "post",
              url: '<?php echo e(url("/")); ?>' + '/assessment/assessments-result',
              success: function (data) {
                $('#Assessment').html(data);
                }
                });
            }
            </script>
            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('vendor-script'); ?>
            <script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('page-script'); ?>
            <script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>

            <script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\assessment\uploadResult.blade.php ENDPATH**/ ?>