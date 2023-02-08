
<?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td><?php echo e($j); ?></td>
    <td><A href="<?php echo e($item->path()); ?>"><?php for($a=0;$a<$i;$a++): ?> <i class="fas fa-long-arrow-alt-right"></i> <?php endfor; ?> <?php echo e($item->name); ?></A></td>

        <td>
            <?php echo e($item->lang); ?>

        </td>
        <td><?php echo e($item->category_mode); ?></td>
    <td>
        <form action="<?php echo e(route('categories.destroy' , ['category'=>$item->id])); ?>" method="post">

            <?php echo method_field('DELETE'); ?>
            <?php echo csrf_field(); ?>
            <div class="btn btn-group">
                <a   href="<?php echo e(route('categories.edit', [ 'category'=>$item->id])); ?>" class="btn btn-primary"><?php echo e(_('Edit')); ?></a>
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" ><?php echo e(_('Delete')); ?></button>
            </div>
        </form>
    </td>
    </tr>



    <?php if($item->sub_category->count()): ?>
        <?php $i++; ?>
        <?php echo $__env->make('Admin.category.catindex',['child' => $item->sub_category ,'i' => $i], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\ustashow\ustashow\resources\views/Admin/category/catindex.blade.php ENDPATH**/ ?>