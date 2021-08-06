<?php $__env->startSection('title','Session Notes'); ?>

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
                                    <h6 style="font-weight: bold;
                                        color: #8b62b5;">Upcoming Sessions</h6></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

                        <div id="upcomingSessions">
                            <?php if(isset($content) && !empty($content) && count($content)>0): ?>
                            <div class="row">                            
                                <div class="col s12 m12 20">
                                    <div class="card ">
                                        <!--            <div class="card-title " style="text-align: center; padding: 10px">
                                                        <h6 style="font-weight: bold;">Upcoming Sessions for Student : <?php echo e(isset($content['0']->firstName) ? $content['0']->firstName.' '.$content['0']->lastName: ''); ?></h6>
                                                    </div>-->
                                        <div class=" row">
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: left;">
                                                    <h6>Session Date</h6>
                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: center;">
                                                    <h6>Student Name</h6>
                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: right;">
                                                    <h6> Launch Session</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php
                                        $explodeURL = array();
                                        $meetingURL = '';
                                        if (isset($vals->location) && $vals->location != '') {
                                            $explodeURL = explode(' ', $vals->location);
                                            $meetingURL = isset($explodeURL) ? $explodeURL[1] : "";
                                        }

                                        //Timezone
                                        $finalTimezoneTime = $userDateTime = '';
                                        if ($vals->timezone != 'America/New_York') {
                                            date_default_timezone_set('America/New_York');
                                            $userDateTime = date('Y-m-d H:i:s', strtotime($vals->datetime));

                                            $datetime = new DateTime($userDateTime);
                                            $la_time = new DateTimeZone($vals->timezone);
                                            $datetime->setTimezone($la_time);
                                            $finalTimezoneTime = $datetime->format("l jS \of F Y h:i:s A");
                                        } else {
                                            $finalTimezoneTime = $vals->date . ',' . ' ' . $vals->time;
                                        }
                                        $userDateTime = date('Y-m-d H:i:s', strtotime($vals->datetime));
                                        ?>            
                                        <div class=" row sessionNotesData" style="display: none;">
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: left;font-size: 14px;">
                                                    <?php echo e($finalTimezoneTime); ?>

                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: center;">
                                                    <?php echo e(isset($vals->firstName) ? $vals->firstName.' '.$vals->lastName:''); ?>

                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: right;">
                                                    <a href="<?php echo e($meetingURL); ?>" <?php echo e(isset($userDateTime) && ($userDateTime <= date("Y-m-d H:i:s")) ? 'disabled="disabled"':''); ?> target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Launch</a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card-action">
                                            <p style="text-align: center;"><a href="#!" id="seeMore" class="waves-effect waves-light btn" style="background-color: #736cb5;">View More</a></p>
                                        </div>
                                        <div class=" card-alert card green lighten-5" id="noSession" style="display: none;margin: auto;width: 50%; text-align: center">
                                            <div class=" card-content green-text">
                                                <p>No Sessions Found</p>
                                            </div>
                                        </div>
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
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><script>
$(document).ready(function () {
    var countData = "<?php echo e(count($content)); ?>";
    if (countData == 0) {
        $("#noSession").css("display", 'block');
    }
    if ($(".sessionNotesData:hidden").length == 0) {
        $("#seeMore").css("display", 'none');

    }
    $(".sessionNotesData").slice(0, 2).show();
    $("#seeMore").click(function (e) {
        e.preventDefault();
        $(".sessionNotesData:hidden").slice(0, countData).fadeIn("slow");
        if ($(".sessionNotesData:hidden").length == 0) {
            $("#seeMore").css("display", 'none');
            $("#noSession").css("display", 'none');
        }
    });
})
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/session/upcomingSessionTutor.blade.php ENDPATH**/ ?>