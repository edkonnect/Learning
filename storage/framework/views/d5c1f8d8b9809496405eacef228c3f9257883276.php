



<?php $__env->startSection('title','Edit Send Message'); ?>

<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="seaction">

    <!-- Form Advance -->
    <div class="col s12 m12 l12">
        <div id="Form-advance" class="card card card-default scrollspy">
            <div class="row">
                <div class="card-action">
                    <div class="col m6 s12">
                        <div class="card-title ">
                            <h5 style="font-weight: bold;
                                color: #8b62b5;">Change Status</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <form method="POST" action="<?php echo e(url('/').'/changeStatus'); ?>" accept-charset="UTF-8" enctype="multipart/form-data" id="messagesForm" name="messagesForm">

                  <div class="row">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="mid" value="<?php echo e($mid); ?>" />
                      <div class="input-field col m6 s6">
                        <select class="select2 browser-default"  name="view_status" required>
                          <option>Change Status</option>
                          <option value ="1">Close</option>
</select>
                      </div>
                      </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m9 s12">
                                <a href="<?php echo e(url("/").'/tutor-messages'); ?>" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                            </div>
                            <div class="input-field col m3 s12">
                                <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>

<script src="<?php echo e(asset('js/scripts/advance-ui-modals.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/messages/tutor-form.blade.php ENDPATH**/ ?>