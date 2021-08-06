<?php

use App\Models\Course;
?>
<div  class="responsive-table">
  <?php if(isset($getAssessment) && count($getAssessment) > 0): ?>

<table  class="table invoice-data-table white border-radius-4 pt-1">

<tbody >

<tr>
 <thead>
   <th>Topic </th>
<th>Start Date</th>
<th>End Date</th>
<th>Status</th>
<th>Upload Result</th>
 </thead>

</tr>

<tbody >
    <?php $__currentLoopData = $getAssessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
<td><?php echo e($val->topic_name); ?></td>
<td><?php echo e(Carbon\Carbon::parse($val->start_date)->format(' jS  F Y ')); ?></td>
<td><?php echo e(Carbon\Carbon::parse($val->end_date)->format(' jS  F Y ')); ?></td>
<?php
$status= '';
if (isset($val->status)) {
    if ($val->status == '1') {
        $status = 'Completed';
    }
    if ($val->status == '0') {
        $status = 'Not Completed';
    }

}
?>
<?php if ($val->status == '0') { ?>  <td style = "color:red;"><?php echo e($status); ?></td>   <?php  }?>
  <?php if ($val->status == '1') { ?>  <td style = "color:green;"><?php echo e($status); ?></td>   <?php  }?>
  <?php if ($val->status == '0') { ?>
  <td><a href="<?php echo e(url('/assessment/upload-result-pdf',['id'=>$val->id])); ?>"    class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</a></td>
<?php  }?>
<?php if ($val->status == '1') { ?>
<td><a href="<?php echo e(url('/assessment/upload-result-pdf',['id'=>$val->id])); ?>"  disabled  class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</a></td>
<?php  }?>
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
<?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/assessment/AssessmentResult.blade.php ENDPATH**/ ?>