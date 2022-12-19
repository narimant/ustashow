<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        Create Category
                    </h3>
                </div>
                <div class="card-body">

                    <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="<?php echo e(route('categories.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label  for="name">Category Name</label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name" placeholder="insert name " >
                        </div>

                            <div class="form-group">
                                <label  for="language">language</label>
                                <select name="lang" id="language" class="form-control">
                                    <option value="en" selected>english</option>
                                    <option value="fa">persian</option>
                                    <option value="tr">turkish</option>

                                </select>
                            </div>




                        <div class="form-group">
                            <label for="parent_id" class="form-label"> Category Parent</label>

                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">انتخاب</option>
                                    <?php $__currentLoopData = \App\Category::where('parent_id',null)->with('sub_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>

                                        <?php if($value->sub_category->count()): ?>

                                            <?php $i=1; ?>
                                            <?php echo $__env->make('Admin.category.cat',['child' => $value->sub_category ,'i' => $i], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/Admin/category/create.blade.php ENDPATH**/ ?>