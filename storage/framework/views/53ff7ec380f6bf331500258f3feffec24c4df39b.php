<?php $__env->startSection('content'); ?>


    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Permissions</h3>
                    <a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-warning  ml-auto p-2">Create Permission</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">


            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(_('Roles name')); ?></th>
                <th><?php echo e(_('Label')); ?></th>

                <th><?php echo e(_('Settings')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i=1
            ?>
            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($permission->name); ?></td>
                    <td><?php echo e($permission->label); ?></td>


                    <td>
                        <form action="<?php echo e(route('permissions.destroy' , ['permission'=>$permission->id])); ?>" method="post">

                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="btn btn-group">
                                 <a href="<?php echo e(route('permissions.edit', [ 'permission'=>$permission->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                <button class="btn btn-danger" type="submit"><?php echo e(_('Delete')); ?></button>
                            </div>
                        </form>
                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
                </div>
        <?php echo e($permissions->links()); ?>

                </div>


            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/Admin/permissions/all.blade.php ENDPATH**/ ?>