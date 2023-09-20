<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 600px">
    <form method="post">
        <?php echo csrf_field(); ?>
        
        <div class="mb-2">
            <input type="text" name="title" value="<?php echo e($edit->title); ?> " class="form-control">
        </div>
        <div class="mb-2">
            <textarea name="body" class="form-control"><?php echo e($edit->body); ?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Edit Post">
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\blog\resources\views/articles/edit.blade.php ENDPATH**/ ?>