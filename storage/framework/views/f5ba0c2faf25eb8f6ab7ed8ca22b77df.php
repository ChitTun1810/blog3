<?php $__env->startSection("content"); ?>
    <div class="container" style="max-width: 800px">
        <?php if(session("info")): ?>
            <div class="alert alert-info">
                <?php echo e(session("info")); ?>

            </div>
        <?php endif; ?>

        <div class="card mb-2 border-primary" style="font-size: 1.3em">
            <div class="card-body">
                <h3 class="card-title"><?php echo e($article->title); ?> <a href="<?php echo e(url("/articles/edit/$article->id")); ?>" class="h6 text-muted float-end">Edit</a> </h3>
                <div class="text-muted" style="font-size: 0.8em">
                    <b class="text-success"><?php echo e($article->user->name); ?></b>,
                    Category: <b><?php echo e($article->category->name); ?></b>,
                    <?php echo e($article->created_at->diffForHumans()); ?>

                </div>
                <div>
                    <?php echo e($article->body); ?>

                </div>
                <div class="mt-2">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-article', $article)): ?>
                            <a href="<?php echo e(url("/articles/delete/$article->id")); ?>" class="btn btn-danger btn-sm">
                            Delete</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <ul class="list-group mt-3">
                    <li class="list-group-item active">
                        Comments (<?php echo e(count($article->comments)); ?>)
                    </li>
                    <?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <?php if(auth()->guard()->check()): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-comment', $comment)): ?>
                                <a href="<?php echo e(url("/comments/delete/$comment->id")); ?>" class="btn-close float-end"></a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <b class="text-success"><?php echo e($article->user->name); ?></b>:
                            <?php echo e($comment->content); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(auth()->guard()->check()): ?>
                        <form action="<?php echo e(url("comments/add")); ?>" method="post" class="mt-2">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="article_id" value="<?php echo e($article->id); ?>">
                            <textarea class="form-control mb-2" name="content"></textarea>
                            <button class="btn btn-secondary">Add Comment</button>
                        </form>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\blog\resources\views/articles/detail.blade.php ENDPATH**/ ?>