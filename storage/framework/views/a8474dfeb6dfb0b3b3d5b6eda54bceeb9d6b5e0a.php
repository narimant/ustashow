

<?php $__env->startSection('style'); ?>
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



    <div class="p-lg-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-5">
                    <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0">
                        <!-- <videos id="my-videos"
                                class="videos-js vjs-big-play-centered"
                                controls
                                preload="auto"

                                poster="https://ustashow.com/images/dfgdfgdfg.jpg"
                                data-setup="{}" >
                             <source src="https://ustashow.com/images/music_video.mp4" type="videos/mp4">

                             <p class="vjs-no-js">
                                 To view this videos please enable JavaScript, and consider upgrading to a
                                 web browser that
                                 <a href="https://videojs.com/html5-video-support/" target="_blank"
                                 >supports HTML5 videos</a
                                 >
                             </p>

                         </videos>-->


                        <video id="video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{}'>
                            <source src="<?php echo e($video->VideoUrl); ?>"  >

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
                                    <?php echo e($video->title); ?>

                                </h1>
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title=""
                                   data-bs-original-title="Add to Bookmarks">
                                    <i class="fe fe-bookmark fs-3 text-inherit"></i>
                                </a>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e($video->user->userimage()); ?>" class="rounded-circle avatar-md"
                                         alt="">
                                    <div class="ms-2 lh-1">
                                        <h4 class="mb-1"></h4>

                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-white btn-sm"><?php echo e(__('messages.Follow')); ?></a>
                                </div>
                            </div>


                            <div class="mt-4 pt-4 border-top">
                                <h3 class="mb-2"><?php echo e(__('messages.Episode Description')); ?></h3>
                                <?php echo $video->body; ?>


                                <div class="col-12">
                                    <?php $__currentLoopData = $video->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($tag->path()); ?>"> #<?php echo e($tag->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
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
                                <?php echo $__env->make('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$video], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                            <?php echo e(__('messages.Similar videos')); ?>


                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow ms-4">
                                          <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>





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

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/frontend/video.blade.php ENDPATH**/ ?>