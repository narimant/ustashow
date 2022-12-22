<?php $__env->startSection('content'); ?>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">


                <div class="card-header">
                    <h3 class="card-title">
                        Create Role
                    </h3>
                </div>
                <div class="card-body">






            <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('roles.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label  for="name">Role Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name" placeholder="insert role name " >
                </div>
                <div class="form-group">
                    <label  for="label">Role Label</label>
                    <input type="text"  value="<?php echo e(old('label')); ?>"  name="label"  class="form-control" id="label" placeholder="insert label " >


                </div>

                <?php
                use App\Permission;
                $permisons=Permission::all();
                ?>
                <div class="row ">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#3</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $permisons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permison): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-label" name="permissions[]" value="<?php echo e($permison->id); ?>"> <label><?php echo e($permison->name); ?></label>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled="">
                                <label for="customCheckbox1" class="custom-control-label">Bug</label>
                            </div>

                        </div>
                    </div>

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

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/roles/create.blade.php ENDPATH**/ ?>