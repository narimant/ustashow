@extends('frontend.frontendlayout.frontendmaster')

@section('content')
    <div class="ibox-content">
<div class="container-fluid bootstrap snippets bootdey">

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="ibox float-e-margins">

                    <h2>
                        {{count($articles)}}  {{ __('messages.results found for') }}: <span class="text-navy">{{request('search')}}</span>
                    </h2>
                    <small>{{ __('messages.Request time') }}  (0.23 seconds)</small>

                    <div class="search-form">
                        <form action="{{ route('home.search') }}" method="get">
                            <div class="input-group">
                                <input type="text" placeholder=" " name="search" value="{{request('search')}}" class="form-control input-lg">
                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        {{ __('messages.Search') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @foreach($articles as $article)
                        <div class="hr-line-dashed"></div>
                       <div class="row">

                           <div class="search-result col-12">
                               <h3><a href="{{$article->path()}}">{{$article->title}}</a></h3>
                               <a href="{{$article->path()}}" class="search-link">{{ Request::root() }}{{$article->path()}}</a>
                               <p>
                                   {{$article->description}}
                               </p>
                           </div>
                       </div>
                        <div class="hr-line-dashed"></div>

                    @endforeach




                    <div class="text-center">
                       {{ $articles->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







@section('style')

<style>
    .ibox-content {
        background-color: #FFFFFF;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #E7EAEC;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0px;
    }

    .search-form {
        margin-top: 10px;
    }

    .search-result h3 {
        margin-bottom: 0;
        color: #1E0FBE;
    }

    .search-result .search-link {
        color: #006621;
    }

    .search-result p {
        font-size: 12px;
        margin-top: 5px;
    }

    .hr-line-dashed {
        border-top: 1px dashed #E7EAEC;
        color: #ffffff;
        background-color: #ffffff;
        height: 1px;
        margin: 20px 0;
    }

    h2 {
        font-size: 24px;
        font-weight: 100;
    }

</style>
@endsection
