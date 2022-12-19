<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script src=""></script>
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
                        Create Articles
                    </h3>
                </div>
                <div class="card-body">



          
            <form action="<?php echo e(route('articles.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label  for="title">Titile</label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control" id="title" placeholder="insert title " >
                </div>

                <div class="form-group">
                    <label  for="description">description</label>
                    <input type="text" name="description" value="<?php echo e(old('description')); ?>" class="form-control" id="description" placeholder="insert  description" >
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label  for="language">language</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" selected>english</option>
                                <option value="fa">persian</option>
                                <option value="tr">turkish</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label  for="status">Display Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" selected>Draft</option>
                                <option value="1">publish</option>


                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label  for="body">body</label>
                    <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" ><?php echo e(old('body')); ?></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <label  for="description">Image</label>
                            <input type="file" name="images" value="<?php echo e(old('images')); ?>"  class="form-control" id="images" placeholder="insert  Image" >
                        </div>
                        <div class="col-sm-6 ">
                            <label  for="description">Category</label>
                            <div>
                                <ul class="list-group ">
                                <?php $__currentLoopData = \App\Category::where('parent_id',null)->with('sub_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item"><input type="checkbox" name="category[]"value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></input></li>

                                    <?php if($value->sub_category->count()): ?>

                                        <?php $i=1; ?>
                                        <?php echo $__env->make('Admin.articles.categorylist',['child' => $value->sub_category ,'i' => $i], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-3">
                            <label  for="tags">Tags</label>
                            <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                                <?php $__currentLoopData = $alltags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>

                </div>


                
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoTitle">Seo Title</label>
                        <input type="text" class="form-control" name="seoTitle" value="<?php echo e(old('seoTitle')); ?>">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoDescription">Seo Description</label>
                        <input type="text" class="form-control" name="seoDescription" value="<?php echo e(old('seoDescription')); ?>">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoKeyword">Seo Keyword</label>
                        <input type="text" class="form-control" name="seoKeyword" value="<?php echo e(old('seoKeyword')); ?>">
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

                </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/articles/create.blade.php ENDPATH**/ ?>