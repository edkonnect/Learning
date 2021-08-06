
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/animate-css/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/chartist-js/chartist.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/chartist-js/chartist-plugin-tooltip.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/dashboard-modern.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/intro.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/dashboard.css')); ?>">


<div id="dashboardData">
    <div id="card-stats" class="pt-0">
                <div class="row">
                    <div class="col s12 m6 l4">
                        <div id="weekly-earning" class="card animate fadeUp">
                            <div class="card-content" style="box-shadow: 1px 2px 10px #999;">
                                <p class="mb-0 mt-0 display-flex justify-content-between" style="font-weight: bold; font-size: 16px;">Proficiency </p>
                                <div class="current-balance-container">
                                    <div id="proficiency-donut-chart" class="current-balance-shadow"></div>
                                </div>
                                <p class="medium-small center-align" id="proficiencyLevel" data-id='<?php echo e(isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:'NA'); ?>'>Proficiency - <?php echo e(isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:'NA'); ?></p>
                            </div>
                        </div>
                    </div><?php
                    if(isset($assessment)){
                      if($assessment==0){
                        $assessment ='NA';
                      }
                    }?>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content cyan white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title"> Assessment Taken</p>
                                <h4 class="card-stats-number white-text"><?php echo e(isset($assessment)?$assessment:'NA'); ?></h4>
                            </div>
                        </div>
                    </div><?php
                    if(isset($hours)){
                      if($hours==0){
                        $hours ='NA';
                      }
                    }

                    ?>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content red accent-2 white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title">Hours Spent </p>
                                <h4 class="card-stats-number white-text"><?php echo e(isset($hours)?$hours:'NA'); ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l4">
                        <div class="card animate fadeRight">
                            <div class="card-content green lighten-1 white-text" style="border-radius: 4px;;box-shadow: 1px 2px 10px #999;" >
                                <p class="card-stats-title"> Participation </p>
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
                                <p class="card-stats-title"> New Skills</p>
                                <h4 class="card-stats-number white-text"><?php echo e(isset($skill)?$skill:'NA'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Current balance & total transactions cards-->

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
<script>
$('.showTutorNotes').click(function () {
    var inputVal = $(this).attr("at");
    $.ajax({
        data: {'inputVal': inputVal, '_token': '<?php echo e(csrf_token()); ?>'},
        type: "post",
        url: '<?php echo e(url("/")); ?>' + '/dashboard/getTutorNotes',
        success: function (data) {
            swal("Tutor Comments", data);
        }
    });
});
</script>
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/dashboard-modern.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/intro.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/dashboard-analytics.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\dashboard\dashboardDetailView.blade.php ENDPATH**/ ?>