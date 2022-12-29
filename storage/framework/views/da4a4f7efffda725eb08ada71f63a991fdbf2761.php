<?php $__env->startSection('content'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">




        <h2 >Create Role</h2>

            <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('permissions.update',['permission'=>$permission->id])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group">
                    <label  for="name">Role Name</label>
                    <input type="text" name="name" value="<?php echo e($permission->name); ?>" class="form-control" id="name" placeholder="insert role name " >
                </div>
                <div class="form-group">
                    <label  for="label">Role Label</label>
                    <input type="text"  value="<?php echo e($permission->label); ?>"  name="label"  class="form-control" id="label" placeholder="insert label " >


                </div>




                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>

    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/permissions/edit.blade.php ENDPATH**/ ?>