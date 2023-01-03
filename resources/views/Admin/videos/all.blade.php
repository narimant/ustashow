@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">{{__('adminPanel.All Articles')}}</h3>
                    <a href="{{ route('articles.create') }}" class="btn btn-warning ml-auto p-2">{{__('adminPanel.Create Video')}}</a>
                </div>
                <!-- /.card-header -->
                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='' ? "active" : ''}}"  href="{{route('videos.index')}}"  >{{__('adminPanel.Videos Active')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='draft' ? "active" : ''}}"  href="{{route('videos.index',['show'=>'draft'])}}"  > {{__('adminPanel.Videos Draft')}} @if($draftcount>0)<span class="badge badge-primary right">{{$draftcount}}@endif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='trash' ? "active" : ''}}"  href="{{route('videos.index',['show'=>'trash'])}}"  >{{__('adminPanel.Videos in Trash')}} @if($trashcount>0)<span class="badge badge-danger right">{{$trashcount}}@endif</span></a>
                    </li>

                </ul>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('adminPanel.Title') }}</th>
                            <th>{{__('adminPanel.Comments')}}</th>
                            <th>{{__('adminPanel.Views')}}</th>
                            <th>{{__('adminPanel.Settings')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($videos as $video)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><A href="{{$video->path()}}"> {{$video->title}}</A></td>
                                <td>{{$video->CommentCount}}</td>
                                <td>{{$video->ViewCount}}</td>

                                <td>
                                    <form action="
                                    @if(request()->get('show')=="trash")
                                        {{ route('videos.forceDelete' , ['id'=>$video->id]) }}
                                    @else
                                        {{ route('videos.destroy' , ['video'=>$video->id]) }}
                                    @endif

                                                    " method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a   href="{{ route('videos.edit', [ 'video'=>$video->id]) }}" class="btn btn-primary">{{__('adminPanel.Edit')}}</a>
                                           @if(request()->get('show')=='trash')
                                                <a   href="{{ route('videos.restore', [ 'id'=>$video->id]) }}" class="btn btn-success">{{__('adminPanel.Restore')}}</a>
                                            @endif
                                            @if(request()->get('show')=='draft')
                                                <a   href="{{ route('videos.publish', [ 'id'=>$video->id]) }}" class="btn btn-success">{{__('adminPanel.Publish')}}</a>
                                            @endif
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" >{{__('adminPanel.Delete')}}</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->
                {{ $videos->links() }}
            </div>





        </div>
    </div>

@endsection
