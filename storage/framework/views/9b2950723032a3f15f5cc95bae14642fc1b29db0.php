<?php $__env->startSection('title','Media'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/css-media.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <!-- Responsive Images -->
  <div class="row">
    <div class="col s12">
      <div id="responsive-images" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Responsive Images</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-images">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-images">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-images">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">To make images resize responsively to page width, you can add the class <code
                    class=" language-markup">responsive-img</code>
                  to your image tag. It will now have a <code class=" language-markup">max-width: 100%</code> and <code
                    class=" language-markup">height:auto</code>.</p>
              </div>
              <div class="col s12">
                <img class="responsive-img" src="<?php echo e(asset('images/gallery/44.jpg')); ?>" alt="style typography">
                <p>Media can be styled in different ways using Materialize.</p>
              </div>
            </div>
          </div>
          <div id="html-images">
            <pre><code class="language-markup">
&lt;a class="btn btn-floating pulse">&lt;i class="material-icons">menu&lt;/i>&lt;/a>
  &lt;a class="btn btn-floating btn-large pulse">&lt;i class="material-icons">cloud&lt;/i>&lt;/a>
&lt;a class="btn btn-floating btn-large cyan pulse">&lt;i class="material-icons">edit&lt;/i>&lt;/a>
</code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Circular images -->
  <div class="row">
    <div class="col s12">
      <div id="circular-images" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Circular images</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-circular">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-circular">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-circular">
            <div class="row">
              <div class="col s12">
                <p>To make images appear circular, simply add <code class=" language-markup">class="circle"</code> to
                  them</p>
              </div>
              <div class="col s12 m8 offset-m2 l6 offset-l3 mt-3 mb-3">
                <div class="grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s2">
                      <img src="<?php echo e(asset('images/avatar/avatar-4.png')); ?>" alt=""
                        class="circle responsive-img indigo lighten-3">
                      <!-- notice the "circle" class -->
                    </div>
                    <div class="col s12">
                      <span class="black-text">
                        This is a square image. Add the "circle" class to it to make it appear circular.
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="html-circular">
            <pre><code class="language-markup">
&lt;div class="col s12 m8 offset-m2 l6 offset-l3">
&lt;div class="card-panel grey lighten-5 z-depth-1">
&lt;div class="row valign-wrapper">
  &lt;div class="col s2">
    &lt;img src="../../images/avatar/avatar-7.png" alt="" class="circle responsive-img"> &lt;!-- notice the "circle" class -->
  &lt;/div>
  &lt;div class="col s10">
    &lt;span class="black-text">
      This is a square image. Add the "circle" class to it to make it appear circular.
    &lt;/span>
  &lt;/div>
&lt;/div>
&lt;/div>
&lt;/div>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Responsive Videos-->
  <div class="row">
    <div class="col s12">
      <div id="videos" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Videos</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-videos">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-videos">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-videos">
            <div class="row">
              <div class="col s12">
                <p class="caption">We provide a container for Embedded Videos that resizes them responsively.</p>
                <div class="row">
                  <div class="col s12">
                    <h4 class="header">Responsive Embeds</h4>
                    <p class="mb-2">To make your embeds responsive, merely wrap them with a containing div which has
                      the class <code class=" language-markup">video-container</code>
                    </p>
                  </div>
                  <div class="col s12">
                    <div class="video-container">
                      <iframe width="640" height="360" src="https://www.youtube.com/embed/10r9ozshGVE"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="html-videos">
            <pre><code class="language-markup">
&lt;div class="video-container">
&lt;iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" allowfullscreen>&lt;/iframe>
&lt;/div>
</code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Responsive Videos-->
  <div class="row">
    <div class="col s12">
      <div id="video-two" class="card card card-default">
        <div class="card-content">
          <p class="mb-2">If your video does not have video controls, add the <code
              class=" language-markup">no-controls</code>
            class to the video container.
          </p>
          <div class="video-container no-controls">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/Skpu5HaVkOc" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Responsive Videos-->
  <div class="row">
    <div class="col s12">
      <div id="responsive-videos" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Responsive Videos</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-videos-2">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-videos-2">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-videos-2">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">To make your HTML5 Videos responsive just add the class <code
                    class=" language-markup">responsive-video</code>
                  to the video tag.</p>
                <video controls="">
                  <source src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
          <div id="html-videos-2">
            <pre><code class="language-markup">
  &lt;video class="responsive-video" controls>
    &lt;source src="movie.mp4" type="video/mp4">
  &lt;/video>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\css-media.blade.php ENDPATH**/ ?>