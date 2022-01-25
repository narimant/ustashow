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
                        Edit Tag
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('tags.update',['tag'=>$tag->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('put')

            <div class="form-group">
                <label  for="name">Tag Name</label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control" id="name" placeholder="insert Tag name " >
            </div>




            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

            </div>
        </div>
    </div>

@endsection
