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

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">




        <h2 >Create Video</h2>

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
                    <div class="col-sm-6 ">
                        <label  for="description">Tags</label>
                        <input type="text" name="Tags" value="{{$episode->tags}}" class="form-control" id="Tags" placeholder="insert  Tags" >
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
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>

    </main>

@endsection
