<?php

use App\Models\LessonPlanDetails;
?>




<?php $__env->startSection('title','Quizlet'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/select.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/data-tables.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>

<?php $__env->startSection('content'); ?>
<style>
    .text-wrap{
        white-space:normal;
    }
    .width-200{
        width:200px;
    }

</style>
<div class="section">
    <!-- Snow Editor start -->
    <section class="snow-editor">
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
                                        color: #8b62b5;">Quizlet</h5></div>
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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getQuizesList(this.value);">
                                        <option value="">Select Course</option>  

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section section-data-tables">
                            <div class="row">
                                <div class="col s12" id="quizData">
                                    <table id="page-length-option" class="display">
                                        <thead>
                                            <tr>
                                                <th>Grade</th>
                                                <!--<th>Lesson Plan</th>-->
                                                <!--<th>Course</th>-->
                                                <th>Description</th>
                                                <th data-orderable='false'>Quizlet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($getData) && count($getData) > 0): ?>
                                            <?php $__currentLoopData = $getData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDataKey=>$getDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(isset($getDataVal->grade)?$getDataVal->grade:''); ?></td>
                                                <!--<td><?php echo e(isset($getDataVal->getLessonPlan->topic_name)?$getDataVal->getLessonPlan->topic_name:''); ?></td>-->
                                                <!--<td><?php echo e(isset($getDataVal->getCourseDetail->course_name)?$getDataVal->getCourseDetail->course_name:''); ?></td>-->
                                                <td style="text-align:justify;"><?php echo e(isset($getDataVal->description)?$getDataVal->description:''); ?></td>
                                                <td>
                                                    <!--<a href="javascript:void(0)" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">-->
                                                    <a href="<?php echo e(url('/quizes/startQuiz',['id'=>$getDataVal->id])); ?>" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                                                        Start
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
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
                                        function getQuizesList() {
                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        data:{'studentID':studentID, 'course':course, '_token': '<?php echo e(csrf_token()); ?>'},
                                                type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/quizes/getQuizesList',
                                                success: function (data) {                                                 
                                        $('#quizData').css('display', 'block');
                                                $('#quizData').html(data);
                                                }
                                        });
                                        }
            </script>
            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('vendor-script'); ?>
            <script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
            <script src="<?php echo e(asset('vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
            <script src="<?php echo e(asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
            <script src="<?php echo e(asset('vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
            <?php $__env->stopSection(); ?>


            
            <?php $__env->startSection('page-script'); ?>
            <script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
            <script src="<?php echo e(asset('js/scripts/data-tables.js')); ?>"></script>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\quizes\index.blade.php ENDPATH**/ ?>