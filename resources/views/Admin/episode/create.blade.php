@extends('Admin.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('script')
<script src="/ckeditor/ckeditor.js"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        CKEDITOR.replace('body',{
            filebrowserUploadUrl:'/admin/panel/upload-image',
            filebrowserImageUploadUrl:'/admin/panel/upload-image'
        })
        $('#tags').select2({
            tags: true,
            multiple: true,
            tokenSeparators: [',']
        });

    </script>
@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        Create Video
                    </h3>
                </div>
                <div class="card-body">


            @include('Admin.section.errors')
            <form action="{{route('episodes.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf

                <div class="form-group">
                    <label  for="title">Titile</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="insert title " >
                </div>
                <div class="form-group">
                    <label  for="title">Related course</label>
                    <select type="text" name="course_id"  class="form-control" id="course_id"  >
                            @foreach(\App\Course::latest()->get() as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label  for="status">Display Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" selected>Draft</option>
                                <option value="1">publish</option>


                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label  for="body">body</label>
                    <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" >{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col-sm-6 ">
                            <label  for="description">Video url</label>
                            <input type="text" name="VideoUrl" value="{{old('VideoUrl')}}" class="form-control" id="VideoUrl" placeholder="Video ur" >
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label  for="tags">Tags</label>
                            <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                                @foreach($alltags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">

                        <div class="col-sm-6 ">
                            <label  for="description">Video Time</label>
                            <input type="text" name="time" value="{{old('time')}}" class="form-control" id="time" placeholder="insert  time" >
                        </div>
                        <div class="col-sm-6 ">
                            <label  for="description">number</label>
                            <input type="text" name="number" value="{{old('number')}}" class="form-control" id="number" placeholder="insert  number" >
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">

                        <div class="col-sm-6">
                            <label  for="type">Course type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="vip">Vip</option>
                                <option value="free" selected>Free</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                    </div>

                </div>


                {{--      SEO          --}}
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoTitle">Seo Title</label>
                        <input type="text" class="form-control" name="seoTitle" value="{{old('seoTitle')}}">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoDescription">Seo Description</label>
                        <input type="text" class="form-control" name="seoDescription" value="{{old('seoDescription')}}">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="form-label" for="seoKeyword">Seo Keyword</label>
                        <input type="text" class="form-control" name="seoKeyword" value="{{old('seoKeyword')}}">
                    </div>
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
