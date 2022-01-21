<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }}</a>
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
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPages" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarPages">
                        <li class="dropdown-submenu dropend">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Courses
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="./pages/course-single.html">
                                        Course Single
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/course-single-v2.html">
                                        Course Single v2
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/course-resume.html">
                                        Course Resume
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/course-category.html">
                                        Course Category
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/course-checkout.html">
                                        Course Checkout
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/course-filter-list.html">
                                        Course List/Grid
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/add-course.html">
                                        Add New Course
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <hr class="mx-3">
                        </li>


                        <li>
                            <a class="dropdown-item" href="./pages/about.html">
                                About
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAccount" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Accounts
                    </a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
                        <li>
                            <h4 class="dropdown-header">Accounts</h4>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Instructor
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Instructor</h5>
                                    <p class="dropdown-text mb-0">
                                        Instructor dashboard for manage courses and earning.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/dashboard-instructor.html">
                                        Dashboard</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-profile.html">
                                        Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-courses.html">
                                        My Courses
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-order.html">
                                        Orders</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-reviews.html">
                                        Reviews</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-students.html">
                                        Students</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-payouts.html">
                                        Payouts</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/instructor-earning.html">
                                        Earning</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Students
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Students</h5>
                                    <p class="dropdown-text mb-0">
                                        Students dashboard to manage your courses and subscriptions.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/dashboard-student.html">
                                        Dashboard</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/student-subscriptions.html">
                                        Subscriptions
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/payment-method.html">
                                        Payments</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/billing-info.html">
                                        Billing Info</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/invoice.html">
                                        Invoice</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/invoice-details.html">
                                        Invoice Details</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/dashboard-student.html">
                                        Bookmarked</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/dashboard-student.html">
                                        My Path</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Admin
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Master Admin</h5>
                                    <p class="dropdown-text mb-0">
                                        Master admin dashboard to manage courses, user, site setting
                                        , and work with amazing apps.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3">
                                </li>
                                <li class="px-3 d-grid">
                                    <a href="./pages/dashboard/admin-dashboard.html" class="btn btn-sm btn-primary">Go to Dashboard</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>


            <!-- search form-->

            <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
                <input type="search" class="form-control ps-6" placeholder="Search Courses">
            </form>



            <!-- user menu-->
            @auth
                <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">


                    <li class="dropdown ms-2 d-inline-block">
                        <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="frontend/images/avatar-1.jpg" class="rounded-circle">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="frontend/images/avatar-1.jpg" class="rounded-circle">
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1">Annette Black</h5>
                                        <p class="mb-0 text-muted">annette@geeksui.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">

                                <li>
                                    <a class="dropdown-item" href="{{ route('panel.index') }}">
                                        <i class="fe fe-user me-2"></i>Profile
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button class="btn  btn-outline-light-warning text-black w-100" >
                                            <i class="fe fe-power me-2"></i>Sign Out
                                        </button>
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            @endauth
            @guest

                <div class="ms-auto mt-3 mt-lg-0">
                    <a href="{{route('login')}}" class="btn btn-white shadow-sm me-1">Sign In</a>
                    <a href="{{route('register')}}" class="btn btn-primary">Sign Up</a>
                </div>
            @endguest



        </div>
    </div>
</nav>
