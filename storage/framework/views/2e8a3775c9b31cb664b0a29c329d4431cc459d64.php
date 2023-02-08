<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo e(__('adminPanel.Create Category')); ?>

                    </h3>
                </div>
                <div class="card-body">

                    <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="<?php echo e(route('categories.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label  for="name"><?php echo e(__('adminPanel.Category Name')); ?></label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="language"><?php echo e(__('adminPanel.Category Mode')); ?></label>
                            <select name="category_mode" id="language" class="form-control">
                                <option value="blog" ><?php echo e(__('adminPanel.Category For Blog')); ?></option>
                                <option value="video" ><?php echo e(__('adminPanel.Category For Video')); ?></option>
                                <option value="course" ><?php echo e(__('adminPanel.Category For Course')); ?></option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label  for="language"><?php echo e(__('adminPanel.Language')); ?></label>
                                <select name="lang" id="language" class="form-control">
                                    <option value="en" <?php echo e(app()->getLocale()=='en' ? 'selected' : ''); ?>>english</option>
                                    <option value="fa" <?php echo e(app()->getLocale()=='fa' ? 'selected' : ''); ?>>persian</option>
                                    <option value="tr" <?php echo e(app()->getLocale()=='tr' ? 'selected' : ''); ?>>turkish</option>
                                </select>
                            </div>




                        <div class="form-group">
                            <label for="parent_id" class="form-label"><?php echo e(__('adminPanel.Category Parent')); ?></label>

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
                                <label class="form-label" for="seoTitle"><?php echo e(__('adminPanel.Seo Title')); ?></label>
                                <input type="text" class="form-control" name="seoTitle" value="<?php echo e(old('seoTitle')); ?>">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoDescription"><?php echo e(__('adminPanel.Seo Description')); ?></label>
                                <input type="text" class="form-control" name="seoDescription" value="<?php echo e(old('seoDescription')); ?>">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoKeyword"><?php echo e(__('adminPanel.Seo Keyword')); ?></label>
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

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/Admin/category/create.blade.php ENDPATH**/ ?>