

<ul class="navbar-nav">

    <?php $__currentLoopData = \App\Category::where('parent_id',null)->where('lang',app()->getLocale())->with('sub_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item <?php echo e($value->sub_category->count() ? "dropdown" :""); ?>">
        <a class="nav-link  <?php echo e($value->sub_category->count() ? "dropdown-toggle" :""); ?>" href=" <?php echo e($value->path()); ?>"  <?php echo e($value->sub_category->count() ? "data-bs-toggle='dropdown''" :""); ?> aria-haspopup="true" aria-expanded="false">
            <?php echo e($value->name); ?>

        </a>
        <?php if($value->sub_category->count()): ?>


            <?php echo $__env->make('frontend.frontendlayout.cat',['child' => $value->sub_category ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>








<?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow\ustashow\resources\views/frontend/frontendlayout/catmenu.blade.php ENDPATH**/ ?>