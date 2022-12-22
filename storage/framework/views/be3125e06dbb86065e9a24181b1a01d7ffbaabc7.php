<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Roles</h3>

                    <div class="btn-group ml-auto p-2">
                        <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary btn-sm">Create Role</a>
                        <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-warning btn-sm">User Permission</a>
                    </div>
                </div>
                <!-- /.card-body -->
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
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($role->name); ?></td>
                                <td><?php echo e($role->label); ?></td>


                                <td>
                                    <form action="<?php echo e(route('roles.destroy' , ['role'=>$role->id])); ?>" method="post">

                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="btn btn-group">
                                            <a href="<?php echo e(route('roles.edit', [ 'role'=>$role->id])); ?>"
                                               class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                            <button class="btn btn-danger" type="submit"><?php echo e(_('Delete')); ?></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
                <?php echo e($roles->links()); ?>

            </div>


        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/roles/all.blade.php ENDPATH**/ ?>