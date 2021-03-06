<?php $__env->startSection('title','FAQ Page'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-faq.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- FAQ -->
<div class="section" id="faq">
  <div class="row">
    <div class="col s12">
      <div id="faq-search" class="card z-depth-0 faq-search-image center-align p-35">
        <div class="card-content">
          <h5>Frequently asked questions.</h5>
          <p class="mb-3">Search our help center for quick answers</p>
          <input placeholder="Start typing your search..." id="search-input" type="text"
            class="search-box validate white search-circle search-shadow">
        </div>
      </div>
    </div>
  </div>
  <div class="faq row">
    <div class="col s12 m6 l3">
      <a class="black-text" href="<?php echo e(asset('page-faq-detail')); ?>">
        <div class="card z-depth-0 grey lighten-3 faq-card">
          <div class="card-content center-align">
            <i class="material-icons dp48 orange-text">search</i>
            <h6><b>Guides</b></h6>
            <p>Consectetur minim veniam</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s12 m6 l3">
      <a class="black-text" href="<?php echo e(asset('page-faq-detail')); ?>">
        <div class="card z-depth-0 grey lighten-3 faq-card">
          <div class="card-content center-align">
            <i class="material-icons dp48 red-text">chat_bubble_outline</i>
            <h6><b>FAQ</b></h6>
            <p>Consectetur minim veniam</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s12 m6 l3">
      <a class="black-text" href="<?php echo e(asset('page-faq-detail')); ?>">
        <div class="card z-depth-0 grey lighten-3 faq-card">
          <div class="card-content center-align">
            <i class="material-icons dp48 green-text">perm_identity</i>
            <h6><b>Community</b></h6>
            <p>Consectetur minim veniam</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s12 m6 l3">
      <a class="black-text" href="<?php echo e(asset('page-faq-detail')); ?>">
        <div class="card z-depth-0 grey lighten-3 faq-card">
          <div class="card-content center-align">
            <i class="material-icons dp48 blue-text">content_copy</i>
            <h6><b>Invoices</b></h6>
            <p>Consectetur minim veniam</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s12 m3 l3">
      <div class="card mt-2">
        <div class="card-content">
          <span class="card-title">Category</span>
          <div class="category-list">
            <p class="mt-4"><i class="material-icons vertical-text-sub amber-text"> panorama_fish_eye </i> Applications
            </p>
            <p class="mt-4"><i class="material-icons vertical-text-sub teal-text"> panorama_fish_eye </i> UI Elements
            </p>
            <p class="mt-4"><i class="material-icons vertical-text-sub purple-text"> panorama_fish_eye </i> Components
            </p>
            <p class="mt-4"><i class="material-icons vertical-text-sub cyan-text"> panorama_fish_eye </i> Build process
            </p>
          </div>
          <span class="card-title mt-10">Supporters</span>
          <div class="display-flex">
            <div class="mr-4">
              <img height="38" width="38" src="<?php echo e(asset('images/avatar/avatar-1.png')); ?>" alt="avatar">
            </div>
            <div class="pl-0">
              <a href="#">Mike</a>
              <p class="text-sm">Microsoft</p>
            </div>
          </div>
          <div class="display-flex mt-4">
            <div class="mr-4">
              <img height="38" width="38" src="<?php echo e(asset('images/avatar/avatar-2.png')); ?>" alt="avatar">
            </div>
            <div class="pl-0">
              <a href="#">Howard Morgan</a>
              <p class="text-sm">Apple</p>
            </div>
          </div>
          <div class="display-flex mt-4">
            <div class="mr-4">
              <img height="38" width="38" src="<?php echo e(asset('images/avatar/avatar-3.png')); ?>" alt="avatar">
            </div>
            <div class="pl-0">
              <a href="#">Kenneth Pierce</a>
              <p class="text-sm">Lostcorp</p>
            </div>
          </div>
          <div class="display-flex mt-4">
            <div class="mr-4">
              <img height="38" width="38" src="<?php echo e(asset('images/avatar/avatar-4.png')); ?>" alt="avatar">
            </div>
            <div class="pl-0">
              <a href="#">Steven Owens</a>
              <p class="text-sm">Samsum Inc.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12 m9 l9">
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
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\page-faq.blade.php ENDPATH**/ ?>