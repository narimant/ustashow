<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">Main Site Seo</h3>
                    <a href="<?php echo e(route('siteseo.create')); ?>" class="btn btn-warning ml-auto p-2">Create Seo</a>
                </div>



                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(_('Seto Title')); ?></th>
                            <th><?php echo e(_('Seo Description')); ?></th>
                            <th><?php echo e(_('Seo language')); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1
                        ?>
                        <?php $__currentLoopData = $siteseo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td> <?php echo e($seo->site_title); ?></td>
                                <td> <?php echo e($seo->site_description); ?></td>
                                <td> <?php echo e($seo->lang); ?></td>
                                <td>
                                    <form action="<?php echo e(route('siteseo.destroy' , ['siteseo'=>$seo->id])); ?>" method="post">

                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="btn btn-group">
                                            <a   href="<?php echo e(route('siteseo.edit', [ 'siteseo'=>$seo->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>

                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" ><?php echo e(_('Delete')); ?></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->

            </div>





        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/site/seoindex.blade.php ENDPATH**/ ?>