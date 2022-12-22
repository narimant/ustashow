@extends('Admin.master')




@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        {{__('adminPanel.Create Tag')}}
                    </h3>
                </div>
                <div class="card-body">

                    @include('Admin.section.errors')
                    <form action="{{route('tags.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label  for="name">{{__('adminPanel.Tags Name')}}</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="language">{{__('adminPanel.Language')}}</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" selected>english</option>
                                <option value="fa">persian</option>
                                <option value="tr">turkish</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label  for="Status">{{__('adminPanel.Status')}}</label>
                            <select name="status" id="Status" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Deactivate</option>


                            </select>
                        </div>

                        {{--      SEO          --}}
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoTitle">{{__('adminPanel.Seo Title')}}</label>
                                <input type="text" class="form-control" name="seoTitle" value="{{old('seoTitle')}}">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoDescription">{{__('adminPanel.Seo Description')}}</label>
                                <input type="text" class="form-control" name="seoDescription" value="{{old('seoDescription')}}">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoKeyword">{{__('adminPanel.Seo Keyword')}}</label>
                                <input type="text" class="form-control" name="seoKeyword" value="{{old('seoKeyword')}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary">{{__('adminPanel.Save')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
