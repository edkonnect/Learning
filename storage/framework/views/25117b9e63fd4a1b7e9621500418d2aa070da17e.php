<?php $__env->startSection('title','Sweetalert'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/sweetalert/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0"><a href="http://t4t5.github.io/sweetalert/" target="_blank">SweetAlert</a> automatically
        centers itself on the page and looks great no matter if you're using a desktop computer, mobile or tablet. It's
        even highly customizeable, as you can see below!</p>
    </div>
  </div>

  <div class="row">

    <!-- A basic message -->
    <div class="col m6 s12">
      <div id="basic-message" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A basic message</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-basic-message">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-basic-message">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-basic-message">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-message waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-basic-message">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal("Here's a message!")</code></pre>
          </div>
        </div>
      </div>
    </div>

    <!-- A title with a text under -->
    <div class="col m6 s12">
      <div class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A title with a text under</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-title-text">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-title-text">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-title-text">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-title-text waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-title-text">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal("Here's a message!", "It's pretty, isn't it?")</code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- A Success message -->
    <div class="col m6 s12">
      <div id="Success-message" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A Success Alert</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-success-message">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-success-message-view">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-success-message">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-success-message waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-success-message-view">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: 'Success',
    icon: 'success'
  })</code></pre>
          </div>
        </div>
      </div>
    </div>

    <!-- A Error Message -->
    <div class="col m6 s12">
      <div id="title-text" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">An Error Message</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-error-alert">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-error-alert">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-error-alert">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-error-message waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-error-alert">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: 'Error',
    icon: 'error'
  })
            </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- A Info message -->
    <div class="col m6 s12">
      <div id="info-message" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A Info Alert</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-info-message">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-info-message">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-info-message">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-info-message waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-info-message">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
swal({
  title: 'Info',
  icon: 'info'
})
            </code></pre>
          </div>
        </div>
      </div>
    </div>

    <!-- A Warning Message -->
    <div class="col m6 s12">
      <div id="warning-message1" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">An Warning Alert</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-warning-message">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-warning-message">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-warning-message">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-warning-message waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-warning-message">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: 'Warning',
    icon: 'warning'
  })
            </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- A success message! With Button -->
    <div class="col m6 s12">
      <div id="success-message" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A success message with button!</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-success-message-with-button">View</a>
                  </li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-success-message-with-button-view">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-success-message-with-button">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-success waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-success-message-with-button-view">
            <pre class="language-javascript-view"><code class="language-javascript" data-language="javascript">
swal("Good job!", "You clicked the button!", "success")
            </code></pre>
          </div>
        </div>
      </div>
    </div>

    <!-- warning message -->
    <div class="col m6 s12">
      <div id="warning-message" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title"> A Warning Alert with "Confirm" button</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-warning-message-with-button">View</a>
                  </li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-warning-message-with-button-view">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-warning-message-with-button">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-warning-confirm waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-warning-message-with-button-view">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    icon: 'warning',
    buttons: {
      cancel: true,
      delete: 'Yes, Delete It'
    }
  })</code>
          </pre>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">

    <!-- passing a parameter -->
    <div class="col m6 s12">
      <div id="passing-parameter" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">You can execute something else for "Cancel".</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-passing-parameter">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-passing-parameter">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-passing-parameter">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-warning-cancel waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-passing-parameter">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    icon: 'warning',
    dangerMode: true,
    buttons: {
      cancel: 'No, Please!',
      delete: 'Yes, Delete It'
    }
  }).then(function (willDelete) {
    if (willDelete) {
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your imaginary file is safe", {
        title: 'Cancelled',
        icon: "error",
      });
    }
  });</code>
              </pre>
          </div>
        </div>
      </div>
    </div>

    <!-- A message with a custom icon -->
    <div class="col m6 s12">
      <div id="custom-icon" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A message with a custom icon</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-custom-icon">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-custom-icon">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-custom-icon">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-custom-icon waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-custom-icon">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: "Sweet!",
    text: "Here's a custom image.",
    icon: '../../../images/favicon/apple-touch-icon-152x152.png'
  });</code>
              </pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- An HTML message -->
    <div class="col m6 s12">
      <div class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">An HTML message</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-js-message">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-message">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-js-message">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-message-html waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-message">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
var el = document.createElement('span'),
t = document.createTextNode("Custom HTML Message!!");
el.style.cssText = 'color:#F6BB42';
el.appendChild(t);
swal({
  title: 'HTML Alert!',
  content: {
    element: el,
  }
});</code>
            </pre>
          </div>
        </div>
      </div>
    </div>

    <!-- A message with auto close timer -->
    <div class="col m6 s12">
      <div id="close-timer" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A message with auto close timer</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-close-timer">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-close-timer">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-close-timer">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-timer waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-close-timer">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    title: "Auto close alert!",
    text: "I will close in 2 seconds.",
    timer: 2000,
    buttons: false
  });</code>
              </pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- replacement function -->
    <div class="col m6 s12">
      <div id="replacement-function" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">A replacement for the "prompt" function</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-replacement-function">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-replacement-function">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-replacement-function">
            <div class="row">
              <div class="col s12">
                <button class="btn btn-input waves-effect waves-light">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-replacement-function">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
swal("Write something interesting:", {
content: "input",
})
.then((value) => {
  if (value === false) return false;
  if (value === "") {
    swal("You need to write something!", "", "error");
    return false;
  }
  swal(`You typed: ${value}`);
})</code>
                </pre>
          </div>
        </div>
      </div>
    </div>

    <!-- With a loader -->
    <div class="col m6 s12">
      <div id="with-loader" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l8">
                <h4 class="card-title">With a loader (for AJAX request for example)</h4>
              </div>
              <div class="col s12 m6 l4">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-with-loader">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-with-loader">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-with-loader">
            <div class="row">
              <div class="col s12">
                <button class="btn waves-effect waves-light btn-ajax">Try Me!</button>
              </div>
            </div>
          </div>
          <div id="js-with-loader">
            <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  swal({
    text: 'Search for a movie. e.g. "La La Land".',
    content: "input",
    button: {
      text: "Search!",
      closeModal: false,
    },
  })
    .then(name => {
      if (!name) throw null;

      return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
    })
    .then(results => {
      return results.json();
    })
    .then(json => {
      const movie = json.results[0];

      if (!movie) {
        return swal("No movie was found!");
      }

      const name = movie.trackName;
      const imageURL = movie.artworkUrl100;

      swal({
        title: "Top result:",
        text: name,
        icon: imageURL,
      });
    })
    .catch(err => {
      if (err) {
        swal("Oh noes!", "The AJAX request failed!", "error");
      } else {
        swal.stopLoading();
        swal.close();
      }
    });
});</code>
            </pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/sweetalert/sweetalert.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/extra-components-sweetalert.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\extra-components-sweetalert.blade.php ENDPATH**/ ?>