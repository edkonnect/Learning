
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/select2/select2-materialize.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/select.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/data-tables.css')); ?>">
<?php if(isset($getData) && count($getData)>0): ?>
<div class="section section-data-tables">
    <div class="row">
        <div class="col s12" id="quizData">
            <table id="page-length-option" class="display">
                <thead>
                    <tr>
                        <th>Grade</th>
                        <!--<th>Lesson Plan</th>-->
                        <!--<th>Course</th>-->
                        <th>Description</th>
                        <th data-orderable='false'>Quizlet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($getData) && count($getData) > 0): ?>
                    <?php $__currentLoopData = $getData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDataKey=>$getDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(isset($getDataVal->grade)?$getDataVal->grade:''); ?></td>
<!--                        <td><?php echo e(isset($getDataVal->getLessonPlan->topic_name)?$getDataVal->getLessonPlan->topic_name:''); ?></td>
                        <td><?php echo e(isset($getDataVal->getCourseDetail->course_name)?$getDataVal->getCourseDetail->course_name:''); ?></td>-->
                        <td style="text-align:justify;"><?php echo e(isset($getDataVal->description)?$getDataVal->description:''); ?></td>
                        <td>
                            <!--<a href="javascript:void(0)" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">-->
                            <a href="<?php echo e(url('/quizes/startQuiz',['id'=>$getDataVal->id])); ?>" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                                Start
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
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
<script src="<?php echo e(asset('vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/form-select2.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/data-tables.js')); ?>"></script><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\quizes\quizDetailView.blade.php ENDPATH**/ ?>