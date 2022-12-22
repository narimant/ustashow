<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">


                <div class="card-header">
                    <h3 class="card-title">
                        Create Permission
                    </h3>
                </div>
                <div class="card-body">


                    <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="<?php echo e(route('permissions.store')); ?>" method="post" enctype="multipart/form-data"
                          class="form-horizontal">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name"
                                   placeholder="insert permissions name ">
                        </div>
                        <div class="form-group">
                            <label for="label">Role Label</label>
                            <input type="text" value="<?php echo e(old('label')); ?>" name="label" class="form-control" id="label"
                                   placeholder="insert label ">


                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/permissions/create.blade.php ENDPATH**/ ?>