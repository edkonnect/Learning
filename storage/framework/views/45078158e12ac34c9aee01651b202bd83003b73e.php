<?php $__env->startSection('title','Shadow'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p>In material design, everything should have a certain z-depth that determines how far raised or close to the
        page the element is.</p>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div id="z-depth" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">z-depth</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-animations">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-animations">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-animations">
            <div class="row">
              <div class="col s12">
                <p>You can easily apply this shadow effect by adding a <code
                    class=" language-markup">class="z-depth-2"</code>
                  to an HTML tag. Alternatively you can extend any of these shadows with Sass using <code
                    class=" language-scss"><span
                      class="token keyword">@extend</span> .z-depth-2</code>.</p>
                <div class="shadow row mt-2 mb-3">
                  <div class="col s6 m3 l2 mb-3">
                    <p class="z-depth-1 shadow-demo"></p>
                  </div>
                  <div class="col s6 m3 l2 mb-3">
                    <p class="z-depth-2 shadow-demo"></p>
                  </div>
                  <div class="col s6 m3 l2 mb-3">
                    <p class="z-depth-3 shadow-demo"></p>
                  </div>
                  <div class="col s6 m3 l2 mb-3">
                    <p class="z-depth-4 shadow-demo"></p>
                  </div>
                  <div class="col s6 m3 l2 mb-3">
                    <p class="z-depth-5 shadow-demo"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="html-animations">
            <pre><code class="language-markup col s12">
  &lt;div class="col s6 m3 l2">
  &lt;p class="z-depth-1">z-depth-1&lt;/p>
  &lt;/div>
  &lt;div class="col s6 m3 l2">
  &lt;p class="z-depth-2">z-depth-2&lt;/p>
  &lt;/div>
  &lt;div class="col s6 m3 l2">
  &lt;p class="z-depth-3">z-depth-3&lt;/p>
  &lt;/div>
  &lt;div class="col s6 m3 l2">
  &lt;p class="z-depth-4">z-depth-4&lt;/p>
  &lt;/div>
  &lt;div class="col s6 m3 l2">
  &lt;p class="z-depth-5">z-depth-5&lt;/p>
  &lt;/div>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\css-shadow.blade.php ENDPATH**/ ?>