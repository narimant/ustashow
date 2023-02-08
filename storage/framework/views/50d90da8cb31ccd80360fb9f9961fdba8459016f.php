<?php $__env->startSection('content'); ?>

    <div class="container crumb p-4">
        <?php echo e(Breadcrumbs::render('article', $article)); ?>

    </div>


    <div class="py-4 py-lg-8 pb-14 ">
        <div class="container articlepage">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <div class="text-center mb-4">

                        <h1 class="display-3 fw-bold mb-4"><?php echo e($article->title); ?></h1>
                        <span class="mb-3 d-inline-block"> </span>
                    </div>
                    <!-- Media -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo e($article->user->userimage()); ?>" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 "><?php echo e($article->user->name); ?></h5>
                                <span class="text-primary"> </span>
                            </div>
                        </div>
                        <div>
                            <span class="ms-2 text-muted"><?php echo e(__('messages.Share')); ?></span>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="ms-2 text-muted "><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Image -->

                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-6">
                    <img src="<?php echo e($article->images['images']['900']); ?>" alt="" class="img-fluid post-head-image rounded-3">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <!-- Descriptions -->

                <?php echo $article->body; ?>


                    <div>
                        <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($tag->path()); ?>"> #<?php echo e($tag->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Media -->
                    <hr class="mt-8 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo e($article->user->userimage()); ?>" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 "><?php echo e($article->user->name); ?></h5>
                                <span class="text-primary"> </span>
                            </div>
                        </div>
                        <div>
                            <span class="ms-2 text-muted"><?php echo e(__('messages.Share')); ?></span>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="ms-2 text-muted "><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!-- Subscribe to Newsletter -->

                </div>
            </div>
        </div>
        <!-- Container related posts -->
      <?php if($related->count()>0): ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="my-5">
                        <h2>Related Post</h2>
                    </div>
                </div>
                <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card mb-4 shadow-lg ">
                        <a href="blog-single.html" class="card-img-top"> <img src="<?php echo e($rel->images['tumbnail']); ?>" class="card-img-top rounded-top-md" alt=""></a>
                        <!-- Card body -->
                        <div class="card-body">

                                <?php $__currentLoopData = $rel->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($category->path()); ?>" class="fs-5 fw-semi-bold d-block mb-3 text-primary">
                                    <?php echo e($category->name); ?> &nbsp;

                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <a href="<?php echo e($rel->path()); ?>" title="<?php echo e($rel->title); ?>">
                                <h3><?php echo e(\Str::limit($rel->title, 25, ' ...')); ?></h3>
                            </a>
                            <p><?php echo e(\Str::limit($rel->description, 40, ' ...')); ?>   </p>
                            <!-- Media content -->
                            <div class="row align-items-center g-0 mt-4">
                                <div class="col-auto">
                                    <img src="<?php echo e($rel->user->userimage()); ?>" alt="" class="rounded-circle avatar-sm me-2">
                                </div>
                                <div class="col lh-1">
                                    <h5 class="mb-1"><?php echo e($rel->user->name); ?></h5>
                                    <p class="fs-6 mb-0"></p>
                                </div>
                                <div class="col-auto">
                                    <p class="fs-6 mb-0"><?php echo e($rel->CreateTimeDiff); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
          <?php endif; ?>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-2">
            <?php echo $__env->make('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/frontend/article.blade.php ENDPATH**/ ?>