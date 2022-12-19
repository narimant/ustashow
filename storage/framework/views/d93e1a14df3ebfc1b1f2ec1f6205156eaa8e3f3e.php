<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script>
        CKEDITOR.replace('body',{
            filebrowserUploadUrl:'/admin/panel/upload-image',
            filebrowserImageUploadUrl:'/admin/panel/upload-image'
        })

        $('#tags').select2({
            tags: true,
            multiple: true,
            tokenSeparators: [','],
            theme: 'bootstrap4'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        Edit Page
                    </h3>
                </div>
                <div class="card-body">

        <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('pages.update',['page'=>$page->id])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo csrf_field(); ?>
           <?php echo method_field('put'); ?>

            <div class="form-group">
                <label  for="title">Titile</label>
                <input type="text" name="title" value="<?php echo e($page->title); ?>" class="form-control" id="title" placeholder="insert title " >
            </div>
            <div class="form-group">
                <label  for="title">Slug</label>
                <input type="text" name="slug" value="<?php echo e($page->slug); ?>" class="form-control" id="title" placeholder="insert title " >
            </div>

            <div class="form-group">
                <label  for="description">description</label>
                <input type="text" name="description" value="<?php echo e($page->description); ?>" class="form-control" id="description" placeholder="insert  description" >
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  for="language">language</label>
                        <select name="lang" id="language" class="form-control">
                            <option value="en" <?php echo e($page->lang=='en' ? 'selected' : ''); ?>>english</option>
                            <option value="fa" <?php echo e($page->lang=='fa' ? 'selected' : ''); ?>>persian</option>
                            <option value="tr" <?php echo e($page->lang=='tr' ? 'selected' : ''); ?>>turkish</option>

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  for="status">Display Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" <?php echo e($page->status=='0' ? 'selected' : ''); ?>>Draft</option>
                            <option value="1" <?php echo e($page->status=='1' ? 'selected' : ''); ?>>publish</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  for="body">body</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" ><?php echo e($page->body); ?></textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label  for="description">Image</label>
                        <input type="file" name="images"   class="form-control" id="images" placeholder="insert  Image" >
                        <div class="col-sm-12">
                            <?php if($page->images !=null): ?>
                            <?php $__currentLoopData = $page->images['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        <?php echo e($key); ?>

                                        <input type="radio" name="imagesThumb" value="<?php echo e($image); ?>" <?php echo e($page->images['tumbnail'] == $image ? 'checked' : ''); ?> />
                                        <a href="<?php echo e($image); ?>" target="_blank"><img src="<?php echo e($image); ?>" width="100%"></a>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </div>
                    </div>




                </div>

            </div>

            
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">Seo Title</label>
                    <input type="text" class="form-control" name="seoTitle" value="<?php echo e($page->seoTitle); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">Seo Description</label>
                    <input type="text" class="form-control" name="seoDescription" value="<?php echo e($page->seoDescription); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">Seo Keyword</label>
                    <input type="text" class="form-control" name="seoKeyword" value="<?php echo e($page->seoKeyword); ?>">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/pages/edit.blade.php ENDPATH**/ ?>