<?php $__env->startSection('title','Knowledge Licensing Page Details'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-knowledge.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- knowledge Licensing -->
<div class="section" id="knowledge-licensing-detail">
  <div class="row knowledge-content">
    <!-- Licenses -->
    <div class="col s12 m3 l3 licenses-link mt-1 sidebar-title">
      <h6><b>Related articles</b></h6>
      <ul class="licenses-list">
        <li class="active">
          <p>How do licenses work for any plugins that are?</p>
        </li>
        <li>
          <p>I’m making a test site it’s not for sale distribution.</p>
        </li>
        <li>
          <p>I’m making a logo. What license do I need?</p>
        </li>
        <li>
          <p>I’m making a video - which license do I need?</p>
        </li>
        <li>
          <p>Do I need a Regular License or an Extended License?</p>
        </li>
        <li>
          <p>Do licenses have an expiry date? Will I ever have to pay any fees?</p>
        </li>
      </ul>
    </div>
    <div class="col s12 m9 l9 licenses">
      <div class="card">
        <div class="card-content">
          <h5 class="mb-2">How do licenses work for any plugins that are bundled with the theme I bought?</h5>
          <p class="mb-2">Updated 1 year ago</p>
          <p>Many themes sold on ThemeForest come bundled with premium plugins from CodeCanyon.</p>
          <p class="mb-2">
            A plugin is an additional component that offers functionality and features beyond a typical theme
            installation. Theme authors (who sell the themes) may choose to include certain plugins (such as Visual
            Composer, Revolution Slider or other page builder plugins) within their item to add these special functions
            and features to the theme package. You don’t need a separate license to use a bundled plug-in as part of
            the theme it was bundled with.</p>
          <p class="mb-2">
            Bundled plugins offer the same core features and functionality as the standalone version of the item on
            CodeCanyon.</p>
          <p class="mb-2">
            Some plugins may ask for a purchase code for registration/activation once installed, however, you can
            simply ignore these messages as bundled plugins do not require activation or registration. The plugin will
            still work as intended with the theme once the theme has been activated/registered.</p>
          <p class="mb-2">
            When a plugin is updated, the theme author will include the latest version of the bundled plugin with their
            next theme update. So you can easily update the bundled plugin when you next update your theme. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/page-knowledge.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\page-knowledge-licensing-detail.blade.php ENDPATH**/ ?>