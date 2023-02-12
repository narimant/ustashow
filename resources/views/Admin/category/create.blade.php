@extends('Admin.master')




@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        {{__('adminPanel.Create Category')}}
                    </h3>
                </div>
                <div class="card-body">

                    @include('Admin.section.errors')
                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label  for="name">{{__('adminPanel.Category Name')}}</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="insert name " >
                        </div>
                        <div class="form-group">
                            <label  for="color">{{__('adminPanel.Category Color')}}</label>
                            <input type="color" id="color" name="color" value="#ff0000">

                        </div>

                        <div class="form-group">
                            <label  for="language">{{__('adminPanel.Category Mode')}}</label>
                            <select name="category_mode" id="language" class="form-control">
                                <option value="blog" >{{__('adminPanel.Category For Blog')}}</option>
                                <option value="video" >{{__('adminPanel.Category For Video')}}</option>
                                <option value="course" >{{__('adminPanel.Category For Course')}}</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label  for="language">{{__('adminPanel.Language')}}</label>
                                <select name="lang" id="language" class="form-control">
                                    <option value="en" {{app()->getLocale()=='en' ? 'selected' : ''}}>english</option>
                                    <option value="fa" {{app()->getLocale()=='fa' ? 'selected' : ''}}>persian</option>
                                    <option value="tr" {{app()->getLocale()=='tr' ? 'selected' : ''}}>turkish</option>
                                </select>
                            </div>




                        <div class="form-group">
                            <label for="parent_id" class="form-label">{{__('adminPanel.Category Parent')}}</label>

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


                        {{--      SEO          --}}
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoTitle">{{__('adminPanel.Seo Title')}}</label>
                                <input type="text" class="form-control" name="seoTitle" value="{{old('seoTitle')}}">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoDescription">{{__('adminPanel.Seo Description')}}</label>
                                <input type="text" class="form-control" name="seoDescription" value="{{old('seoDescription')}}">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="seoKeyword">{{__('adminPanel.Seo Keyword')}}</label>
                                <input type="text" class="form-control" name="seoKeyword" value="{{old('seoKeyword')}}">
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
