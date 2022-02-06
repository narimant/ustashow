@extends('Admin.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
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
                        Edit Course
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('courses.update',['course'=>$course->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
           @method('put')

            <div class="form-group">
                <label  for="title">Titile</label>
                <input type="text" name="title" value="{{ $course->title }}" class="form-control" id="title" placeholder="insert title " >
            </div>

            <div class="form-group">
                <label  for="description">description</label>
                <input type="text" name="description" value="{{ $course->description }}" class="form-control" id="description" placeholder="insert  description" >
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  for="language">language</label>
                        <select name="lang" id="language" class="form-control">
                            <option value="en" {{$course->lang=='en' ? 'selected' : ''}}>english</option>
                            <option value="fa" {{$course->lang=='fa' ? 'selected' : ''}}>persian</option>
                            <option value="tr" {{$course->lang=='tr' ? 'selected' : ''}}>turkish</option>

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  for="status">Display Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{$course->status=='0' ? 'selected' : ''}}>Draft</option>
                            <option value="1" {{$course->status=='1' ? 'selected' : ''}}>publish</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  for="body">body</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" >{{ $course->body }}</textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label  for="description">Image</label>
                        <input type="file" name="images"   class="form-control" id="images" placeholder="insert  Image" >
                        <div class="col-sm-12">
                            @foreach( $course->images['images'] as $key => $image)
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        {{ $key }}
                                        <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $course->images['tumbnail'] == $image ? 'checked' : '' }} />
                                        <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>


                    <div class="col-sm-6 ">
                        <label  for="description">Category</label>
                        <div>
                            <ul class="list-group ">
                                @foreach(\App\Category::where('parent_id',null)->with('sub_category')->get() as $value)
                                    <li class="list-group-item"><input type="checkbox" name="category[]"
                                                                       @foreach($course->categories()->get() as $category)
                                                                       @if($category->id==$value->id)
                                                                       checked
                                                                       @endif
                                                                       @endforeach
                                                                       value="{{ $value->id }}">{{ $value->name }}</input></li>

                                    @if($value->sub_category->count())

                                        @php $i=1; @endphp
                                        @include('Admin.course.categoryeditlist',['child' => $value->sub_category ,'i' => $i,'article'=>$course])
                                    @endif
                                @endforeach
                            </ul>
                        </div>
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
                    <div class="col-sm-6">
                        <label  for="price">Price</label>
                        <input type="text" name="price" value="{{ $course->price }}" class="form-control" id="price" placeholder="inser price">
                    </div>
                    <div class="col-sm-6">
                        <label  for="type">Course type</label>
                        <select name="type" id="type" class="form-control">

                            <option value="vip" {{ $course->type=='vip' ? 'selected' : '' }} >Vip</option>
                            <option value="free" {{ $course->type=='free' ? 'selected' : '' }}>Free</option>
                            <option value="cash" {{ $course->type=='cash' ? 'selected' : '' }}>Cash</option>
                        </select>
                    </div>
                </div>

            </div>


            {{--      SEO          --}}
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">Seo Title</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{$course->seoTitle}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">Seo Description</label>
                    <input type="text" class="form-control" name="seoDescription" value="{{$course->seoDescription}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">Seo Keyword</label>
                    <input type="text" class="form-control" name="seoKeyword" value="{{$course->seoKeyword}}">
                </div>
            </div>



            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

@endsection
