<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
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
            tokenSeparators: [',']
        });
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        Edit Episode Video
                    </h3>
                </div>
                <div class="card-body">

        <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('episodes.update' ,['episode'=>$episode->id])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <div class="form-group">
                <label  for="title">Titile</label>
                <input type="text" name="title" value="<?php echo e($episode->title); ?>" class="form-control" id="title" placeholder="insert title " >
            </div>
            <div class="form-group">
                <label  for="title">Related course</label>
                <select type="text" name="course_id"  class="form-control" id="course_id"  >
                    <?php $__currentLoopData = \App\Course::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($course->id); ?>" <?php echo e($episode->course_id==$course->id ? 'selected' : ''); ?>><?php echo e($course->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>



            <div class="form-group">
                <label  for="body">body</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" ><?php echo e($episode->body); ?></textarea>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6 ">
                        <label  for="description">Video url</label>
                        <input type="text" name="VideoUrl" value="<?php echo e($episode->VideoUrl); ?>" class="form-control" id="VideoUrl" placeholder="Video ur" >
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                            <?php $__currentLoopData = $alltags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>" <?php echo e(in_array($tag->id,$articletagsids)?'selected':''); ?>><?php echo e($tag->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6 ">
                        <label  for="description">Video Time</label>
                        <input type="text" name="time" value="<?php echo e($episode->time); ?>" class="form-control" id="time" placeholder="insert  time" >
                    </div>
                    <div class="col-sm-6 ">
                        <label  for="description">number</label>
                        <input type="text" name="number" value="<?php echo e($episode->number); ?>" class="form-control" id="number" placeholder="insert  number" >
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6">
                        <label  for="type">Course type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="vip"<?php echo e($episode->type=='vip' ? 'selected' : ''); ?>  >Vip</option>
                            <option value="free" <?php echo e($episode->type=='free' ? 'selected' : ''); ?> >Free</option>
                            <option value="cash" <?php echo e($episode->type=='cash' ? 'selected' : ''); ?> >Cash</option>
                        </select>
                    </div>
                </div>

            </div>

            
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">Seo Title</label>
                    <input type="text" class="form-control" name="seoTitle" value="<?php echo e($episode->seoTitle); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">Seo Description</label>
                    <input type="text" class="form-control" name="seoDescription" value="<?php echo e($episode->seoDescription); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">Seo Keyword</label>
                    <input type="text" class="form-control" name="seoKeyword" value="<?php echo e($episode->seoKeyword); ?>">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/episode/edit.blade.php ENDPATH**/ ?>