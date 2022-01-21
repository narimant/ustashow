@extends('Admin.master')

@section('script')
<script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body',{
            filebrowserUploadUrl:'/admin/panel/upload-image',
            filebrowserImageUploadUrl:'/admin/panel/upload-image'
        })
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
                        <div class="col-sm-6 ">
                            <label  for="description">Tags</label>
                            <input type="text" name="Tags" value="{{old('Tags')}}" class="form-control" id="Tags" placeholder="insert  Tags" >
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
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

                </div>
            </div>
        </div>
    </div>

@endsection
