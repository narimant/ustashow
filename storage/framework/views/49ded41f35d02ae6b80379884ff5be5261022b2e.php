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
                        <?php echo $__env->make('Admin.section.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="mb-4">

                            <h1 class="mb-1 fw-bold"><?php echo e(__('messages.Register')); ?></h1>

                        </div>
                        <!-- Form -->
                        <form method="POST" action="<?php echo e(route('register')); ?>">

                        <?php echo csrf_field(); ?>
                        <!-- name -->
                            <div class="mb-3">
                                <label for="email" class="form-label"><?php echo e(__('messages.Name')); ?></label>
                                <input type="text" id="name" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                        <!-- email -->
                            <div class="mb-3">
                                <label for="email" class="form-label"><?php echo e(__('messages.E-Mail Address')); ?></label>
                                <input type="email" id="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label"><?php echo e(__('messages.Password')); ?></label>
                                <input type="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label"><?php echo e(__('messages.Confirm Password')); ?></label>


                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>


                            <div class="mb-2 text-center">
                                <div class="g-recaptcha" data-sitekey="6LdyHrMdAAAAAK5U2jKzq7E6ze6fNicoOK6DQgXg"></div>
                            </div>
                            <div>

                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary "> <?php echo e(__('messages.Register')); ?></button>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="mt-4 text-center ">

                                <!--google-->
                                <a href="<?php echo e(route('google.login')); ?>" class="btn btn-block btn-social btn-social-outline btn-google " >
                                    <i class="fab fa-google "></i>
                                </a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/auth/register.blade.php ENDPATH**/ ?>