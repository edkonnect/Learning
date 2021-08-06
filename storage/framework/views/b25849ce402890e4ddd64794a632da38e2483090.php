<?php if(isset($getsessionData) && count($getsessionData) > 0): ?>
<table id="datatableDataRenderView" class="display">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Month & Year</th>
            <th>Total Sessions Completed</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($getsessionData) && count($getsessionData) > 0): ?>
        <?php $__currentLoopData = $getsessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDataKeys=>$getDataVals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(isset($getDataVals->getStudentDetail)?$getDataVals->getStudentDetail->name:''); ?></td>
            <td><?php echo e(isset($getDataVals->getCourseDetail->course_name)?$getDataVals->getCourseDetail->course_name:''); ?></td>
            <td><?php echo e(isset($getDataVals->sessionDate)?date('F, Y',strtotime($getDataVals->sessionDate)):''); ?></td>
            <td><?php echo e(isset($getDataVals->totalSessions)?$getDataVals->totalSessions:''); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>
<?php endif; ?>

<script>
    $(document).ready(function () {
        $('#datatableDataRenderView').DataTable({
//    "responsive": true,
//        "scrollX": true,
            autoWidth: false,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ], columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: 1
                }
            ],
        });
    });
</script><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\session\numberOfSessionView.blade.php ENDPATH**/ ?>