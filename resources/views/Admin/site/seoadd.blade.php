@extends('Admin.master')




@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                       Add Seo For Language
                    </h3>
                </div>
                <div class="card-body">

                    @include('Admin.section.errors')
                    <form action="{{route('siteseo.store')}}" method="post"  class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label  for="title">Seo Title</label>
                            <input type="text" name="site_title" value="{{old('site_title')}}" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="Description">Seo Description</label>
                            <input type="text" name="site_description" value="{{old('site_description')}}" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="keyword">Seo Keyword</label>
                            <input type="text" name="site_keyword" value="{{old('site_keyword')}}" class="form-control" id="name" placeholder="insert name " >
                        </div>






                        <div class="form-group">
                            <label  for="language">language</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" selected>english</option>
                                <option value="fa">persian</option>
                                <option value="tr">turkish</option>

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
