@extends('Admin.master')




@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        Create Category
                    </h3>
                </div>
                <div class="card-body">

                    @include('Admin.section.errors')
                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label  for="name">Category Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="insert name " >
                        </div>


                        <div class="form-group">
                            <label for="parent_id" class="form-label"> Category Parent</label>

                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">انتخاب</option>
                                    @foreach(\App\Category::where('parent_id',null)->with('sub_category')->get() as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>

                                        @if($value->sub_category->count())

                                            @php $i=1; @endphp
                                            @include('Admin.category.cat',['child' => $value->sub_category ,'i' => $i])
                                        @endif
                                    @endforeach
                                </select>
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
