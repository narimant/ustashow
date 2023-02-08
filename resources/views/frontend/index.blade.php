@extends('frontend.frontendlayout.frontendmaster')

@section('content')


    <!-- Header-->
    <div class="bg-primary">
        <div class="container">
            <!-- Hero Section -->
            <div class="row align-items-center g-0">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="py-5 py-lg-0">
                        <h1 class="text-white display-4 fw-bold">@lang('messages.Welcome to Ustashow Platform Learning Application')
                        </h1>
                        <p class="text-white-50 mb-4 lead">
                           @lang('messages.Learning and engineering are not difficult. With the right training, you can get results faster.')
                        </p>
                        <a href="pages/course-filter-list.html" class="btn btn-success">@lang('messages.Browse Courses')</a>

                    </div>
                </div>
                <div class=" col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                    <img src="/frontend/images/hero-img.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>




    <div class="bg-white py-4 shadow-sm">
        <div class="container">
            <div class="row align-items-center g-0">
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span
                            class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                                class="fe fe-video"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">30,000 @lang('messages.online courses')</h4>
                            <p class="mb-0">@lang('messages.Enjoy a variety of fresh topics')</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span
                            class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                                class="fe fe-users"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">@lang('messages.Expert instruction')</h4>
                            <p class="mb-0">@lang('messages.Find the right instructor for you')</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-flex align-items-center">
                        <span
                            class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                                class="fe fe-clock"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">@lang('messages.Lifetime access')</h4>
                            <p class="mb-0">@lang('messages.Learn on your schedule')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if($videos->isNotEmpty())

        <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
            <div class="container">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="mb-0">@lang('messages.Last Videos')</h2>
                    </div>
                </div>
                <div class="row">

                @foreach($videos as $video)
                    <!-- Card -->
                        <div class="col-xl-3 col-lg-3 col-sm-12 col-md-6 mb-md-3 mb-sm-3">
                            <div class="card  card-hover p-0">
                                <a href="{{$video->path()}}" class="card-img-top">

                                    <img src="{{ $video->images['tumbnail'] }}" alt="" class="rounded-top-md card-img-top">
                                </a>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2 ">
                                        <a href="{{$video->path()}}" class="text-inherit">{{$video->title}}</a></h4>
                                    <!-- List -->
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{ $video->CreateTimeDiff  }}</li>

                                    </ul>

                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col-auto">

                                            <img src="{{$video->user->userimage()}}" class="rounded-circle avatar-xs" alt="">
                                        </div>
                                        <div class="col ms-2">
                                            <span>{{ $video->user->name }}</span>

                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="text-muted bookmark">
                                                <i class="fe fe-bookmark  "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    @endif


@if($articles->isNotEmpty())

    <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">@lang('messages.Last Article')</h2>
                </div>
            </div>
            <div class="row">

                @foreach($articles as $article)
                <!-- Card -->
                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-6 mb-md-3 mb-sm-3">
                    <div class="card  card-hover p-0">
                        <a href="{{$article->path()}}" class="card-img-top">
                            <img src="{{ $article->images['tumbnail'] }}" alt="" class="rounded-top-md card-img-top">
                        </a>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h4 class="mb-2 text-truncate-line-2 ">
                                <a href="{{$article->path()}}" class="text-inherit">{{$article->title}}</a></h4>
                            <!-- List -->
                            <ul class="mb-3 list-inline">
                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{ $article->CreateTimeDiff  }}</li>

                            </ul>

                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="row align-items-center g-0">
                                <div class="col-auto">
                                    <img src="{{$article->user->userimage()}}" class="rounded-circle avatar-xs" alt="">
                                </div>
                                <div class="col ms-2">
                                    <span>{{ $article->user->name }}</span>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="text-muted bookmark">
                                        <i class="fe fe-bookmark  "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

@endif




    @if($courses->isNotEmpty())
    <div class="pt-lg-8 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">@lang('messages.Last Courses')</h2>
                </div>
            </div>
            <div class="row">

            @foreach($courses as $course)
                <!-- Card -->
                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-6 mb-md-3 mb-sm-3">
                    <div class="card  card-hover p-0">
                        <a href="{{$course->path()}}" class="card-img-top">
                            <img src="{{ $course->images['tumbnail'] }}" alt="" class="rounded-top-md card-img-top">
                        </a>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h4 class="mb-2 text-truncate-line-2 ">
                                <a href="{{$course->path()}}" class="text-inherit">{{$course->title}}</a></h4>
                            <!-- List -->
                            <ul class="mb-3 list-inline">
                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{ $course->CreateTimeDiff  }}</li>

                            </ul>

                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="row align-items-center g-0">
                                <div class="col-auto">
                                    <img src="{{$course->user->userimage()}}" class="rounded-circle avatar-xs" alt="">
                                </div>
                                <div class="col ms-2">
                                    <span>{{ $course->user->name }}</span>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="text-muted bookmark">
                                        <i class="fe fe-bookmark  "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif






@endsection


@section('script')

@endsection
