<?php $__env->startSection('title','FAQ Page Detail'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-faq.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section" id="faq-detail">
  <div class="row">
    <div class="col s12">
      <div id="faq-search" class="card z-depth-0 faq-search-image center-align p-35">
        <div class="card-content">
          <h5>Frequently asked questions.</h5>
          <p class="mb-3">Search our help center for quick answers</p>
          <input placeholder="Start typing your search..." type="text"
            class="search-box validate white search-circle search-shadow">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <h6 class="text-uppercase font-weight-900 mb-1">Applications / Detail</h6>
      <ul class="collapsible categories-collapsible">
        <li class="active">
          <div class="collapsible-header">Q: Do memberships include the original PSD files? <i class="material-icons">
              keyboard_arrow_right </i></div>
          <div class="collapsible-body">
            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
              chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </li>
        <li>
          <div class="collapsible-header">Q: How can I purchase a single theme? <i class="material-icons">
              keyboard_arrow_right </i></div>
          <div class="collapsible-body">
            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
              chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </li>
        <li>
          <div class="collapsible-header">Q: How to I modify the Footer copyright <i class="material-icons">
              keyboard_arrow_right </i></div>
          <div class="collapsible-body">
            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
              chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </li>
        <li>
          <div class="collapsible-header">Q: How do I create a child theme? <i class="material-icons">
              keyboard_arrow_right </i></div>
          <div class="collapsible-body">
            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
              chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </li>
        <li>
          <div class="collapsible-header">Q: Where do i post support query? <i class="material-icons">
              keyboard_arrow_right </i></div>
          <div class="collapsible-body">
            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
              chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </li>
        <li>
          <div class="collapsible-header">Q: New to the WordPress? Lets get started? <i class="material-icons">
              keyboard_arrow_right </i></div>
          <div class="collapsible-body">
            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
              chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\page-faq-detail.blade.php ENDPATH**/ ?>