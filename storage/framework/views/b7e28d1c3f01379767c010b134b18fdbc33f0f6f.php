<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
 
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script>
        CKEDITOR.replace('body', {filebrowserImageBrowseUrl: '<?php echo e(route("fm.ckeditor")); ?>'});
        /*CKEDITOR.replace('body',{
           filebrowserUploadUrl:'<?php echo e(route("panel.upload")); ?>',
           filebrowserImageUploadUrl:'<?php echo e(route("panel.upload")); ?>'
        })*/

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
                        Edit Articles
                    </h3>
                </div>
                <div class="card-body">

        <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('articles.update',['article'=>$article->id])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo csrf_field(); ?>
           <?php echo method_field('put'); ?>

            <div class="form-group">
                <label  for="title">Titile</label>
                <input type="text" name="title" value="<?php echo e($article->title); ?>" class="form-control" id="title" placeholder="insert title " >
            </div>
            <div class="form-group">
                <label  for="title">Slug</label>
                <input type="text" name="slug" value="<?php echo e($article->slug); ?>" class="form-control" id="title" placeholder="insert title " >
            </div>

            <div class="form-group">
                <label  for="description">description</label>
                <input type="text" name="description" value="<?php echo e($article->description); ?>" class="form-control" id="description" placeholder="insert  description" >
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  for="language">language</label>
                        <select name="lang" id="language" class="form-control">
                            <option value="en" <?php echo e($article->lang=='en' ? 'selected' : ''); ?>>english</option>
                            <option value="fa" <?php echo e($article->lang=='fa' ? 'selected' : ''); ?>>persian</option>
                            <option value="tr" <?php echo e($article->lang=='tr' ? 'selected' : ''); ?>>turkish</option>

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  for="status">Display Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" <?php echo e($article->status=='0' ? 'selected' : ''); ?>>Draft</option>
                            <option value="1" <?php echo e($article->status=='1' ? 'selected' : ''); ?>>publish</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  for="body">body</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" ><?php echo e($article->body); ?></textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label  for="description">Image</label>
                        <input type="file" name="images"   class="form-control" id="images" placeholder="insert  Image" >
                        <div class="col-sm-12">
                            <?php $__currentLoopData = $article->images['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        <?php echo e($key); ?>

                                        <input type="radio" name="imagesThumb" value="<?php echo e($image); ?>" <?php echo e($article->images['tumbnail'] == $image ? 'checked' : ''); ?> />
                                        <a href="<?php echo e($image); ?>" target="_blank"><img src="<?php echo e($image); ?>" width="100%"></a>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <label  for="description">Category</label>

                        <div>
                            <ul class="list-group ">
                                <?php $__currentLoopData = \App\Category::where('parent_id',null)->with('sub_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><input type="checkbox" name="category[]"
                                                                       <?php $__currentLoopData = $article->categories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                           <?php if($category->id==$value->id): ?>
                                                                                checked
                                                                            <?php endif; ?>
                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                       value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></input></li>

                                    <?php if($value->sub_category->count()): ?>

                                        <?php $i=1; ?>
                                        <?php echo $__env->make('Admin.articles.categoryeditlist',['child' => $value->sub_category ,'i' => $i,'article'=>$article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
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

            
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">Seo Title</label>
                    <input type="text" class="form-control" name="seoTitle" value="<?php echo e($article->seoTitle); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">Seo Description</label>
                    <input type="text" class="form-control" name="seoDescription" value="<?php echo e($article->seoDescription); ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">Seo Keyword</label>
                    <input type="text" class="form-control" name="seoKeyword" value="<?php echo e($article->seoKeyword); ?>">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/articles/edit.blade.php ENDPATH**/ ?>