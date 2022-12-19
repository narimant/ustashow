<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Articles</h3>
                    <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-warning ml-auto p-2">Create Article</a>
                </div>
                <!-- /.card-header -->
                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='' ? "active" : ''); ?>"  href="<?php echo e(route('articles.index')); ?>"  > Articles Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='draft' ? "active" : ''); ?>"  href="<?php echo e(route('articles.index',['show'=>'draft'])); ?>"  > Articles Draft <?php if($draftcount>0): ?><span class="badge badge-primary right"><?php echo e($draftcount); ?><?php endif; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='trash' ? "active" : ''); ?>"  href="<?php echo e(route('articles.index',['show'=>'trash'])); ?>"  >Articles in Trash <?php if($trashcount>0): ?><span class="badge badge-danger right"><?php echo e($trashcount); ?><?php endif; ?></span></a>
                    </li>

                </ul>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(_('title')); ?></th>
                            <th><?php echo e(_('Comment')); ?></th>
                            <th><?php echo e(_('Virews')); ?></th>
                            <th><?php echo e(_('Settings')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1
                        ?>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><A href="<?php echo e($article->path()); ?>"> <?php echo e($article->title); ?></A></td>
                                <td><?php echo e($article->CommentCount); ?></td>
                                <td><?php echo e($article->ViewCount); ?></td>

                                <td>
                                    <form action="
                                    <?php if(request()->get('show')=="trash"): ?>
                                        <?php echo e(route('article.forceDelete' , ['id'=>$article->id])); ?>

                                    <?php else: ?>
                                        <?php echo e(route('articles.destroy' , ['article'=>$article->id])); ?>

                                    <?php endif; ?>

                                                    " method="post">

                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="btn btn-group">
                                            <a   href="<?php echo e(route('articles.edit', [ 'article'=>$article->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                                           <?php if(request()->get('show')=='trash'): ?>
                                                <a   href="<?php echo e(route('article.restore', [ 'id'=>$article->id])); ?>" class="btn btn-success"><?php echo e(_('Restore')); ?></a>
                                            <?php endif; ?>
                                            <?php if(request()->get('show')=='draft'): ?>
                                                <a   href="<?php echo e(route('article.publish', [ 'id'=>$article->id])); ?>" class="btn btn-success"><?php echo e(_('Publish')); ?></a>
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
                <!-- /.card-body paginate -->
                <?php echo e($articles->links()); ?>

            </div>





        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/articles/all.blade.php ENDPATH**/ ?>