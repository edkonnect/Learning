<?php
//echo '<pre>';
//print_r($getsessionData); die;
?>
<?php if(isset($getsessionData) && !empty($getsessionData)): ?>
<div class=" row sessionNotesData" style="display: none;">
    <?php $__currentLoopData = $getsessionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class=" col s12 m12 20 indexSessionData">
        <div class=" card ">
            <div class=" card-alert card " style="background-color: #8862b5;">
                <div class=" row ">
                    <div class=" col s12 m6 20">
                        <div class=" card-action " style="text-align: left;color: white;font-size: 14px;">
                            <?php echo e('Session Date : '.date('l jS \of F Y h:i:s A',strtotime($vals->session_date))); ?>

                        </div>
                    </div>
                    <div class="col s12 m2 20">
                        <div class="card-action " style="text-align: center; color: white;">
                            <?php echo e(isset($vals->demo) && $vals->demo == 'Yes'?'Demo':''); ?>

                        </div>
                    </div>
                    <div class="col s12 m4 20">
                        <div class="card-action " style="text-align: right; color: white;">
                            <a style="color: white;" href="<?php echo e(url("/")); ?>/Tutorprofile/Edkonnect/E/<?php echo e($vals->getTutorDetail->name); ?>.pdf" target="_blank"><?php echo e(isset($vals->getTutorDetail->name)?ucfirst('Tutor : '.$vals->getTutorDetail->name):''); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" card-title " style="text-align: center;">
                <h5 style="font-weight: bold;"><?php echo e(isset($vals->topic_name)?strtoupper($vals->topic_name):''); ?></h5>
            </div>

            <div class="row">
                                            <div class="card-action " style="text-align: center; display: none;font-size: 14px;">
                                                <h6 style="font-weight: bold;">Session Date - <?php echo e(date('l jS \of F Y h:i:s A',strtotime($vals->session_date))); ?></h6>
                                            </div>
                                        </div>
            <div class=" card-content " style="text-align: center;">
                <p style="text-align: justify;">
                    <strong>Notes-</strong> <?php echo e(isset($vals->session_notes)?$vals->session_notes:''); ?>

                </p>
                <p style="text-align: center;"><a href="<?php echo e(url('/getHomework',['session_id' => $vals->id,'student_id'=>$vals->student_id,'course_id'=>$vals->course_id])); ?>" class="waves-effect waves-light btn" style="background-color: #736cb5;    margin-top: 20px;">Click here for Homework</a></p>
            </div>
            <!--            <div class=" card-alert card " style="background-color: #8862b5;">
                            <div class=" row">
                                <div class=" col s12 m6 20">
                                    <div class=" card-action " style="text-align: left;color: white;">
                                        <?php echo e(isset($vals->demo) && $vals->demo == 'Yes'?'Demo':''); ?>

                                    </div>
                                </div>
                                <div class=" col s12 m6 20">
                                    <div class=" card-action " style="text-align: right;color: white;">
            <?php
//                            $diffTime = Helper::time_elapsed_string($vals->session_date);
////                                                print_r($diffTime); die;
//                            $diff = $diffTime['diff'];
//                            $time = $diffTime['time'];
            ?>
                                        <?php echo e(isset($diff)?$diff.' ':''); ?>

                                    </div>
                                </div>
                            </div>
                        </div>-->
        </div>
    </div>
    <?php if($keys % 2 != 0 ): ?>
</div>
<div class=" row sessionNotesData" style="display: none;">
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class=" row">
    <p style="text-align: center;"><a href="#!" id="seeMore" class=" waves-effect waves-light btn " style="background-color: #736cb5;">View More</a></p>
</div>
<div class=" card-alert card green lighten-5" id="noSession" style="display: none;margin: auto;width: 50%; text-align: center">
    <div class=" card-content green-text">
        <p>No Sessions Found</p>
    </div>
</div>
<?php endif; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    var countData = "<?php echo e(count($getsessionData)); ?>";

    var timePeriod = $("#timePeriod").val();
    if (timePeriod == 6) {
        $(".sessionNotesData").slice(0, countData).show();
    } else {
        $(".sessionNotesData").slice(0, 1).show();
    }
    if (countData == 0) {
        $("#noSession").css("display", 'block');
    }
    if (countData <= 2 ) {
        $("#seeMore").css("display", 'none');
    }
    if ($(".sessionNotesData:hidden").length == 0) {
        $("#seeMore").css("display", 'none');

    }
    $("#seeMore").click(function (e) {
        e.preventDefault();
        $(".sessionNotesData:hidden").slice(0, countData).fadeIn("slow");
        if ($(".sessionNotesData:hidden").length == 0) {
            $("#seeMore").css("display", 'none');
            $("#noSession").css("display", 'none');
        }
    });
})
</script><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/session/sessionDetailView.blade.php ENDPATH**/ ?>