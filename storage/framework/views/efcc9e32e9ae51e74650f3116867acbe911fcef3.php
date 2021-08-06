<?php $__env->startSection('title','Messages'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/select.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/data-tables.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<style>
    .text-wrap{
        white-space:normal;
    }
    .width-200{
        width:300px;
    }

</style>
<!-- users list start -->
<section class="users-list-wrapper section">
    <div class="users-list-table">
        <?php if(Session::has('success')): ?>

        <div class="card-alert card green lighten-5">
            <div class="card-content green-text">
                <p>SUCCESS : <?php echo e(Session::get('success')); ?></p>
            </div>
            <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php endif; ?>
        <?php if(Session::has('error')): ?>

        <div class="card-alert card red lighten-5">
            <div class="card-content red-text">
                <p>FAILED : <?php echo e(Session::get('error')); ?></p>
            </div>
            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="row">
                <div class="card-action">
                    <div class="col m6 s12">
                        <div class="card-title ">
                            <h5 style="font-weight: bold;
                                color: #8b62b5;">Messages</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="section section-data-tables">
                    <div class="row">
                        <div class="col s12">
                            <!--<table id="users-list-datatable" class="table">-->
                            <table id="page-length-option" class="display">
                                <thead>
                                    <tr>
                                        <th style="display:none;">S.No</th>
                                        <th>Date Time</th>
                                        <th>From</th>
                                        <th>Reason</th>
                        <th data-orderable='false'>View Message</th>
                                        <th style="display:none;">View Status</th>
                                        <th>Status</th>
                                        <th data-orderable='false'>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($getData) && count($getData) > 0): ?>
                                    <?php $__currentLoopData = $getData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDataKey=>$getDataVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: center; display: none;"><?php echo e($getDataKey+1); ?></td>
                                        <td><?php echo e(Carbon\Carbon::parse($getDataVal->date)->format(' jS  F Y ').''.$getDataVal->time); ?></td>

                                        <td><?php echo e(isset($getDataVal->username)?$getDataVal->username:''); ?></td>
                                        <td><?php echo e(isset($getDataVal->reason)?$getDataVal->reason:''); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('tutor-messages/show',['id'=>$getDataVal->id])); ?>"><i class="material-icons">remove_red_eye</i></a>
                                        </td>
                                    
                                        <td>
                                            <?php if(isset($getDataVal->status) && $getDataVal->status=='Closed'): ?>
                                            <span class="chip green lighten-5">
                                                <span class="green-text">Closed</span>
                                            </span>
                                            <?php else: ?>
                                            <span class="chip red lighten-5">
                                                <span class="red-text">Open</span>
                                            </span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php if(isset($getDataVal->status) && $getDataVal->status!='Closed'): ?>
                                            <a href="<?php echo e(url('tutor-messages/edit',['id'=>$getDataVal->id])); ?>"><i class="material-icons">edit</i></a>
                                            <?php else: ?>
                                            <a href="javascript:void(0)" style="pointer-events: none; cursor: default;color: #9fa6ad;"><i class="material-icons">backspace</i></a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- datatable ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- users list ends -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>

<script src="<?php echo e(asset('js/scripts/data-tables.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/advance-ui-modals.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/ui-alerts.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/messages/TutorIndex.blade.php ENDPATH**/ ?>