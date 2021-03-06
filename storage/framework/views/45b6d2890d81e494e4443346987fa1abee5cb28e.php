<?php $__env->startSection('title','Form Mask'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0"><a href="https://github.com/firstopinion/formatter.js" target="_blank">Formatter</a>
        Format user input to match a specified pattern.</p>
    </div>
  </div>
  <!-- Basic Demo -->
  <div class="row">
    <div class="col s12">
      <div id="basic-demo" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Basic Demo</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-basic-demo">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-basic-demo">js</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-basic-demo">
            <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input placeholder="2019-01-01" id="date-demo1" type="text" class="">
                    <label for="date-demo1">Date</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input placeholder="2019/01/01" id="date-demo2" type="text" class="">
                    <label for="date-demo2">Date</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input placeholder="00:00" id="time-demo" type="text" class="">
                    <label for="time-demo">Time</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input placeholder="2019/01/01 00:00" id="date-time" type="text" class="">
                    <label for="date-time">Date & Time</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input placeholder="00:00" id="time-demo2" type="text" class="">
                    <label for="time-demo2">Time</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input placeholder="asdfghjkl (max10)" id="characters-demo" type="text" class="">
                    <label for="characters-demo">Characters (Only)</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input placeholder="Placeholder" id="phone-input" type="text" class="">
                    <label for="phone-input">Phone Number</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input placeholder="Placeholder" id="credit-input" type="text" class="">
                    <label for="credit-input">Credit Input</label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div id="js-basic-demo">
            <pre><code class="language-javascript col s12">
      $('#date-demo1').formatter({
        'pattern': '{{9999}}-{{99}}-{{99}}',
      });
      $('#date-demo2').formatter({
        'pattern': '{{9999}}/{{99}}/{{99}}',
      });
      $('#time-demo').formatter({
        'pattern': '{{99}}:{{99}}',
      });
     $('#time-demo2').formatter({
        'pattern': '{{99}}:{{99}}',
      });
      $('#date-time').formatter({
        'pattern': '{{9999}}/{{99}}/{{99}} {{99}}:{{99}}',
      });
      $('#characters-demo').formatter({
        'pattern': '{{aaaaaaaaaa}}',
      });
     $('#phone-input').formatter({
        'pattern': '({{99}}-{{9999}}-{{9999}})',
        'persistent': true
      });
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Extended -->
  <div class="row">
    <div class="col s12">
      <div id="extended" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Extended</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-extended">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-extended">js</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-extended">
            <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input id="phone-demo" type="text" class="">
                    <label for="phone-demo">Phone</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input id="phone-code" type="text" class="">
                    <label for="phone-code">Phone Code</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input id="currency-demo" type="text" class="">
                    <label for="currency-demo">Currency</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input id="credit-demo" type="text" class="">
                    <label for="credit-demo">Credit Card</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input id="product-key" type="text" class="">
                    <label for="product-key">Product Key</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input id="purchase-code" type="text" class="">
                    <label for="purchase-code">Purchase Code</label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div id="js-extended">
            <pre><code class="language-javascript col s12">
      $('#phone-demo').formatter({
        'pattern': '({{999}}) {{999}}-{{9999}}',
        'persistent': true
      });
      $('#phone-code').formatter({
        'pattern': '+91 {{999}}-{{999}}-{{999}}-{{9999}}',
        'persistent': true
      });
    
      $('#currency-demo').formatter({
        'pattern': '$ {{999}}-{{999}}-{{999}}.{{99}}',
        'persistent': true
      });
      $('#credit-demo').formatter({
        'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
        'persistent': true
      });
    
      $('#product-key').formatter({
        'pattern': 'm{{*}}-{{999}}-{{999}}-C{{99}}',
        'persistent': true
      });
      $('#purchase-code').formatter({
        'pattern': 'ISBN{{9999}}-{{9999}}-{{9999}}-{{9999}}',
        'persistent': true
      });
    });
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/formatter/jquery.formatter.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-masks.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\form-masks.blade.php ENDPATH**/ ?>