<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                       Edit Seo For <?php echo e($siteseo->language()); ?> Language
                    </h3>
                </div>
                <div class="card-body">

                    <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="<?php echo e(route('siteseo.update',['siteseo'=>$siteseo->id])); ?>" method="post"  class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label  for="title">Seo Title</label>
                            <input type="text" name="site_title" value="<?php echo e($siteseo->site_title); ?>" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="Description">Seo Description</label>
                            <input type="text" name="site_description" value="<?php echo e($siteseo->site_description); ?>" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="keyword">Seo Keyword</label>
                            <input type="text" name="site_keyword" value="<?php echo e($siteseo->site_keyword); ?>" class="form-control" id="name" placeholder="insert name " >
                        </div>






                        <div class="form-group">
                            <label  for="language">language</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" <?php echo e($siteseo->lang=='en' ? 'selected' : ''); ?>>english</option>
                                <option value="fa" <?php echo e($siteseo->lang=='fa' ? 'selected' : ''); ?>>persian</option>
                                <option value="tr" <?php echo e($siteseo->lang=='tr' ? 'selected' : ''); ?>>turkish</option>

                            </select>
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

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/site/seoedit.blade.php ENDPATH**/ ?>