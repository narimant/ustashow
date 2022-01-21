@extends('frontend.frontendlayout.frontendmaster')



@section('content')
    <!-- Page content-->

    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold">{{ $course->title }}</h1>
                        <p class="text-white mb-6 lead">
                           {{ $course->description }}
                        </p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="bookmark text-white text-decoration-none">
                                <i class="fe fe-bookmark text-white-50 me-2"></i>Bookmark
                            </a>

                            <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i> 1200 Enrolled </span>
                            <span class="ms-4">
                <i class="mdi mdi-star me-n1 text-warning"></i>
                <i class="mdi mdi-star me-n1 text-warning"></i>
                <i class="mdi mdi-star me-n1 text-warning"></i>
                <i class="mdi mdi-star me-n1 text-warning"></i>
                <i class="mdi mdi-star me-n1-half text-warning"></i>
                <span class="text-white">(140)</span>
                            </span>
                            <span class="text-white ms-4 d-none d-md-block">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                </svg>
                <span class="align-middle">
                  Intermediate
                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="table-tab" data-bs-toggle="pill" href="#table" role="tab" aria-controls="table" aria-selected="false">Contents</a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <h3 class="mb-2">Course Descriptions</h3>
                                        {!! $course->body  !!}

                                    </div>

                                </div>
                                <div class="tab-pane fade " id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <!-- Card -->
                                    <div class="accordion" id="courseAccordion">




                                                        <div class="pt-3 pb-2">
                                                                <!-- Episodes -->
                                                            @foreach( $course->episodes()->latest()->get() as $episode)


                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i class="mdi mdi-play fs-4"></i></span>
                                                                        <span><a href="{{ $episode->path() }}"> {{ $episode->title }} </a></span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span> {{ $episode->time }}</span>
                                                                    </div>
                                                                    <a href="{{ $episode->download() }}">download</a>




                                                            @endforeach

                                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- comments-->
                    <div class="card rounded-3 mt-4">
                        <div class="card-body">
                        <div class="mb-3">
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
                                <div class="col-md-auto col-6 order-2 order-md-3">
                                    <!-- Rating -->
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
                        <!-- hr -->
                        <hr class="my-5">
                        <div class="mb-3">
                            <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                <!-- Reviews -->
                                <div class="mb-3 mb-lg-0">
                                    <h3 class="mb-0">Reviews</h3>
                                </div>
                                <div>
                                    <!-- Form -->
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
                            <!-- Rating -->

                            @include('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$course])
                        </div>
                        </div>
                    </div>

                </div>


                <!-- right sde -->
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover" style="background-image: url({{ $course->images['images']['300'] }});">

                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            <div class="mb-3">
                                <span class="text-dark fw-bold h2">{{ $course->price }}</span>

                            </div>
                            <div class="d-grid">

                                @if(auth()->check() && !auth()->user()->checkLearn($course))


                                            <form method="post" action="/course/Payment">
                                                @csrf
                                                <div class="d-grid">
                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <button type="submit" class="btn btn-primary mb-2 ">Buy this course</button>
                                                </div>
                                            </form>


                                @elseif(auth()->check() && auth()->user()->checkLearn($course))

                                    <div class="alert alert-success d-flex align-items-center" role="alert">

                                        <div>
                                            Purchased this course
                                        </div>
                                    </div>


                                @else
                                    <div class="card-body">
                                        <div class="d-grid gap-2 mt-2">
                                            for buy this course pelase first login
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">What’s included</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><i class="fe fe-play-circle align-middle me-2 text-primary"></i>{{ $course->time }} hours video</li>


                                <li class="list-group-item bg-transparent"><i class="fe fe-video align-middle me-2 text-secondary"></i>Watch Offline</li>
                                <li class="list-group-item bg-transparent border-bottom-0"><i class="fe fe-clock align-middle me-2 text-warning"></i>Lifetime access</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="rounded-circle avatar-xl">
                                    <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Verifed">
                                        <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30">
                                    </a>
                                </div>
                                <div class="ms-4">
                                    <h4 class="mb-0">Jenny Wilson</h4>
                                    <p class="mb-1 fs-6">Front-end Developer, Designer</p>
                                    <span class="fs-6"><span class="text-warning">4.5</span><span class="mdi mdi-star text-warning me-2"></span>Instructor Rating</span>
                                </div>
                            </div>
                            <div class="border-top row mt-3 border-bottom mb-3 g-0">
                                <div class="col">
                                    <div class="pe-1 ps-2 py-3">
                                        <h5 class="mb-0">11,604</h5>
                                        <span>Students</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">32</h5>
                                        <span>Courses</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">12,230</h5>
                                        <span>Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <p>I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies.</p>
                            <a href="instructor-profile.html" class="btn btn-outline-white btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="pt-12 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Related Courses</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="course-single.html" class="card-img-top"><img src="../assets/images/course/course-react.jpg" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="course-single.html" class="text-inherit">How to
                                        easily create a website with React</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                        </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(7,700)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>Morris Mccoy</span>
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

                </div>
            </div>
        </div>
    </div>













    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید این دوره را خریداری
                        کنید
                    </div>
                    @if( auth()->check())

                        @if(!auth()->user()->isVip())

                            <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید عضویت ویژه تهیه
                                کنید
                            </div>
                         @endif
                    @else
                                    <div class="alert alert-danger" role="alert">شما باید یکی از پلن های عضویت ویژه را
                                        خریداری کنید
                                    </div>
                     @endif






                                </tbody>
                            </table>
                </div>
                <!-- Comments section-->

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- buy widget-->
                <div class="card mb-4">
                    <div class="card-header">buy courses</div>




                </div>
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                   aria-label="Enter search term..." aria-describedby="button-search"/>
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                        use, and feature the Bootstrap 5 card component!
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


