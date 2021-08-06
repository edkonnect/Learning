<?php

use App\Models\Course;
?>
<?php if(isset($getAssessment) && count($getAssessment) > 0): ?>

<table  class="table invoice-data-table white border-radius-4 pt-1">

<tbody >

<tr>
<thead>
 <th>Topic </th>
<th>Start Date</th>
<th>End Date</th>
<th>Assessment</th>
</thead>

</tr>

<tbody id ="Assessment">
  <?php $__currentLoopData = $getAssessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($val->topic_name); ?></td>
<td><?php echo e(Carbon\Carbon::parse($val->start_date)->format(' jS  F Y ')); ?></td>
<td><?php echo e(Carbon\Carbon::parse($val->end_date)->format(' jS  F Y ')); ?></td>

<td><a href="<?php echo e(url('/assessment/test',['id'=>$val->id])); ?>"   target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Launch</a></td>
</tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php else: ?>
    <div class="card-content " style="text-align: center;">
        <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
            <div class=" card-content green-text">
                <p>No Data Found</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</table>

<script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/assessment/assessments.blade.php ENDPATH**/ ?>