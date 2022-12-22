<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title "><?php echo e(__('adminPanel.All Tags')); ?></h3>
                    <a href="<?php echo e(route('tags.create')); ?>" class="btn btn-warning ml-auto p-2"><?php echo e(__('adminPanel.Create Tag')); ?></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="col-2">#</th>
                            <th><?php echo e(__('adminPanel.Tags Name')); ?></th>

                            <th class="col-2"><?php echo e(__('adminPanel.Settings')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1
                        ?>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><a href="<?php echo e($tag->path()); ?>"> <?php echo e($tag->name); ?></a></td>


                                <td>
                                    <form action="<?php echo e(route('tags.destroy' , ['tag'=>$tag->id])); ?>" method="post">

                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="btn btn-group">
                                            <a   href="<?php echo e(route('tags.edit', [ 'tag'=>$tag->id])); ?>" class="btn btn-primary"><?php echo e(__('adminPanel.Edit')); ?></a>
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" ><?php echo e(__('adminPanel.Delete')); ?></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->
                <?php echo e($tags->links()); ?>

            </div>





        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/tag/index.blade.php ENDPATH**/ ?>