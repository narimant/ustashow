@extends('frontend.frontendlayout.frontendmaster')



@section('content')

    <div class="container crumb p-4">
    {{ Breadcrumbs::render('category', $category) }}
    </div>





<div class="pb-8">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Flush Nav -->
                <div class="flush-nav">
                    <nav class="nav">
                        <a class="nav-link active ps-0" href="{{Route::currentRouteName()}}">{{__('messages.All')}}</a>

                    </nav>
                </div>
            </div>
            @foreach($articles as $article)
                @if($article->status==1 )
                @if($loop->first)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4 shadow-lg">
                            <div class="row g-0">
                                <!-- Image -->
                                <a href="{{ $article->path() }}" class="col-lg-8 col-md-12 col-12 bg-cover img-left-rounded" style="background-image: url({{$article->images['images']['600']}});">
                                    <img src="{{$article->images['images']['600']}}" class="img-fluid d-lg-none invisible" alt=""></a>
                                <div class="col-lg-4 col-md-12 col-12">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        @foreach($article->categories as $category)
                                        <a href="{{$category->path()}}" class="fs-5 mb-3 fw-semi-bold d-block">
                                           <span style="color: {{$category->color}};">{{$category->name}}</span>
                                        </a>
                                        @endforeach
                                        <h1 class="mb-2 mb-lg-4"> <a href="{{$article->path()}}" class="text-inherit">
                                               {{$article->title}}
                                            </a>
                                        </h1>
                                        <p>{!! $article->description !!}</p>
                                        <!-- Media content -->
                                        <div class="row align-items-center g-0 mt-lg-7 mt-4">
                                            <div class="col-auto">
                                                <!-- Img  -->
                                                <img src="{{$article->user->userimage()}}" alt="" class="rounded-circle avatar-sm me-2">
                                            </div>
                                            <div class="col lh-1 ">
                                                <h5 class="mb-1">{{$article->user->name}}</h5>
                                                <p class="fs-6 mb-0">{{$article->CreateTimeDiff}}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 d-none d-lg-block">
                        <!-- Card -->
                        <div class="card mb-4 shadow-lg">
                            <a href="{{ $article->path() }}" class="card-img-top"> <img src="{{$article->images['images']['300']}}" class="card-img-top rounded-top-md" alt=""></a>
                            <!-- Card body -->
                            <div class="card-body">
                                @foreach($article->categories as $category)
                                    <a href="{{$category->path()}}" class="fs-5 fw-semi-bold d-block mb-3">
                                        <span style="color: {{$category->color}};"> {{$category->name}}</span>
                                    </a>
                                @endforeach

                                <h3><a href="{{ $article->path() }}" class="text-inherit">
                                        {{ \Str::limit($article->title, 25, ' ...')}}
                                    </a>
                                </h3>
                                <p>{{ \Str::limit($article->description, 80, ' ...')}}</p>
                                <!-- Media content -->
                                <div class="row align-items-center g-0 mt-4">
                                    <div class="col-auto">
                                        <img src="{{$article->user->userimage()}}" alt="" class="rounded-circle avatar-sm me-2">
                                    </div>
                                    <div class="col lh-1">
                                        <h5 class="mb-1">{{$article->user->name}}</h5>
                                        <p class="fs-6 mb-0">{{$article->CreateTimeDiff}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @endforeach



            <!-- Buttom -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-4">
                {{$articles->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
