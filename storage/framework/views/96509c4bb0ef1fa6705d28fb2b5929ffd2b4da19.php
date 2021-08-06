<body
    class="<?php echo e($configData['mainLayoutTypeClass']); ?> <?php if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])): ?> <?php echo e($configData['bodyCustomClass']); ?> <?php endif; ?> <?php if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])): ?><?php echo e('menu-collapse'); ?> <?php endif; ?>"
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        <?php echo $__env->make('panels.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <!-- END: Header-->

    <!-- BEGIN: SideNav-->
    <?php echo $__env->make('panels.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <?php if($configData["navbarLarge"] === true): ?>
            <?php if(($configData["mainLayoutType"]) === 'vertical-modern-menu'): ?>
            
            <div
                class="content-wrapper-before <?php if(!empty($configData['navbarBgColor'])): ?> <?php echo e($configData['navbarBgColor']); ?> <?php else: ?> <?php echo e($configData["navbarLargeColor"]); ?> <?php endif; ?>">
            </div>
            <?php else: ?>
            
            <div class="content-wrapper-before <?php echo e($configData["navbarLargeColor"]); ?>">
            </div>
            <?php endif; ?>
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


    <?php if($configData['isCustomizer'] === true): ?>
    <!-- Theme Customizer -->
    <?php echo $__env->make('pages.partials.customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--/ Theme Customizer -->
    
    <?php echo $__env->make('pages.partials.buy-now', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    
    <?php echo $__env->make('panels.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

<?php
$urlSeg1 = Request::segment(1);
$urlSeg2 = Request::segment(2);
$isAdmin = Auth::user()->is_admin;
?>

<script>
    $(document).ready(function () {
        $('.timepicker').timepicker();
    });
</script>
<script>
    var is_admin = '<?php echo $isAdmin; ?>';
    if (is_admin == 1) {
        $(".customAdminClass").css('display', 'block');
    } else {
        $(".customAdminClass").css('display', 'none');
    }
    var urlValue = "<?php echo e($urlSeg1); ?>";
    var urlValueSeg2 = "<?php echo e($urlSeg2); ?>";
    if (urlValue == "view-tutor-sessions") {
        $(".customAdminClass").addClass('open');
        $(".customHomework").addClass('active open');
    }
    if (urlValue == "homework-list") {
//                               $('.customClass').addClass('active');
        $(".customHomework").addClass('active open');
    }
    if (urlValue == "homework-upload") {
//                               $('.customClass').addClass('active');
        $(".customHomework").addClass('active open');
    }
    if (urlValue == "getHomework") {
        $('.customClass').addClass('active');
        $(".customHomework").addClass('active open');
    }
    if (urlValueSeg2 == "getHomework") {
        $(".customClass").addClass('active open');
    }
//alert("am in");
</script><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/layouts/verticalLayoutMaster.blade.php ENDPATH**/ ?>