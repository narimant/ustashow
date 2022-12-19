<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="frontend/css/all.min.css" >
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row   g-0 mt-3 mb-3">
            <div class="col-lg-5 col-md-8 mx-auto py-3 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">


                            <div class="card-header"><?php echo e(__('messages.Verify Your Email Address')); ?></div>

                            <div class="card-body">
                                <?php if(session('resent')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(__('messages.A fresh verification link has been sent to your email address.')); ?>

                                    </div>
                                <?php endif; ?>

                                <?php echo e(__('messages.Before proceeding, please check your email for a verification link.')); ?>

                                <?php echo e(__('messages.If you did not receive the email')); ?>,
                                <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><?php echo e(__('messages.click here to request another')); ?></button>.
                                </form>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/auth/verify.blade.php ENDPATH**/ ?>