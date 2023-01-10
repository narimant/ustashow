<?php $__env->startSection('content'); ?>


    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Users</h3>
                    <div class="btn-group  ml-auto ">
                        <a href="<?php echo e(route('lvl.index')); ?>" class="btn btn-primary btn-sm">Manager Users</a>
                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-warning btn-sm">User Role</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">




            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(_('User name')); ?></th>
                <th><?php echo e(_('Email')); ?></th>
                <th><?php echo e(_('Status')); ?></th>
                <th><?php echo e(_('Settings')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i=1
            ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>0</td>

                    <td>
                        <form action="<?php echo e(route('users.destroy' , ['user'=>$user->id])); ?>" method="post">

                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="btn btn-group">
                                <a href="<?php echo e(route('user.edit', [ 'user'=>$user->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')"><?php echo e(_('Delete')); ?></button>
                            </div>
                        </form>
                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
                </div>
        <?php echo e($users->links()); ?>

                </div>

            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/Admin/users/all.blade.php ENDPATH**/ ?>