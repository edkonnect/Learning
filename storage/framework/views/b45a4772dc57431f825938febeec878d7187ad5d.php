<!-- BEGIN VENDOR JS-->
<script src="<?php echo e(asset('js/vendors.min.js')); ?>"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<?php echo $__env->yieldContent('vendor-script'); ?>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('js/search.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom/custom-script.js')); ?>"></script>
<?php if($configData['isCustomizer']=== true): ?>
<script src="<?php echo e(asset('js/scripts/customizer.js')); ?>"></script>
<?php endif; ?>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<?php echo $__env->yieldContent('page-script'); ?><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect/resources/views/panels/scripts.blade.php ENDPATH**/ ?>