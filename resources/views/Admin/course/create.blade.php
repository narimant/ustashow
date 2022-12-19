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
                        Create Course
                    </h3>
                </div>
                <div class="card-body">


            @include('Admin.section.errors')
            <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf

                <div class="form-group">
                    <label  for="title">Tit ile</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="insert title " >
                </div>

                <div class="form-group">
                    <label  for="description">description</label>
                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="description" placeholder="insert  description" >
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label  for="language">language</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="en" selected>english</option>
                                <option value="fa">persian</option>
                                <option value="tr">turkish</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-6">
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
                                            @include('Admin.course.categorylist',['child' => $value->sub_category ,'i' => $i])
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6">
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
                        <div class="col-sm-6">
                            <label  for="price">Price</label>
                            <input type="text" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="inser price">
                        </div>
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

@endsection
