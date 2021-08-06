<?php

use App\Models\Course;
?>




<?php $__env->startSection('title','ASSIGN COURSE CURRICULUM'); ?>

<?php $__env->startSection('vendor-style'); ?>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
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
                                        color: #8b62b5;">ASSIGN CURRICULUM</h5></div>
                            </div>
                        </div>
                    </div>
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
                    <div class="card-content">
                      <form method="POST" action="<?php echo e(url('assign-curriculum/upload')); ?>" accept-charset="UTF-8"  >
                          <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="student" name="student" required="1" >
                                                        <option value="">Select Student</option>

                                        <?php $__currentLoopData = $Students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m6 s12">
                                    <h5>Course</h5>
                                    <div class="input-field">
                                        <select class="select2 browser-default" id="course" name="course" required="1" onchange="return getCurriculum(this.value);">
                  <option value="">Select Course</option>

                                            <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>


                      </div>
                        <div id = "assign">
                          <div class="row">
                              <div class="col m12 s12">
                                  <h5>Assign  Curriculum</h5>
                                  <div class="input-field">
                                      <select class="select2 browser-default" id='myselect' multiple name="lesson[]" required="1" >
                                        <option value="">------ SELECT LESSON ------</option>

                                        <?php $__currentLoopData = $lesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                      </select>
                                  </div>
                              </div>
                           </div>
                                     <div class="row">
                                  <div class="col m6 s12">
                                      <h5>Start Date</h5>
                                      <div class="input-field">
                                          <input type="date" id="start_date" name ="start_date"></input>

                                      </div>
                                  </div>

                                      <div class="col m6 s12">
                                          <h5>End Date</h5>
                                          <div class="input-field">
                                              <input type="date"id="end_date" name ="end_date"></input>

                                          </div>
                                      </div>
                                    </div>


                          </div>
                <button type="submit" class="waves-effect waves-light btn" style="background-color: #736cb5;">Save</a>

        </form>
            </div>
        </div>
    </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>          
            <script>
                                        $(document).ready(function () {
                                        <?php if(isset($data)): ?>
                                                var data = "<?php echo $data; ?>";
                                        $('#lesson').html(data);
                                        <?php endif; ?>
                                        });



                                   function getStudent(){
                                      var student = $("#student").val();

                                   }
                                   function getCurriculum() {

                                   var student = $("#student").val();
                                   var course = $("#course").val();
                                   $.ajax({
                                   data:{'student':student, 'course':course, '_token': '<?php echo e(csrf_token()); ?>'},
                                           type: "post",
                                           url: '<?php echo e(url("/")); ?>' + '/assign-curriculum/get-curriculum',
                                           success: function (data) {
                                           $('#assign').html(data);
                                           }
                                   });
                                   }

                                   $('#myselect').select2({
                                      width: '100%',

    //placeholder: "Choose Lesson",
                                       theme: "classic",
                             allowClear: true

                            });

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

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\curriculum\index.blade.php ENDPATH**/ ?>