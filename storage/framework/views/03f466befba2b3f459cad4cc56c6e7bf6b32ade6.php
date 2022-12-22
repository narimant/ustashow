<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Articles</h3>
                    <a href="<?php echo e(route('episodes.create')); ?>" class="btn btn-warning ml-auto p-2">Create Article</a>
                </div>
                <!-- /.card-header -->

                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='' ? "active" : ''); ?>"  href="<?php echo e(route('episodes.index')); ?>"  > Episodes Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='draft' ? "active" : ''); ?>"  href="<?php echo e(route('episodes.index',['show'=>'draft'])); ?>"  > Episodes Draft <?php if($draftcount>0): ?><span class="badge badge-primary right"><?php echo e($draftcount); ?><?php endif; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='trash' ? "active" : ''); ?>"  href="<?php echo e(route('episodes.index',['show'=>'trash'])); ?>"  >Episodes in Trash <?php if($trashcount>0): ?><span class="badge badge-danger right"><?php echo e($trashcount); ?><?php endif; ?></span></a>
                    </li>

                </ul>
                <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(_('Video title')); ?></th>
                    <th><?php echo e(_('Comment')); ?></th>
                    <th><?php echo e(_('Virews')); ?></th>
                    <th><?php echo e(_('download Count')); ?></th>

                    <th><?php echo e(_('Settings')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1
                ?>
                <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><A href="<?php echo e($episode->path()); ?>"> <?php echo e($episode->title); ?></A></td>
                        <td><?php echo e($episode->ViewCount); ?></td>
                        <td><?php echo e($episode->CommentCount); ?></td>
                        <td><?php echo e($episode->DownloadCount); ?></td>

                        <td>

                            <form action="
                                    <?php if(request()->get('show')=="trash"): ?>
                            <?php echo e(route('episode.forceDelete' , ['id'=>$episode->id])); ?>

                            <?php else: ?>
                            <?php echo e(route('episodes.destroy' , ['episode'=>$episode->id])); ?>

                            <?php endif; ?>

                                " method="post">

                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>



                                <div class="btn btn-group">
                                    <?php if(request()->get('show')==''): ?>
                                        <a   href="<?php echo e(route('episodes.edit', [ 'episode'=>$episode->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                    <?php endif; ?>
                                    <?php if(request()->get('show')=='trash'): ?>
                                        <a   href="<?php echo e(route('episode.restore', [ 'id'=>$episode->id])); ?>" class="btn btn-success"><?php echo e(_('Restore')); ?></a>
                                    <?php endif; ?>
                                    <?php if(request()->get('show')=='draft'): ?>
                                            <a   href="<?php echo e(route('episodes.edit', [ 'episode'=>$episode->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                        <a   href="<?php echo e(route('episode.publish', [ 'id'=>$episode->id])); ?>" class="btn btn-success"><?php echo e(_('Publish')); ?></a>
                                    <?php endif; ?>
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" ><?php echo e(_('Delete')); ?></button>
                                </div>

                            </form>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
                </div>
            <?php echo e($episodes->links()); ?>

        </div>

            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/episode/all.blade.php ENDPATH**/ ?>