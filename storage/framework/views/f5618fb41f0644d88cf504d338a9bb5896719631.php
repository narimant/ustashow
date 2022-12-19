<?php $__env->startSection('content'); ?>
    <div class="pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class=" pt-16 rounded-top-md " style="
                   background: url(frontend/images/profile-bg.jpg) no-repeat;
                    background-size: cover;">
                    </div>
                    <div class="d-flex align-items-end justify-content-between bg-white px-4  pt-2 pb-4 rounded-bottom-md shadow-sm ">
                        <div class="d-flex align-items-center">
                            <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                <img src="<?php echo e(auth()->user()->userimage()); ?>" class="avatar-xl rounded-circle border border-4 border-white" alt="">
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0">Stella Flores
                                    <a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Beginner">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                        </svg>
                                    </a>
                                </h2>
                                <p class=" mb-0 d-block">@stellaflores</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>























    <?php echo e($slot); ?>





<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/frontend/panel/master.blade.php ENDPATH**/ ?>