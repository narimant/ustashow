@extends('frontend.frontendlayout.frontendmaster')

@section('content')
    @dd($article->tags)
    <div class="py-4 py-lg-8 pb-14 ">
        <div class="container articlepage">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <div class="text-center mb-4">

                        <h1 class="display-3 fw-bold mb-4">{{$article->title}}</h1>
                        <span class="mb-3 d-inline-block">4 min read</span>
                    </div>
                    <!-- Media -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/images/avatar-4.jpg" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">Dustin Warren</h5>
                                <span class="text-primary">Marketing Manager</span>
                            </div>
                        </div>
                        <div>
                            <span class="ms-2 text-muted">Share</span>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="ms-2 text-muted "><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Image -->

                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-6">
                    <img src="{{$article->images['images']['900']}}" alt="" class="img-fluid rounded-3">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <!-- Descriptions -->

                {!!  $article->body !!}
                    <!-- Media -->
                    <hr class="mt-8 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/images/avatar-4.jpg" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">Dustin Warren</h5>
                                <span class="text-primary">Marketing Manager</span>
                            </div>
                        </div>
                        <div>
                            <span class="ms-2 text-muted">Share</span>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="ms-2 text-muted "><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!-- Subscribe to Newsletter -->

                </div>
            </div>
        </div>
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="my-5">
                        <h2>Related Post</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card mb-4 shadow-lg ">
                        <a href="blog-single.html" class="card-img-top"> <img src="/frontend/images/blogpost-3.jpg" class="card-img-top rounded-top-md" alt=""></a>
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#" class="fs-5 fw-semi-bold d-block mb-3 text-primary">Workshop</a>
                            <a href="blog-single.html">
                                <h3>The Best DevOps Tools for Your Application Lifecycle</h3>
                            </a>
                            <p>Inventore pariatur veritatis maxime fugiat sint dolorem officiis nemo quis!
                            </p>
                            <!-- Media content -->
                            <div class="row align-items-center g-0 mt-4">
                                <div class="col-auto">
                                    <img src="/frontend/images/avatar-1.jpg" alt="" class="rounded-circle avatar-sm me-2">
                                </div>
                                <div class="col lh-1">
                                    <h5 class="mb-1">Dustin Warren</h5>
                                    <p class="fs-6 mb-0">September 09, 2020</p>
                                </div>
                                <div class="col-auto">
                                    <p class="fs-6 mb-0">12 Min Read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card mb-4 shadow-lg ">
                        <a href="blog-single.html" class="card-img-top"> <img src="/frontend/images/blogpost-6.jpg" class="card-img-top rounded-top-md" alt=""></a>
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#" class="fs-5 fw-semi-bold d-block mb-3 text-info">Courses</a>
                            <h3><a href="blog-single.html" class="text-inherit">
                                    How to become modern Stack Developer in 2020
                                </a>
                            </h3>
                            <p>At beatae non sit dicta simili quepers lem piciatis facilis veritatis quam.
                                corrupti?</p>
                            <div class="row align-items-center g-0 mt-4">
                                <div class="col-auto">
                                    <img src="/frontend/images/avatar-2.jpg" alt="" class="rounded-circle avatar-sm me-2">
                                </div>
                                <div class="col lh-1">
                                    <h5 class="mb-1">Sia Port</h5>
                                    <p class="fs-6 mb-0">September 10, 2020</p>
                                </div>
                                <div class="col-auto">
                                    <p class="fs-6 mb-0">10 Min Read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card mb-4 shadow-lg ">
                        <a href="blog-single.html" class="card-img-top"> <img src="/frontend/images/blogpost-5.jpg" class="card-img-top rounded-top-md" alt=""></a>
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#" class="fs-5 fw-semi-bold d-block mb-3 text-warning">Warning</a>
                            <h3><a href="blog-single.html" class="text-inherit">
                                    How to Become a Data Scientist?
                                </a>
                            </h3>
                            <p>Nulla voluptate in facere saepe est alias et iste, accusantium sint enim!</p>
                            <!-- Media content -->
                            <div class="row align-items-center g-0 mt-4">
                                <div class="col-auto">
                                    <img src="/frontend/images/avatar-3.jpg" alt="" class="rounded-circle avatar-sm me-2">
                                </div>
                                <div class="col lh-1">
                                    <h5 class="mb-1">Miron Sulla</h5>
                                    <p class="fs-6 mb-0">September 11, 2020</p>
                                </div>
                                <div class="col-auto">
                                    <p class="fs-6 mb-0">14 Min Read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-2">
            @include('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$article])
        </div>

    </div>

</div>



@endsection
