<?php $__env->startSection("content"); ?>
    <div class="container" style="max-width: 800px">

        <?php echo e($articles->links()); ?>


        <?php if(session('info')): ?>
            <div class="alert alert-info">
                <?php echo e(session('info')); ?>

            </div>
        <?php endif; ?>

        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-2">
            <div class="card-body">
                <h3 class="h4 card-title"><?php echo e($article->title); ?></h3>
                <div class="text-muted" style="font-size: 0.8em">
                    <b class="text-success"><?php echo e($article->user->name); ?></b>,
                    Category: <b><?php echo e($article->category->name); ?></b>,
                    <?php echo e($article->created_at->diffForHumans()); ?>,
                    Comments <b>(<?php echo e(count($article->comments)); ?>)</b>
                </div>
                <div>
                    <?php echo e($article->body); ?>

                </div>
                <div class="mt-2">
                    <a href="<?php echo e(url("/articles/detail/$article->id")); ?>">
                        View Detail &raquo;
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\blog\resources\views/articles/index.blade.php ENDPATH**/ ?>