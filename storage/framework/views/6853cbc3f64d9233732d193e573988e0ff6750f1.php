<body
  class="<?php echo e($configData['mainLayoutTypeClass']); ?> <?php if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])): ?> <?php echo e($configData['bodyCustomClass']); ?> <?php endif; ?>"
  data-open="click" data-menu="horizontal-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    <?php echo $__env->make('panels.horizontalNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </header>
  <!-- BEGIN: SideNav-->
  <?php echo $__env->make('panels.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <div id="main">
    <div class="row">
      <?php if($configData["navbarLarge"] === true && isset($configData["navbarLarge"])): ?>
      
      <div class="content-wrapper-before <?php echo e($configData["navbarLargeColor"]); ?>"></div>
      <?php endif; ?>

      <?php if($configData["pageHeader"] === true && isset($breadcrumbs)): ?>
        
        <?php echo $__env->make('panels.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
      <div class="col s12">
        <div class="container">
          
          <?php echo $__env->yieldContent('content'); ?>
          
          <?php echo $__env->make('pages.sidebar.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          
          <?php if($configData["isFabButton"] === true): ?>
            <?php echo $__env->make('pages.sidebar.fab-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
        </div>
        
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>

  <!-- END: Page Main-->


  <?php if($configData['isCustomizer'] === true && isset($configData['isCustomizer'])): ?>
    <!-- Theme Customizer -->
    <?php echo $__env->make('pages.partials.customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--/ Theme Customizer -->
    
    <?php echo $__env->make('pages.partials.buy-now', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>



  
  <?php echo $__env->make('panels.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\layouts\horizontalLayoutMaster.blade.php ENDPATH**/ ?>