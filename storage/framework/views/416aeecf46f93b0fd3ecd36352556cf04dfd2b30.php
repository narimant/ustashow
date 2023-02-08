


<?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <option value="<?php echo e($item->id); ?>" > <?php for($a=0;$a<$i;$a++): ?> - <?php endfor; ?> <?php echo e($item->name); ?></option>


        <?php if($item->sub_category->count()): ?>
            <?php $i++; ?>
            <?php echo $__env->make('Admin.category.cat',['child' => $item->sub_category ,'i' => $i], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\ustashow\ustashow\resources\views/Admin/category/cat.blade.php ENDPATH**/ ?>