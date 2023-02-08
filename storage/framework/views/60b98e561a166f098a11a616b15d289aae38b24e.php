<ul class="list-group">
<?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



        <li class="list-group-item ">
            <?php for($a=0;$a<$i;$a++): ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; ?><input type="checkbox" name="category[]"
                                                                                        <?php $__currentLoopData = $article->categories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($category->id==$item->id): ?>
                                                                                            checked
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                value="<?php echo e($item->id); ?>"  /> <?php echo e($item->name); ?>

        </li>


        <?php if($item->sub_category->count()): ?>
            <?php $i++; ?>
            <?php echo $__env->make('Admin.articles.categoryeditlist',['child' => $item->sub_category ,'i' => $i,'article'=>$article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\ustashow\ustashow\resources\views/Admin/articles/categoryeditlist.blade.php ENDPATH**/ ?>