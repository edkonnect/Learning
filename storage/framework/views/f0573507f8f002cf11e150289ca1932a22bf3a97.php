<?php $__env->startSection('title','Upload Homework'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/select.dataTables.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/dropify/css/dropify.min.css')); ?>"><link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/sweetalert/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/data-tables.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
//echo '<pre>';
//print_r($val->getStudHWAttachmentDetail);
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
            <div class="row sessionNotesData">                               
                <div class="col s12 m12 20 indexSessionData">

                    <?php if(isset($getsessionData) && !empty($getsessionData)): ?>
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="row">
                                    <div class="card-action">
                                        <div class="col m6 s12">
                                            <div class="card-title ">
                                                <h5 style="font-weight: bold;
                                                    color: #8b62b5;">Upload Homework</h5></div>
                                        </div>
                                        <div class="col m3 float-right" style="display: none;">
                                            <?php $getTimePeriod = array("1" => "Today", "2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All"); ?>
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
                                        <div class="col m4 s12">
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
                                        <div class="col m4 s12">
                                            <h5>Course</h5>
                                            <div class="input-field">
                                                <select class="select2 browser-default" id="course" required="1" onchange="return getSessionDate(this.value);">
                                                    <option value="">Select Course</option>  

                                                </select>
                                            </div>
                                        </div>
<!--                                    </div>
                                    <div class=" row">-->
                                        <div class=" col s12 m4 20">
                                            <h5>Session Date</h5>
                                            <select class="select2 browser-default" id="sessionDate" onchange="return loadListing(this.value);">
                                                <option value="">Select Session Date</option>                                                   
                                            </select>
                                        </div>
                                        <!--                                                <div class=" col s12 m6 20">
                                                                                            <button type="button" id="uploadButton" disabled class="waves-effect waves-light btn" style="background-color: #736cb5;" onclick="return uploadFiles();">Upload</button>
                                                                                        </div>-->
                                    </div>

                                    <div class="row section" id="uploadFileSection" style="display:none;    margin-top: 30px;"> 
                                        <form method="POST" action="<?php echo e(url('homework-list/uploadFile')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" id="uploadFileForm" name="uploadFileForm">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="col s12 m8 l9">
                                                <input type="file" id="input-file-now" name="uploadedFile[]" multiple="true" required="true" class="dropify" data-default-file="" />
                                                <input type="hidden" id="sessionDateVal" name="sessionDateVal" />
                                                <input type="hidden" id="studentID" name="studentID" />
                                                <input type="hidden" id="sessionID" name="sessionID" />
                                            </div>
                                            <div class="col s12 m4 l3">
                                                <p><button type="submit" id="uploadButton" disabled class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</button></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="uploadedList" style="margin-top: 40px;">
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
    </section>
</div>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>      
<script>
                                                $(document).ready(function () {
                                                <?php if(isset($data)): ?>
                                                        var data = "<?php echo $data; ?>";
                                                $('#course').html(data);
                                                <?php endif; ?>



                                                        <?php if(isset($sessionDate)): ?>
                                                        var s_Date = "<?php echo $sessionDate; ?>";
                                                $('#sessionDate').html(s_Date);
                                                <?php endif; ?>

                                                        <?php if(isset($studentsDrop)): ?>
                                                        var stud_data = "<?php echo $studentsDrop; ?>";
                                                $("#uploadFileSection").css('display', 'block');
                                                $("#uploadButton").prop('disabled', false);
                                                $('#student').html(stud_data);
                                                var sessionDateFile = $("#sessionDate option:selected").text();
                                                $("#sessionDateVal").val(sessionDateFile);
                                                var sessionID = $("#sessionDate").val();
                                                $("#sessionID").val(sessionID);
                                                var studentID = $("#student").val();
                                                $("#studentID").val(studentID);
                                                <?php else: ?>                                                    
                                                $("#uploadFileSection").css('display', 'none');
                                                $("#uploadButton").prop('disabled', true);
                                                <?php endif; ?>
                                                });
                                                $("#uploadFileForm").on("submit", function(e) {
                                                var numFiles = $("input:file", this)[0].files.length;
                                                var countData = $('#totalCount').val();
                                                if (numFiles > 5 || countData >= 5){
                                                e.preventDefault();
                                                swal({
                                                title: 'You are exceeding maximum file limit(5)',
                                                        icon: 'warning'
                                                });
                                                $('.dropify-clear').click();
                                                } else{
                                                e.preventDefault();
                                                var formData = new FormData($(this)[0]);
                                                $.ajax({
                                                url : $(this).attr('action'),
                                                        type: "POST",
                                                        data: formData,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function (data) {
                                                        $('.dropify-clear').click();
                                                        swal({
                                                        title: 'Attachment Added Successfully',
                                                                icon: 'success'
                                                        });
                                                        var valueInput = $('#sessionDate').val();
                                                        loadListing(valueInput);
                                                        },
                                                });
                                                }
                                                });
                                                function loadListing(val) {
                                                if (val != ''){
                                                $("#uploadFileSection").css('display', 'block');
                                                $("#uploadButton").prop('disabled', false);
                                                var sessionDateFile = $("#sessionDate option:selected").text();
                                                $("#sessionDateVal").val(sessionDateFile);
                                                var sessionID = $("#sessionDate").val();
                                                $("#sessionID").val(sessionID);
                                                var studentID = $("#student").val();
                                                $("#studentID").val(studentID);
                                                } else{
                                                $("#uploadFileSection").css('display', 'none');
                                                $("#uploadButton").prop('disabled', true);
                                                }



                                                var sessionDateVal = $("#sessionDateVal").val();
                                                var sessionID = $("#sessionDate").val();
                                                var studentID = $("#student").val();
                                                $.ajax({
                                                type: "post",
                                                        data: {'sessionDateVal': sessionDateVal, 'sessionID':sessionID, 'studentID':studentID, '_token': '<?php echo e(csrf_token()); ?>'},
                                                        url: '<?php echo e(url("/")); ?>' + '/homework-list/getListing',
                                                        success: function (data) {
                                                        $('#uploadedList').html(data);
                                                        }
                                                });
                                                }


                                                function uploadFiles() {
                                                $("#uploadFileSection").css('display', 'block');
                                                }

                                                function getCourse(val) {
                                                $('#sessionDate').html("<option value=''>Select Session Date</option>");
                                                $("#uploadFileSection").css('display', 'none');
                                                $("#uploadButton").prop('disabled', true);
                                                $.ajax({
                                                type: "post",
                                                        url: '<?php echo e(url("/")); ?>' + '/session-notes/getCourse',
                                                        data: {'stud_id': val, '_token': '<?php echo e(csrf_token()); ?>'},
                                                        success: function (data) {
                                                        $('#course').html(data);
                                                        }
                                                });
                                                }
                                                function getSessionDate() {
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
                                                        url: '<?php echo e(url("/")); ?>' + '/getSessionDate/' + studentID + '/' + course,
                                                        success: function (data) {
                                                        $('#sessionDate').html(data);
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

<script src="<?php echo e(asset('vendors/dropify/js/dropify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/form-file-uploads.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/data-tables.js')); ?>"></script>

<script src="<?php echo e(asset('js/scripts/ui-alerts.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/homework/upload.blade.php ENDPATH**/ ?>