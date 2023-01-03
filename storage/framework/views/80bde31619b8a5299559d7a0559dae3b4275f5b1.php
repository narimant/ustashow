<?php $__env->startSection('content'); ?>


    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">Confirmed  message </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(_('auther name')); ?></th>
                    <th><?php echo e(_('Comment')); ?></th>
                    <th><?php echo e(_('post relation')); ?></th>
                    <th><?php echo e(_('Settings')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1
                ?>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td> <?php echo e($comment->user->name); ?></td>
                        <td><?php echo e($comment->comment); ?></td>
                        <td><a href="<?php echo e($comment->commentable->path()); ?>"> <?php echo e($comment->commentable->title); ?> </a> </td>


                        <td >
                            <form action="<?php echo e(route('comments.destroy' , ['comment'=>$comment->id])); ?>" method="post">

                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="btn btn-group">

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" type="submit"><?php echo e(_('Delete')); ?></button>
                                </div>
                            </form>
                            <form action="<?php echo e(route('comments.update' , ['comment'=>$comment->id])); ?>" method="post">

                                <?php echo method_field('patch'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="btn btn-group">

                                    <button class="btn btn-success btn-sm" type="submit"><?php echo e(_('Accept')); ?></button>
                                </div>
                            </form>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
            <?php echo e($comments->links()); ?>

        </div>

            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/Admin/comment/unsucsess.blade.php ENDPATH**/ ?>