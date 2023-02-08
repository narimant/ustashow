

<ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
<?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li class="dropdown-submenu dropend">
            <a class="dropdown-item dropdown-list-group-item <?php echo e($item->sub_category->count() ? "dropdown-toggle" :""); ?>" href="<?php echo e($item->path()); ?>">
                <?php echo e($item->name); ?>

            </a>





        <?php if($item->sub_category->count()): ?>

            <?php echo $__env->make('frontend.frontendlayout.cat',['child' => $item->sub_category ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>



<?php /**PATH C:\ustashow\ustashow\resources\views/frontend/frontendlayout/cat.blade.php ENDPATH**/ ?>