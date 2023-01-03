<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 pb-5">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('upload/logo/logo.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{__('adminPanel.Ustashow')}} V.1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{auth()->user()->userimage()}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
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
                    <a class="nav-link {{ Request::is('admin/panel')? 'active': '' }}" href="{{route('admin.index')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('adminPanel.Dashboard')}}
                        </p>
                    </a>

                </li>




            <!-- Articles -->
                @can('show_articles')
                    <li class="nav-item {{ Route::is(['articles.index','articles.create','articles.edit']) ? 'menu-open': '' }}">

                        <a href="#" class="nav-link {{ Route::is(['articles.index','articles.create' ,'articles.edit'])? 'active': '' }}">
                            <i class=" fas fa-file"></i>
                            <p>
                                {{__('adminPanel.Articles')}}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('all_articles')
                                <li class="nav-item">
                                    <a href="{{route('articles.index')}}"
                                       class="nav-link {{ Route::is('articles.index')? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{__('adminPanel.All Articles')}}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('create_article')
                                <li class="nav-item">
                                    <a href="{{route('articles.create')}}"
                                       class="nav-link {{ Route::is('articles.create')? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{__('adminPanel.Create Articles')}}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


            <!-- Videos -->
                @can('show_videos')
                    <li class="nav-item {{ Route::is(['videos.index','videos.create','videos.edit']) ? 'menu-open': '' }}">

                        <a href="#" class="nav-link {{ Route::is(['videos.index','videos.create' ,'videos.edit'])? 'active': '' }}">
                            <i class=" fas fa-file"></i>
                            <p>
                                {{__('adminPanel.Videos')}}
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('all_videos')
                                <li class="nav-item">
                                    <a href="{{route('videos.index')}}"
                                       class="nav-link {{ Route::is('videos.index')? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{__('adminPanel.All Videos')}}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('create_video')
                                <li class="nav-item">
                                    <a href="{{route('videos.create')}}"
                                       class="nav-link {{ Route::is('videos.create')? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{__('adminPanel.Create Video')}}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                <!-- category -->
                @can('show_category')
                <li class="nav-item {{ Route::is(['categories.index','categories.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['categories.index','categories.create'])? 'active': '' }}">
                        <i class="fa fa-folder"></i>
                        <p>
                            {{__('adminPanel.Category')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('all_category')
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}"
                               class="nav-link {{ Route::is('categories.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Category')}}</p>
                            </a>
                        </li>
                        @endcan

                        @can('create_category')
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}"
                               class="nav-link {{ Route::is('categories.create')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Create Category')}}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                <!-- tag -->
                @can('show_tags')
                <li class="nav-item {{ Route::is(['tags.index','tags.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['tags.index','tags.create'])? 'active': '' }}">
                        <i class="fas fa-thin fa-tags"></i>
                        <p>
                            {{__('adminPanel.Tags')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('all_tags')
                        <li class="nav-item">
                            <a href="{{route('tags.index')}}"
                               class="nav-link {{ Route::is('tags.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Tags')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('create_tag')
                        <li class="nav-item">
                            <a href="{{route('tags.create')}}"
                               class="nav-link {{ Route::is('tags.create')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Create Tag')}}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                <!-- Pages -->
                @can('show_pages')
                <li class="nav-item {{ Route::is(['pages.index','pages.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['pages.index','pages.create'])? 'active': '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{__('adminPanel.Pages')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('all_pages')
                        <li class="nav-item">
                            <a href="{{route('pages.index')}}"
                               class="nav-link {{ Route::is('pages.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Pages')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('create_page')
                        <li class="nav-item">
                            <a href="{{route('pages.create')}}"
                               class="nav-link {{ Route::is('pages.create')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Create Page')}}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!-- Courses -->
                @can('show_courses')
                <li class="nav-item {{ Route::is(['courses.index','courses.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['courses.index','courses.create'])? 'active': '' }}">
                        <i class="fas fa-graduation-cap"></i>
                        <p>
                            {{__('adminPanel.Courses')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('all_courses')
                        <li class="nav-item">
                            <a href="{{route('courses.index')}}"
                               class="nav-link {{ Route::is('courses.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Courses')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('create_course')
                        <li class="nav-item">
                            <a href="{{route('courses.create')}}"
                               class="nav-link {{ Route::is('courses.create')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Create course')}}</p>
                            </a>
                        </li>
                            @endcan

                    </ul>
                </li>
                @endcan

                <!-- Episodes -->
                @can('show_episode')
                <li class="nav-item {{ Route::is(['episodes.index','episodes.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['episodes.index','episodes.create'])? 'active': '' }}">
                        <i class="fas fa-video"></i>
                        <p>
                            {{__('adminPanel.Episodes')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('all_episodes')
                        <li class="nav-item">
                            <a href="{{route('episodes.index')}}"
                               class="nav-link {{ Route::is('episodes.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Episodes')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('create_episode')
                        <li class="nav-item">
                            <a href="{{route('episodes.create')}}"
                               class="nav-link {{ Route::is('episodes.create')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Create Episodes')}}</p>
                            </a>
                        </li>
                            @endcan

                    </ul>
                </li>
                @endcan

                <!-- Comments -->
                @can('show_comments')
                <li class="nav-item {{ Route::is(['comments.index','comments.unsucsess']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['comments.index','comments.unsucsess'])? 'active': '' }}">
                        <i class="fas fa-comments"></i>
                        <p>
                            {{__('adminPanel.Comments')}}

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('all_comments')
                        <li class="nav-item">
                            <a href="{{route('comments.index')}}"
                               class="nav-link {{ Route::is('comments.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Comments')}}</p>
                            </a>
                        </li>
                        @endcan

                        @can('Unverified_comments')
                        <li class="nav-item">
                            <a href="{{route('comments.unsucsess')}}"
                               class="nav-link {{ Route::is('comments.unsucsess')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.New Comments')}}
                                    @if($newcomment->count()>0)
                                        <span class="badge badge-danger right">{{ $newcomment->count() }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!-- Payment -->
                @can('show_payments')
                <li class="nav-item {{ Route::is(['payments.index','payments.unsucsess']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['payments.index','payments.unsucsess'])? 'active': '' }}">
                        <i class="fas fa-money-check-alt"></i>
                        <p>
                            {{__('adminPanel.Payments')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('payments.index')}}"
                               class="nav-link {{ Route::is('payments.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Payments')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('payments.unsucsess')}}"
                               class="nav-link {{ Route::is('payments.unsucsess')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Unsucsess Payments')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                @endcan


                <!-- Users -->

                @can('show_users')
                <li class="nav-item {{ Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create','users.profile']) ? 'menu-open': '' }}">
                    <a href="#"
                       class="nav-link {{ Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create','users.profile'])? 'active': '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            {{__('adminPanel.Users')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('my_profile')
                        <li class="nav-item">
                            <a href="{{ route('users.profile') }}"
                               class="nav-link {{ Route::is('users.profile')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.My Profile')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('all_users')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ Route::is('users.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Users')}}</p>
                            </a>
                        </li>
                            @endcan


                        @can('manage_users')
                        <li class="nav-item">
                            <a href="{{ route('lvl.index') }}"
                               class="nav-link {{ Route::is('lvl.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Manage Users')}}</p>
                            </a>
                        </li>
                            @endcan
                            @can('all_roles')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                               class="nav-link {{ Route::is('roles.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.All Role')}} </p>
                            </a>
                        </li>
                            @endcan
                            @can('all_permisions')
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                               class="nav-link {{ Route::is(['permissions.index','permissions.create'])? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> {{__('adminPanel.All Permissions')}}</p>
                            </a>
                        </li>
                                @endcan


                    </ul>
                </li>
                @endcan

                <!-- Site Settings -->
                @can('show_site_settings')
                <li class="nav-item {{ Route::is(['siteSettings.index','footer.index']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link {{ Route::is(['siteSettings.index','footer.index'])? 'active': '' }}">
                        <i class="fas fa-cogs"></i>
                        <p>
                            {{__('adminPanel.Site Settings')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('site_seo')
                        <li class="nav-item">
                            <a href="{{route('siteseo.index')}}"
                               class="nav-link {{ Route::is('siteseo.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Site Main Seo')}}</p>
                            </a>
                        </li>
                        @endcan

                        @can('site_footer')
                            <li class="nav-item">
                            <a href="{{route('footer.index')}}"
                               class="nav-link {{ Route::is('footer.index')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('adminPanel.Site Footer Settings')}}</p>
                            </a>
                        </li>
                        @endcan


                    </ul>
                </li>
                    @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
