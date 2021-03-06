<?php $__env->startSection('title','Form Validation'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption">jQuery Validation Plugin</p>
      <p><a href="http://jqueryvalidation.org/" target="_blank">jQuery Validation</a> This jQuery plugin makes simple
        clientside form validation easy, whilst still offering plenty of customization options.</p>
    </div>
  </div>

  <!-- HTML VALIDATION  -->

  <div class="row">
    <div class="col s12">
      <div id="html-validations" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">HTML Validation Example</h4>
              </div>
              <div class="col s12 m6 l2">
              </div>
            </div>
          </div>
          <div id="html-view-validations">
            <form class="formValidate0" id="formValidate0" method="get">
              <div class="row">
                <div class="input-field col s12">
                  <label for="uname0">Username*</label>
                  <input class="validate" required id="uname0" name="uname0" type="text">
                </div>
                <div class="input-field col s12">
                  <label for="cemail0">E-Mail *</label>
                  <input class="validate" required id="cemail0" type="email" name="cemail0">
                </div>
                <div class="input-field col s12">
                  <label for="password0">Password *</label>
                  <input class="validate" required id="password0" type="password" name="password0">
                </div>
                <div class="input-field col s12">
                  <label for="cpassword0">Confirm Password *</label>
                  <input class="validate" required id="cpassword0" type="password" name="cpassword0">
                </div>
                <div class="input-field col s12">
                  <label for="curl0">URL *</label>
                  <input class="validate" required id="curl0" type="url" name="curl0">
                </div>
                <div class="col s12">
                  <label for="role">Role</label>
                  <select class="error validate" id="role" name="role" required>
                    <option value="" disabled selected>Choose your profile</option>
                    <option value="1">Manager</option>
                    <option value="2">Developer</option>
                    <option value="3">Business</option>
                  </select>
                  <div class="input-field">
                  </div>
                </div>
                <div class="input-field col s12">
                  <textarea id="ccomment0" name="ccomment0" class="materialize-textarea validate" required></textarea>
                  <label for="ccomment0">Your comment *</label>
                </div>
                <div class="col s12">
                  <p>Gender</p>
                  <p>
                    <label>
                      <input class="validate" required name="gender0" type="radio" checked />
                      <span>Male</span>
                    </label>
                  </p>

                  <label>
                    <input class="validate" required name="gender0" type="radio" />
                    <span>Female</span>
                  </label>
                  <div class="input-field">
                  </div>
                </div>
                <div class="col s12">
                  <label for="tnc_select1">T&C *</label>
                  <p>
                    <label>
                      <input class="validate" required id="tnc_select1" type="checkbox" />
                      <span>Please agree to our policies</span>
                    </label>
                  </p>
                  <div class="input-field">
                  </div>
                </div>
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- JQUERY VALIDATION -->

  <div class="row">
    <div class="col s12">
      <div id="validations" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Jquery Validation Example</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-validations">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#js-validations">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-validations">
            <form class="formValidate" id="formValidate" method="get">
              <div class="row">
                <div class="input-field col s12">
                  <label for="uname">Username*</label>
                  <input id="uname" name="uname" type="text" data-error=".errorTxt1">
                  <small class="errorTxt1"></small>
                </div>
                <div class="input-field col s12">
                  <label for="cemail">E-Mail *</label>
                  <input id="cemail" type="email" name="cemail" data-error=".errorTxt2">
                  <small class="errorTxt2"></small>
                </div>
                <div class="input-field col s12">
                  <label for="password">Password *</label>
                  <input id="password" type="password" name="password" data-error=".errorTxt3">
                  <small class="errorTxt3"></small>
                </div>
                <div class="input-field col s12">
                  <label for="cpassword">Confirm Password *</label>
                  <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt4">
                  <small class="errorTxt4"></small>
                </div>
                <div class="input-field col s12">
                  <label for="curl">URL *</label>
                  <input id="curl" type="url" name="curl" data-error=".errorTxt5">
                  <small class="errorTxt5"></small>
                </div>
                <div class="col s12">
                  <label for="crole">Role *</label>
                  <div class="input-field">
                    <select class="error" id="crole" name="crole" data-error=".errorTxt6" required>
                      <option value="">Choose your profile</option>
                      <option value="1">Manager</option>
                      <option value="2">Developer</option>
                      <option value="3">Business</option>
                    </select>
                    <small class="errorTxt6"></small>
                  </div>
                </div>
                <div class="input-field col s12">
                  <textarea id="ccomment" name="ccomment" class="materialize-textarea validate"
                    data-error=".errorTxt7"></textarea>
                  <label for="ccomment">Your comment *</label>
                  <small class="errorTxt7"></small>
                </div>
                <div class="col s12">
                  <p>Gender </p>
                  <p>
                    <label>
                      <input name="gender" type="radio" checked />
                      <span>Male</span>
                    </label>
                  </p>

                  <label>
                    <input name="gender" type="radio" />
                    <span>Female</span>
                  </label>
                  <div class="input-field">
                    <small class="errorTxt8"></small>
                  </div>
                </div>
                <div class="col s12">
                  <label for="tnc_select">T&C *</label>
                  <p>
                    <label>
                      <input type="checkbox" id="tnc_select" />
                      <span>Please agree to our policies</span>
                    </label>
                  </p>
                  <div class="input-field">
                    <small class="errorTxt6"></small>
                  </div>
                </div>
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div id="js-validations">
            <pre><code class="language-javascript col s12">
  $('select[required]').css({
    position: 'absolute',
    display: 'inline',
    height: 0,
    padding: 0,
    border: '1px solid rgba(255,255,255,0)',
    width: 0
  }); 

  $("#formValidate").validate({
    rules: {
      uname: {
        required: true,
        minlength: 5
      },
      cemail: {
        required: true,
        email:true
      },
      password: {
        required: true,
        minlength: 5
      },
      cpassword: {
        required: true,
        minlength: 5,
        equalTo: "#password"
      },
      curl: {
        required: true,
        url:true
      },
      crole:{
        required: true,
      },
      ccomment: {
        required: true,
        minlength: 15
      },
      cgender:"required",
      cagree:"required",
      },
      //For custom messages
      messages: {
      uname:{
        required: "Enter a username",
        minlength: "Enter at least 5 characters"
      },
      curl: "Enter your website",
      },
      errorElement : 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
      error.insertAfter(element);
      }
    }
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
<script src="<?php echo e(asset('vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-validation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\form-validation.blade.php ENDPATH**/ ?>