<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="<?php echo e(route('index')); ?>"> <img src="<?php echo e(asset('frontend/logo/menulogo.jpg')); ?>"></a>
        <!-- Mobile view nav wrap -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap">
            <li class="dropdown stopevent">
                <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fe fe-bell"> </i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div>
                        <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0">Notifications</span>
                            <a href="# " class="text-muted"><span class="align-middle"><i class="fe fe-settings me-1"></i></span></a>
                        </div>
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><ul class="list-group list-group-flush notification-list-scroll" style="overflow: hidden; width: auto; height: 300px;">
                                <li class="list-group-item bg-light">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body">
                                                <div class="d-flex">
                                                    <img src="/frontend/images/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                        <p class="mb-3">
                                                            Krisitn Watsan like your comment on course Javascript
                                                            Introduction!
                                                        </p>
                                                        <span class="fs-6 text-muted">
													<span><span class="fe fe-thumbs-up text-success me-1"></span>2 hours ago,</span>
													<span class="ms-1">2:19 PM</span>
												</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a href="#" class="badge-dot bg-info" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mark as read">
                                            </a>
                                            <div>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Remove">
                                                    <i class="fe fe-x text-muted"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body">
                                                <div class="d-flex">
                                                    <img src="/frontend/images/avatar-2.jpg" alt="" class="avatar-md rounded-circle">
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                        <p class="mb-3">
                                                            Just launched a new Courses React for Beginner.
                                                        </p>
                                                        <span class="fs-6 text-muted">
													<span><span class="fe fe-thumbs-up text-success me-1"></span>Oct 9,</span>
													<span class="ms-1">1:20 PM</span>
												</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a href="#" class="badge-dot bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mark as unread">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body">
                                                <div class="d-flex">
                                                    <img src="/frontend/images/avatar-3.jpg" alt="" class="avatar-md rounded-circle">
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                        <p class="mb-3">
                                                            Krisitn Watsan like your comment on course Javascript
                                                            Introduction!
                                                        </p>
                                                        <span class="fs-6 text-muted">
													<span><span class="fe fe-thumbs-up text-info me-1"></span>Oct 9,</span>
													<span class="ms-1">1:56 PM</span>
												</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a href="#" class="badge-dot bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mark as unread">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body">
                                                <div class="d-flex">
                                                    <img src="/frontend/images/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                        <p class="mb-3">
                                                            You earn new certificate for complete the Javascript
                                                            Beginner course.
                                                        </p>
                                                        <span class="fs-6 text-muted">
													<span><span class="fe fe-award text-warning me-1"></span>Oct 9,</span>
													<span class="ms-1">1:56 PM</span>
												</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a href="#" class="badge-dot bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mark as unread">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                        <div class="border-top px-3 pt-3 pb-0">
                            <a href="./pages/notification-history.html" class="text-link fw-semi-bold">See all Notifications</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="/frontend/images/avatar-1.jpg" class="rounded-circle">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="/frontend/images/avatar-1.jpg" class="rounded-circle">
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">Annette Black</h5>
                                <p class="mb-0 text-muted">annette@geeksui.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                <i class="fe fe-circle me-2"></i>Status
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-success me-2"></span>Online
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-secondary me-2"></span>Offline
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-warning me-2"></span>Away
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-danger me-2"></span>Busy
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="dropdown-item" href="./pages/profile-edit.html">
                                <i class="fe fe-user me-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./pages/student-subscriptions.html">
                                <i class="fe fe-star me-2"></i>Subscription
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i>Settings
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="./index.html">
                                <i class="fe fe-power me-2"></i>Sign Out
                            </a>
                        </li>
                    </ul>
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
            <?php if(auth()->guard()->guest()): ?>


                    <a href="<?php echo e(route('login')); ?>" class="btn btn-white shadow-sm me-1"><?php echo app('translator')->get('messages.Sign In'); ?></a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><?php echo app('translator')->get('messages.Sign Up'); ?></a>

            <?php endif; ?>

                </ul>



        </div>
    </div>
</nav>
<?php /**PATH /home/ustashow/domains/ustashow.com/resources/views/frontend/frontendlayout/menu.blade.php ENDPATH**/ ?>