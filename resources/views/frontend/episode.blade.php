@extends('frontend.frontendlayout.frontendmaster')


@section('content')



    <div class="p-lg-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-5">
                    <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
                        <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/PkZNo7MFNFg"></iframe>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="fw-semi-bold mb-2">
                                   {{ $episode->title }}
                                </h1>
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Add to Bookmarks">
                                    <i class="fe fe-bookmark fs-3 text-inherit"></i>
                                </a>
                            </div>
                            <div class="d-flex mb-5">
                            <span>
                              <i class="mdi mdi-star me-n1 text-warning"></i>
                              <i class="mdi mdi-star me-n1 text-warning"></i>
                              <i class="mdi mdi-star me-n1 text-warning"></i>
                              <i class="mdi mdi-star me-n1 text-warning"></i>
                              <i class="mdi mdi-star-half-full text-warning"></i>
                              <span class="fw-medium">(140)</span>
                            </span>
                                <span class="ms-4 d-none d-md-block">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  </svg>
                  <span>
                    Intermediate
                  </span>
                </span>
                                <span class="ms-4 d-none d-md-block">
                  <i class="mdi mdi-account-multiple-outline"></i>
                  <span>Enrolled</span>
                </span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('frontend/images/avatar-2.jpg')}}" class="rounded-circle avatar-md" alt="">
                                    <div class="ms-2 lh-1">
                                        <h4 class="mb-1">Kathryn Jones</h4>
                                        <p class="fs-6 mb-0">@kathrynjones</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-white btn-sm">Follow</a>
                                </div>
                            </div>




                            <div class="mt-4 pt-4 border-top">
                                <h3 class="mb-2">Course Descriptions</h3>
                                {!! $episode->body !!}
                            </div>

                        </div>

                    </div>





                    <div class="card rounded-3 mb-5">
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="mb-3">
                                <!-- Content -->
                                <h3 class="mb-4">How students rated this courses</h3>
                                <div class="row align-items-center">
                                    <div class="col-auto text-center">
                                        <h3 class="display-2 fw-bold">4.5</h3>
                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                        <i class="mdi mdi-star me-n1-half text-warning"></i>
                                        <p class="mb-0 fs-6">(Based on 27 reviews)</p>
                                    </div>
                                    <!-- Progress bar -->
                                    <div class="col pt-3 order-3 order-md-2">
                                        <div class="progress mb-3" style="height: 6px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="progress mb-3" style="height: 6px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="progress mb-3" style="height: 6px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="progress mb-3" style="height: 6px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="progress mb-0" style="height: 6px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!-- Rating -->
                                    <div class="col-md-auto col-6 order-2 order-md-3">
                                        <div>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <span class="ms-1">53%</span>
                                        </div>
                                        <div>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <span class="ms-1">36%</span>
                                        </div>
                                        <div>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <span class="ms-1">9%</span>
                                        </div>
                                        <div>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <span class="ms-1">3%</span>
                                        </div>
                                        <div>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                            <span class="ms-1">2%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-5">
                            <div class="mb-3">
                                <!-- Review -->
                                <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                    <div class="mb-3 mb-lg-0">
                                        <h3 class="mb-0">Reviews</h3>
                                    </div>
                                    <div>
                                        <!-- Search -->
                                        <form class="form-inline">
                                            <div class="d-flex align-items-center me-2">
                            <span class="position-absolute ps-3">
                              <i class="fe fe-search"></i>
                            </span>
                                                <input type="search" class="form-control ps-6" placeholder="Search Review">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="d-flex border-bottom pb-4 mb-4">
                                    <!-- Media -->
                                    <img src="{{asset('frontend/images/avatar-2.jpg')}}" alt="" class="rounded-circle avatar-lg">
                                    <!-- Content -->
                                    <div class=" ms-3">
                                        <h4 class="mb-1">
                                            Max Hawkins
                                            <span class="ms-1 fs-6 text-muted">2 Days ago</span>
                                        </h4>
                                        <div class="fs-6 mb-2">
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                        </div>
                                        <p>Lectures were at a really good pace and I never felt lost. The instructor was well informed
                                            and allowed me to learn and navigate Figma easily.</p>
                                        <div class="d-lg-flex">
                                            <p class="mb-0">Was this review helpful?</p>
                                            <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                            <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-bottom pb-4 mb-4">
                                    <!-- Media -->
                                    <img src="{{asset('frontend/images/avatar-3.jpg')}}" alt="" class="rounded-circle avatar-lg">
                                    <!-- Content -->
                                    <div class=" ms-3">
                                        <h4 class="mb-1">Arthur Williamson <span class="ms-1 fs-6 text-muted">3 Days ago</span>
                                        </h4>
                                        <div class="fs-6 mb-2">
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                        </div>
                                        <p>Its pretty good.Just a reminder that there are also students with Windows, meaning Figma its
                                            a bit different of yours. Thank you!</p>
                                        <div class="d-lg-flex">
                                            <p class="mb-0">Was this review helpful?</p>
                                            <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                            <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-bottom pb-4 mb-4">
                                    <!-- Media -->
                                    <img src="{{asset('frontend/images/avatar-4.jpg')}}" alt="" class="rounded-circle avatar-lg">
                                    <!-- Content -->
                                    <div class=" ms-3">
                                        <h4 class="mb-1">Claire Jones <span class="ms-1 fs-6 text-muted">4 Days ago</span></h4>
                                        <div class="fs-6 mb-2">
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                        </div>
                                        <p>
                                            Great course for learning Figma, the only bad detail would be that some icons are not included
                                            in the assets. But 90% of the icons needed are included, and the voice of the instructor
                                            was very clear and easy to understood.
                                        </p>
                                        <div class="d-lg-flex">
                                            <p class="mb-0">Was this review helpful?</p>
                                            <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                            <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <!-- Media -->
                                    <img src="{{asset('frontend/images/avatar-5.jpg')}}" alt="" class="rounded-circle avatar-lg">
                                    <!-- Content -->
                                    <div class=" ms-3">
                                        <h4 class="mb-1">
                                            Bessie Pena
                                            <span class="ms-1 fs-6 text-muted">5 Days ago</span>
                                        </h4>
                                        <div class="fs-6 mb-2">
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                            <i class="mdi mdi-star me-n1 text-warning"></i>
                                        </div>
                                        <p>
                                            I have really enjoyed this class and learned a lot, found it very inspiring and helpful, thank
                                            you!

                                        </p>
                                        <div class="d-lg-flex">
                                            <p class="mb-0">Was this review helpful?</p>
                                            <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                            <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                    <div class="card" id="courseAccordion">
                        <div>
                            <!-- List group -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-0 bg-transparent">
                                    <!-- Toggle -->
                                    <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none py-3 px-4"  >
                                        <div class="me-auto">
                                            Course Overview
                                            <p class="mb-0 text-muted fs-6 mt-1 fw-normal">{{$course->episodes->count()}} videos ({{ $course->time }})
                                            </p>
                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow ms-4">
                                          <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>
                                    <!-- Row -->
                                    <!-- Collapse -->

                                        <!-- List group item -->
                                        <ul class="list-group list-group-flush">

                                            <!-- List group item -->
                                            @foreach( $course->episodes()->latest()->get() as $episodes)

                                            <li class="list-group-item
                                            @if('/'.request()->path()== $episodes->path()) active @endif
                                             list-group-item-action ">
                                                <a href="{{ $episodes->path() }}" class="d-flex justify-content-between align-items-center
                                               @if('/'.request()->path()== $episodes->path()) text-white  @else  text-inherit  @endif

                                                text-decoration-none">
                                                    <div class="text-truncate">
                                                        <span class="icon-shape
                                                        @if('/'.request()->path()== $episodes->path()) bg-light  text-primary @else  bg-success  text-white @endif

                                                          icon-sm rounded-circle me-2">
                                                            <i class="mdi mdi-play fs-4"></i>

                                                        </span>
                                                        <span>{{ $episodes->title }}</span>



                                                    </div>
                                                    <div class="text-truncate">
                                                        <span>{{ $episodes->time }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                            <!-- List group item -->
                                            <li class="list-group-item disabled" aria-disabled="true">
                                                <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                    <div class="text-truncate">
                                                        <span class="icon-shape bg-light text-muted icon-sm rounded-circle me-2"><i class="fe fe-lock fs-4"></i></span>
                                                        <span>Our Sample Website</span>
                                                    </div>
                                                    <div class="text-truncate">
                                                        <span>2m 15s</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
