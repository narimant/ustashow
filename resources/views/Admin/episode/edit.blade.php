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
                        Edit Episode Video
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('episodes.update' ,['episode'=>$episode->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('put')

            <div class="form-group">
                <label  for="title">Titile</label>
                <input type="text" name="title" value="{{$episode->title}}" class="form-control" id="title" placeholder="insert title " >
            </div>
            <div class="form-group">
                <label  for="title">Related course</label>
                <select type="text" name="course_id"  class="form-control" id="course_id"  >
                    @foreach(\App\Course::latest()->get() as $course)
                        <option value="{{ $course->id }}" {{ $episode->course_id==$course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>



            <div class="form-group">
                <label  for="body">body</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" >{{$episode->body}}</textarea>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6 ">
                        <label  for="description">Video url</label>
                        <input type="text" name="VideoUrl" value="{{$episode->VideoUrl}}" class="form-control" id="VideoUrl" placeholder="Video ur" >
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                            @foreach($alltags as $tag)
                                <option value="{{$tag->id}}" {{ in_array($tag->id,$articletagsids)?'selected':''}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6 ">
                        <label  for="description">Video Time</label>
                        <input type="text" name="time" value="{{$episode->time}}" class="form-control" id="time" placeholder="insert  time" >
                    </div>
                    <div class="col-sm-6 ">
                        <label  for="description">number</label>
                        <input type="text" name="number" value="{{$episode->number}}" class="form-control" id="number" placeholder="insert  number" >
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6">
                        <label  for="type">Course type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="vip"{{ $episode->type=='vip' ? 'selected' : '' }}  >Vip</option>
                            <option value="free" {{ $episode->type=='free' ? 'selected' : '' }} >Free</option>
                            <option value="cash" {{ $episode->type=='cash' ? 'selected' : '' }} >Cash</option>
                        </select>
                    </div>
                </div>

            </div>

            {{--      SEO          --}}
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">Seo Title</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{$episode->seoTitle}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">Seo Description</label>
                    <input type="text" class="form-control" name="seoDescription" value="{{$episode->seoDescription}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">Seo Keyword</label>
                    <input type="text" class="form-control" name="seoKeyword" value="{{$episode->seoKeyword}}">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

@endsection
