@extends('Admin.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection


@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src=""></script>
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
                            <label  for="description">Category</label>
                            <div>
                                <ul class="list-group ">
                                @foreach(\App\Category::where('parent_id',null)->with('sub_category')->get() as $value)
                                        <li class="list-group-item"><input type="checkbox" name="category[]"value="{{ $value->id }}">{{ $value->name }}</input></li>

                                    @if($value->sub_category->count())

                                        @php $i=1; @endphp
                                        @include('Admin.articles.categorylist',['child' => $value->sub_category ,'i' => $i])
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                                @foreach($alltags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>





                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

                </div>

@endsection
