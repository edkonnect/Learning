<?php if($configData['mainLayoutType'] === 'vertical-modern-menu'): ?>

<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span><?php echo $__env->yieldContent('title'); ?> </span></h5>
        <?php if(isset($breadcrumbs)): ?>
        <ol class="breadcrumbs mb-0">
          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="breadcrumb-item <?php echo e(!isset($breadcrumb['link']) ? 'active' :''); ?>">
            <?php if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)')): ?>
            <a href="<?php echo e(url($breadcrumb['link'])); ?>"><?php endif; ?><?php echo e($breadcrumb['name']); ?><?php if(isset($breadcrumb['link'])): ?></a>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <?php endif; ?>
      </div>
      <div class="col s2 m6 l6">
        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!"
          data-target="dropdown1">
          <i class="material-icons hide-on-med-and-up">settings</i>
          <span class="hide-on-small-onl">Settings</span>
          <i class="material-icons right">arrow_drop_down</i>
        </a>
        <ul class="dropdown-content" id="dropdown1" tabindex="0">
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('user-profile-page')); ?>">Profile<span
                class="new badge red">2</span></a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('app-contacts')); ?>">Contacts</a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('page-faq')); ?>">FAQ</a></li>
          <li class="divider" tabindex="-1"></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('user-login')); ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php elseif($configData['mainLayoutType'] === 'vertical-menu-nav-dark'): ?>

<div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6 breadcrumbs-left">
        <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span><?php echo $__env->yieldContent('title'); ?></span></h5>
        <?php if(isset($breadcrumbs)): ?>
        <ol class="breadcrumbs mb-0">
          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="breadcrumb-item <?php echo e(!isset($breadcrumb['link']) ? 'active' :''); ?>">
            <?php if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)')): ?>
            <a href="<?php echo e($breadcrumb['link']); ?>"><?php endif; ?><?php echo e($breadcrumb['name']); ?><?php if(isset($breadcrumb['link'])): ?></a>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <?php endif; ?>
      </div>
      <div class="col s2 m6 l6"><a
          class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!"
          data-target="dropdown1"><i class="material-icons">expand_more </i><i
            class="material-icons right">arrow_drop_down</i></a>
        <ul class="dropdown-content" id="dropdown1" tabindex="0">
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('user-profile-page')); ?>">Profile<span
                class="new badge red">2</span></a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('app-contacts')); ?>">Contacts</a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('page-faq')); ?>">FAQ</a></li>
          <li class="divider" tabindex="-1"></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="<?php echo e(asset('user-login')); ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php elseif($configData['mainLayoutType'] === 'vertical-gradient-menu'): ?>

<div class="pt-3 pb-1" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span><?php echo $__env->yieldContent('title'); ?></span></h5>
      </div>
      <div class="col s12 m6 l6 right-align-md">
        <?php if(isset($breadcrumbs)): ?>
        <ol class="breadcrumbs mb-0">
          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="breadcrumb-item <?php echo e(!isset($breadcrumb['link']) ? 'active' :''); ?>">
            <?php if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)')): ?>
            <a href="<?php echo e($breadcrumb['link']); ?>"><?php endif; ?><?php echo e($breadcrumb['name']); ?><?php if(isset($breadcrumb['link'])): ?></a>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php elseif($configData['mainLayoutType'] === 'vertical-dark-menu'): ?>

<div id="breadcrumbs-wrapper" data-image="<?php echo e(asset('images/gallery/breadcrumb-bg.jpg')); ?>">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span><?php echo $__env->yieldContent('title'); ?></span></h5>
      </div>
      <div class="col s12 m6 l6 right-align-md">
        <?php if(isset($breadcrumbs)): ?>
        <ol class="breadcrumbs mb-0">
          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="breadcrumb-item <?php echo e(!isset($breadcrumb['link']) ? 'active' :''); ?>">
            <?php if(isset($breadcrumb['link']) && $breadcrumb['link'] !== 'javascript:void(0)'): ?>
            <a href="<?php echo e(url($breadcrumb['link'])); ?>"><?php endif; ?><?php echo e($breadcrumb['name']); ?><?php if(isset($breadcrumb['link'])): ?></a>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php elseif($configData['mainLayoutType'] === 'horizontal-menu'): ?>

<div class="pt-1 pb-0" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <h5 class="breadcrumbs-title"><span><?php echo $__env->yieldContent('title'); ?> </span></h5>
      </div>
      <div class="col s12 m6 l6 right-align-md">
        <?php if(isset($breadcrumbs)): ?>
        <ol class="breadcrumbs mb-0">
          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="breadcrumb-item <?php echo e(!isset($breadcrumb['link']) ? 'active' :''); ?>">
            <?php if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)')): ?>
            <a href="<?php echo e(url($breadcrumb['link'])); ?>"><?php endif; ?><?php echo e($breadcrumb['name']); ?><?php if(isset($breadcrumb['link'])): ?></a>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\panels\breadcrumb.blade.php ENDPATH**/ ?>