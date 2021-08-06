<?php

use App\Models\LessonPlanDetails;
?>




<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/animate-css/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/chartist-js/chartist.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/chartist-js/chartist-plugin-tooltip.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/select.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/dashboard-modern.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/intro.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/dashboard.css')); ?>">
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
    #card-stats .card-stats-title {
        height: 30px !important;
    }
</style>
<div class="section">
    <?php if(Auth::user()->roles==3): ?>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">Dashboard</h5></div>
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
                                <select class="select2 browser-default" id="course" required="1" onchange="return getDashboardData(this.value);">
                                    <option value="">Select Course</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboardData">
            <!-- Current balance & total transactions cards-->
            <div id="card-stats" class="pt-0">
                <div class="row">

                    <div class="col s12 m6 l4">
                        <div id="weekly-earning" class="card animate fadeUp">
                            <div class="card-content" style="box-shadow: 1px 2px 10px #999;">
                                <p class="mb-0 mt-0 display-flex justify-content-between" style="font-weight: bold; font-size: 16px;">Proficiency</p>
                                <div class="current-balance-container">
                                    <div id="proficiency-donut-chart" class="current-balance-shadow"></div>
                                </div>
                                <p class="medium-small center-align" id="proficiencyLevel" data-id='<?php echo e(isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:''); ?>'>Proficiency - <?php echo e(isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:''); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($assessment)){
                      if($assessment==0){
                        $assessment ='NA';
                      }
                    }?>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content cyan white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title"> Assessment Taken</p>
                                <h4 class="card-stats-number white-text"><?php echo e($assessment); ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($hours)){
                      if($hours==0){
                        $hours ='NA';
                      }
                    }?>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content red accent-2 white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title"> Hours Spent  </p>
                                <h4 class="card-stats-number white-text"><?php echo e($hours); ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l4">
                        <div class="card animate fadeRight">
                            <div class="card-content green lighten-1 white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title"> Participation</p>
                                <h4 class="card-stats-number white-text">Perfect</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($skill)){
                      if($skill==0){
                        $skill ='NA';
                      }
                    }?>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeRight">
                            <div class="card-content orange lighten-1 white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title"> New Skills </p>
                                <h4 class="card-stats-number white-text"><?php echo e($skill); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Current balance & appointment cards-->
            <?php if(isset($studentSessionPerformance) && count($studentSessionPerformance) > 0): ?>
            <div class="row">
                <div class="col s12 m12 20">
                    <div class="card subscriber-list-card animate fadeRight">
                        <div class="card-content pb-1">
                            <h4 class="header mt-0" style="font-weight: bold;color: black;font-size: 22px;">Session Performance Details</h4>
                        </div>
                        <table class="subscription-table responsive-table highlight">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Course</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Session</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Session Attendance</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Performance Level</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;text-align: center;">Tutor Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $studentSessionPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentSessionPerformanceKey =>$studentSessionPerformanceVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(isset($studentSessionPerformanceVal->getCourseDetail->course_name)?$studentSessionPerformanceVal->getCourseDetail->course_name:''); ?></td>
                                    <td><?php echo e(isset($studentSessionPerformanceVal->getSessionDetail->topic_name)?strtoupper($studentSessionPerformanceVal->getSessionDetail->topic_name):''); ?></td>
                                    <td><?php echo e(isset($studentSessionPerformanceVal->session_attendance)?$studentSessionPerformanceVal->session_attendance:''); ?></td>
                                    <td><?php echo e(isset($studentSessionPerformanceVal->performance_level)?$studentSessionPerformanceVal->performance_level:''); ?></td>
                                    <!--<td><?php echo e(isset($studentSessionPerformanceVal->tutor_comments)?$studentSessionPerformanceVal->tutor_comments:''); ?></td>-->
                                    <td style="text-align: center;">
                                        <a href="javascript:void(0)" class="showTutorNotes" at="<?php echo e($studentSessionPerformanceVal->id); ?>"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">Dashboard</h5></div>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="section section-data-tables">
                        <div class="row">
                            <div class="col s12">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">Students List</h5></div>
                            <?php if(isset($getsessionData) && count($getsessionData) > 0): ?>
                            <table id="page-length-option" class="display">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Course Name</th>
                                        <th>Effective Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($getsessionData) && count($getsessionData) > 0): ?>
                                    <?php $__currentLoopData = $getsessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDataKey=>$getDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(isset($getDataVal->getStudentDetail)?$getDataVal->getStudentDetail->name:''); ?></td>
                                        <td><?php echo e(isset($getDataVal->getCourseDetail->course_name)?$getDataVal->getCourseDetail->course_name:''); ?></td>
                                        <td><?php echo e(isset($getDataVal->eff_date)?$getDataVal->eff_date:''); ?></td>
                                        <td><?php echo e(isset($getDataVal->end_date)?$getDataVal->end_date:''); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">No. of Session for a Student</h5></div>
                        </div>
                        <div class="col m3 float-right">
                            <?php $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All"); ?>
                            <select class="select2 browser-default" id="timePeriod" name="timePeriod" onchange="return getNumberOfSession(this.value);">
                                <?php if(isset($getStudents)): ?>
                                <option value="">Select Time Period</option>
                                <?php $__currentLoopData = $getTimePeriod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(isset($key) && 2==$key ? 'selected' :''); ?> value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="section section-data-tables">
                        <div class="row">
                            <div class="col s12" id="datatableDataRender">
                                <?php if(isset($getNoofsessionCompleted) && count($getNoofsessionCompleted) > 0): ?>
                                <table id="data-table-simple" class="display">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Course Name</th>
                                            <th>Month & Year</th>
                                            <th>Total Sessions Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($getNoofsessionCompleted) && count($getNoofsessionCompleted) > 0): ?>
                                        <?php $__currentLoopData = $getNoofsessionCompleted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDataKeys=>$getDataVals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(isset($getDataVals->getStudentDetail)?$getDataVals->getStudentDetail->name:''); ?></td>
                                            <td><?php echo e(isset($getDataVals->getCourseDetail->course_name)?$getDataVals->getCourseDetail->course_name:''); ?></td>
                                            <td><?php echo e(isset($getDataVals->sessionDate)?date('F, Y',strtotime($getDataVals->sessionDate)):''); ?></td>
                                            <td><?php echo e(isset($getDataVals->totalSessions)?$getDataVals->totalSessions:''); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php echo $__env->make('pages.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                $('#dashboardData').css('display', 'none');
                                $.ajax({
                                type: "post",
                                        url: '<?php echo e(url("/")); ?>' + '/session-notes/getCourse',
                                        data: {'stud_id': val, '_token': '<?php echo e(csrf_token()); ?>'},
                                        success: function (data) {
                                        $('#course').html(data);
                                        }
                                });
                                }
                                function getNumberOfSession(val) {
                                $.ajax({
                                type: "post",
                                        url: '<?php echo e(url("/")); ?>' + '/tutor/getNumberOfSession',
                                        data: {'timePeriod': val, '_token': '<?php echo e(csrf_token()); ?>'},
                                        success: function (data) {
                                        $('#datatableDataRender').html(data);
                                        }
                                });
                                }
                                $('.showTutorNotes').click(function () {
                                var inputVal = $(this).attr("at");
                                $.ajax({
                                data:{'inputVal':inputVal, '_token': '<?php echo e(csrf_token()); ?>'},
                                        type: "post",
                                        url: '<?php echo e(url("/")); ?>' + '/dashboard/getTutorNotes',
                                        success: function (data) {
//                                                swal({
//                                                title: data,
//                                                });

                                        swal("Tutor Comments", data);
                                        }
                                });
                                });
                                function getDashboardData() {
                                var studentID = $("#student").val();
                                var course = $("#course").val();
                                $.ajax({
                                data:{'studentID':studentID, 'course':course, '_token': '<?php echo e(csrf_token()); ?>'},
                                        type: "post",
                                        url: '<?php echo e(url("/")); ?>' + '/dashboard/getDashboardData',
                                        success: function (data) {
                                        $('#dashboardData').css('display', 'block');
                                        $('#dashboardData').html(data);
                                        }
                                });
                                }
</script>

<?php echo $__env->make('pages.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>

<script src="<?php echo e(asset('vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page-script'); ?>

<script src="<?php echo e(asset('js/scripts/data-tables.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/dashboard-modern.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/intro.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/ui-alerts.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/dashboard-analytics.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views/dashboard/index.blade.php ENDPATH**/ ?>