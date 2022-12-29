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
                    <form method="post" action="<?php echo e(route('user.update',['user'=>$user->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <input type="text"  value="<?php echo e($user->name); ?>" name="name">
                        <select name="level">
                            <option value="users"><?php echo e(__('adminPanel.User')); ?></option>
                            <option value="admin"><?php echo e(__('adminPanel.Admin')); ?></option>
                        </select>
                        <input type="text" disabled value="<?php echo e($user->email); ?>" >
                        <input type="password" name="password">
                <input type="submit" value="update">
                    </form>
                </div>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/users/edit.blade.php ENDPATH**/ ?>