<ul class="dropdown-content dropdown-horizontal-list" id="<?php echo e($activate); ?>">
  <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $custom_classes="";
      if(isset($submenu->class)){
      $custom_classes = $submenu->class;
      }
    ?>
    <li
      class="<?php echo e((isset($submenu->submenu)) ? 'dropdown-submenu ' : ''); ?><?php echo e((request()->is($submenu->url)) ? 'active ':''); ?><?php echo e($custom_classes); ?>"
      data-menu="<?php echo e((isset($submenu->submenu)) ? 'dropdown-submenu' : ''); ?>">
      <a href="<?php echo e($submenu->url); ?>" class="<?php echo e((isset($submenu->submenu)) ? 'dropdownSub-menu' : ''); ?>"
        data-target="<?php echo e((isset($submenu->submenu)) ? $submenu->activate : ''); ?>">
        <span><?php echo e(__('locale.'.$submenu->name)); ?></span>
        <?php if(isset($submenu->submenu)): ?>
         <i class="material-icons right">chevron_right</i>
        <?php endif; ?>
      </a>
      <?php if(isset($submenu->submenu)): ?>
        <?php echo $__env->make('panels.horizontalSubmenu',['menu' => $submenu->submenu],['activate'=>$submenu->activate], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
    </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\panels\horizontalSubmenu.blade.php ENDPATH**/ ?>