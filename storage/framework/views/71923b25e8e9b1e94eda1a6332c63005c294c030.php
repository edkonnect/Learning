<?php $__env->startSection('title','i18n'); ?>


<?php $__env->startSection('content'); ?>
<!-- internationalization starts -->
<section id="internationalization" class="section">
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">Change Locale</h4>
          <!-- language options -->
          <div class="language-options">
            <p>
              <label for="english">
                <input id="english" class="with-gap i18n-lang-option" name="i18n-lang-radios" type="radio" checked
                  data-lng="en_p" />
                <span>English</span>
              </label>
            </p>
            <p>
              <label for="french">
                <input id="french" class="with-gap i18n-lang-option" name="i18n-lang-radios" type="radio"
                  data-lng="fr_p" />
                <span>French</span>
              </label>
            </p>
            <p>
              <label for="german">
                <input id="german" class="with-gap i18n-lang-option" name="i18n-lang-radios" type="radio"
                  data-lng="de_p" />
                <span>German</span>
              </label>
            </p>
            <p>
              <label for="portuguese">
                <input id="portuguese" class="with-gap i18n-lang-option" name="i18n-lang-radios" type="radio"
                  data-lng="pt_p" />
                <span>Portuguese</span>
              </label>
            </p>
          </div>
          <!--/language options -->
          <div class="card border card-localization">
            <div class="card-content">
              <h4 class="card-title">Card Title</h4>
              <div class="card-text" data-i18n="key">
                Cake sesame snaps cupcake gingerbread danish I love gingerbread. Apple pie pie
                jujubes chupa chups
                muffin halvah lollipop. Chocolate cake oat cake tiramisu marzipan sugar plum.
                Donut sweet pie oat
                cake dragée fruitcake cotton candy lemon drops.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- internationalization starts -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/extra-components-i18n.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\extra-components-i18n.blade.php ENDPATH**/ ?>