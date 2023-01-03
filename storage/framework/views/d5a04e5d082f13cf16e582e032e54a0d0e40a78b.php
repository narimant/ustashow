<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 pb-5">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo e(asset('upload/logo/logo.jpg')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo e(__('adminPanel.Ustashow')); ?> V.1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(auth()->user()->userimage()); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(auth()->user()->name); ?></a>
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
                    <a class="nav-link <?php echo e(Request::is('admin/panel')? 'active': ''); ?>" href="<?php echo e(route('admin.index')); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?php echo e(__('adminPanel.Dashboard')); ?>

                        </p>
                    </a>

                </li>




            <!-- Articles -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_articles')): ?>
                    <li class="nav-item <?php echo e(Route::is(['articles.index','articles.create','articles.edit']) ? 'menu-open': ''); ?>">

                        <a href="#" class="nav-link <?php echo e(Route::is(['articles.index','articles.create' ,'articles.edit'])? 'active': ''); ?>">
                            <i class=" fas fa-file"></i>
                            <p>
                                <?php echo e(__('adminPanel.Articles')); ?>

                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_articles')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('articles.index')); ?>"
                                       class="nav-link <?php echo e(Route::is('articles.index')? 'active': ''); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo e(__('adminPanel.All Articles')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_article')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('articles.create')); ?>"
                                       class="nav-link <?php echo e(Route::is('articles.create')? 'active': ''); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo e(__('adminPanel.Create Articles')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


            <!-- Videos -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_videos')): ?>
                    <li class="nav-item <?php echo e(Route::is(['videos.index','videos.create','videos.edit']) ? 'menu-open': ''); ?>">

                        <a href="#" class="nav-link <?php echo e(Route::is(['videos.index','videos.create' ,'videos.edit'])? 'active': ''); ?>">
                            <i class=" fas fa-file"></i>
                            <p>
                                <?php echo e(__('adminPanel.Videos')); ?>

                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_videos')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('videos.index')); ?>"
                                       class="nav-link <?php echo e(Route::is('videos.index')? 'active': ''); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo e(__('adminPanel.All Videos')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_video')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('videos.create')); ?>"
                                       class="nav-link <?php echo e(Route::is('videos.create')? 'active': ''); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo e(__('adminPanel.Create Video')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- category -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_category')): ?>
                <li class="nav-item <?php echo e(Route::is(['categories.index','categories.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['categories.index','categories.create'])? 'active': ''); ?>">
                        <i class="fa fa-folder"></i>
                        <p>
                            <?php echo e(__('adminPanel.Category')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_category')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('categories.index')); ?>"
                               class="nav-link <?php echo e(Route::is('categories.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Category')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_category')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('categories.create')); ?>"
                               class="nav-link <?php echo e(Route::is('categories.create')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Create Category')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- tag -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_tags')): ?>
                <li class="nav-item <?php echo e(Route::is(['tags.index','tags.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['tags.index','tags.create'])? 'active': ''); ?>">
                        <i class="fas fa-thin fa-tags"></i>
                        <p>
                            <?php echo e(__('adminPanel.Tags')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_tags')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('tags.index')); ?>"
                               class="nav-link <?php echo e(Route::is('tags.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Tags')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_tag')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('tags.create')); ?>"
                               class="nav-link <?php echo e(Route::is('tags.create')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Create Tag')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- Pages -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_pages')): ?>
                <li class="nav-item <?php echo e(Route::is(['pages.index','pages.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['pages.index','pages.create'])? 'active': ''); ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            <?php echo e(__('adminPanel.Pages')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_pages')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('pages.index')); ?>"
                               class="nav-link <?php echo e(Route::is('pages.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Pages')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_page')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('pages.create')); ?>"
                               class="nav-link <?php echo e(Route::is('pages.create')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Create Page')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- Courses -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_courses')): ?>
                <li class="nav-item <?php echo e(Route::is(['courses.index','courses.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['courses.index','courses.create'])? 'active': ''); ?>">
                        <i class="fas fa-graduation-cap"></i>
                        <p>
                            <?php echo e(__('adminPanel.Courses')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_courses')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('courses.index')); ?>"
                               class="nav-link <?php echo e(Route::is('courses.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Courses')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_course')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('courses.create')); ?>"
                               class="nav-link <?php echo e(Route::is('courses.create')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Create course')); ?></p>
                            </a>
                        </li>
                            <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <!-- Episodes -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_episode')): ?>
                <li class="nav-item <?php echo e(Route::is(['episodes.index','episodes.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['episodes.index','episodes.create'])? 'active': ''); ?>">
                        <i class="fas fa-video"></i>
                        <p>
                            <?php echo e(__('adminPanel.Episodes')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_episodes')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('episodes.index')); ?>"
                               class="nav-link <?php echo e(Route::is('episodes.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Episodes')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_episode')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('episodes.create')); ?>"
                               class="nav-link <?php echo e(Route::is('episodes.create')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Create Episodes')); ?></p>
                            </a>
                        </li>
                            <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <!-- Comments -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_comments')): ?>
                <li class="nav-item <?php echo e(Route::is(['comments.index','comments.unsucsess']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['comments.index','comments.unsucsess'])? 'active': ''); ?>">
                        <i class="fas fa-comments"></i>
                        <p>
                            <?php echo e(__('adminPanel.Comments')); ?>


                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_comments')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('comments.index')); ?>"
                               class="nav-link <?php echo e(Route::is('comments.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Comments')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Unverified_comments')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('comments.unsucsess')); ?>"
                               class="nav-link <?php echo e(Route::is('comments.unsucsess')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.New Comments')); ?>

                                    <?php if($newcomment->count()>0): ?>
                                        <span class="badge badge-danger right"><?php echo e($newcomment->count()); ?></span>
                                    <?php endif; ?>
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- Payment -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_payments')): ?>
                <li class="nav-item <?php echo e(Route::is(['payments.index','payments.unsucsess']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['payments.index','payments.unsucsess'])? 'active': ''); ?>">
                        <i class="fas fa-money-check-alt"></i>
                        <p>
                            <?php echo e(__('adminPanel.Payments')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('payments.index')); ?>"
                               class="nav-link <?php echo e(Route::is('payments.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Payments')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('payments.unsucsess')); ?>"
                               class="nav-link <?php echo e(Route::is('payments.unsucsess')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Unsucsess Payments')); ?></p>
                            </a>
                        </li>


                    </ul>
                </li>
                <?php endif; ?>


                <!-- Users -->

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_users')): ?>
                <li class="nav-item <?php echo e(Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create','users.profile']) ? 'menu-open': ''); ?>">
                    <a href="#"
                       class="nav-link <?php echo e(Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create','users.profile'])? 'active': ''); ?>">
                        <i class="fas fa-users"></i>
                        <p>
                            <?php echo e(__('adminPanel.Users')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('my_profile')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('users.profile')); ?>"
                               class="nav-link <?php echo e(Route::is('users.profile')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.My Profile')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_users')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('users.index')); ?>"
                               class="nav-link <?php echo e(Route::is('users.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Users')); ?></p>
                            </a>
                        </li>
                            <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_users')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('lvl.index')); ?>"
                               class="nav-link <?php echo e(Route::is('lvl.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Manage Users')); ?></p>
                            </a>
                        </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_roles')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('roles.index')); ?>"
                               class="nav-link <?php echo e(Route::is('roles.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.All Role')); ?> </p>
                            </a>
                        </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_permisions')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('permissions.index')); ?>"
                               class="nav-link <?php echo e(Route::is(['permissions.index','permissions.create'])? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> <?php echo e(__('adminPanel.All Permissions')); ?></p>
                            </a>
                        </li>
                                <?php endif; ?>


                    </ul>
                </li>
                <?php endif; ?>

                <!-- Site Settings -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_site_settings')): ?>
                <li class="nav-item <?php echo e(Route::is(['siteSettings.index','footer.index']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['siteSettings.index','footer.index'])? 'active': ''); ?>">
                        <i class="fas fa-cogs"></i>
                        <p>
                            <?php echo e(__('adminPanel.Site Settings')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site_seo')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('siteseo.index')); ?>"
                               class="nav-link <?php echo e(Route::is('siteseo.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Site Main Seo')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site_footer')): ?>
                            <li class="nav-item">
                            <a href="<?php echo e(route('footer.index')); ?>"
                               class="nav-link <?php echo e(Route::is('footer.index')? 'active': ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('adminPanel.Site Footer Settings')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>


                    </ul>
                </li>
                    <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\ustashow\ustashow\resources\views/Admin/section/sidebar.blade.php ENDPATH**/ ?>