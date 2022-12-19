<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Articles</h3>
                    <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-warning ml-auto p-2">Create category</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="col-2">#</th>
                            <th><?php echo e(_('name')); ?></th>

                            <th class="col-2"><?php echo e(_('Settings')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $j=1
                        ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($category->parent_id==null): ?>
                            <tr>
                                <td><?php echo e($j++); ?></td>
                                <td><A href="<?php echo e($category->path()); ?>"> <?php echo e($category->name); ?></A></td>


                                <td>
                                    <form action="<?php echo e(route('categories.destroy' , ['category'=>$category->id])); ?>" method="post">

                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="btn btn-group">
                                            <a   href="<?php echo e(route('categories.edit', [ 'category'=>$category->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" ><?php echo e(_('Delete')); ?></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <?php endif; ?>

                                <?php if($category->sub_category->count()): ?>
                                    <?php $i=1; ?>
                                    <?php echo $__env->make('Admin.category.catindex',['child' => $category->sub_category ,'i' => $i,'j'=>$j++], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>



                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->
                <?php echo e($categories->links()); ?>

            </div>





        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/category/index.blade.php ENDPATH**/ ?>