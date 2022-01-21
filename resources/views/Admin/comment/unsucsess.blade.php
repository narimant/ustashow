@extends('Admin.master')


@section('content')


    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">Confirmed  message </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ _('auther name') }}</th>
                    <th>{{_('Comment')}}</th>
                    <th>{{_('post relation')}}</th>
                    <th>{{_('Settings')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($comments as $comment)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td> {{$comment->user->name }}</td>
                        <td>{{$comment->comment}}</td>
                        <td><a href="{{$comment->commentable->path()}}"> {{ $comment->commentable->title }} </a> </td>


                        <td >
                            <form action="{{ route('comments.destroy' , ['comment'=>$comment->id]) }}" method="post">

                                @method('DELETE')
                                @csrf
                                <div class="btn btn-group">

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" type="submit">{{ _('Delete') }}</button>
                                </div>
                            </form>
                            <form action="{{ route('comments.update' , ['comment'=>$comment->id]) }}" method="post">

                                @method('patch')
                                @csrf
                                <div class="btn btn-group">

                                    <button class="btn btn-success btn-sm" type="submit">{{ _('Accept') }}</button>
                                </div>
                            </form>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
            {{ $comments->links() }}
        </div>

            </div>
        </div>


@endsection
