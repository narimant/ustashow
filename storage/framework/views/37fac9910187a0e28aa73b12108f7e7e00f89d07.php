<div class="footer mt-5">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span><?php echo app('translator')->get('messages.All Rights Reserved.'); ?>© 2022  </span>
            </div>
            <!-- Links -->
            <div class="col-12 col-md-6">

                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="<?php echo e(route('contact.index')); ?>"><?php echo e(__('messages.contact')); ?></a>
                    <?php $__currentLoopData = $footerPages->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="nav-link active ps-0" href="<?php echo e($footer->path()); ?>"><?php echo e($footer->title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/frontend/frontendlayout/footer.blade.php ENDPATH**/ ?>