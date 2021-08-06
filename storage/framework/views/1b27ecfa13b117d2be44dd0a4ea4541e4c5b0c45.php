<?php if(Session::has('success')): ?>

<div class="card-alert card green lighten-5">
    <div class="card-content green-text">
        <p>SUCCESS : <?php echo e(Session::get('success')); ?></p>
    </div>
    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php endif; ?>
<?php if(Session::has('error')): ?>

<div class="card-alert card red lighten-5">
    <div class="card-content red-text">
        <p>FAILED : <?php echo e(Session::get('error')); ?></p>
    </div>
    <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\partials\flash-messages.blade.php ENDPATH**/ ?>