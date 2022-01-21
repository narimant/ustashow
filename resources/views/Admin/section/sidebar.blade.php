<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Ustashow V.1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('admin/panel')? 'active': '' }}" href="/admin/panel">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>


                <!-- Articles -->
                <li class="nav-item {{ Route::is(['articles.index','articles.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['articles.index','articles.create'])? 'active': '' }}">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            Article
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('articles.index')}}"
                               class="nav-link {{ Route::is('articles.index')? 'active': '' }}">

                                <p>All Articles</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('articles.create')}}"
                               class="nav-link {{ Route::is('articles.create')? 'active': '' }}">

                                <p>Create Articles</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Courses -->
                <li class="nav-item {{ Route::is(['courses.index','courses.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['courses.index','courses.create'])? 'active': '' }}">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            Courses
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('courses.index')}}"
                               class="nav-link {{ Route::is('courses.index')? 'active': '' }}">

                                <p>All courses</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('courses.create')}}"
                               class="nav-link {{ Route::is('courses.create')? 'active': '' }}">

                                <p>Create courses</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Episodes -->
                <li class="nav-item {{ Route::is(['episodes.index','episodes.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['episodes.index','episodes.create'])? 'active': '' }}">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            Episodes
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('episodes.index')}}"
                               class="nav-link {{ Route::is('episodes.index')? 'active': '' }}">

                                <p>All Episodes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('episodes.create')}}"
                               class="nav-link {{ Route::is('episodes.create')? 'active': '' }}">

                                <p>Create Episodes</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Comments -->
                <li class="nav-item {{ Route::is(['comments.index','comments.unsucsess']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['comments.index','comments.unsucsess'])? 'active': '' }}">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            Comments

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('comments.index')}}"
                               class="nav-link {{ Route::is('comments.index')? 'active': '' }}">

                                <p>All Comments</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('comments.unsucsess')}}"
                               class="nav-link {{ Route::is('comments.unsucsess')? 'active': '' }}">

                                <p>Comments unsucsess
                                    @if($newcomment->count()>0)
                                        <span class="badge badge-danger right">{{ $newcomment->count() }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Payment -->
                <li class="nav-item {{ Route::is(['payments.index','payments.unsucsess']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['payments.index','payments.unsucsess'])? 'active': '' }}">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            Payments
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('payments.index')}}"
                               class="nav-link {{ Route::is('payments.index')? 'active': '' }}">

                                <p>All Payments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('payments.unsucsess')}}"
                               class="nav-link {{ Route::is('payments.unsucsess')? 'active': '' }}">

                                <p>Unsucsess Payments</p>
                            </a>
                        </li>


                    </ul>
                </li>


                <!-- Users -->

                <!-- Payment -->
                <li class="nav-item {{ Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create']) ? 'menu-open': '' }}">
                    <a href="#"
                       class="nav-link {{ Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create'])? 'active': '' }}">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ Route::is('users.index')? 'active': '' }}">

                                <p>All Users</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ Route::is('users.index')? 'active': '' }}">

                                <p>Create Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lvl.index') }}"
                               class="nav-link {{ Route::is('lvl.index')? 'active': '' }}">

                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                               class="nav-link {{ Route::is('roles.index')? 'active': '' }}">

                                <p> All Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                               class="nav-link {{ Route::is(['permissions.index','permissions.create'])? 'active': '' }}">

                                <p> All Permissions</p>
                            </a>
                        </li>


                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
