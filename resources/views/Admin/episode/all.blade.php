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
                            <form action="{{ route('episodes.destroy' , ['episode'=>$episode->id]) }}" method="post">

                                @method('DELETE')
                                @csrf
                                <div class="btn btn-group">
                                    <a href="{{ route('episodes.edit', [ 'episode'=>$episode->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
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
