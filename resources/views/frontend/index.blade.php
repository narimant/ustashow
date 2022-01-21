@extends('frontend.frontendlayout.frontendmaster')

@section('content')



    <!-- Header-->
    <div class="bg-primary">
        <div class="container">
            <!-- Hero Section -->
            <div class="row align-items-center g-0">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="py-5 py-lg-0">
                        <h1 class="text-white display-4 fw-bold">Welcome to Geeks UI Learning Application
                        </h1>
                        <p class="text-white-50 mb-4 lead">
                            Hand-picked Instructor and expertly crafted courses, designed for the modern students and
                            entrepreneur.
                        </p>
                        <a href="pages/course-filter-list.html" class="btn btn-success">Browse Courses</a>
                        <a href="pages/sign-in.html" class="btn btn-white">Are You Instructor?</a>
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
                            <h4 class="mb-0 fw-semi-bold">30,000 online courses</h4>
                            <p class="mb-0">Enjoy a variety of fresh topics</p>
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
                            <h4 class="mb-0 fw-semi-bold">Expert instruction</h4>
                            <p class="mb-0">Find the right instructor for you</p>
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
                            <h4 class="mb-0 fw-semi-bold">Lifetime access</h4>
                            <p class="mb-0">Learn on your schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">Last Article</h2>
                </div>
            </div>
            <div class="row">

                @foreach($articles as $article)
                <!-- Card -->
                    <div class="card col-3 m-2 card-hover p-0">
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
                            <li class="list-inline-item">
                                <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
                                </svg>
                                Advance
                            </li>
                        </ul>

                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
                        <div class="row align-items-center g-0">
                            <div class="col-auto">
                                <img src="frontend/images/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
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
                @endforeach

            </div>
        </div>
    </div>







    <div class="pt-lg-8 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">Last Article</h2>
                </div>
            </div>
            <div class="row">

            @foreach($courses as $course)
                <!-- Card -->
                    <div class="card col-3 m-2 card-hover p-0">
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
                                <li class="list-inline-item">
                                    <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
                                    </svg>
                                    Advance
                                </li>
                            </ul>

                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="row align-items-center g-0">
                                <div class="col-auto">
                                    <img src="frontend/images/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
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
                @endforeach

            </div>
        </div>
    </div>






@endsection


@section('script')

@endsection
