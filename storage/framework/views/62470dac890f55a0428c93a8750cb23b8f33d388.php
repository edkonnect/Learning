<?php $__env->startSection('title','Helpers'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <!--  Valign Section-->
  <div class="card">
    <div class="card-content">
      <p class="caption">We have easy to use classes to help you align your content.</p>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div id="vertical-align" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Vertical Align</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-vertical-align">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-vertical-align">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-vertical-align">
            <p>You can easily vertically center things by adding the class <code
                class="language-markup">valign-wrapper</code>
              to the container holding the items you want to vertically align.</p>
            <div class="valign-demo valign-wrapper">
              <h5>This should be vertically aligned</h5>
            </div>
          </div>
          <div id="html-vertical-align">
            <pre><code class="language-markup">
    &lt;div class="valign-wrapper">
        &lt;h5>This should be vertically aligned&lt;/h5>
    &lt;/div>
    </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Text Align -->
  <div class="row">
    <div class="col s12">
      <div id="text-align" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Text Align</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-text-align">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-text-align">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-text-align">
            <p>These classes are for horizontally aligning content: <code class="language-markup">.left-align</code>,
              <code class="language-markup">.center-align</code> and <code class="language-markup">.right-align</code>.
            </p>
            <div class="talign-demo mt-1">
              <h6 class="left-align">This should be left aligned</h6>
              <h6 class="right-align">This should be right aligned</h6>
              <h6 class="center-align">This should be center aligned</h6>
            </div>
          </div>
          <div id="html-text-align">
            <pre><code class="language-markup">
              &lt;h6 class=&quot;left-align&quot;&gt;This should be left aligned&lt;/h6&gt;
              &lt;h6 class=&quot;right-align&quot;&gt;This should be right aligned&lt;/h6&gt;
              &lt;h6 class=&quot;center-align&quot;&gt;This should be center aligned&lt;/h6&gt;

  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Floats -->
  <div class="row">
    <div class="col s12">
      <div id="quick-floats" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Quick Floats</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-quick-floats">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-quick-floats">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-quick-floats">
            <p>Quickly float things by adding the class <code class="language-markup">left</code> or <code
                class="language-markup">right</code>
              to the element. <code class="language-markup">!important</code> is used to avoid specificity issues.</p>
            <div class="row">
              <div class="col s12">
                <div class="quick-floats mt-1">
                  <h6 class="left">Left Floating Text</h6>
                  <h6 class="right">Right Floating Text</h6>
                </div>
              </div>
            </div>
          </div>
          <div id="html-quick-floats">
            <pre><code class="language-markup">
  &lt;h6 class="left">Left Floating Text&lt;/h6>
  &lt;h6 class="right">Right Floating Text&lt;/h6>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Hiding/Showing Content -->
  <div class="row">
    <div class="col s12">
      <div id="hiding-showing" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Hiding/Showing Content</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-hiding-showing">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-hiding-showing">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-hiding-showing">
            <p>We provide easy to use classes to hide/show content on specific screen sizes. </p>
            <table class="striped">
              <thead>
                <tr>
                  <th>Class</th>
                  <th>Screen Range</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><code class="language-markup"><strong>.hide</strong></code></td>
                  <td>Hidden for all Devices</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.hide-on-small-only</strong></code></td>
                  <td>Hidden for Mobile Only</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.hide-on-med-only</strong></code></td>
                  <td>Hidden for Tablet Only</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.hide-on-med-and-down</strong></code></td>
                  <td>Hidden for Tablet and Below</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.hide-on-med-and-up</strong></code></td>
                  <td>Hidden for Tablet and Above</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.hide-on-large-only</strong></code></td>
                  <td>Hidden for Desktop Only</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.show-on-small</strong></code></td>
                  <td>Show for Mobile Only</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.show-on-medium</strong></code></td>
                  <td>Show for Tablet Only</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.show-on-large</strong></code></td>
                  <td>Show for Desktop Only</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.show-on-medium-and-up</strong></code></td>
                  <td>Show for Tablet and Above</td>
                </tr>
                <tr>
                  <td><code class="language-markup"><strong>.show-on-medium-and-down</strong></code></td>
                  <td>Show for Tablet and Below</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="html-hiding-showing">
            <pre><code class="language-markup">
  &lt;div class="hide-on-small-only">&lt;/div>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  Formatting Section-->
  <div class="row">
    <div class="col s12">
      <div id="formatting" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Formatting</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-formatting">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-formatting">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-formatting">
            <p>These classes help format various content on your site.</p>
            <h5>Truncation</h5>
            <p>To truncate long lines of text in an ellipsis, add the class <code
                class="language-markup">truncate</code>
              to the tag which contains the text. See an example below of a header being truncated inside a card.</p>
            <div class="row">
              <div class="col s6 offset-s3 m6 offset-m3">
                <div class="card-panel">
                  <h4 class="truncate">This is a long title that will be truncated</h4>
                </div>
              </div>
            </div>
          </div>
          <div id="html-formatting">
            <pre><code class="language-markup">
  &lt;h4 class="truncate">This is an extremely long title that will be truncated&lt;/h4>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  Hover-->
  <div class="row">
    <div class="col s12">
      <div id="hover" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Hover</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-hover">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-hover">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-hover">
            <p>The <code class="language-markup">hoverable</code> is a hover class that adds an animation for box
              shadow as seen below. It can be used on most elements, but meant for use on cards.</p>
            <div class="card hoverable small">
              <div class="card-image">
                <img src="<?php echo e(asset('images/gallery/33.png')); ?>" alt="">
                <span class="card-title">Card Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because
                  I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
          </div>
          <div id="html-hover">
            <pre><code class="language-markup">
  &lt;div class="card-panel hoverable"> Hoverable Card Panel&lt;/div>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  Browser Default Section-->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="browser-default" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Browser Defaults</h4>
          <p>Because we override many of the default browser styles and elements, we provide the <code
              class="language-markup">.browser-default</code>
            class to revert these elements to their original state.</p>
          <table class="striped">
            <thead>
              <tr>
                <th>Name of Element</th>
                <th>Reverted Style</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>UL</td>
                <td>Bullet points</td>
              </tr>
              <tr>
                <td>SELECT</td>
                <td>Browser default select element</td>
              </tr>
              <tr>
                <td>INPUT</td>
                <td>Browser default input</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\css-helpers.blade.php ENDPATH**/ ?>