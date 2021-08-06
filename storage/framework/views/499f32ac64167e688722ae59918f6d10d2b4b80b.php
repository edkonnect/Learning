<?php
//echo '<pre>';
//print_r($getSessionData); die;
?>
<?php if(isset($getSessionData) && count($getSessionData) >0): ?>
    <table id="page-length-option" class="display">
        <thead>
            <tr>
                <th style="font-size: 20px;">Course</th>
                <th style="font-size: 20px;">Tutor</th>
                <th style="font-size: 20px;">Month & Year</th>
                <th style="font-size: 20px;">Total Sessions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $getSessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(isset($vals->getCourseDetail->course_name)?strtoupper($vals->getCourseDetail->course_name):''); ?></td>
                <td><?php echo e(isset($vals->getTutorDetail->name)?strtoupper($vals->getTutorDetail->name):''); ?></td>
                <td><?php echo e(isset($vals->sessionDate)?date('F, Y',strtotime($vals->sessionDate)):''); ?></td>
                <td><?php echo e(isset($vals->total)?$vals->total:''); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
<div class=" card-alert card green lighten-5" id="noSession" style="text-align: center">
    <div class=" card-content green-text">
        <p>No Sessions Found</p>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/session/getTutorCourseSessions.blade.php ENDPATH**/ ?>