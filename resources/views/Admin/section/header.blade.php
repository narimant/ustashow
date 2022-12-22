<!DOCTYPE html>
<html @if(app()->getLocale()=='fa') dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('adminPanel.Manage Site Panel')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('frontend/css/flag-icon.min.css') }}" >
    @if(app()->getLocale()=='fa')
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.rtl.css') }}">
        @else
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">


    @yield('style')
</head>

<body>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.index')}}" class="nav-link">{{__('adminPanel.Home')}}</a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    @if($newcomment->count()>0)
                    <span class="badge badge-danger navbar-badge">{{ $newcomment->count() }}</span>
                        @endif

                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    @if($newcomment->count()>0)

                        @foreach($newcomment->get() as $comment)
                    <a href="{{route('comments.unsucsess')}}" class="dropdown-item">
`
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{$comment->user->name}}
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">{{ Illuminate\Support\Str::limit($comment->comment,120) }}</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>

                        @endforeach
                    @else
                    <div  class="dropdown-item">
                        <p class="p-2 text-center">
                            no new message
                        </p>
                    </div>
                    @endif

                    <div class="dropdown-divider"></div>
                    <a href="{{route('comments.unsucsess')}}" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            {{--language menu--}}

            <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">




                <li class="nav-item dropdown d-inline-block">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @php
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
                        @endphp
                    </a>
                    <div class="dropdown-menu  dropdown-menu-end" >
                        <a class="dropdown-item" href="{{url('tr')}}"><span class="flag-icon flag-icon-tr"> </span>  turkish</a>
                        <a class="dropdown-item" href="{{url('fa')}}"><span class="flag-icon flag-icon-ir"> </span>  farsi</a>
                        <a class="dropdown-item" href="{{url('en')}}"><span class="flag-icon flag-icon-us"> </span>  english</a>
                    </div>
                </li>



            </ul>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->


