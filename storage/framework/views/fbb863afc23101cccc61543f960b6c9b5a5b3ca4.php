<input type="hidden" id="filesType" name="filesType"/>
<?php if(isset($files) && !empty($files)): ?>
<?php
//echo '<pre>';
//print_r($files); die;
$i=1;
?>
<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileNames): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($fileNames!='.' && $fileNames!='..'): ?>

<div class="row" style="<?php echo e($i!=1 ? 'margin-top:60px':''); ?>">
    <div class="input-field col m6 s6"> 
        <label>
            <input type="radio" class="myFilesNameSelect" name="myFilesNameSelect" value="<?php echo e(isset($fileNames)?$fileNames:''); ?>" />            
            <span><?php echo e(isset($fileNames) && $fileNames!=''?$fileNames:''); ?></span>
        </label>
    </div>
    <div class="input-field col m6 s6">                                
        <label>   
            <embed src= "<?php echo e(url('/').'/internal/uploads/'.Auth::user()->username.'/'.$fileNames); ?>" width= "300" height= "75">
        </label>
    </div>

</div>
<?php $i++; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\session\syatemfileslist.blade.php ENDPATH**/ ?>