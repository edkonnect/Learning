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
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">Session Notes</h5></div>
                            </div>
                            <div class="col m3 float-right">
                                <?php $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All"); ?>
                                <select class="select2 browser-default" id="timePeriod" name="timePeriod" onchange="return getSession(this.value);">
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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getSession(this.value);">
                                        <option value="">Select Course</option>  

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="sessionData">
                            <?php if(isset($getsessionData) && !empty($getsessionData)): ?>
                            <div class="row sessionNotesData" style="display: none;">
                                <?php $__currentLoopData = $getsessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col s12 m12 20 indexSessionData">
                                    <div class="card ">
                                        <div class="card-alert card " style="background-color: #8862b5;">
                                            <div class="row">
                                                <div class="col s12 m6 20">
                                                    <div class="card-action " style="text-align: left; color: white;font-size: 14px;">
                                                        <?php echo e('Session Date : '.date('l jS \of F Y h:i:s A',strtotime($val->session_date))); ?>

                                                    </div>
                                                </div>
                                                <div class="col s12 m2 20">
                                                    <div class="card-action " style="text-align: center; color: white;">
                                                        <?php echo e(isset($val->demo) && $val->demo == 'Yes'?'Demo':''); ?>

                                                    </div>
                                                </div>
                                                <div class="col s12 m4 20">
                                                    <div class="card-action " style="text-align: right; color: white;">
                                                        <a style="color: white;" href="<?php echo e(url("/")); ?>/Tutorprofile/Edkonnect/E/<?php echo e($val->getTutorDetail->name); ?>.pdf" target="_blank"><?php echo e(isset($val->getTutorDetail->name)?ucfirst('Tutor : '.$val->getTutorDetail->name):''); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title " style="text-align: center;">
                                            <h5 style="font-weight: bold;"><?php echo e(isset($val->topic_name)?strtoupper($val->topic_name):''); ?></h5>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="card-action " style="text-align: center;font-size: 14px;">
                                                <h6 style="font-weight: bold;">Session Date - <?php echo e(date('l jS \of F Y h:i:s A',strtotime($val->session_date))); ?></h6>
                                            </div>
                                        </div>
                                        <div class="card-content " style="text-align: center;">
                                            <p style="text-align: justify;">
                                                <strong>Notes-</strong> <?php echo e(isset($val->session_notes)?$val->session_notes:''); ?>

                                            </p>
                                            <p style="text-align: center;"><a href="<?php echo e(url('/getHomework',['session_id' => $val->id,'student_id'=>$val->student_id,'course_id'=>$val->course_id])); ?>" class="waves-effect waves-light btn" style="background-color: #736cb5;    margin-top: 20px;">Click here for Homework</a></p>
                                        </div>


                                        <!--                                        <div class="card-alert card " style="background-color: #8862b5;">
                                                                                    <div class="row">
                                                                                        <div class="col s12 m6 20">
                                                                                            <div class="card-action " style="text-align: left; color: white;">
                                                                                                <?php echo e(isset($val->demo) && $val->demo == 'Yes'?'Demo':''); ?>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col s12 m6 20">
                                                                                            <div class="card-action " style="text-align: right; color: white;">
                                        <?php
//                                                        $diffTime = Helper::time_elapsed_string($val->session_date);
////                                                print_r($diffTime); die;
//                                                        $diff = $diffTime['diff'];
//                                                        $time = $diffTime['time'];
                                        ?>
                                                                                                <?php echo e(isset($diff)?$diff.' ':''); ?>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>-->
                                    </div>
                                </div>
                                <?php if($key % 2 != 0 ): ?>
                            </div>
                            <div class="row sessionNotesData" style="display: none;">
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="row">
                                <p style="text-align: center;"><a href="#!" id="seeMore" class="waves-effect waves-light btn" style="background-color: #736cb5;">View More</a></p>
                            </div>
                            <div class=" card-alert card green lighten-5" id="noSession" style="display: none;margin: auto;width: 50%; text-align: center">
                                <div class=" card-content green-text">
                                    <p>No Sessions Found</p>
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
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>      
<script>
                                        $(document).ready(function () {
                                        <?php if(isset($data)): ?>
                                                var data = "<?php echo $data; ?>";
                                        $('#course').html(data);
                                        <?php endif; ?>
                                        <?php if(isset($timePeriod)): ?>
                                                var timePeriodDrop = "<?php echo $timePeriod; ?>";
                                        $('#timePeriod').html(timePeriodDrop);
                                        <?php endif; ?>

                                                var countData = "<?php echo e(count($getsessionData)); ?>";
                                        var timePeriod = $("#timePeriod").val();
                                        if (timePeriod == 6) {
                                        $(".sessionNotesData").slice(0, countData).show();
                                        } else {
                                        $(".sessionNotesData").slice(0, 1).show();
                                        }

                                        if (countData == 0){
                                        $("#noSession").css("display", 'block');
                                        }
                                        if ($(".sessionNotesData:hidden").length == 0) {
                                        $("#seeMore").css("display", 'none');
                                        }
                                        $("#seeMore").click(function (e) {
                                        e.preventDefault();
                                        $(".sessionNotesData:hidden").slice(0, countData).fadeIn("slow");
                                        if ($(".sessionNotesData:hidden").length == 0) {
                                        $("#seeMore").css("display", 'none');
                                        $("#noSession").css("display", 'none');
                                        }
                                        });
                                        });
                                        function getCourse(val) {
                                        $.ajax({
                                        type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/session-notes/getCourse',
                                                data: {'stud_id': val, '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                $('#course').html(data);
                                                }
                                        });
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        $.ajax({
                                        type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/session-notes/getSession',
                                                data: {'course_id': '', 'timePeriod': timePeriod, 'studentID': studentID, '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                $('#sessionData').html(data);
                                                }
                                        });
                                        }
                                        function getSession() {
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/session-notes/getSession',
                                                data: {'course_id': course, 'studentID': studentID, 'timePeriod': timePeriod, '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                $('.indexSessionData').hide();
                                                $('#sessionData').html(data);
                                                }
                                        });
                                        }
                                        function getTimePeriodData(val) {
                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/session-notes/getTimePeriodData',
                                                data: {'timePeriod': val, 'studentID': studentID, 'course': course, '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                console.log(data);
                                                $('#sessionNotesData').html(data);
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
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/session/index.blade.php ENDPATH**/ ?>