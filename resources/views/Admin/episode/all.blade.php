@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Articles</h3>
                    <a href="{{ route('episodes.create') }}" class="btn btn-warning ml-auto p-2">Create Article</a>
                </div>
                <!-- /.card-header -->

                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='' ? "active" : ''}}"  href="{{route('episodes.index')}}"  > Episodes Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='draft' ? "active" : ''}}"  href="{{route('episodes.index',['show'=>'draft'])}}"  > Episodes Draft @if($draftcount>0)<span class="badge badge-primary right">{{$draftcount}}@endif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='trash' ? "active" : ''}}"  href="{{route('episodes.index',['show'=>'trash'])}}"  >Episodes in Trash @if($trashcount>0)<span class="badge badge-danger right">{{$trashcount}}@endif</span></a>
                    </li>

                </ul>
                <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ _('Video title') }}</th>
                    <th>{{_('Comment')}}</th>
                    <th>{{_('Virews')}}</th>
                    <th>{{_('download Count')}}</th>

                    <th>{{_('Settings')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($episodes as $episode)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><A href="{{$episode->path()}}"> {{$episode->title}}</A></td>
                        <td>{{$episode->ViewCount}}</td>
                        <td>{{$episode->CommentCount}}</td>
                        <td>{{$episode->DownloadCount}}</td>

                        <td>

                            <form action="
                                    @if(request()->get('show')=="trash")
                            {{ route('episode.forceDelete' , ['id'=>$episode->id]) }}
                            @else
                            {{ route('episodes.destroy' , ['episode'=>$episode->id]) }}
                            @endif

                                " method="post">

                                @method('DELETE')
                                @csrf



                                <div class="btn btn-group">
                                    @if(request()->get('show')=='')
                                        <a   href="{{ route('episodes.edit', [ 'episode'=>$episode->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                    @endif
                                    @if(request()->get('show')=='trash')
                                        <a   href="{{ route('episode.restore', [ 'id'=>$episode->id]) }}" class="btn btn-success">{{ _('Restore') }}</a>
                                    @endif
                                    @if(request()->get('show')=='draft')
                                            <a   href="{{ route('episodes.edit', [ 'episode'=>$episode->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                        <a   href="{{ route('episode.publish', [ 'id'=>$episode->id]) }}" class="btn btn-success">{{ _('Publish') }}</a>
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
            {{ $episodes->links() }}
        </div>

            </div>
        </div>

@endsection
