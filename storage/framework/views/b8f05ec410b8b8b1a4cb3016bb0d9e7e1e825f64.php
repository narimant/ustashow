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

                        <h1 class="mb-1 fw-bold"><?php echo e(__('messages.Login')); ?></h1>

                    </div>
                    <!-- Form -->
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                        <!-- Username -->
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
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> class="form-check-input" id="remember">
                                <label class="form-check-label " for="remember">    <?php echo e(__('messages.Remember Me')); ?></label>
                            </div>
                            <div>
                                <a href="<?php echo e(route('password.request')); ?>"> <?php echo e(__('messages.Forgot Your Password?')); ?></a>
                            </div>
                        </div>


                        <div class="mb-2 text-center">
                            <div class="g-recaptcha" data-sitekey="6LdyHrMdAAAAAK5U2jKzq7E6ze6fNicoOK6DQgXg"></div>
                        </div>
                        <div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary "><?php echo e(__('messages.Sign In')); ?></button>
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

<?php echo $__env->make('frontend.frontendlayout.frontendmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/auth/login.blade.php ENDPATH**/ ?>