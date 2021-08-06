<?php

use App\Models\LessonPlanDetails;
?>
<?php if(isset($getStudLessonData) && count($getStudLessonData)>0): ?>
<div class="row">                            
    <div class="col s12 m12 20">
        <div class="card ">           
            <ul class="collapsible collapsible-accordion">
                <?php $__currentLoopData = $getStudLessonData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <li>
                    <div class="collapsible-header">
                        <div class="row"> 
                            <div class="col s12 m12 20">
                                <h5 style="font-weight: bold; font-size: 16px;"><?php echo e(isset($val->getLessonPlan->topic_name)?strtoupper($val->getLessonPlan->topic_name):''); ?></h5>
                                <p style="text-align: justify;font-size: 14px;">
                                    <?php echo e(isset($val->getLessonPlan->descr)?$val->getLessonPlan->descr:''); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="collapsible-body">

                        <?php $getSubtopic = LessonPlanDetails::where('lesson_id',$val->lesson_id)->get(); ?>
                        <?php if(isset($getSubtopic) && count($getSubtopic) > 0): ?>
                        <?php $__currentLoopData = $getSubtopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSubtopicKey => $getSubtopicVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">                            
                            <div class="col s12 m12 20">
                                <div class="card ">
                                    <div class="card-content">
                                        <h6 style="font-weight: bold;text-align: left;">Sub Topic-<?php echo e($getSubtopicKey+1); ?></h6>
                                        <p style="text-align: justify;">
                                            <?php echo e(isset($getSubtopicVal->description)?$getSubtopicVal->description:''); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
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
<script src="<?php echo e(asset('js/plugins.js')); ?>"></script><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/coursedetail/lessonDetailView.blade.php ENDPATH**/ ?>