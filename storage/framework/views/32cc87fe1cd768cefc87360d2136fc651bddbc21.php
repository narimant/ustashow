


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
                        <div class="form-group">
                            <label for="name"><?php echo e(__('adminPanel.Name')); ?></label>
                            <input type="text" id="name"  class="form-control" value="<?php echo e($user->name); ?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="level"><?php echo e(__('adminPanel.Level')); ?></label>
                            <select name="level" class="form-control" id="level">
                                <option value="users"><?php echo e(__('adminPanel.User')); ?></option>
                                <option value="admin"><?php echo e(__('adminPanel.Admin')); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email"><?php echo e(__('adminPanel.Email')); ?></label>
                            <input type="text" id="email" disabled value="<?php echo e($user->email); ?>" class="form-control disabled">
                        </div>
                        <div class="form-group">
                            <label for="password"><?php echo e(__('adminPanel.Password')); ?></label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                <input type="submit" value="update" class="btn btn-primary ">
                    </form>
                </div>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/Admin/users/edit.blade.php ENDPATH**/ ?>