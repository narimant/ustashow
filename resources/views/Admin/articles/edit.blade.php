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

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">




        <h2 >Create Articles</h2>

        @include('Admin.section.errors')
        <form action="{{route('articles.update',['article'=>$article->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
           @method('put')

            <div class="form-group">
                <label  for="title">Titile</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="title" placeholder="insert title " >
            </div>

            <div class="form-group">
                <label  for="description">description</label>
                <input type="text" name="description" value="{{ $article->description }}" class="form-control" id="description" placeholder="insert  description" >
            </div>

            <div class="form-group">
                <label  for="body">body</label>
                <textarea rows="5" name="body"  class="form-control" id="body" placeholder="insert  body" >{{ $article->body }}</textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label  for="description">Image</label>
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
                        <label  for="description">Tags</label>
                        <input type="text" name="Tags" value="{{ $article->tags }}" class="form-control" id="Tags" placeholder="insert  Tags" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

    </main>

@endsection
