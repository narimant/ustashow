<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo e(__('adminPanel.Edit Tag')); ?>

                    </h3>
                </div>
                <div class="card-body">

        <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('tags.update',['tag'=>$tag->id])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <div class="form-group">
                <label  for="name"><?php echo e(__('adminPanel.Tags Name')); ?></label>
                <input type="text" name="name" value="<?php echo e($tag->name); ?>" class="form-control" id="name" placeholder="insert Tag name " >
            </div>


            <div class="form-group">
                <label  for="language"><?php echo e(__('adminPanel.Language')); ?></label>
                <select name="lang" id="language" class="form-control">
                    <option value="en" <?php echo e($tag->lang=='en' ? 'selected' :''); ?>>english</option>
                    <option value="fa" <?php echo e($tag->lang=='fa' ? 'selected' :''); ?>>persian</option>
                    <option value="tr" <?php echo e($tag->lang=='tr' ? 'selected' :''); ?>>turkish</option>

                </select>
            </div>
            <div class="form-group">
                <label  for="Status"><?php echo e(__('adminPanel.Status')); ?></label>
                <select name="status" id="Status" class="form-control">
                    <option value="1" <?php echo e($tag->status==1 ? 'selected' :''); ?>>Active</option>
                    <option value="0" <?php echo e($tag->status==0 ? 'selected' :''); ?>>Deactivate</option>


                </select>
            </div>

            
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle"><?php echo e(__('adminPanel.Seo Title')); ?></label>
                    <input type="text" class="form-control" name="seoTitle" value="<?php echo e($tag->seoTitle); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription"><?php echo e(__('adminPanel.Seo Description')); ?></label>
                    <input type="text" class="form-control" name="seoDescription" value="<?php echo e($tag->seoDescription); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword"><?php echo e(__('adminPanel.Seo Keyword')); ?></label>
                    <input type="text" class="form-control" name="seoKeyword" value="<?php echo e($tag->seoKeyword); ?>">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary"><?php echo e(__('adminPanel.Update')); ?></button>
            </div>
        </form>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/tag/edit.blade.php ENDPATH**/ ?>