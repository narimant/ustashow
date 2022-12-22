@extends('Admin.master')



@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        {{__('adminPanel.Edit Tag')}}
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('tags.update',['tag'=>$tag->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('put')

            <div class="form-group">
                <label  for="name">{{__('adminPanel.Tags Name')}}</label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control" id="name" placeholder="insert Tag name " >
            </div>


            <div class="form-group">
                <label  for="language">{{__('adminPanel.Language')}}</label>
                <select name="lang" id="language" class="form-control">
                    <option value="en" {{ $tag->lang=='en' ? 'selected' :'' }}>english</option>
                    <option value="fa" {{ $tag->lang=='fa' ? 'selected' :'' }}>persian</option>
                    <option value="tr" {{ $tag->lang=='tr' ? 'selected' :'' }}>turkish</option>

                </select>
            </div>
            <div class="form-group">
                <label  for="Status">{{__('adminPanel.Status')}}</label>
                <select name="status" id="Status" class="form-control">
                    <option value="1" {{ $tag->status==1 ? 'selected' :'' }}>Active</option>
                    <option value="0" {{ $tag->status==0 ? 'selected' :'' }}>Deactivate</option>


                </select>
            </div>

            {{--      SEO          --}}
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">{{__('adminPanel.Seo Title')}}</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{$tag->seoTitle }}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">{{__('adminPanel.Seo Description')}}</label>
                    <input type="text" class="form-control" name="seoDescription" value="{{$tag->seoDescription }}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">{{__('adminPanel.Seo Keyword')}}</label>
                    <input type="text" class="form-control" name="seoKeyword" value="{{$tag->seoKeyword}}">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">{{__('adminPanel.Update')}}</button>
            </div>
        </form>

                </div>

            </div>
        </div>
    </div>

@endsection
