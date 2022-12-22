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


                        <td>
                            <form action="{{ route('comments.destroy' , ['comment'=>$comment->id]) }}" method="post">


                                @csrf
                                <div class="btn btn-group">

                                    <button class="btn btn-danger" type="submit">{{ _('Delete') }}</button>
                                </div>
                            </form>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
                </div>
            {{ $comments->links() }}
        </div>



            </div>
        </div>


@endsection
