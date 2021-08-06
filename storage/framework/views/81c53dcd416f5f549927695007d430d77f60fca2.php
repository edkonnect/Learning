<?php

use App\Models\Course;
?>




<?php $__env->startSection('title','Add Student'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/sweetalert/sweetalert.css')); ?>">

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
<style>
  ::placeholder{
    color:black;
    opacity: 0.75;
  }
</style>
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
                                        color: #8b62b5;">Add Student</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
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
                      <form method="post" action="<?php echo e(url('/save-student')); ?>">
                       <?php echo e(csrf_field()); ?>

<table class="table table-borderless" sytle="border:0px !important;" id="dynamicAddRemove">
                     <tbody>
                     <tr >
                       <td>

                                <select name ="addMoreInputFields[0][username]" class="select2 browser-default">
                                  <option value="">Select Parent</option>
                                  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     </select></td>
                         <td><input type="text" name="addMoreInputFields[0][firstName]" placeholder="Enter First Name" class="form-control" />
                         </td>
                         <td><input type="text" name="addMoreInputFields[0][lastName]" placeholder="Enter Second Name" class="form-control" />
                         </td>
                      </tr>
                <tr>
             <td>              <div class="input-field">
               <select  class="select2 browser-default" name="addMoreInputFields[0][grade]" >

                                          <option value="">Select Grade</option>

                                        <option value="GR1"> Grade1</option>
                                          <option value="GR2"> Grade2 </option>
                                          <option value="GR3"> Grade3 </option>
                                          <option value="GR4"> Grade4 </option>
                                          <option value="GR5"> Grade5 </option>
                                          <option value="GR6"> Grade6 </option>
                                          <option value="GR7"> Grade7 </option>
                                          <option value="GR8"> Grade8 </option>
                                          <option value="GR9"> Grade9 </option>
                                          <option value="GR10"> Grade10</option>
                                            <option value="GR11"> Grade11 </option>
                                            <option value="GR12"> Grade12 </option>
                                          </select></td>

             <td>
            <select   class="select2 browser-default" name="addMoreInputFields[0][course_id]"  id="course"  required="1" >
         <option value="">Select Course</option>
             <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?>

                       </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </select></td>
               <td>
            <select class="select2 browser-default" name="addMoreInputFields[0][tutor_id]"  id="tutor"  required="1" >
          <option value="">Select Tutor</option>
             <?php $__currentLoopData = $tutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e(strtoupper($val)); ?>

                       </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </select></td>
</tr><tr><td><b> Effictive Date</b><input type ="Date" class="form-control" name="addMoreInputFields[0][eff_date]"/></td>
  <td><b>End Date</b><input type ="Date" class="form-control" name="addMoreInputFields[0][end_date]"</td>


             <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary" style="background-color: #736cb5;">+</button></td>

           </tr>

           </tbody>

       </table>
       <div class="row">
           <div class="col m6 s12">

               <div class="input-field">


                 <button type="submit" class="waves-effect waves-light btn" style="background-color: #736cb5;">Save</button>

               </div>
           </div>
         </div>

         <div class="row">
           <div class="col m6 s12">
               <div class="input-field" name="addMoreInputFields[0][hidden]">
           </div>
         </div>


</form>

                </div>

            </div>
        </div>
    </div>
    </section>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
          ++i;
          $("#dynamicAddRemove").append('<tbody><tr><td><select name ="addMoreInputFields[' + i +'][username]" class="select2 browser-default"><option value=""><?php echo e("Select Parent"); ?><?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>"><?php echo e($val); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><input type="text" name="addMoreInputFields[' + i +
              '][firstName]" placeholder="Enter First Name" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
                  '][lastName]" placeholder="Enter Last Name" class="form-control" /></td></tr><tr><td><select name ="addMoreInputFields[' + i +'][grade]" class="select2 browser-default"><option value=""><?php echo e("Select Grade"); ?><option value="GR1">Grade1</option><option value="GR2">Grade2</option><option value="GR3">Grade3</option><option value="GR4">Grade4</option><option value="GR5">Grade5</option><option value="GR6">Grade6</option><option value="GR7">Grade7</option><option value="GR8">Grade8</option><option value="GR9">Grade9</option><option value="GR10">Grade10</option><option value="GR11">Grade11</option><option value="GR12">Grade12</option></select></td><td><select name ="addMoreInputFields[' + i +'][course_id]" class="select2 browser-default"><option value=""><?php echo e("Select Course"); ?><?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>"><?php echo e($val); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><select name ="addMoreInputFields[' + i +'][tutor_id]" class="select2 browser-default"><option value=""><?php echo e("Select Tutor"); ?><?php $__currentLoopData = $tutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>"><?php echo e($val); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td></tr><tr><td><b>Effictive Date</b><input type="date" class="form-control" name="addMoreInputFields['+ i +'][eff_date]"/></td><td><b>End Date</b><input type ="Date" class="form-control" name="addMoreInputFields['+ i +'][end_date]"/></td></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr></tbody>'
              );
      });
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tbody').remove();
        });

    </script>
            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('vendor-script'); ?>
            <script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
            <?php $__env->stopSection(); ?>

            
            <?php $__env->startSection('page-script'); ?>
            <script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
            <script src="<?php echo e(asset('js/scripts/ui-alerts.js')); ?>"></script>
            <script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>

            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/RegisterUser/addStudent.blade.php ENDPATH**/ ?>