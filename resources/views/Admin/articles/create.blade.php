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
                        Create Articles
                    </h3>
                </div>
                <div class="card-body">






            @include('Admin.section.errors')
            <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf

                <div class="form-group">
                    <label  for="title">Titile</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="insert title " >
                </div>

                <div class="form-group">
                    <label  for="description">description</label>
                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="description" placeholder="insert  description" >
                </div>
                <div class="form-group">
                    <label  for="language">language</label>
                    <select name="lang" id="language" class="form-control">
                        <option value="en" selected>english</option>
                        <option value="fa">farsi</option>


                    </select>
                </div>

                <div class="form-group">
                    <label  for="body">body</label>
                    <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" >{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <label  for="description">Image</label>
                            <input type="file" name="images" value="{{old('images')}}"  class="form-control" id="images" placeholder="insert  Image" >
                        </div>

                        <div class="col-sm-6 ">
                            <label  for="description">Tags</label>
                            <input type="text" name="Tags" value="{{old('Tags')}}" class="form-control" id="Tags" placeholder="insert  Tags" >
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

                </div>

@endsection
