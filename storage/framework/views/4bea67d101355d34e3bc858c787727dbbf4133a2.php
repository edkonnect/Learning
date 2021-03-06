<?php $__env->startSection('title','Toasts'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption">Toasts are content that are not original visible on a page but show up with extra information
        if needed. The transitions should make the appearance of the toast make sense and not jarring to the user.</p>
    </div>
  </div>
  <!--toasts-->
  <div class="row">
    <div class="col s12">
      <div id="toasts" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l6">
                <h4 class="card-title">Toasts</h4>
              </div>
              <div class="col s12 m6 l6">
                <ul class="tabs">
                  <li class="tab col s4 p-0"><a class="active p-0" href="#view-toasts">View</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#html-toasts">Html</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#js-toasts">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-toasts">
            <div class="row">
              <div class="col s12">
                <p>To do this, call the toast() function programatically in JavaScript.</p>
              </div>
              <div class="col s12">
                <p>This theme provides an easy way for you to send unobtrusive alerts to your users through toasts.
                  These toasts are also placed and sized responsively, try it out by clicking the button below on
                  different device sizes.</p>
                <a class="btn toast-basic">Toast!</a>
              </div>
            </div>
          </div>
          <div id="html-toasts">
            <pre><code class="language-markup">
  &lt;a class=&quot;btn toast-basic&quot;&gt;Toast!&lt;/a&gt;
  </code></pre>
          </div>
          <div id="js-toasts">
            <pre><code class="language-javascript">
  M.toast({
    html: 'I am a toast!'
})
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Custom HTML -->
  <div class="row">
    <div class="col s12">
      <div id="custom" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Custom HTML</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-custom">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-custom">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-custom">
            <div class="row">
              <div class="col s12">
                <p>You can pass in an HTML String as the first argument as well.</p>
              </div>
              <div class="col s12">
                <p> Take a look at the example below, where we pass in text as well as a flat button. If you call an
                  external function instead of in-line JavaScript, you will not need to escape quotation marks.</p>
                <a class="waves-effect waves-light light-blue btn mt-2 toast-custom">ToastMe!</a>
                <a class="waves-effect waves-light light-blue btn mt-2 toast-custom">Toast
                  Again!</a>
              </div>
            </div>
          </div>
          <div id="js-custom">
            <pre><code class="language-javascript">
    var toastHTML = '<span>I am toast content</span><button class="btn-flat toast-action">Undo</button>';
    M.toast({html: toastHTML});
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tosts Callback -->
  <div class="row">
    <div class="col s12">
      <div id="callback" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Callback</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-callback">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#JS-callback">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-callback">
            <div class="row">
              <div class="col s12">
                <p>You can have the toast callback a function when it has been dismissed</p>
              </div>
              <div class="col s12">
                <a class="btn light-blue mt-2 toast-callback">Toast!</a>
              </div>
            </div>
          </div>
          <div id="JS-callback">
            <pre><code class="language-javascript">
    M.toast({
      html: 'I am a toast',
      completeCallback: function () {
          alert('Your toast was dismissed')
      }
  })
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Styling Toasts -->
  <div class="row">
    <div class="col s12">
      <div class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Styling Toasts</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-styling">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-styling">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-styling">
            <div class="row">
              <div class="col s12">
                <p>We've added the ability to customize your toasts easily. You can pass in classes as an optional
                  parameter into the toast function. </p>
              </div>
              <div class="col s12">
                <p>We've added a rounded class for you, but you can create your own CSS classes and apply them to
                  toasts. Checkout out our full example below.</p>
                <a class="waves-effect waves-light light-blue btn mt-2 toast-rounded">Round
                  Toast!</a>
              </div>
            </div>
          </div>
          <div id="js-styling">
            <pre><code class="language-javascript">
  M.toast({html: 'I am a toast!', classes: 'rounded'});
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Dismiss a Toast Programatically -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="toast-dismiss" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Dismiss a Toast Programatically</h4>
          <p>To remove a specific toast using JavaScript, access the <code class="language-javascript">M_Toast</code>
            toast HTML element and call the remove function</p>
          <pre><code class="language-javascript">
  // Get toast DOM Element, get instance, then call remove function
  var toastElement = document.querySelector('.toast');
  var toastInstance = M.Toast.getInstance(toastElement);
  toastInstance.dismiss();
    </code></pre>
        </div>
      </div>
    </div>
  </div>

  <!-- Dismiss all Toasts -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="toast-dismiss-all" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Dismiss all Toasts</h4>
          <pre><code class="language-javascript">
M.Toast.dismissAll();
  </code></pre>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/advance-ui-toasts.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\advance-ui-toasts.blade.php ENDPATH**/ ?>