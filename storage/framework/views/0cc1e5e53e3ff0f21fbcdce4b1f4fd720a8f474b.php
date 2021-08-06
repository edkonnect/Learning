<?php

use App\Models\Course;
?>




<?php $__env->startSection('title','Assessment'); ?>

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
                                        color: #8b62b5;">ASSESSMENT TEST</h5></div>
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

                        <div class="row">
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="student" name="student" required="1" onchange="return getCourse(this.value);">
                                        <?php if(isset($getStudents)): ?>
                                        <?php $__currentLoopData = $getStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
                        <div  class="responsive-table" id ="Assessment">
                          <?php if(isset($getAssessment) && count($getAssessment) > 0): ?>

                     <table  class="table invoice-data-table white border-radius-4 pt-1">

                       <tbody >

                       <tr>
                         <thead>
                           <th>Topic </th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Assessment</th>
                         </thead>

                       </tr>

                       <tbody id ="Assessment">
                            <?php $__currentLoopData = $getAssessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
      <td><?php echo e($val->topic_name); ?></td>
      <td><?php echo e(Carbon\Carbon::parse($val->start_date)->format(' jS  F Y ')); ?></td>
      <td><?php echo e(Carbon\Carbon::parse($val->end_date)->format(' jS  F Y ')); ?></td>

      <td><a href="<?php echo e(url('/assessment/test',['id'=>$val->id])); ?>"   target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Launch</a></td>
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
                                                url: '<?php echo e(url("/")); ?>' + '/assessment/assessments',
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
            <script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views/assessment/assessment.blade.php ENDPATH**/ ?>