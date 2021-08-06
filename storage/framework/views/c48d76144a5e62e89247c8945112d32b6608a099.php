<?php
//echo '<pre>';
//        print_r($getsessionData);
//        die;
?>
<?php if(isset($getsessionData) && !empty($getsessionData) && count($getsessionData)>0): ?>
<div class="row sessionNotesData">
    <?php $__currentLoopData = $getsessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                               
    <div class="col s12 m12 20 indexSessionData">
        <div class="card ">
            <div class="card-title " style="text-align: center; padding: 10px">
                <h5 style="font-weight: bold;"><?php echo e(isset($vals->topic_name)?strtoupper($vals->topic_name):''); ?></h5>
            </div>

            <div class=" row">
                <div class=" col s12 m6 20">
                    <div class=" card-action " style="text-align: left;font-size: 14px;">
                        <strong>Session Date : </strong> <?php echo e(date('l jS \of F Y h:i:s A',strtotime($vals->session_date))); ?>

                    </div>
                </div>
                <div class=" col s12 m6 20">
                    <div class=" card-action " style="text-align: right;font-size: 14px;">
                        <?php
                        $dateTime = new DateTime($vals->session_date);
                        $dateTime->modify('+7 day');
                        ?>
                        <strong>Session Due date : </strong> <?php echo e(($dateTime->format("l jS \of F Y h:i:s A"))?$dateTime->format("l jS \of F Y h:i:s A"):''); ?>

                    </div>
                </div>
            </div>
            <?php if(count($vals->getHWAttachmentDetail)>0): ?>
            <div class="card-content">
                <div class=" row">
                    <?php $__currentLoopData = $vals->getHWAttachmentDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyAttach=>$valAttch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class=" col s12 m3">
                        <div class=" card-action" style="text-align: center">
                            Homework - <?php echo e($keyAttach+1); ?><a href="<?php echo e(url("/")); ?>/<?php echo e($valAttch->attachment_link); ?>" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Download</a>
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
<?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/homework/homeworkListDetailView.blade.php ENDPATH**/ ?>