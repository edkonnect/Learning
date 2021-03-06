<?php $__env->startSection('title', 'Media'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/advance-ui-media.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption">Media components include things that have to do with large media objects like Images, Video,
        Audio, etc.</p>
    </div>
  </div>
  <!--Material Box-->
  <div class="row">
    <div class="col s12">
      <div id="material-box" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l6">
                <h4 class="card-title">Material Box</h4>
              </div>
              <div class="col s12 m6 l6">
                <ul class="tabs">
                  <li class="tab col s4 p-0"><a class="active p-0" href="#view-material-box">View</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#html-material-box">Html</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#js-material-box">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-material-box">
            <div class="row">
              <div class="col s12">
                <p>Material box is a material design implementation of the Lightbox plugin. When a user clicks on an
                  image that can be enlarged. Material box centers the image and enlarges it in a smooth, non-jarring
                  manner. To dismiss the image, the user can either click on the image again, scroll away, or press the
                  ESC key.</p>
              </div>
              <div class="col s12">
                <img class="materialboxed mt-2" src="<?php echo e(asset('images/gallery/29.png')); ?>" alt="sample">
                <p class="mt-2">Creating the above image with the effect is as simple as adding a materialboxed class
                  to the image tag.</p>
              </div>
            </div>
          </div>
          <div id="html-material-box">
            <pre><code class="language-markup">
  &lt;img class="materialboxed" src="../../images/sample-1.jpg">
  </code></pre>
          </div>
          <div id="js-material-box">
            <pre><code class="language-javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Captions -->
  <div class="row">
    <div class="col s12">
      <div id="captions" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Captions</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-captions">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-captions">Html</a></li>
                </ul>
              </div>
            </div>
            <div id="view-captions">
              <div class="row">
                <div class="col s12 mt-2">
                  <p>It is very easy to add a short caption to your photo. Just add the caption as a data-caption
                    attribute.</p>
                </div>
                <div class="col s12 mt-2">
                  <img class="materialboxed" width="250" src="<?php echo e(asset('images/gallery/21.png')); ?>" alt="sample"
                    data-caption="A picture of some deer and tons of trees">
                </div>
              </div>
            </div>
            <div id="html-captions">
              <pre><code class="language-markup">
    &lt;img class="materialboxed" data-caption="A picture of a way with a group of trees in a park" width="250" src="https://lorempixel.com/800/400/nature/4">
    </code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--media slider-->
  <div class="row">
    <div class="col s12">
      <div id="media-slider" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Media Slider</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-media-slider">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-media-slider">Html</a></li>
                </ul>
              </div>
            </div>
            <div id="view-media-slider">
              <div class="row">
                <div class="col s12 mt-2">
                  <p>Our slider is a simple and elegant image carousel. You can also have captions that will be
                    transitioned on their own depending on their alignment. You can also have indicators that show up
                    on the bottom of the slider.</p>
                </div>
                <div class="col s12">
                  <p>Note: This is also Hammer.js compatible! Try swiping with your finger to scroll through the
                    slider.</p>
                  <div class="slider">
                    <ul class="slides mt-2">
                      <li>
                        <img src="<?php echo e(asset('images/gallery/30.png')); ?>" alt="img-1">
                        <!-- random image -->
                        <div class="caption center-align">
                          <h3 class="white-text">This is our big Tagline!</h3>
                          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                      </li>
                      <li>
                        <img src="<?php echo e(asset('images/gallery/31.png')); ?>" alt="img-2">
                        <!-- random image -->
                        <div class="caption left-align">
                          <h3 class="white-text">Left Aligned Caption</h3>
                          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                      </li>
                      <li>
                        <img src="<?php echo e(asset('images/gallery/33.png')); ?>" alt="img-3">
                        <!-- random image -->
                        <div class="caption right-align">
                          <h3 class="white-text">Right Aligned Caption</h3>
                          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                      </li>
                      <li>
                        <img src="<?php echo e(asset('images/gallery/28.png')); ?>" alt="img-4">
                        <!-- random image -->
                        <div class="caption center-align">
                          <h3 class="white-text">This is our big Tagline!</h3>
                          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div id="html-media-slider">
              <pre><code class="language-markup">
  &lt;div class="slider">
    &lt;ul class="slides">
      &lt;li>
        &lt;img src="https://lorempixel.com/580/250/nature/1"> &lt;!-- random image -->
        &lt;div class="caption center-align">
          &lt;h3>This is our big Tagline!&lt;/h3>
          &lt;h5 class="light grey-text text-lighten-3">Here's our small slogan.&lt;/h5>
        &lt;/div>
      &lt;/li>
      &lt;li>
        &lt;img src="https://lorempixel.com/580/250/nature/2"> &lt;!-- random image -->
        &lt;div class="caption left-align">
        &lt;h3>Left Aligned Caption&lt;/h3>
        &lt;h5 class="light grey-text text-lighten-3">Here's our small slogan.&lt;/h5>
        &lt;/div>
      &lt;/li>
      &lt;li>
        &lt;img src="https://lorempixel.com/580/250/nature/3"> &lt;!-- random image -->
        &lt;div class="caption right-align">
          &lt;h3>Right Aligned Caption&lt;/h3>
          &lt;h5 class="light grey-text text-lighten-3">Here's our small slogan.&lt;/h5>
        &lt;/div>
      &lt;/li>
      &lt;li>
       &lt;img src="https://lorempixel.com/580/250/nature/4"> &lt;!-- random image -->
        &lt;div class="caption center-align">
          &lt;h3>This is our big Tagline!&lt;/h3>
          &lt;h5 class="light grey-text text-lighten-3">Here's our small slogan.&lt;/h5>
        &lt;/div>
      &lt;/li>
    &lt;/ul>
  &lt;/div>
  </code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Fullscreen Slider -->
  <div class="row">
    <div class="col s12">
      <div id="fullscreen-slider" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Fullscreen Slider</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-fullscreen-slider">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-fullscreen-slider">JS</a></li>
                </ul>
              </div>
            </div>
            <div id="view-fullscreen-slider">
              <div class="row">
                <div class="col s12">
                  <p>You can easliy make this slider a fullscreen slider by adding the class <code
                      class="language-markup">fullscreen</code>
                    to the slider div. Here's a quick demo.</p>
                  <a href="fullscreen-slider-demo" target="_blank" class="btn-large waves-effect waves-light mt-2">Open
                    Demo</a>
                </div>
              </div>
            </div>
            <div id="js-fullscreen-slider">
              <pre><code class="language-javascript">
  $(document).ready(function(){
    $('.slider').slider();
  });
  </code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery Plugin Options -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="jquery-plugin" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">jQuery Plugin Options</h4>
          <table class="highlight">
            <thead>
              <tr>
                <th>Option Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>indicators</td>
                <td>Set to false to hide slide indicators. (Default: True)</td>
              </tr>
              <tr>
                <td>height</td>
                <td>Set height of slider. (Default: 400)</td>
              </tr>
              <tr>
                <td>transition</td>
                <td>Set the duration of the transition animation in ms. (Default: 500)</td>
              </tr>
              <tr>
                <td>interval</td>
                <td>Set the duration between transitions in ms. (Default: 6000)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery Plugin Methods -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="jquery-plugin-methods" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">jQuery Plugin Methods</h4>
          <p>We have methods to pause, start, move to next and move to previous slide.</p>
          <pre><code class="language-javascript col s12">
  // Pause slider
  $('.slider').slider('pause');
  // Start slider
  $('.slider').slider('start');
  // Next slide
  $('.slider').slider('next');
  // Previous slide
  $('.slider').slider('prev');
  </code></pre>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/advance-ui-media.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\advance-ui-media.blade.php ENDPATH**/ ?>