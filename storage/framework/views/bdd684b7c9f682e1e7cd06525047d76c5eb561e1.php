<?php

use App\Models\LessonPlanDetails;
?>




<?php $__env->startSection('title','Course Detail'); ?>

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
                                        color: #8b62b5;">Course Detail</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getLessonList(this.value);">
                                        <option value="">Select Course</option>  

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="sessionData">
                            <?php if(isset($getStudLessonData) && count($getStudLessonData) > 0): ?>
                            <div class="row sessionNotesData">                            
                                <div class="col s12 m12 20 indexSessionData">
                                    <div class="card ">           
                                        <ul class="collapsible collapsible-accordion">
                                            <?php $__currentLoopData = $getStudLessonData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                            <li>
                                                <div class="collapsible-header">
                                                    <div class="row">             
                                                        <div class="col s12 m12 20">
                                                        <h5 style="font-weight: bold; font-size: 16px;"><?php echo e(isset($val->getLessonPlan->topic_name)?strtoupper($val->getLessonPlan->topic_name):''); ?></h5>
                                                        <p style="text-align: justify;font-size: 14px;">
                                                            <?php echo e(isset($val->getLessonPlan->descr)?$val->getLessonPlan->descr:''); ?>

                                                        </p>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="collapsible-body">
                                                    <?php $getSubtopic = LessonPlanDetails::where('lesson_id',$val->lesson_id)->get(); ?>
                                                    <?php if(isset($getSubtopic) && count($getSubtopic) > 0): ?>
                                                    <?php $__currentLoopData = $getSubtopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSubtopicKey => $getSubtopicVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row">                            
                                                        <div class="col s12 m12 20">
                                                            <div class="card ">
                                                                <div class="card-content">
                                                                    <h6 style="font-weight: bold;text-align: left;">Sub Topic-<?php echo e($getSubtopicKey+1); ?></h6>
                                                                    <p style="text-align: justify;">
                                                                        <?php echo e(isset($getSubtopicVal->description)?$getSubtopicVal->description:''); ?>

                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    <div class="card-content " style="text-align: center;">
                                                        <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                                            <div class=" card-content green-text">
                                                                <p>No Data Found</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="card-content " style="text-align: center;">
                                <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                    <div class=" card-content green-text">
                                        <p>No Data Found</p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
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
                                        $('#sessionData').css('display', 'none');
                                        $.ajax({
                                        type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/session-notes/getCourse',
                                                data: {'stud_id': val, '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                $('#course').html(data);
                                                }
                                        });
                                        }
                                        function getLessonList() {

                                        $('#sessionData').css('display', 'block');
                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        data:{'studentID':studentID, 'course':course, '_token': '<?php echo e(csrf_token()); ?>'},
                                                type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/course-detail/getLessonList',
                                                success: function (data) {
                                                $('#sessionData').html(data);
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
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views/coursedetail/index.blade.php ENDPATH**/ ?>