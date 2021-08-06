
<?php if(count($getListing) > 0): ?>
<hr>
<h5>Uploaded Documents</h5>
<div class="row">
    <div class="col s12">
        <input type="hidden" value="<?php echo e(count($getListing)); ?>" id="totalCount" />
        <table id="page-length-option" class="display">
            <thead>
                <tr>
                    <th style="text-align: center">S.No</th>
                    <th style="text-align: center">Session Date</th>
                    <th style="text-align: center">Uploaded On</th>
                    <th style="text-align: center">View Document</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $getListing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $studUserName = $val->getStudentDetail($val->getSessionDetail->student_id);
                $parentUserName = $val->getParentDetail($val->getSessionDetail->student_id);
                ?>
                <tr>
                    <td style="text-align: center"><?php echo e($key+1); ?></td>
                    <td style="text-align: center"><?php echo e(isset($val->getSessionDetail->session_date) ? date('l jS \of F Y h:i:s A',strtotime($val->getSessionDetail->session_date)) : ''); ?></td>
                    <td style="text-align: center"><?php echo e(isset($val->created_at) ? date('l jS \of F Y h:i:s A',strtotime($val->created_at)) : ''); ?></td>
                    <td style="text-align: center">
                        <a href="<?php echo e(url("/")); ?>/uploads/<?php echo e($parentUserName->username . '/' .$val->attachment_link); ?>" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">View</a>
                    </td>
                    <td style="text-align: center">
                        <a href="javascript:void(0);" data-id="<?php echo e($val->id); ?>" onclick="return deleteListing(<?php echo e($val->id); ?>);" id="deleteAttachment" class="waves-effect waves-light btn" style="background-color: #736cb5;">Delete</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<script>
    function deleteListing(val){

    swal({
    title: "Are you sure?",
            text: "You will not be able to recover this file!",
            icon: 'warning',
            dangerMode: true,
            buttons: {
            cancel: 'No, Please!',
                    delete: 'Yes, Delete It'
            }
    }).then(function (willDelete) {
    if (willDelete) {
    swal("Your file has been deleted!", {
    icon: "success",
    });
    var deleteID = val;
    $.ajax({
    url: '<?php echo e(url("/")); ?>' + '/homework-list/destroy',
            type: "POST",
            data: {"deleteID":deleteID, '_token': '<?php echo e(csrf_token()); ?>'},
            success: function (data) {
            var valueInput = $('#sessionDate').val();
            loadListing(valueInput);
            },
    });
    } else {
    swal("Your file is safe", {
    title: 'Cancelled',
            icon: "error",
    });
    }
    });
    }
</script>
<?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/homework/uploadList.blade.php ENDPATH**/ ?>