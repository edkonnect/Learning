<?php
//echo '<pre>';
//        print_r($getTopicDetails);
//        die;
?>
<?php if(isset($getTopicDetails) && !empty($getTopicDetails) && count($getTopicDetails)>0): ?>
<div class="row">                            
    <div class="col s12 m12 20">

        <?php $__currentLoopData = $getTopicDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

        <div class="card ">
            <div class="card-title " style="text-align: left; padding: 10px">
                <h6 style="font-weight: bold;"><?php echo e(isset($vals->topic)?$vals->topic:''); ?></h6>
            </div> 
            <?php if(isset($vals->getTopicFiles) && count($vals->getTopicFiles) > 0): ?>
            <?php $i = 0; ?>
            <div class=" row sessionNotesData">
                <?php $__currentLoopData = $vals->getTopicFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php $i++; ?>
                <div class=" col s12 m4 20">
                    <div class=" card-action " style="text-align: left;">
                        <p style="text-align: left;margin-top: revert;">
                            <a href="<?php echo e(url("/").$value->location.$value->filename); ?>"                               title="<?php echo e($value->description); ?>" target="_blank"><?php echo e(isset($value->topic_name)?$value->topic_name:''); ?></a>

                        </p>
                    </div>
                </div>
                <?php if($i % 3 == 0 ): ?>
            </div>
            <div class=" row sessionNotesData">
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                <?php else: ?>
                <div class="card-content " style="text-align: center;">
                    <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                        <div class=" card-content green-text">
                            <p style="text-align: center;">No Data Found</p>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            </div>
        

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>         
<?php else: ?>
<div class="card-content " style="text-align: center;">
    <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
        <div class=" card-content green-text">
            <p style="text-align: center;">No Data Found</p>
        </div>
    </div>
</div>
<?php endif; ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
//    var countData = "<?php echo e(count($getTopicDetails)); ?>";
//    if (countData == 0) {
//        $("#noSession").css("display", 'block');
//    }
//    if ($(".sessionNotesData:hidden").length == 0) {
//        $("#seeMore").css("display", 'none');
//
//    }
//    $(".sessionNotesData").slice(0, 2).show();
//    $("#seeMore").click(function (e) {
//        e.preventDefault();
//        $(".sessionNotesData:hidden").slice(0, countData).fadeIn("slow");
//        if ($(".sessionNotesData:hidden").length == 0) {
//            $("#seeMore").css("display", 'none');
//            $("#noSession").css("display", 'none');
//        }
//    });
})
</script><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/printables/topicsList.blade.php ENDPATH**/ ?>