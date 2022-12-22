<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title "><?php echo e(__('adminPanel.All Courses')); ?></h3>
                    <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-warning ml-auto p-2"><?php echo e(__('adminPanel.Create Course')); ?></a>
                </div>


                <!-- /.card-header -->
                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='' ? "active" : ''); ?>"  href="<?php echo e(route('courses.index')); ?>"  > <?php echo e(__('adminPanel.Active Courses')); ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='draft' ? "active" : ''); ?>"  href="<?php echo e(route('courses.index',['show'=>'draft'])); ?>"  > <?php echo e(__('adminPanel.Draft Courses')); ?>  <?php if($draftcount>0): ?><span class="badge badge-primary right"><?php echo e($draftcount); ?><?php endif; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->get('show')=='trash' ? "active" : ''); ?>"  href="<?php echo e(route('courses.index',['show'=>'trash'])); ?>"  ><?php echo e(__('adminPanel.Trash Courses')); ?><?php if($trashcount>0): ?><span class="badge badge-danger right"><?php echo e($trashcount); ?><?php endif; ?></span></a>
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
                    <th><?php echo e(__('adminPanel.Course Type')); ?></th>
                    <th><?php echo e(__('adminPanel.Settings')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1
                ?>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><A href="<?php echo e($course->path()); ?>"> <?php echo e($course->title); ?></A></td>
                        <td><?php echo e($course->CommentCount); ?></td>
                        <td><?php echo e($course->ViewCount); ?></td>

                        <td>
                         <?php if($course->type=="free"): ?>
                                <?php echo e(__('adminPanel.Free')); ?>

                            <?php elseif($course->type=="vip"): ?>
                                <?php echo e(__('adminPanel.Vip')); ?>

                            <?php elseif($course->type=="cash"): ?>
                                <?php echo e(__('adminPanel.Cash')); ?>

                            <?php endif; ?>
                        </td>
                        <td>

                                <form action="
                                    <?php if(request()->get('show')=="trash"): ?>
                                <?php echo e(route('course.forceDelete' , ['id'=>$course->id])); ?>

                                <?php else: ?>
                                <?php echo e(route('courses.destroy' , ['course'=>$course->id])); ?>

                                <?php endif; ?>

                                    " method="post">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>

                                <div class="btn btn-group">
                                    <a   href="<?php echo e(route('courses.edit', [ 'course'=>$course->id])); ?>" class="btn btn-primary"><?php echo e(__('adminPanel.Edit')); ?></a>
                                    <?php if(request()->get('show')=='trash'): ?>
                                        <a   href="<?php echo e(route('course.restore', [ 'id'=>$course->id])); ?>" class="btn btn-success"><?php echo e(__('adminPanel.Restore')); ?></a>
                                    <?php endif; ?>
                                    <?php if(request()->get('show')=='draft'): ?>
                                        <a   href="<?php echo e(route('course.publish', [ 'id'=>$course->id])); ?>" class="btn btn-success"><?php echo e(__('adminPanel.Publish')); ?></a>
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
            <?php echo e($courses ->links()); ?>


            </div>



        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/course/all.blade.php ENDPATH**/ ?>