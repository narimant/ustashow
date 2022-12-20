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
                <li class="nav-item <?php echo e(Route::is(['articles.index','articles.create','articles.edit']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['articles.index','articles.create' ,'articles.edit'])? 'active': ''); ?>">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            <?php echo e(__('adminPanel.Articles')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('articles.index')); ?>"
                               class="nav-link <?php echo e(Route::is('articles.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Articles')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('articles.create')); ?>"
                               class="nav-link <?php echo e(Route::is('articles.create')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Create Articles')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- category -->
                <li class="nav-item <?php echo e(Route::is(['categories.index','categories.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['categories.index','categories.create'])? 'active': ''); ?>">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            <?php echo e(__('adminPanel.Category')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('categories.index')); ?>"
                               class="nav-link <?php echo e(Route::is('categories.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Category')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('categories.create')); ?>"
                               class="nav-link <?php echo e(Route::is('categories.create')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Create Category')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- tag -->
                <li class="nav-item <?php echo e(Route::is(['tags.index','tags.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['tags.index','tags.create'])? 'active': ''); ?>">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            <?php echo e(__('adminPanel.Tags')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('tags.index')); ?>"
                               class="nav-link <?php echo e(Route::is('tags.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Tags')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('tags.create')); ?>"
                               class="nav-link <?php echo e(Route::is('tags.create')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Create Tag')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Pages -->
                <li class="nav-item <?php echo e(Route::is(['pages.index','pages.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['pages.index','pages.create'])? 'active': ''); ?>">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            <?php echo e(__('adminPanel.Pages')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('pages.index')); ?>"
                               class="nav-link <?php echo e(Route::is('pages.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Pages')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('pages.create')); ?>"
                               class="nav-link <?php echo e(Route::is('pages.create')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Create Page')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Courses -->
                <li class="nav-item <?php echo e(Route::is(['courses.index','courses.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['courses.index','courses.create'])? 'active': ''); ?>">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            <?php echo e(__('adminPanel.Courses')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('courses.index')); ?>"
                               class="nav-link <?php echo e(Route::is('courses.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All courses')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('courses.create')); ?>"
                               class="nav-link <?php echo e(Route::is('courses.create')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Create course')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Episodes -->
                <li class="nav-item <?php echo e(Route::is(['episodes.index','episodes.create']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['episodes.index','episodes.create'])? 'active': ''); ?>">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            <?php echo e(__('adminPanel.Episodes')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('episodes.index')); ?>"
                               class="nav-link <?php echo e(Route::is('episodes.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Episodes')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('episodes.create')); ?>"
                               class="nav-link <?php echo e(Route::is('episodes.create')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Create Episodes')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Comments -->
                <li class="nav-item <?php echo e(Route::is(['comments.index','comments.unsucsess']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['comments.index','comments.unsucsess'])? 'active': ''); ?>">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            <?php echo e(__('adminPanel.Comments')); ?>


                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('comments.index')); ?>"
                               class="nav-link <?php echo e(Route::is('comments.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Comments')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('comments.unsucsess')); ?>"
                               class="nav-link <?php echo e(Route::is('comments.unsucsess')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Comments unsuccess')); ?>

                                    <?php if($newcomment->count()>0): ?>
                                        <span class="badge badge-danger right"><?php echo e($newcomment->count()); ?></span>
                                    <?php endif; ?>
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Payment -->
                <li class="nav-item <?php echo e(Route::is(['payments.index','payments.unsucsess']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['payments.index','payments.unsucsess'])? 'active': ''); ?>">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            <?php echo e(__('adminPanel.Payments')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('payments.index')); ?>"
                               class="nav-link <?php echo e(Route::is('payments.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Payments')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('payments.unsucsess')); ?>"
                               class="nav-link <?php echo e(Route::is('payments.unsucsess')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Unsucsess Payments')); ?></p>
                            </a>
                        </li>


                    </ul>
                </li>


                <!-- Users -->


                <li class="nav-item <?php echo e(Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create','users.profile']) ? 'menu-open': ''); ?>">
                    <a href="#"
                       class="nav-link <?php echo e(Route::is(['users.index','users.create','lvl.index','roles.index','permissions.index','permissions.create','users.profile'])? 'active': ''); ?>">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            <?php echo e(__('adminPanel.Users')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('users.profile')); ?>"
                               class="nav-link <?php echo e(Route::is('users.profile')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.My Profile')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('users.index')); ?>"
                               class="nav-link <?php echo e(Route::is('users.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Users')); ?></p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo e(route('lvl.index')); ?>"
                               class="nav-link <?php echo e(Route::is('lvl.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Manage Users')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('roles.index')); ?>"
                               class="nav-link <?php echo e(Route::is('roles.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.All Role')); ?> </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('permissions.index')); ?>"
                               class="nav-link <?php echo e(Route::is(['permissions.index','permissions.create'])? 'active': ''); ?>">

                                <p> <?php echo e(__('adminPanel.All Permissions')); ?></p>
                            </a>
                        </li>


                    </ul>
                </li>


                <!-- Site Settings -->
                <li class="nav-item <?php echo e(Route::is(['siteSettings.index','footer.index']) ? 'menu-open': ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::is(['siteSettings.index','footer.index'])? 'active': ''); ?>">
                        <i class="fa-thin fa-books"></i>
                        <p>
                            <?php echo e(__('adminPanel.Site Settings')); ?>

                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('siteseo.index')); ?>"
                               class="nav-link <?php echo e(Route::is('siteseo.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Site Main Seo')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('footer.index')); ?>"
                               class="nav-link <?php echo e(Route::is('footer.index')? 'active': ''); ?>">

                                <p><?php echo e(__('adminPanel.Site Footer Settings')); ?></p>
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
<?php /**PATH C:\Users\ASUSGAMİNG\Desktop\ustashow backup\ustashow.com\resources\views/Admin/section/sidebar.blade.php ENDPATH**/ ?>