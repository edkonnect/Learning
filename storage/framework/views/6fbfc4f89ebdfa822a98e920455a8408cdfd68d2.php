<!-- BEGIN: Footer-->
<footer
  class="<?php echo e($configData['mainFooterClass']); ?> <?php if($configData['isFooterFixed']=== true): ?><?php echo e('footer-fixed'); ?><?php else: ?> <?php echo e('footer-static'); ?> <?php endif; ?> <?php if($configData['isFooterDark']=== true): ?> <?php echo e('footer-dark'); ?> <?php elseif($configData['isFooterDark']=== false): ?> <?php echo e('footer-light'); ?> <?php else: ?> <?php echo e($configData['mainFooterColor']); ?> <?php endif; ?>">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2021 <a href="https://edkonnect.com/"
          target="_blank">EDKONNECT</a> All rights reserved.
      </span>
    
    </div>
  </div>
</footer>

<!-- END: Footer--><?php /**PATH /home/n614h8do5jis/public_html/V/app/edkonnect1/resources/views/panels/footer.blade.php ENDPATH**/ ?>