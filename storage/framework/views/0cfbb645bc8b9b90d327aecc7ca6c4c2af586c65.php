<?php $__env->startSection('content'); ?>



    <div class="container-fluid">
    <div class="row align-items-center min-vh-100">
        
        <!-- col -->
        <div class="col-lg-6 col-md-12 col-12">
         
            <div class="px-xl-20 px-md-8 px-4 py-8 py-lg-0">
                <!-- content -->
                <div class="d-flex justify-content-between mb-7 align-items-center">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('frontend/logo/menulogo.jpg')); ?>" alt="">
                    </a>
                </div>
                <div class="text-dark">
                    <h1 class="display-4 fw-bold"><?php echo e(__('messages.Get In Touch')); ?>.</h1>
                    <p class="lead text-dark">
                        <?php echo e(__('messages.Fill in the form to the right to get in touch with someone on our team, and we will reach out shortly.')); ?>

                    </p>
                    <div class="mt-8">

                        <!-- address -->

                        <p class="fs-4"><i class="bi bi-telephone text-primary
                    me-2"></i>+905550811366</p>
                        <p class="fs-4"><i class="bi bi-envelope-open
                    text-primary me-2"></i> suport@ustashow.com</p>
                        <p class="fs-4 d-flex"><i class="bi bi-geo-alt
                    text-primary me-2"></i> 2652 Kooter Lane Charlotte, NC 28263</p>
                    </div>
                    <div class="mt-10">
                        <!--Facebook-->
                        <a href="#" class="text-muted me-3">
                            <i class="mdi mdi-facebook fs-3"></i>
                        </a>
                        <!--Twitter-->
                        <a href="#" class="text-muted me-3">
                            <i class="mdi mdi-twitter  fs-3"></i>
                        </a>

                        <!--GitHub-->
                        <a href="#" class="text-muted">
                            <i class="mdi mdi-github fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- background color -->
        <div class="col-lg-6 d-lg-flex align-items-center w-lg-50 min-vh-lg-100 position-fixed-lg bg-cover bg-light top-0
          right-0">
            <div class="px-4 px-xl-20 py-8 py-lg-0">
                <!-- form section -->
                <div id="form">
                    <!-- form row -->
                    <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form class="row" method="post" action="<?php echo e(route('contact.send')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <!-- form group -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="fname"><?php echo e(__('messages.First Name')); ?>:<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="first_name" id="fname" placeholder="<?php echo e(__('messages.First Name')); ?>" >
                        </div>
                        <!-- form group -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="lname"><?php echo e(__('messages.Last Name')); ?>:<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="last_name" id="lname" placeholder="<?php echo e(__('messages.Last Name')); ?>" >
                        </div>
                        <!-- form group -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="email"><?php echo e(__('messages.Email')); ?>:<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="<?php echo e(__('messages.Email')); ?>" >
                        </div>


                        <!-- form group -->
                        <div class="mb-3 col-12">
                            <label class="text-dark form-label" for="messages"><?php echo e(__('messages.Message')); ?>:</label>
                            <textarea class="form-control" id="messages" rows="3" placeholder="<?php echo e(__('messages.Message')); ?>" name="messages"></textarea>
                        </div>
                        <!-- button -->
                        <div class=" col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                <?php echo e(__('messages.Submit')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendblanck', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ustashow\ustashow\resources\views/frontend/contact.blade.php ENDPATH**/ ?>