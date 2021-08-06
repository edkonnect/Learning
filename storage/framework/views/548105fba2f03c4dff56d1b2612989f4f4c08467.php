<?php $__env->startSection('title','User Profile Page'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/select.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/user-profile-page.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/data-tables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/app-invoice.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<style>
    .input-field .prefix{
        position: relative !important;
    }
    .dropify-wrapper{
        height: 130px !important;
    }
    #profile-dropdown{
        height: auto !important;
    }
</style>
<div class="section">
    <div class="col s12 m12 l12">
        <div id="Form-advance" class="card card card-default scrollspy">
            <div class="row">
                <div class="card-action">
                    <div class="col m6 s12">
                        <div class="card-title ">
                            <h5 style="font-weight: bold;
                                color: #8b62b5;">Edit Profile</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">

                <form method="POST" action="<?php echo e(url('/').'/userprofile/storeUserData'); ?>" accept-charset="UTF-8" enctype="multipart/form-data" id="profileForm" name="profileForm">

                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input class="form-control" required="true" value="<?php echo e(isset($getUserData->name)?$getUserData->name:''); ?>"  id="name" name="name" type="text"  maxlength="30">
                            <label for="icon_prefix">Name<span style="color: red;">*</span></label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input class="form-control validate" value="<?php echo e(isset($getUserData->phone)?$getUserData->phone:''); ?>"  id="phone" name="phone" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10">
                            <small>Format: 1234536768</small>
                            <label for="icon_telephone">Telephone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_balance</i>
                            <input class="form-control" value="<?php echo e(isset($getUserData->education_qualification)?$getUserData->education_qualification:''); ?>"  id="education_qualification" name="education_qualification" type="text"  maxlength="50">
                            <label for="icon_prefix">Education Qualification</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">av_timer</i>
                            <input class="form-control validate" value="<?php echo e(isset($getUserData->no_of_years_taught)?$getUserData->no_of_years_taught:''); ?>"  id="no_of_years_taught" name="no_of_years_taught" type="tel" pattern="[0-9]{2}" maxlength="2">
                            <label for="icon_telephone">No. of years taught</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">assistant_photo</i>
                            <textarea id="experience_summary" name="experience_summary" class="materialize-textarea"><?php echo e(isset($getUserData->experience_summary)?$getUserData->experience_summary:''); ?></textarea>
                            <label for="icon_prefix">Experience Summary</label>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="removeImgresume" id="removeImgresume" />
                        <div class="input-field col s3">
                            <i class="material-icons prefix">attach_file</i>
                            <label for="profile_image">Resume</label>
                        </div>
                        <div class="input-field col s9">
                            <input type="file" id="resume" name="resume" class="dropify" data-id='1' data-allowed-file-extensions='["doc", "pdf"]' data-default-file="<?php echo e(isset($getUserData->resume) && $getUserData->resume!=''?url('/').'/uploads/'.$getUserData->username.'/resume/'.$getUserData->resume:''); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="removeImg" id="removeImg" />
                        <div class="input-field col s3">
                            <i class="material-icons prefix">add_a_photo</i>
                            <label for="profile_image">Profile Image</label>
                        </div>
                        <div class="input-field col s9">
                            <input type="file" id="input-file-now" name="profile_image" class="dropify" data-id='2' data-default-file="<?php echo e(isset($getUserData->profile_image) && $getUserData->profile_image!=''?url('/').'/uploads/'.$getUserData->username.'/profile_image/'.$getUserData->profile_image:''); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m9 s12">                        
                                <a href="<?php echo e(url("/").'/userProfile'); ?>" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).on("click", ".dropify-clear", function (event) {
    var profile_remove = $('#input-file-now').attr('data-id');
    var resume_remove = $('#resume').attr('data-id');
//    alert(profile_remove);
//    alert(resume_remove);
    if (profile_remove == 2) {
        $('#removeImg').val('1');
    }
    if (resume_remove == 1) {
        $('#removeImgresume').val('1');
    }

});

$("#profileForm").on("submit", function (e) {
    e.preventDefault();
    var filename = $('.dropify-errors-container ul li').text();
    if (filename != '') {
        swal({
            title: 'Invalid File Type',
            icon: 'error'
        });
        return false;
    }
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            swal({
                title: 'Profile Updated Successfully',
                icon: 'success'
            });
            setTimeout(function () {
                var urlRedirect="<?php echo e(url('/userProfile')); ?>";
                window.location.href=urlRedirect;
            }, 1500);
        },
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/dropify/js/dropify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>

<script src="<?php echo e(asset('js/scripts/data-tables.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/advance-ui-modals.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/ui-alerts.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/app-invoice.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/form-file-uploads.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/form-elements.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\dashboard\user-profile-edit.blade.php ENDPATH**/ ?>