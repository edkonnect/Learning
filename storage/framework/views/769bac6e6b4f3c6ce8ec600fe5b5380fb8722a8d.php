<?php $__env->startSection('title','Review Homework'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
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
                                        color: #8b62b5;">Review Homework</h5></div>
                            </div>
                            <div class="col m3 float-right">
                                <?php $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All"); ?>
                                <select class="select2 browser-default" id="timePeriod" name="timePeriod" onchange="return getHomeworkList(this.value);">
                                    <?php if(isset($getStudents)): ?>
                                    <option value="">Select Time Period</option>
                                    <?php $__currentLoopData = $getTimePeriod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getHomeworkList(this.value);">
                                        <option value="">Select Course</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="sessionData">
                            <?php if(isset($getsessionData) && count($getsessionData) > 0): ?>
                            <div class="row sessionNotesData">
                                <?php $__currentLoopData = $getsessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col s12 m12 20 indexSessionData">
                                    <div class="card ">
                                        <div class="card-title" style="text-align: center; padding: 10px">
                                            <h5 style="font-weight: bold;"><?php echo e(isset($val->topic_name)?strtoupper($val->topic_name):''); ?></h5>
                                        </div>



                                        <div class=" row">
                                            <div class=" col s12 m6 20">
                                                <div class=" card-action " style="text-align: left;font-size: 14px;">
                                                    <strong>Session Date : </strong> <?php echo e(date('l jS \of F Y h:i:s A',strtotime($val->session_date))); ?>

                                                </div>
                                            </div>
                                            <div class=" col s12 m6 20">
                                                <div class=" card-action " style="text-align: right;font-size: 14px;">
                                                    <?php
                                                    $dateTime = new DateTime($val->session_date);
                                                    $dateTime->modify('+7 day');
                                                    ?>
                                                    <strong>Session Due date : </strong> <?php echo e(($dateTime->format("l jS \of F Y h:i:s A"))?$dateTime->format("l jS \of F Y h:i:s A"):''); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <?php if(count($val->getStudHWAttachmentDetail)>0): ?>
                                        <div class="card-content">
                                            <div class=" row">
                                                <?php $__currentLoopData = $val->getStudHWAttachmentDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyAttach=>$valAttch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class=" col s12 m3">
                                                    <div class=" card-action" style="text-align: center">
                                                        Homework - <?php echo e($keyAttach+1); ?><a href="<?php echo e(url("/")); ?>/uploads/<?php echo e($val->getStudentDetail->username.'/'.$valAttch->attachment_link); ?>" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Download</a>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="card-content " style="text-align: center;">
                                            <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                                <div class=" card-content green-text">
                                                    <p>No Homework Found</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if($key % 2 != 0 ): ?>
                            </div>
                            <div class="row sessionNotesData">
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
                                        $(document).ready(function () {
                                        <?php if(isset($data)): ?>
                                                var data = "<?php echo $data; ?>";
                                        $('#course').html(data);
                                        <?php endif; ?>
                                        <?php if(isset($studentsDynamicData)): ?>
                                                var studentsDynamicData = "<?php echo $studentsDynamicData; ?>";
                                        $('#student').html(studentsDynamicData);
                                        <?php endif; ?>

                                                <?php if(isset($timePeriod)): ?>
                                                var timePeriodDrop = "<?php echo $timePeriod; ?>";
                                        $('#timePeriod').html(timePeriodDrop);
                                        <?php endif; ?>
                                        });
                                        function getCourse(val) {
                                        $.ajax({
                                        type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/session-notes/tutor/getCourse',
                                                data: {'stud_id': val,'userID':'<?php echo Auth::user()->id; ?>', '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                $('#course').html(data);
                                                }
                                        });
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        var course = 'pageLoad';
                                        if (timePeriod == ''){
                                        timePeriod = 'pageLoad';
                                        }
                                        $.ajax({
                                        type: "get",
                                                url: '<?php echo e(url("/")); ?>' + '/tutor/getHomeworkAjaxView/' + studentID + '/' + course + '/' + timePeriod,
                                                success: function (data) {
                                                $('#sessionData').html(data);
                                                }
                                        });
                                        }
                                        function getHomeworkList() {
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        var course = $("#course").val();
                                        if (course == ''){
                                        course = 'pageLoad';
                                        }
                                        if (timePeriod == ''){
                                        timePeriod = 'pageLoad';
                                        }
                                        $.ajax({
                                        type: "get",
                                                url: '<?php echo e(url("/")); ?>' + '/tutor/getHomeworkAjaxView/' + studentID + '/' + course + '/' + timePeriod,
                                                success: function (data) {
                                                $('.indexSessionData').hide();
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

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/homework/tutorhomework.blade.php ENDPATH**/ ?>