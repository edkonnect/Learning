<?php $__env->startSection('title', 'Feature Discovery'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption">Provide value and encourage return visits by introducing users to new features and
        functionality at contextually relevant moments.</p>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div id="tap-target" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l6">
                <h4 class="card-title">Tap Target</h4>
              </div>
              <div class="col s12 m6 l6">
                <ul class="tabs">
                  <li class="tab col s4 p-0"><a class="active p-0" href="#view-tap-target">View</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#html-tap-target">Html</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#js-tap-target">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-tap-target">
            <div class="row">
              <div class="col s12">
                <p>Feature discovery prompts have more impact when they are presented to the right users at
                  contextually relevant moments. When presented to the wrong user at the wrong time, they can be
                  intrusive and annoying.</p>
              </div>
              <div class="col s12">
                <a class="btn mt-2" onclick="$('.tap-target').tapTarget('open')">Open tap
                  target</a>
                &nbsp;
                <a class="btn mt-2" onclick="$('.tap-target').tapTarget('close')">Close tap
                  target</a>
              </div>
              <div class="col s12">
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                  <a id="menu" class="btn btn-floating btn-large cyan">
                    <i class="material-icons">menu</i>
                  </a>
                </div>
                <div class="tap-target cyan" data-target="menu">
                  <div class="tap-target-content white-text">
                    <h5 class="white-text">I am here</h5>
                    <p class="white-text">Provide value and encourage return visits by introducing users to new
                      features and functionality at contextually relevant moments.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="html-tap-target">
            <pre><code class="language-markup">
  &lt;!-- Element Showed -->
  &lt;a id="menu" class="waves-effect waves-light btn btn-floating" >&lt;i class="material-icons">menu&lt;/i>&lt;/a>
  &lt;!-- Tap Target Structure -->
  &lt;div class="tap-target" data-target="menu">
    &lt;div class="tap-target-content">
      &lt;h5>Title&lt;/h5>
      &lt;p>A bunch of text&lt;/p>
    &lt;/div>
  &lt;/div>
  </code></pre>
          </div>
          <div id="js-tap-target">
            <pre><code class="language-javascript">
  $('.tap-target').tapTarget();
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/advance-ui-feature-discovery.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\advance-ui-feature-discovery.blade.php ENDPATH**/ ?>