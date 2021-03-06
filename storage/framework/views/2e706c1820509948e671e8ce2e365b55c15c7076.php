<?php $__env->startSection('title','Form Wizard'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/materialize-stepper/materialize-stepper.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/form-wizard.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section section-form-wizard">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">We use <a
          href="https://kinark.github.io/Materialize-stepper/?feedback_email=r%40m.com&feedback_password=sdasdasd#!">Stepper</a>
        as a Form Wizard. Stepper is a fundamental part of material design
        guidelines. It makes forms simplier and a lot of other stuffs.</p>
    </div>
  </div>

  <!-- Horizontal Stepper -->

  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content pb-0">
          <div class="card-header mb-2">
            <h4 class="card-title">Horizontal Stepper</h4>
          </div>

          <ul class="stepper horizontal" id="horizStepper">
            <li class="step active">
              <div class="step-title waves-effect">Step 1</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="firstName">First Name: <span class="red-text">*</span></label>
                    <input type="text" id="firstName" name="firstName" class="validate" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="lastName">Last Name: <span class="red-text">*</span></label>
                    <input type="text" id="lastName" class="validate" name="lastName" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="Email1">Email: <span class="red-text">*</span></label>
                    <input type="email" class="validate" name="Email" id="Email1" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="contactNum1">Contact Number: <span class="red-text">*</span></label>
                    <input type="number" class="validate" name="contactNum" id="contactNum1" required>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m4 s12 mb-3">
                      <button class="red btn btn-reset" type="reset">
                        <i class="material-icons left">clear</i>Reset
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="btn btn-light previous-step" disabled>
                        <i class="material-icons left">arrow_back</i>
                        Prev
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                        Next
                        <i class="material-icons right">arrow_forward</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect">Step 2</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="proposal">Proposal Title: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="proposal" name="proposal" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="job">Job Title: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="job" name="job" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="company">Previous Company:</label>
                    <input type="text" class="validate" id="company" name="company">
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="url">Video Url:</label>
                    <input type="url" class="validate" id="url">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="exp">Experience: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="exp" name="exp">
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="desc">Short Description: <span class="red-text">*</span></label>
                    <textarea name="dec" id="desc" rows="4" class="materialize-textarea"></textarea>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m4 s12 mb-3">
                      <button class="red btn btn-reset" type="reset">
                        <i class="material-icons left">clear</i>Reset
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="btn btn-light previous-step">
                        <i class="material-icons left">arrow_back</i>
                        Prev
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                        Next
                        <i class="material-icons right">arrow_forward</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect">Step 3</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="eventName">Event Name: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="eventName" name="eventName" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Select Event Type</option>
                      <option value="Wedding">Wedding</option>
                      <option value="Party">Party</option>
                      <option value="FundRaiser">Fund Raiser</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Select Event Status</option>
                      <option value="Planning">Planning</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </div>
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Event Location</option>
                      <option value="New York">New York</option>
                      <option value="Queens">Queens</option>
                      <option value="Washington">Washington</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="Budget">Event Budget: <span class="red-text">*</span></label>
                    <input type="Number" class="validate" id="Budget" name="Budget">
                  </div>
                  <div class="input-field col m6 s12">
                    <p> <label>Requirments</label></p>
                    <p> <label>
                        <input type="checkbox">
                        <span>Staffing</span>
                      </label></p>
                    <p><label>
                        <input type="checkbox">
                        <span>Catering</span>
                      </label></p>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m6 s12 mb-1">
                      <button class="red btn mr-1 btn-reset" type="reset">
                        <i class="material-icons">clear</i>
                        Reset
                      </button>
                    </div>
                    <div class="col m6 s12 mb-1">
                      <button class="waves-effect waves-dark btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Linear Stepper -->

  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <div class="card-header">
            <h4 class="card-title">Linear Stepper</h4>
          </div>

          <ul class="stepper linear" id="linearStepper">
            <li class="step active">
              <div class="step-title waves-effect">Step 1</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="firstName12">First Name: <span class="red-text">*</span></label>
                    <input type="text" id="firstName12" name="firstName1" class="validate" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="lastName1">Last Name: <span class="red-text">*</span></label>
                    <input type="text" id="lastName1" class="validate" name="lastName1" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="Email2">Email: <span class="red-text">*</span></label>
                    <input type="email" class="validate" name="Email" id="Email2" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="contactNum2">Contact Number: <span class="red-text">*</span></label>
                    <input type="number" class="validate" name="contactNum" id="contactNum2" required>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m4 s12 mb-3">
                      <button class="red btn btn-reset" type="reset">
                        <i class="material-icons left">clear</i>Reset
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="btn btn-light previous-step" disabled>
                        <i class="material-icons left">arrow_back</i>
                        Prev
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                        Next
                        <i class="material-icons right">arrow_forward</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect">Step 2</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="proposal1">Proposal Title: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="proposal1" name="proposal1" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="job1">Job Title: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="job1" name="job1" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="company12">Previous Company:</label>
                    <input type="text" class="validate" id="company12" name="company1">
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="url1">Video Url:</label>
                    <input type="url" class="validate" id="url1">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="exp1">Experience: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="exp1" name="exp1">
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="desc1">Short Description: <span class="red-text">*</span></label>
                    <textarea name="desc" id="desc1" rows="4" class="materialize-textarea"></textarea>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m4 s12 mb-3">
                      <button class="red btn btn-reset" type="reset">
                        <i class="material-icons left">clear</i>Reset
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="btn btn-light previous-step">
                        <i class="material-icons left">arrow_back</i>
                        Prev
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                        Next
                        <i class="material-icons right">arrow_forward</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect">Step 3</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="eventName1">Event Name: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="eventName1" name="eventName1" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Select Event Type</option>
                      <option value="Wedding">Wedding</option>
                      <option value="Party">Party</option>
                      <option value="FundRaiser">Fund Raiser</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Select Event Status</option>
                      <option value="Planning">Planning</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </div>
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Event Location</option>
                      <option value="New York">New York</option>
                      <option value="Queens">Queens</option>
                      <option value="Washington">Washington</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="Budget1">Event Budget: <span class="red-text">*</span></label>
                    <input type="Number" class="validate" id="Budget1" name="Budget1">
                  </div>
                  <div class="input-field col m6 s12">
                    <p> <label>Requirments</label></p>
                    <p> <label>
                        <input type="checkbox">
                        <span>Staffing</span>
                      </label></p>
                    <p><label>
                        <input type="checkbox">
                        <span>Catering</span>
                      </label></p>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m6 s12 mb-1">
                      <button class="red btn mr-1 btn-reset" type="reset">
                        <i class="material-icons">clear</i>
                        Reset
                      </button>
                    </div>
                    <div class="col m6 s12 mb-1">
                      <button class="waves-effect waves-dark btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Non Linear Stepper -->

  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <div class="card-header">
            <h4 class="card-title">Non Linear Stepper</h4>
            <p>In the Non-Linear Stepper you can navigate freely between steps. You can also use the
              buttons for validation, but if the user wants to move arbitrarily around the steps, it's
              allowed by clicking on the steps instead of the buttons.</p>
          </div>

          <ul class="stepper" id="nonLinearStepper">
            <li class="step active">
              <div class="step-title waves-effect">Step 1</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="firstName1">First Name: <span class="red-text">*</span></label>
                    <input type="text" id="firstName1" name="firstName1" class="validate" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="lastName12">Last Name: <span class="red-text">*</span></label>
                    <input type="text" id="lastName12" class="validate" name="lastName1" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="Email">Email: <span class="red-text">*</span></label>
                    <input type="email" class="validate" name="Email" id="Email" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="contactNum">Contact Number: <span class="red-text">*</span></label>
                    <input type="number" class="validate" name="contactNum" id="contactNum" required>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m4 s12 mb-3">
                      <button class="red btn btn-reset" type="reset">
                        <i class="material-icons left">clear</i>Reset
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="btn btn-light previous-step" disabled>
                        <i class="material-icons left">arrow_back</i>
                        Prev
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                        Next
                        <i class="material-icons right">arrow_forward</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect">Step 2</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="proposal12">Proposal Title: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="proposal12" name="proposal1" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="job12">Job Title: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="job12" name="job1" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="company1">Previous Company:</label>
                    <input type="text" class="validate" id="company1" name="company1">
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="url123">Video Url:</label>
                    <input type="url" class="validate" id="url123">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="exp123">Experience: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="exp123" name="exp1">
                  </div>
                  <div class="input-field col m6 s12">
                    <label for="desc123">Short Description: <span class="red-text">*</span></label>
                    <textarea name="desc" id="desc123" rows="4" class="materialize-textarea"></textarea>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m4 s12 mb-3">
                      <button class="red btn btn-reset" type="reset">
                        <i class="material-icons left">clear</i>Reset
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="btn btn-light previous-step">
                        <i class="material-icons left">arrow_back</i>
                        Prev
                      </button>
                    </div>
                    <div class="col m4 s12 mb-3">
                      <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                        Next
                        <i class="material-icons right">arrow_forward</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="step">
              <div class="step-title waves-effect">Step 3</div>
              <div class="step-content">
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="eventName123">Event Name: <span class="red-text">*</span></label>
                    <input type="text" class="validate" id="eventName123" name="eventName1" required>
                  </div>
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Select Event Type</option>
                      <option value="Wedding">Wedding</option>
                      <option value="Party">Party</option>
                      <option value="FundRaiser">Fund Raiser</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Select Event Status</option>
                      <option value="Planning">Planning</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </div>
                  <div class="input-field col m6 s12">
                    <select>
                      <option value="Select" disabled selected>Event Location</option>
                      <option value="New York">New York</option>
                      <option value="Queens">Queens</option>
                      <option value="Washington">Washington</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <label for="Budget123">Event Budget: <span class="red-text">*</span></label>
                    <input type="Number" class="validate" id="Budget123" name="Budget1">
                  </div>
                  <div class="input-field col m6 s12">
                    <p> <label>Requirments</label></p>
                    <p> <label>
                        <input type="checkbox">
                        <span>Staffing</span>
                      </label></p>
                    <p><label>
                        <input type="checkbox">
                        <span>Catering</span>
                      </label></p>
                  </div>
                </div>
                <div class="step-actions">
                  <div class="row">
                    <div class="col m6 s12 mb-1">
                      <button class="red btn mr-1 btn-reset" type="reset">
                        <i class="material-icons">clear</i>
                        Reset
                      </button>
                    </div>
                    <div class="col m6 s12 mb-1">
                      <button class="waves-effect waves-dark btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/materialize-stepper/materialize-stepper.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/form-wizard.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\form-wizard.blade.php ENDPATH**/ ?>