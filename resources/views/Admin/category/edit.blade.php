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
                       {{__('adminPanel.Edit Category')}}
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('categories.update',['category'=>$category->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('put')

            <div class="form-group">
                <label  for="name">{{__('adminPanel.Category Name')}}</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="insert category name " >
            </div>

            <div class="form-group">
                <label  for="color">{{__('adminPanel.Category Color')}}</label>
                <input type="color" id="color" name="color" value="{{$category->color}}">

            </div>

            <div class="form-group">
                <label  for="language">{{__('adminPanel.Category Mode')}}</label>
                <select name="category_mode" id="language" class="form-control">
                    <option value="blog" {{$category->category_mode=='blog' ? 'selected' : ''}}>{{__('adminPanel.Category For Blog')}}</option>
                    <option value="video" {{$category->category_mode=='video' ? 'selected' : ''}}>{{__('adminPanel.Category For Video')}}</option>
                    <option value="course" {{$category->category_mode=='course' ? 'selected' : ''}}>{{__('adminPanel.Category For Course')}}</option>
                </select>
            </div>
            <div class="form-group">
                <label  for="language">{{__('adminPanel.Language')}}</label>
                <select name="lang" id="language" class="form-control">
                    <option value="en" {{$category->lang=='en' ? 'selected' : ''}}>english</option>
                    <option value="fa" {{$category->lang=='fa' ? 'selected' : ''}}>persian</option>
                    <option value="tr" {{$category->lang=='tr' ? 'selected' : ''}}>turkish</option>

                </select>
            </div>
            <div class="form-group">
                <label for="parent_id" class="form-label"> {{__('adminPanel.Category Parent')}}</label>

                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">انتخاب</option>
                    @foreach(\App\Category::where('parent_id',null)->with('sub_category')->get() as $value)
                        @if($value->id!=$category->id)
                        <option value="{{ $value->id }}" {{ $category->parent_id === $value->id  ? "selected" : "" }}>{{ $value->name }}</option>
                        @endif
                        @if($value->sub_category->count())

                            @php $i=1; @endphp
                            @include('Admin.category.catedit',['child' => $value->sub_category ,'i' => $i,'category'=>$category])
                        @endif
                    @endforeach
                </select>
            </div>
            {{--      SEO          --}}
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">{{__('adminPanel.Seo Title')}}</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{$category->seoTitle}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">{{__('adminPanel.Seo Description')}}</label>
                    <input type="text" class="form-control" name="seoDescription" value="{{$category->seoDescription}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">{{__('adminPanel.Seo Keyword')}}</label>
                    <input type="text" class="form-control" name="seoKeyword" value="{{$category->seoKeyword}}">
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">{{__('adminPanel.Update')}}</button>
            </div>
        </form>

                </div>

            </div>
        </div>
    </div>

@endsection
