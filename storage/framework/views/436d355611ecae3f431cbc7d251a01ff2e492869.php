<?php $__env->startSection('content'); ?>


<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div>
                    <h1 class="text-white mb-1 display-4">#<?php echo e($tag->name); ?></h1>
                    <p class="mb-0 text-white lead"><?php echo e($articles->count()+$courses->count()); ?> <?php echo e(__('messages.Result For')); ?>  #<?php echo e($tag->name); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="py-6">
    <div class="container">
        <div class="row mb-6">
            <div class="col-md-12">
                <!-- Nav -->

                <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                    <li class="nav-item ms-0" role="presentation">
                        <a class="nav-link <?php echo e($type=='article' ? 'active ' : ''); ?> "   href="<?php echo e(route('tag.show',['tagSlug'=>$tag->slug])); ?>"  aria-selected="true"><?php echo e(__('messages.Article')); ?></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php echo e($type=='course' ? 'active ' : ''); ?>"   href="<?php echo e(route('tag.show',['tagSlug'=>$tag->slug,'type'=>"course"])); ?>"  aria-selected="false"><?php echo e(__('messages.Course')); ?></a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="tabContent">
                    <!-- Tab Pane -->

                    <?php if($type=="article"): ?>

                    <div class="tab-pane fade active show" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
                        <div class="row">

                            <?php if($articles->count()>0): ?>
                                  <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card col-3 m-2 card-hover p-0">
                                        <a href="<?php echo e($article->path()); ?>" class="card-img-top">
                                            <img src="<?php echo e($article->images['tumbnail']); ?>" alt="" class="rounded-top-md card-img-top">
                                        </a>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <h4 class="mb-2 text-truncate-line-2 ">
                                                <a href="<?php echo e($article->path()); ?>" class="text-inherit"><?php echo e($article->title); ?></a></h4>
                                            <!-- List -->
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i><?php echo e($article->CreateTimeDiff); ?></li>
                                                <li class="list-inline-item">
                                                    <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
                                                    </svg>
                                                    Advance
                                                </li>
                                            </ul>

                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="<?php echo e($article->user->userimage()); ?>" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span><?php echo e($article->user->name); ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="text-muted bookmark">
                                                        <i class="fe fe-bookmark  "></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                      <?php echo e($articles->links()); ?>

                                <?php else: ?>
                                mojod nist
                            <?php endif; ?>



                        </div>
                    </div>


                    <?php elseif($type=="course"): ?>


                        <div class="tab-pane  fade active show"  aria-labelledby="trending-tab">
                        <!-- Tab pane -->
                        <div class="row">
                            <?php if($courses->count()>0): ?>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card col-3 m-2 card-hover p-0">
                                        <a href="<?php echo e($course->path()); ?>" class="card-img-top">
                                            <img src="<?php echo e($course->images['tumbnail']); ?>" alt="" class="rounded-top-md card-img-top">
                                        </a>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <h4 class="mb-2 text-truncate-line-2 ">
                                                <a href="<?php echo e($course->path()); ?>" class="text-inherit"><?php echo e($course->title); ?></a></h4>
                                            <!-- List -->
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i><?php echo e($course->CreateTimeDiff); ?></li>
                                                <li class="list-inline-item">
                                                    <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
                                                    </svg>
                                                    Advance
                                                </li>
                                            </ul>

                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="<?php echo e($course->user->userimage()); ?>" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span><?php echo e($course->user->name); ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="text-muted bookmark">
                                                        <i class="fe fe-bookmark  "></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($courses->links()); ?>

                            <?php else: ?>
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <div>
                                       <?php echo e(__('messages.There is currently no display course for the tag of your choice')); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                        <?php endif; ?>

                </div>
            </div>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/frontend/tagpage.blade.php ENDPATH**/ ?>