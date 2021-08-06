



<?php $__env->startSection('title','Chat'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/app-chat.css')); ?>">
<?php $__env->stopSection(); ?>

<?php // echo '<pre>';
//print_r($getData); die;
?>


<?php $__env->startSection('content'); ?>
<div class="chat-application">
    <div class="app-chat">
        <div class="content-area content-right">
            <div class="app-wrapper">

                <div class="card">
                    <div class="row">
                        <div class="col m10 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;text-align: center;">Show Messages</h5></div>
                        </div>
                        <div class="col m2 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;color: #8b62b5;text-align: right;">
                                    <a href="<?php echo e(url('/')); ?>/tutor-messages" class="waves-effect waves-light btn modal-trigger mb-2 mr-1" style="background-color: #736cb5;">Back</a></h5></div>
                        </div>
                    </div>
                    <div class="card-content chat-content p-0">

                        <!-- Content Area -->
                        <div class="chat-content-area">
                            <div class="chat-area" style="height: auto;">

                                <div class="card" style="box-shadow: 1px 2px 10px #999;border-radius: 20px;">
                                    <div class="row">
                                        <div class="card-action">
                                            <div class="col m12 s12">
                                                <div class="card-title ">
                                                    <h5 style="font-weight: bold;
                                                        color: #8b62b5;text-align: left;"><?php echo e(isset($getData->getUserDetail->name)?$getData->getUserDetail->name:''); ?></h5></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(isset($getData)): ?>
                                    <div class="row">
                                        <div class="col s12 m4 20">
                                            <div class="card-action " style="text-align: left;">
                                                <h6 style="font-weight: bold;color: #8b62b5;">Reason : <?php echo e(isset($getData->getReason->reason)?$getData->getReason->reason:''); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 20">
                                            <div class="card-action " style="text-align: center;">
                                                <h6 style="font-weight: bold;color: #8b62b5;">Status : <?php echo e(isset($getData->status)?$getData->status:''); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 20">
                                            <div class="card-action " style="text-align: right;">
                                                <h6 style="font-weight: bold;color: #8b62b5;">Date Time : <?php echo e(Carbon\Carbon::parse($getData->date)->format(' jS  F Y ').''.$getData->time); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chats">
                                        <div class="chats">
                                            <div class="chat">
                                                <div class="chat-body">
                                                    <div class="chat-text">
                                                        <p><?php echo e(isset($getData->message_text)?$getData->message_text:''); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(isset($getData->getReply->message_text)): ?>
                                <div class="chats">
                                    <div class="chats">
                                        <!--                                        <hr>-->
                                        <div class="card" style="box-shadow: 1px 2px 10px #999;border-radius: 20px;">

                                            <div class="row">
                                                <div class="card-action">
                                                    <div class="col m12 s12">
                                                        <div class="card-title ">
                                                            <h5 style="font-weight: bold;
                                                                color: #8b62b5;text-align: right;">Admin Reply</h5></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card-action " style="text-align: right;">
                                                        <h6 style="font-weight: bold;color: #8b62b5;">Date Time : <?php echo e(isset($getData->getReply->created_at)?$getData->getReply->created_at:''); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-right">
                                                <div class="chat-body">
                                                    <div class="chat-text">
                                                        <p><?php echo e(isset($getData->getReply->message_text)?$getData->getReply->message_text:''); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!--/ Content Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    
    <?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('js/scripts/app-chat.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/messages/showMsg.blade.php ENDPATH**/ ?>