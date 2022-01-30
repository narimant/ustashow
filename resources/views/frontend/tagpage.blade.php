
@extends('frontend.frontendlayout.frontendmaster')

@section('content')


<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div>
                    <h1 class="text-white mb-1 display-4">#{{$tag->name}}</h1>
                    <p class="mb-0 text-white lead">{{$articles->count()+$courses->count()}} Result For  #{{$tag->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="py-6">
    <div class="container">
        <div class="row mb-6">
            <div class="col-md-12">
                <!-- Nav -->

                <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                    <li class="nav-item ms-0" role="presentation">
                        <a class="nav-link {{$type=='article' ? 'active ' : ''}} "   href="{{route('tag.show',['tagSlug'=>$tag->slug])}}"  aria-selected="true">Articles</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{$type=='course' ? 'active ' : ''}}"   href="{{route('tag.show',['tagSlug'=>$tag->slug,'type'=>"course"])}}"  aria-selected="false">Courses</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="tabContent">
                    <!-- Tab Pane -->

                    @if($type=="article")

                    <div class="tab-pane fade active show" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
                        <div class="row">

                            @if($articles->count()>0)
                                  @foreach($articles as $article)
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
                                        @endforeach

                                      {{$articles->links()}}
                                @else
                                mojod nist
                            @endif



                        </div>
                    </div>


                    @elseif($type=="course")


                        <div class="tab-pane  fade active show"  aria-labelledby="trending-tab">
                        <!-- Tab pane -->
                        <div class="row">
                            @if($courses->count()>0)
                                @foreach($courses as $course)
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

                                @endforeach
                                    {{$courses->links()}}
                            @else
                                mojod nist
                            @endif

                        </div>
                    </div>
                        @endif

                </div>
            </div>
        </div>


    </div>
</div>
@endsection
