@extends('frontend.frontendlayout.frontendmaster')

@section('content')

    <div class="container crumb p-4">
        {{ Breadcrumbs::render('article', $article) }}
    </div>


    <div class="py-4 py-lg-8 pb-14 ">
        <div class="container articlepage">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <div class="text-center mb-4">

                        <h1 class="display-3 fw-bold mb-4">{{$article->title}}</h1>
                        <span class="mb-3 d-inline-block"> </span>
                    </div>
                    <!-- Media -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="{{$article->user->userimage()}}" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">{{$article->user->name}}</h5>
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
                    <img src="{{$article->images['images']['900']}}" alt="" class="img-fluid post-head-image rounded-3">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-2">
                    <!-- Descriptions -->

                {!!  $article->body !!}

                    <div>
                        @foreach($article->tags as $tag)
                            <a href="{{$tag->path()}}"> #{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <!-- Media -->
                    <hr class="mt-8 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="{{$article->user->userimage()}}" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">{{$article->user->name}}</h5>
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
        <!-- Container related posts -->
      @if($related->count()>0)
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="my-5">
                        <h2>Related Post</h2>
                    </div>
                </div>
                @foreach($related as $rel)
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card mb-4 shadow-lg ">
                        <a href="blog-single.html" class="card-img-top"> <img src="{{$rel->images['tumbnail']}}" class="card-img-top rounded-top-md" alt=""></a>
                        <!-- Card body -->
                        <div class="card-body">

                                @foreach($rel->categories as $category)
                                <a href="{{$category->path()}}" class="fs-5 fw-semi-bold d-block mb-3 text-primary">
                                    {{$category->name}} &nbsp;

                                </a>
                                @endforeach

                            <a href="{{$rel->path()}}" title="{{$rel->title}}">
                                <h3>{{ \Str::limit($rel->title, 25, ' ...')}}</h3>
                            </a>
                            <p>{{ \Str::limit($rel->description, 40, ' ...')}}   </p>
                            <!-- Media content -->
                            <div class="row align-items-center g-0 mt-4">
                                <div class="col-auto">
                                    <img src="{{$rel->user->userimage()}}" alt="" class="rounded-circle avatar-sm me-2">
                                </div>
                                <div class="col lh-1">
                                    <h5 class="mb-1">{{$rel->user->name}}</h5>
                                    <p class="fs-6 mb-0"></p>
                                </div>
                                <div class="col-auto">
                                    <p class="fs-6 mb-0">{{ $rel->CreateTimeDiff  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
          @endif

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-2">
            @include('frontend.frontendlayout.comments',['comments'=>$comment,'subject'=>$article])
        </div>

    </div>

</div>

@endsection
