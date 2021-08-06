<?php $__env->startSection('title','Printables'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
//echo '<pre>';
//print_r($getCourseDetail);
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
                                        color: #8b62b5;">Printables</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

                        <div class="row">
                            <div class="col m12 s12">
                                <h5>Course</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="course" name="course" required="1" onchange="return getTopics(this.value);">
                                        <option value="">Select Course</option>
                                        <?php if(isset($getCourseDetail)): ?>
                                        <?php $__currentLoopData = $getCourseDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($val->id); ?>"><?php echo e(strtoupper($val->course_name)); ?></option>                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="upcomingSessions">

                            <div class="col s12 m4 center preLoader" style="display: none;width: 100px;height: 100px;position: absolute;top:0;bottom: 0;left: 0;right: 0;margin: auto;">
                                <div class="preloader-wrapper active">
                                    <div class="spinner-layer spinner-red-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="gap-patch">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
                                        function getTopics(val) {
                                            $(".preLoader").css("display", "block");
                                            $.ajax({
                                                type: "post",
                                                url: '<?php echo e(url("/")); ?>' + '/printables/getTopics',
                                                data: {'course_id': val, '_token': '<?php echo e(csrf_token()); ?>'},
                                                success: function (data) {
                                                    $(".preLoader").css("display", "none");
                                                    $('#upcomingSessions').html(data);
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
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\printables\index.blade.php ENDPATH**/ ?>