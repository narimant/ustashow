<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title "><?php echo e(__('adminPanel.All Pages')); ?></h3>
                    <a href="<?php echo e(route('pages.create')); ?>" class="btn btn-warning ml-auto p-2"><?php echo e(__('adminPanel.Create Page')); ?></a>
                </div>
                <!-- /.card-header -->
                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='' ? "active" : ''); ?>"  href="<?php echo e(route('pages.index')); ?>"  > <?php echo e(__('adminPanel.Active Pages')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='draft' ? "active" : ''); ?>"  href="<?php echo e(route('pages.index',['show'=>'draft'])); ?>"  > <?php echo e(__('adminPanel.Draft Pages')); ?> <?php if($draftcount>0): ?><span class="badge badge-primary right"><?php echo e($draftcount); ?><?php endif; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='trash' ? "active" : ''); ?>"  href="<?php echo e(route('pages.index',['show'=>'trash'])); ?>"  ><?php echo e(__('adminPanel.Trash Pages')); ?> <?php if($trashcount>0): ?><span class="badge badge-danger right"><?php echo e($trashcount); ?><?php endif; ?></span></a>
                    </li>

                </ul>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('adminPanel.Title')); ?></th>
                            <th><?php echo e(__('adminPanel.Comments')); ?></th>
                            <th><?php echo e(__('adminPanel.Views')); ?></th>
                            <th><?php echo e(__('adminPanel.Settings')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1
                        ?>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageIteam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><A href="<?php echo e($pageIteam->path()); ?>"> <?php echo e($pageIteam->title); ?></A></td>
                                <td><?php echo e($pageIteam->CommentCount); ?></td>
                                <td><?php echo e($pageIteam->ViewCount); ?></td>

                                <td>
                                    <form action="
                                    <?php if(request()->get('show')=="trash"): ?>
                                        <?php echo e(route('pageItem.forceDelete' , ['id'=>$pageIteam->id])); ?>

                                    <?php else: ?>
                                        <?php echo e(route('pages.destroy' , ['page'=>$pageIteam->id])); ?>

                                    <?php endif; ?>

                                                    " method="post">

                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="btn btn-group">
                                            <a   href="<?php echo e(route('pages.edit', [ 'page'=>$pageIteam->id])); ?>" class="btn btn-primary"><?php echo e(__('adminPanel.Edit')); ?></a>
                                           <?php if(request()->get('show')=='trash'): ?>
                                                <a   href="<?php echo e(route('pageItem.restore', [ 'id'=>$pageIteam->id])); ?>" class="btn btn-success"><?php echo e(__('adminPanel.Restore')); ?></a>
                                            <?php endif; ?>
                                            <?php if(request()->get('show')=='draft'): ?>

                                                <a   href="<?php echo e(route('pageItem.publish', [ 'id'=>$pageIteam->id])); ?>" class="btn btn-success"><?php echo e(__('adminPanel.Publish')); ?></a>
                                            <?php endif; ?>
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" ><?php echo e(__('adminPanel.Delete')); ?></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->
                <?php echo e($pages->links()); ?>

            </div>





        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/pages/all.blade.php ENDPATH**/ ?>