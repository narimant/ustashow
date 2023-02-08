@extends('Admin.master')


@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
@endsection


@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
 
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserImageBrowseUrl: '{{route("fm.ckeditor")}}',
                @if(app()->getLocale()=='fa')
            contentsLangDirection : 'rtl',
        @endif
        });
        /*CKEDITOR.replace('body',{
           filebrowserUploadUrl:'{{route("panel.upload")}}',
           filebrowserImageUploadUrl:'{{route("panel.upload")}}'
        })*/

        $('#tags').select2({
            tags: true,
            multiple: true,
            tokenSeparators: [','],
            theme: 'bootstrap4'
        });
    </script>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">



                <div class="card-header">
                    <h3 class="card-title">
                        {{__('adminPanel.Edit Article')}}
                    </h3>
                </div>
                <div class="card-body">

        @include('Admin.section.errors')
        <form action="{{route('articles.update',['article'=>$article->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
           @method('put')

            <div class="form-group">
                <label  for="title">{{__('adminPanel.Title')}}</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="title" placeholder="insert title " >
            </div>
            <div class="form-group">
                <label  for="title">Slug</label>
                <input type="text" name="slug" value="{{ $article->slug }}" class="form-control" id="title" placeholder="insert title " >
            </div>

            <div class="form-group">
                <label  for="description">{{__('adminPanel.description')}}</label>
                <input type="text" name="description" value="{{ $article->description }}" class="form-control" id="description" placeholder="insert  description" >
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  for="language">{{__('adminPanel.Language')}}</label>
                        <select name="lang" id="language" class="form-control">
                            <option value="en" {{$article->lang=='en' ? 'selected' : ''}}>english</option>
                            <option value="fa" {{$article->lang=='fa' ? 'selected' : ''}}>persian</option>
                            <option value="tr" {{$article->lang=='tr' ? 'selected' : ''}}>turkish</option>

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  for="status"> {{__('adminPanel.Display Status')}}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{$article->status=='0' ? 'selected' : ''}}>{{__('adminPanel.Draft')}}</option>
                            <option value="1" {{$article->status=='1' ? 'selected' : ''}}>{{__('adminPanel.Publish')}}</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  for="body">{{__('adminPanel.body')}}</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="{{__('adminPanel.Insert Body')}}" >{{ $article->body }}</textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label  for="description">{{__('adminPanel.Image')}}</label>
                        <input type="file" name="images"   class="form-control" id="images" placeholder="insert  Image" >
                        <div class="col-sm-12">
                            @foreach( $article->images['images'] as $key => $image)
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        {{ $key }}
                                        <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $article->images['tumbnail'] == $image ? 'checked' : '' }} />
                                        <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <label  for="description">{{__('adminPanel.Category')}} </label>

                        <div>
                            <ul class="list-group ">
                                @foreach(\App\Category::where(['parent_id'=>null,'category_mode'=>'blog'])->with('sub_category')->get() as $value)
                                    <li class="list-group-item"><input type="checkbox" name="category[]"
                                                                       @foreach($article->categories()->get() as $category)
                                                                           @if($category->id==$value->id)
                                                                                checked
                                                                            @endif
                                                                       @endforeach
                                                                       value="{{ $value->id }}">{{ $value->name }}</input></li>

                                    @if($value->sub_category->count())

                                        @php $i=1; @endphp
                                        @include('Admin.articles.categoryeditlist',['child' => $value->sub_category ,'i' => $i,'article'=>$article])
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label  for="tags">  {{__('adminPanel.Tags')}} </label>
                        <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                            @foreach($alltags as $tag)
                                <option value="{{$tag->id}}" {{ in_array($tag->id,$articletagsids)?'selected':''}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>


                </div>

            </div>

            {{--      SEO          --}}
            <hr>
            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoTitle">{{__('adminPanel.Seo Title')}}</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{$article->seoTitle}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoDescription">{{__('adminPanel.Seo Description')}}</label>
                    <input type="text" class="form-control" name="seoDescription" value="{{$article->seoDescription}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label class="form-label" for="seoKeyword">{{__('adminPanel.Seo Keyword')}}</label>
                    <input type="text" class="form-control" name="seoKeyword" value="{{$article->seoKeyword}}">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">{{__('adminPanel.Update')}}</button>
            </div>
        </form>

                </div>

@endsection
