@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Articles</h3>
                    <a href="{{ route('articles.create') }}" class="btn btn-warning ml-auto p-2">Create Article</a>
                </div>
                <!-- /.card-header -->
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
                        @foreach($articles as $article)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><A href="{{$article->path()}}"> {{$article->title}}</A></td>
                                <td>{{$article->ViewCount}}</td>
                                <td>{{$article->CommentCount}}</td>

                                <td>
                                    <form action="{{ route('articles.destroy' , ['article'=>$article->id]) }}" method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a   href="{{ route('articles.edit', [ 'article'=>$article->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
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
                {{ $articles->links() }}
            </div>





        </div>
    </div>

@endsection
