@extends('frontend.frontendlayout.frontendmaster')

@section('content')

    <div class="py-4 py-lg-8 pb-14 ">
        <div class="container articlepage">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <div class="text-center mb-4">

                        <h1 class="display-3 fw-bold mb-4">{{$pages->title}}</h1>
                        <span class="mb-3 d-inline-block"> </span>
                    </div>
                    <!-- Media -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="{{$pages->user->userimage()}}" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">{{$pages->user->name}}</h5>
                                <span class="text-primary"> </span>
                            </div>
                        </div>
                        <div>
                            <span class="ms-2 text-muted">{{__('messages.Share')}}</span>
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
                    @if($pages->images !=null)
                    <img src="{{$pages->images['images']['900']}}" alt="" class="img-fluid post-head-image rounded-3">
                        @endif

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <!-- Descriptions -->

                {!!  $pages->body !!}


                    <!-- Media -->
                    <hr class="mt-8 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="{{$pages->user->userimage()}}" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">{{$pages->user->name}}</h5>
                                <span class="text-primary"> </span>
                            </div>
                        </div>
                        <div>
                            <span class="ms-2 text-muted">{{__('messages.Share')}}</span>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="ms-2 text-muted "><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!-- Subscribe to Newsletter -->

                </div>
            </div>
        </div>


    </div>
    @if($pages->commentStatus==true)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-2">
                @include('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$pages])
            </div>

        </div>

    </div>

@endif


@endsection
