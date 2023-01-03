<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('frontend/css/videos-js.css')); ?>" rel="stylesheet" />
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



    <div class="p-lg-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-5">
                    <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0">
                        <video id="my-video"
                               class="video-js vjs-big-play-centered vjs-control"
                               controls
                               preload="auto"

                               poster="https://ustashow.com/images/dfgdfgdfg.jpg"
                               data-setup="{}" >
                            <source src="https://ustashow.com/images/music_video.mp4" type="video/mp4">

                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank"
                                >supports HTML5 video</a
                                >
                            </p>

                        </video>



                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="fw-semi-bold mb-2">
                                    <?php echo e($episode->title); ?>

                                </h1>
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title=""
                                   data-bs-original-title="Add to Bookmarks">
                                    <i class="fe fe-bookmark fs-3 text-inherit"></i>
                                </a>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e($episode->course->user->userimage()); ?>" class="rounded-circle avatar-md"
                                         alt="">
                                    <div class="ms-2 lh-1">
                                        <h4 class="mb-1"><?php echo e($episode->course->user->name); ?></h4>

                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-white btn-sm"><?php echo e(__('messages.Follow')); ?></a>
                                </div>
                            </div>


                            <div class="mt-4 pt-4 border-top">
                                <h3 class="mb-2"><?php echo e(__('messages.Episode Description')); ?></h3>
                                <?php echo $episode->body; ?>

                            </div>

                        </div>

                    </div>


                    <div class="card rounded-3 mb-5">
                        <!-- Card body -->
                        <div class="card-body">


                            <div class="mb-3">
                                <!-- Review -->
                                <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                    <div class="mb-3 mb-lg-0">
                                        <h3 class="mb-0"><?php echo e(__('messages.Reviews')); ?></h3>
                                    </div>
                                    <div>
                                        <!-- Search -->
                                        <form class="form-inline">
                                            <div class="d-flex align-items-center me-2">
                            <span class="position-absolute ps-3">
                              <i class="fe fe-search"></i>
                            </span>
                                                <input type="search" class="form-control ps-6"
                                                       placeholder="<?php echo e(__('messages.Search Review')); ?>">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php echo $__env->make('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$episode], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                    <div class="card" id="courseAccordion">
                        <div>
                            <!-- List group -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-0 bg-transparent">
                                    <!-- Toggle -->
                                    <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none py-3 px-4">
                                        <div class="me-auto">
                                            <?php echo e(__('messages.Course Overview')); ?>

                                            <p class="mb-0 text-muted fs-6 mt-1 fw-normal"><?php echo e($course->episodes->count()); ?> <?php echo e(__('messages.videos')); ?>

                                                (<?php echo e($course->time); ?>)
                                            </p>
                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow ms-4">
                                          <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>
                                    <!-- Row -->
                                    <!-- Collapse -->

                                    <!-- List group item -->
                                    <ul class="list-group list-group-flush">

                                        <!-- List group item -->
                                    <?php $__currentLoopData = $course->episodes()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episodes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($episodes->type=='cash' || $episodes->type=='vip'): ?>
                                            <!-- if episode is cash or vip -->
                                                <li class="list-group-item disabled" aria-disabled="true">
                                                    <a href="#"
                                                       class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                        <div class="text-truncate">
                                                            <span
                                                                class="icon-shape bg-light text-muted icon-sm rounded-circle me-2"><i
                                                                    class="fe fe-lock fs-4"></i></span>
                                                            <span><?php echo e($episodes->title); ?></span>
                                                        </div>
                                                        <div class="text-truncate">
                                                            <span><?php echo e($episodes->time); ?></span>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php else: ?>


                                                <li class="list-group-item
                                            <?php if('/'.request()->path()== $episodes->path()): ?> active <?php endif; ?>
                                                    list-group-item-action ">
                                                    <a href="<?php echo e($episodes->path()); ?>" class="d-flex justify-content-between align-items-center
                                               <?php if('/'.request()->path()== $episodes->path()): ?> text-white  <?php else: ?>  text-inherit  <?php endif; ?>

                                                        text-decoration-none">
                                                        <div class="text-truncate">
                                                        <span class="icon-shape
                                                        <?php if('/'.request()->path()== $episodes->path()): ?> bg-light  text-primary <?php else: ?>  bg-success  text-white <?php endif; ?>

                                                            icon-sm rounded-circle me-2">
                                                            <i class="mdi mdi-play fs-4"></i>

                                                        </span>
                                                            <span><?php echo e($episodes->title); ?></span>


                                                        </div>
                                                        <div class="text-truncate">
                                                            <span><?php echo e($episodes->time); ?></span>
                                                        </div>
                                                    </a>
                                                </li>


                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/frontend/episode.blade.php ENDPATH**/ ?>