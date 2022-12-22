<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">Admin Users</h3>
                    <a href="<?php echo e(route('lvl.create')); ?>" class="btn btn-warning ml-auto p-2">Register User Role</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">


            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(_('User name')); ?></th>
                <th><?php echo e(_('Email')); ?></th>
                <th><?php echo e(_('Role')); ?></th>
                <th><?php echo e(_('Settings')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i=1
            ?>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($role->users)): ?>
                    <?php $__currentLoopData = $role->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($role->name); ?> - <?php echo e($role->label); ?></td>

                        <td>
                            <form action="<?php echo e(route('lvl.destroy' , ['user'=>$user->id])); ?>" method="post">

                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="btn btn-group">
                                    <a href="<?php echo e(route('lvl.edit', [ 'user'=>$user->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                    <button class="btn btn-danger" type="submit"><?php echo e(_('Delete')); ?></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
                </div>
        <?php echo e($roles->links()); ?>

                </div>





            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/lvlAdmins/all.blade.php ENDPATH**/ ?>