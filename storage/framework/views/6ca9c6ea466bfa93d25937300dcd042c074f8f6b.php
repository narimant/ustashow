<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">footer Settings</h3>

                </div>



                <div class="card-body">
                    <form method="post" action="<?php echo e(route('footer.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(_('Pages Title')); ?></th>
                            <th><?php echo e(_('Status For Footer')); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1
                        ?>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td> <?php echo e($page->title); ?></td>
                                <td> <input type="checkbox" name="attachTo[]" value="<?php echo e($page->id); ?>" class="form-check form-control-lg" <?php echo e($page->attachTo=='footer' ?'checked' : ''); ?>> </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <button class="btn btn-primary"><?php echo e(__('messages.Save')); ?></button>
                    </form>
                </div>
                <!-- /.card-body paginate -->

            </div>





        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/site/footerindex.blade.php ENDPATH**/ ?>