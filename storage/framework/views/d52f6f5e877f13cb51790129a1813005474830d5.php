<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('#user_id').selectpicker();
            $('#role_id').selectpicker();
        })
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2 >Register Role</h2>
        <form class="form-horizontal" action="<?php echo e(route('lvl.update',['user'=>$user->id])); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo method_field('PATCH'); ?>
            <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <div class="col-sm-12">
                    Edit for User : <?php echo e($user->name); ?>

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="role_id" class="control-label">Roles</label>
                    <select class="form-control" name="role_id" id="role_id">
                        <?php $__currentLoopData = \App\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>" <?php echo e($user->hasRole($role->name) ? 'selected' : ''); ?>><?php echo e($role->name); ?> - <?php echo e($role->label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">Add</button>
                </div>
            </div>
        </form>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/lvlAdmins/edit.blade.php ENDPATH**/ ?>