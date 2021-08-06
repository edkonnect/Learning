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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/dashboard-modern.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/intro.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>
<?php $__env->startSection('content'); ?>
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
                                    color: #8b62b5;">Articles</h5></div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div id="dashboardData">
                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card recent-buyers-card animate fadeUp">
                                        <div class="row">
                                            <div class="card-action">
                                                <div class="col m12 12">
                                                    <div class="card-title ">
                                                        <h5 style="font-weight: bold;
                                                            color: #8b62b5; text-align: center">MONTHLY MATH CHALLENGE</h5></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">

                                            <?php if(isset($customDashboardData['typeOne'])): ?>
                                            <?php $__currentLoopData = $customDashboardData['typeOne']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customDashboardDataKey=>$customDashboardDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card ">
                                                        <div class="card-content">
                                                            <h4 class="card-title mb-0" style="font-weight: bold;"><?php echo e(isset($customDashboardDataVal->title) ?$customDashboardDataVal->title :''); ?></h4>
                                                           <!--<p class="medium-small pt-2">Today</p>-->
                                                            <p class="card-text" style="text-align: justify;">
                                                                <?php echo e(isset($customDashboardDataVal->description) ?strip_tags($customDashboardDataVal->description) :''); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12">
                                    <div class="card recent-buyers-card animate fadeUp">
                                        <div class="row">
                                            <div class="card-action">
                                                <div class="col m12 12">
                                                    <div class="card-title ">
                                                        <h5 style="font-weight: bold;
                                                            color: #8b62b5; text-align: center">NEWSLETTER</h5></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">

                                            <?php if(isset($customDashboardData['typeTwo'])): ?>
                                            <?php $__currentLoopData = $customDashboardData['typeTwo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customDashboardDataKey=>$customDashboardDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card ">
                                                        <div class="card-content">
                                                            <h4 class="card-title mb-0" style="font-weight: bold;"><?php echo e(isset($customDashboardDataVal->title) ?$customDashboardDataVal->title :''); ?></h4>
                                                           <!--<p class="medium-small pt-2">Today</p>-->
                                                            <p class="card-text" style="text-align: justify;">
                                                                <?php echo e(isset($customDashboardDataVal->description) ?strip_tags($customDashboardDataVal->description) :''); ?>

                                                                <a href="<?php echo e(isset($customDashboardDataVal->link)?$customDashboardDataVal->link:''); ?>" target="_blank" class="waves-effect waves-light" style="font-weight: bold;">Read More</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12">
                                    <div class="card recent-buyers-card animate fadeUp">
                                        <div class="row">
                                            <div class="card-action">
                                                <div class="col m12 12">
                                                    <div class="card-title ">
                                                        <h5 style="font-weight: bold;
                                                            color: #8b62b5; text-align: center">FACTS AND TRIVIA</h5></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <?php if(isset($customDashboardData['typeThree'])): ?>
                                            <?php $__currentLoopData = $customDashboardData['typeThree']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customDashboardDataKey=>$customDashboardDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card ">
                                                        <div class="card-content">
                                                            <h4 class="card-title mb-0" style="font-weight: bold;"><?php echo e(isset($customDashboardDataVal->title) ?$customDashboardDataVal->title :''); ?></h4>
                                                           <!--<p class="medium-small pt-2">Today</p>-->
                                                            <p class="card-text" style="text-align: justify;">
                                                                <?php echo e(isset($customDashboardDataVal->description) ?strip_tags($customDashboardDataVal->description) :''); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    color: #8b62b5;">DASHBOARD</h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php echo $__env->make('pages.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->make('pages.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/dashboard-modern.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/intro.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/ui-alerts.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/dashboard/articles.blade.php ENDPATH**/ ?>