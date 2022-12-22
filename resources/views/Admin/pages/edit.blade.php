@extends('Admin.master')


@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
@endsection


@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        CKEDITOR.replace('body',{
            filebrowserUploadUrl:'/admin/panel/upload-image',
            filebrowserImageUploadUrl:'/admin/panel/upload-image',
            @if(app()->getLocale()=='fa')
            contentsLangDirection : 'rtl',
            @endif
        })

        $('#tags').select2({
            tags: true,
            multiple: true,
            tokenSeparators: [','],
            theme: 'bootstrap4'
        });
    </script>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        {{__('adminPanel.Edit Page')}}
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('pages.update',['page'=>$page->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
           @method('put')

            <div class="form-group">
                <label  for="title">{{__('adminPanel.Title')}}</label>
                <input type="text" name="title" value="{{ $page->title }}" class="form-control" id="title" placeholder="insert title " >
            </div>
            <div class="form-group">
                <label  for="title">{{__('adminPanel.Slug')}}</label>
                <input type="text" name="slug" value="{{ $page->slug }}" class="form-control" id="title" placeholder="insert title " >
            </div>

            <div class="form-group">
                <label  for="description">{{__('adminPanel.description')}}</label>
                <input type="text" name="description" value="{{ $page->description }}" class="form-control" id="description" placeholder="insert  description" >
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  for="language">{{__('adminPanel.Language')}}</label>
                        <select name="lang" id="language" class="form-control">
                            <option value="en" {{$page->lang=='en' ? 'selected' : ''}}>english</option>
                            <option value="fa" {{$page->lang=='fa' ? 'selected' : ''}}>persian</option>
                            <option value="tr" {{$page->lang=='tr' ? 'selected' : ''}}>turkish</option>

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  for="status">{{__('adminPanel.Display Status')}}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{$page->status=='0' ? 'selected' : ''}}>{{__('adminPanel.Draft')}}</option>
                            <option value="1" {{$page->status=='1' ? 'selected' : ''}}>{{__('adminPanel.publish')}}</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  for="body">{{__('adminPanel.body')}}</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" >{{ $page->body }}</textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label  for="description">{{__('adminPanel.Image')}}</label>
                        <input type="file" name="images"   class="form-control" id="images" placeholder="insert  Image" >
                        <div class="col-sm-12">
                            @if($page->images !=null)
                            @foreach( $page->images['images'] as $key => $image)
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        {{ $key }}
                                        <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $page->images['tumbnail'] == $image ? 'checked' : '' }} />
                                        <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                    </label>
                                </div>
                            @endforeach
                                @endif
                        </div>
                    </div>




                </div>

            </div>

            {{--      SEO          --}}
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">{{__('adminPanel.Seo Title')}}</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{$page->seoTitle}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">{{__('adminPanel.Seo Description')}}</label>
                    <input type="text" class="form-control" name="seoDescription" value="{{$page->seoDescription}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">{{__('adminPanel.Seo Keyword')}}</label>
                    <input type="text" class="form-control" name="seoKeyword" value="{{$page->seoKeyword}}">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

@endsection
