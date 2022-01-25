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
                        Edit Category
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('categories.update',['category'=>$category->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('put')

            <div class="form-group">
                <label  for="name">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="insert category name " >
            </div>

            <div class="form-group">
                <label for="parent_id" class="form-label"> Category Parent</label>

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


            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

                </div>

            </div>
        </div>
    </div>

@endsection
