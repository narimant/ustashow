@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Articles</h3>
                    <a href="{{ route('pages.create') }}" class="btn btn-warning ml-auto p-2">Create Page</a>
                </div>
                <!-- /.card-header -->
                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='' ? "active" : ''}}"  href="{{route('pages.index')}}"  > Footer Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='draft' ? "active" : ''}}"  href="{{route('pages.index',['show'=>'draft'])}}"  > Foter Draft @if($draftcount>0)<span class="badge badge-primary right">{{$draftcount}}@endif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='trash' ? "active" : ''}}"  href="{{route('pages.index',['show'=>'trash'])}}"  >Footer in Trash @if($trashcount>0)<span class="badge badge-danger right">{{$trashcount}}@endif</span></a>
                    </li>

                </ul>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ _('title') }}</th>
                            <th>{{_('Comment')}}</th>
                            <th>{{_('Virews')}}</th>
                            <th>{{_('Settings')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($pages as $pageIteam)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><A href="{{$pageIteam->path()}}"> {{$pageIteam->title}}</A></td>
                                <td>{{$pageIteam->CommentCount}}</td>
                                <td>{{$pageIteam->ViewCount}}</td>

                                <td>
                                    <form action="
                                    @if(request()->get('show')=="trash")
                                        {{ route('pageItem.forceDelete' , ['id'=>$pageIteam->id]) }}
                                    @else
                                        {{ route('pages.destroy' , ['page'=>$pageIteam->id]) }}
                                    @endif

                                                    " method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a   href="{{ route('pages.edit', [ 'page'=>$pageIteam->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                           @if(request()->get('show')=='trash')
                                                <a   href="{{ route('pageItem.restore', [ 'id'=>$pageIteam->id]) }}" class="btn btn-success">{{ _('Restore') }}</a>
                                            @endif
                                            @if(request()->get('show')=='draft')

                                                <a   href="{{ route('pageItem.publish', [ 'id'=>$pageIteam->id]) }}" class="btn btn-success">{{ _('Publish') }}</a>
                                            @endif
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" >{{ _('Delete') }}</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->
                {{ $pages->links() }}
            </div>





        </div>
    </div>

@endsection
