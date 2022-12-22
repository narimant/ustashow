<?php $__env->startSection('content'); ?>





<div class="pb-8">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Flush Nav -->
                <div class="flush-nav">
                    <nav class="nav">
                        <a class="nav-link active ps-0" href="<?php echo e(Route::currentRouteName()); ?>"><?php echo e(__('messages.All')); ?></a>

                    </nav>
                </div>
            </div>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4 shadow-lg">
                            <div class="row g-0">
                                <!-- Image -->
                                <a href="<?php echo e($article->path()); ?>" class="col-lg-8 col-md-12 col-12 bg-cover img-left-rounded" style="background-image: url(<?php echo e($article->images['images']['600']); ?>);">
                                    <img src="<?php echo e($article->images['images']['600']); ?>" class="img-fluid d-lg-none invisible" alt=""></a>
                                <div class="col-lg-4 col-md-12 col-12">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <?php $__currentLoopData = $article->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($category->path()); ?>" class="fs-5 mb-3 fw-semi-bold d-block">
                                            <?php echo e($category->name); ?>

                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <h1 class="mb-2 mb-lg-4"> <a href="<?php echo e($article->path()); ?>" class="text-inherit">
                                               <?php echo e($article->title); ?>

                                            </a>
                                        </h1>
                                        <p><?php echo $article->description; ?></p>
                                        <!-- Media content -->
                                        <div class="row align-items-center g-0 mt-lg-7 mt-4">
                                            <div class="col-auto">
                                                <!-- Img  -->
                                                <img src="<?php echo e($article->user->userimage()); ?>" alt="" class="rounded-circle avatar-sm me-2">
                                            </div>
                                            <div class="col lh-1 ">
                                                <h5 class="mb-1"><?php echo e($article->user->name); ?></h5>
                                                <p class="fs-6 mb-0"><?php echo e($article->CreateTimeDiff); ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 d-none d-lg-block">
                        <!-- Card -->
                        <div class="card mb-4 shadow-lg">
                            <a href="<?php echo e($article->path()); ?>" class="card-img-top"> <img src="<?php echo e($article->images['images']['300']); ?>" class="card-img-top rounded-top-md" alt=""></a>
                            <!-- Card body -->
                            <div class="card-body">
                                <?php $__currentLoopData = $article->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($category->path()); ?>" class="fs-5 fw-semi-bold d-block mb-3 text-danger">
                                        <?php echo e($category->name); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <h3><a href="<?php echo e($article->path()); ?>" class="text-inherit">
                                        <?php echo e(\Str::limit($article->title, 25, ' ...')); ?>

                                    </a>
                                </h3>
                                <p><?php echo e(\Str::limit($article->description, 80, ' ...')); ?></p>
                                <!-- Media content -->
                                <div class="row align-items-center g-0 mt-4">
                                    <div class="col-auto">
                                        <img src="<?php echo e($article->user->userimage()); ?>" alt="" class="rounded-circle avatar-sm me-2">
                                    </div>
                                    <div class="col lh-1">
                                        <h5 class="mb-1"><?php echo e($article->user->name); ?></h5>
                                        <p class="fs-6 mb-0"><?php echo e($article->CreateTimeDiff); ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <!-- Buttom -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-4">
                <?php echo e($articles->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/frontend/categorypagearticle.blade.php ENDPATH**/ ?>