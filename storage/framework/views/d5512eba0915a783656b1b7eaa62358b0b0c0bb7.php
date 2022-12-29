<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Payment</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(_('auther name')); ?></th>
                    <th><?php echo e(_('Price')); ?></th>
                    <th><?php echo e(_('Pay Type')); ?></th>
                    <th><?php echo e(_('Settings')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1
                ?>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td> <?php echo e($payment->user->name); ?></td>
                        <td><?php echo e($payment->price); ?></td>

                        <?php if($payment->course_id=='vip'): ?>
                            <td>vip</td>
                        <?php else: ?>
                            <td><a href="<?php echo e($payment->course->path()); ?>"> <?php echo e($payment->course->title); ?></a></td>
                        <?php endif; ?>




                        <td>

                            <form action="<?php echo e(route('payments.destroy' , ['payment'=>$payment->id])); ?>" method="post">

                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="btn btn-group">

                                    <button class="btn btn-danger" type="submit"><?php echo e(_('delete')); ?></button>
                                </div>
                            </form>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
                </div>
            <?php echo e($payments->links()); ?>

                </div>

            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/Payment/all.blade.php ENDPATH**/ ?>