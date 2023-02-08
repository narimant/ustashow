<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="<?php echo e(route('index')); ?>"> <img alt="<?php echo e(env('APP_NAME')); ?>" src="<?php echo e(asset('frontend/logo/menulogo.jpg')); ?>"></a>
        <!-- Mobile view nav wrap -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap">
            <?php if(auth()->guard()->check()): ?>
            <li class="dropdown  ms-2">
                <a class="rounded-circle" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="<?php echo e(auth()->user()->userimage()); ?>" class="rounded-circle">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="<?php echo e(auth()->user()->userimage()); ?>" class="rounded-circle">
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1"><?php echo e(auth()->user()->name); ?></h5>
                                <p class="mb-0 text-muted"><?php echo e(auth()->user()->email); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">


                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('panel.index')); ?>">
                                <i class="fe fe-user me-2"></i><?php echo app('translator')->get('messages.Profile'); ?>
                            </a>

                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i><?php echo e(__('messages.Settings')); ?>

                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" >
                                <?php echo csrf_field(); ?>
                                <button class="btn  btn-outline-light-warning text-black w-100" >
                                    <i class="fe fe-power me-2"></i><?php echo app('translator')->get('messages.Sign Out'); ?>
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>

            </li>
            <?php endif; ?>
            <li class="dropdown p-2 ">
                <a class="rounded-circle" href="#" role="button" data-bs-toggle="dropdown">
                    <?php
                        $segment=request()->segments();
                        if(isset($segment[0]) && $segment[0]=='fa' || app()->getLocale()=='fa')
                            {
                               echo '<span class="flag-icon flag-icon-ir"> </span> ';
                            }elseif (isset($segment[0]) && $segment[0]=='tr' || app()->getLocale()=='tr')
                            {
                                echo '<span class="flag-icon flag-icon-tr"> </span> ';
                            }else
                            {
                                echo '<span class="flag-icon flag-icon-us"> </span> ';
                            }
                    ?>
                </a>
                <div class="dropdown-menu  dropdown-menu-end" >
                    <a class="dropdown-item" href="<?php echo e(url('tr')); ?>"><span class="flag-icon flag-icon-tr"> </span>  turkish</a>
                    <a class="dropdown-item" href="<?php echo e(url('fa')); ?>"><span class="flag-icon flag-icon-ir"> </span>  farsi</a>
                    <a class="dropdown-item" href="<?php echo e(url('en')); ?>"><span class="flag-icon flag-icon-us"> </span>  english</a>
                </div>
            </li>
        </ul>
        <!-- Button -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">


            <?php echo $__env->make('frontend.frontendlayout.catmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




            <!-- search form-->

            <form method="get" action="<?php echo e(route('home.search')); ?>" class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
                <input type="search" name="search" class="form-control ps-6" placeholder="<?php echo app('translator')->get('messages.Search Courses'); ?>">
            </form>

            

                <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">




                    <li class="nav-item dropdown d-inline-block">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $segment=request()->segments();
                        if(isset($segment[0]) && $segment[0]=='fa' || app()->getLocale()=='fa')
                            {
                               echo '<span class="flag-icon flag-icon-ir"> </span> farsi';
                            }elseif (isset($segment[0]) && $segment[0]=='tr' || app()->getLocale()=='tr')
                            {
                                echo '<span class="flag-icon flag-icon-tr"> </span> Turky';
                            }else
                            {
                                echo '<span class="flag-icon flag-icon-us"> </span> Engliah';
                            }
                        ?>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-end" >
                            <a class="dropdown-item" href="<?php echo e(url('tr')); ?>"><span class="flag-icon flag-icon-tr"> </span>  turkish</a>
                            <a class="dropdown-item" href="<?php echo e(url('fa')); ?>"><span class="flag-icon flag-icon-ir"> </span>  farsi</a>
                            <a class="dropdown-item" href="<?php echo e(url('en')); ?>"><span class="flag-icon flag-icon-us"> </span>  english</a>
                        </div>
                    </li>


            <!-- user menu-->
            <?php if(auth()->guard()->check()): ?>



                    <li class="dropdown ms-2 d-inline-block">
                        <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="<?php echo e(auth()->user()->userimage()); ?>" class="rounded-circle">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="<?php echo e(auth()->user()->userimage()); ?>" class="rounded-circle">
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1"><?php echo e(auth()->user()->name); ?></h5>
                                        <p class="mb-0 text-muted"><?php echo e(auth()->user()->email); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">

                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('panel.index')); ?>">
                                        <i class="fe fe-user me-2"></i><?php echo app('translator')->get('messages.Profile'); ?>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-settings me-2"></i><?php echo e(__('messages.Settings')); ?>

                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" >
                                        <?php echo csrf_field(); ?>
                                        <button class="btn  btn-outline-light-warning text-black w-100" >
                                            <i class="fe fe-power me-2"></i><?php echo app('translator')->get('messages.Sign Out'); ?>
                                        </button>
                                    </form>

                                           </li>
                            </ul>
                        </div>
                    </li>

            <?php endif; ?>


                </ul>
                <?php if(auth()->guard()->guest()): ?>


                    <a href="<?php echo e(route('login')); ?>" class="btn btn-white shadow-sm me-1"><?php echo app('translator')->get('messages.Sign In'); ?></a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><?php echo app('translator')->get('messages.Sign Up'); ?></a>

                <?php endif; ?>


        </div>
    </div>
</nav>
<?php /**PATH C:\ustashow\ustashow\resources\views/frontend/frontendlayout/menu.blade.php ENDPATH**/ ?>