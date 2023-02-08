@extends('Admin.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
@endsection


@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src=""></script>
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
                        {{__('adminPanel.Create Articles')}}
                    </h3>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">



          
            <form action="{{route('videos.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf

                <div class="form-group">
                    <label  for="title">  {{__('adminPanel.Title')}} </label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder=" {{__('adminPanel.Insert title')}}  " >
                </div>

                <div class="form-group">
                    <label  for="description">  {{__('adminPanel.description')}} </label>
                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="description" placeholder="{{__('adminPanel.Insert description')}}  " >
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label  for="language">  {{__('adminPanel.Language')}} </label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" {{app()->getLocale()=='en' ? 'selected' : ''}}>english</option>
                                <option value="fa" {{app()->getLocale()=='fa' ? 'selected' : ''}}>persian</option>
                                <option value="tr" {{app()->getLocale()=='tr' ? 'selected' : ''}}>turkish</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label  for="status">  {{__('adminPanel.Display Status')}} </label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" selected>{{__('adminPanel.Draft')}}</option>
                                <option value="1">{{__('adminPanel.publish')}}</option>


                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label  for="body">  {{__('adminPanel.body')}} </label>
                    <textarea rows="5" name="body"  class="form-control" id="body" placeholder="{{__('adminPanel.Insert Body')}}  " >{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="col-12">
                                <label  for="description">{{__('adminPanel.Image')}}</label>
                                <input type="file" name="images" value="{{old('images')}}"  class="form-control" id="images" placeholder="insert  Image" >

                            </div>

                            <div class="col-12 mt-2">
                                <label  for="VideoUrl">{{__('adminPanel.Video Url')}}</label>
                                <input type="url" name="VideoUrl" class="form-control" id="VideoUrl" value="{{old('VideoUrl')}}">
                            </div>

                        </div>

                        <div class="col-sm-6 ">
                            <label  for="description">  {{__('adminPanel.Category')}} </label>
                            <div>
                                <ul class="list-group ">
                                @foreach(\App\Category::where(['parent_id'=>null,'category_mode'=>'video'])->with('sub_category')->get() as $value)
                                        <li class="list-group-item"><input type="checkbox" name="category[]"value="{{ $value->id }}">{{ $value->name }}</input></li>

                                    @if($value->sub_category->count())

                                        @php $i=1; @endphp
                                        @include('Admin.articles.categorylist',['child' => $value->sub_category ,'i' => $i])
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-3">
                            <label  for="tags">  {{__('adminPanel.Tags')}} </label>
                            <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                                @foreach($alltags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>


                {{--      SEO          --}}
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoTitle">  {{__('adminPanel.Seo Title')}} </label>
                        <input type="text" class="form-control" name="seoTitle" value="{{old('seoTitle')}}">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoDescription">  {{__('adminPanel.Seo Description')}} </label>
                        <input type="text" class="form-control" name="seoDescription" value="{{old('seoDescription')}}">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoKeyword">  {{__('adminPanel.Seo Keyword')}} </label>
                        <input type="text" class="form-control" name="seoKeyword" value="{{old('seoKeyword')}}">
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary">  {{__('adminPanel.Save')}} </button>
                </div>
            </form>

                </div>

@endsection
