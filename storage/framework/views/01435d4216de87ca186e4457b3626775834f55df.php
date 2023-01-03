<?php $__env->startSection('content'); ?>
    <!-- Page content-->

    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold"><?php echo e($course->title); ?></h1>
                        <p class="text-white mb-6 lead">
                           <?php echo e($course->description); ?>

                        </p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="bookmark text-white text-decoration-none">
                                <i class="fe fe-bookmark text-white-50 me-2"></i><?php echo e(__('messages.Bookmark')); ?>

                            </a>

                            <span class="text-white ms-3 d-flex"><i class="fe fe-user text-white-50"></i> 1200 <?php echo e(__('messages.Enrolled')); ?> </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false"><?php echo e(__('messages.Description')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="table-tab" data-bs-toggle="pill" href="#table" role="tab" aria-controls="table" aria-selected="false"><?php echo e(__('messages.Contents')); ?></a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <h3 class="mb-2"><?php echo e(__('messages.Course Descriptions')); ?></h3>
                                        <?php echo $course->body; ?>


                                    </div>

                                </div>
                                <div class="tab-pane fade " id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <!-- Card -->
                                    <div class="accordion" id="courseAccordion">




                                                        <div class="pt-3 pb-2">
                                                                <!-- Episodes -->
                                                            <?php $__currentLoopData = $course->episodes()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($episode->type=='cash' || $episode->type=='vip'): ?>
                                                                    <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                        <div class="text-truncate">
                                                                            <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock fs-4"></i></span>
                                                                            <span> <?php echo e($episode->title); ?></span>
                                                                        </div>
                                                                        <div class="text-truncate">
                                                                            <span><?php echo e($episode->time); ?></span>
                                                                        </div>
                                                                    </a>

                                                                <?php else: ?>
                                                                    <a href="<?php echo e($episode->path()); ?>" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                        <div class="text-truncate">
                                                                            <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i class="mdi mdi-play fs-4"></i></span>
                                                                            <span> <?php echo e($episode->title); ?></span>
                                                                        </div>
                                                                        <div class="text-truncate">
                                                                            <span> <?php echo e($episode->time); ?></span>
                                                                        </div>


                                                                    </a>
                                                                    <?php endif; ?>





                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- comments-->
                    <div class="card rounded-3 mt-4">
                        <div class="card-body">

                        <!-- hr -->
                        <hr class="my-5">
                        <div class="mb-3">
                            <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                <!-- Reviews -->
                                <div class="mb-3 mb-lg-0">
                                    <h3 class="mb-0"><?php echo e(__('messages.Reviews')); ?></h3>
                                </div>
                                <div>
                                    <!-- Form -->
                                    <form class="form-inline">
                                        <div class="d-flex align-items-center me-2">
                                                        <span class="position-absolute ps-3">
                              <i class="fe fe-search"></i>
                            </span>
                                            <input type="search" class="form-control ps-6" placeholder="<?php echo e(__('messages.Search Review')); ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Rating -->

                            <?php echo $__env->make('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        </div>
                    </div>

                </div>


                <!-- right sde -->
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover" style="background-image: url(<?php echo e($course->images['images']['300']); ?>);">

                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            <div class="mb-3">
                                <span class="text-dark fw-bold h2"><?php echo e($course->price); ?></span>

                            </div>
                            <div class="d-grid">

                                <?php if(auth()->check() && !auth()->user()->checkLearn($course)): ?>


                                            <form method="post" action="/course/Payment">
                                                <?php echo csrf_field(); ?>
                                                <div class="d-grid">
                                                <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                                                <button type="submit" class="btn btn-primary mb-2 "><?php echo e(__('messages.Buy this course')); ?></button>
                                                </div>
                                            </form>


                                <?php elseif(auth()->check() && auth()->user()->checkLearn($course)): ?>

                                    <div class="alert alert-success d-flex align-items-center" role="alert">

                                        <div>
                                           <?php echo e(__('messages.Purchased this course')); ?>

                                        </div>
                                    </div>


                                <?php else: ?>
                                    <div class="card-body">
                                        <div class="d-grid gap-2 mt-2">
                                            <?php echo e(__('messages.for buy this course please first login')); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0"><?php echo e(__('messages.What’s included')); ?></h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="d-flex align-items-center list-group-item bg-transparent"><i class="fe fe-play-circle align-middle me-2 text-primary"></i><?php echo e($course->time); ?> <?php echo e(__('messages.hours videos')); ?></li>


                                <li class="d-flex align-items-center list-group-item bg-transparent"><i class="fe fe-video align-middle me-2 text-secondary"></i><?php echo e(__('messages.Watch Offline')); ?></li>
                                <li class="d-flex align-items-center list-group-item bg-transparent border-bottom-0"><i class="fe fe-clock align-middle me-2 text-warning"></i><?php echo e(__('messages.Lifetime access')); ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img src="<?php echo e($course->user->userimage()); ?>" alt="" class="rounded-circle avatar-xl">
                                    <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Verifed">
                                        <img src="<?php echo e(asset('frontend/images/checked-mark.svg')); ?>" alt="" height="30" width="30">
                                    </a>
                                </div>
                                <div class="ms-4">
                                    <h4 class="mb-0"><?php echo e($course->user->name); ?></h4>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
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
    </div>















<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/frontend/courses.blade.php ENDPATH**/ ?>