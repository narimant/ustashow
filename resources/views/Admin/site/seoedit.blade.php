@extends('Admin.master')




@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                       Edit Seo For {{$siteseo->language()}} Language
                    </h3>
                </div>
                <div class="card-body">

                    @include('Admin.section.errors')
                    <form action="{{route('siteseo.update',['siteseo'=>$siteseo->id])}}" method="post"  class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label  for="title">Seo Title</label>
                            <input type="text" name="site_title" value="{{$siteseo->site_title}}" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="Description">Seo Description</label>
                            <input type="text" name="site_description" value="{{$siteseo->site_description}}" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="keyword">Seo Keyword</label>
                            <input type="text" name="site_keyword" value="{{$siteseo->site_keyword}}" class="form-control" id="name" placeholder="insert name " >
                        </div>






                        <div class="form-group">
                            <label  for="language">language</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" {{ $siteseo->lang=='en' ? 'selected' : '' }}>english</option>
                                <option value="fa" {{ $siteseo->lang=='fa' ? 'selected' : '' }}>persian</option>
                                <option value="tr" {{ $siteseo->lang=='tr' ? 'selected' : '' }}>turkish</option>

                            </select>
                        </div>



                        <div class="form-group">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
