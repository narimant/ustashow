@extends('Admin.master')


@section('content')
    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Courses</h3>
                    <a href="{{ route('courses.create') }}" class="btn btn-warning ml-auto p-2">Create Courses</a>
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
                    <th>Course Type</th>
                    <th>{{_('Settings')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($courses as $course)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><A href="{{$course->path()}}"> {{$course->title}}</A></td>
                        <td>{{$course->ViewCount}}</td>
                        <td>{{$course->CommentCount}}</td>
                        <td>
                         @if($course->type=="free")
                             Free
                            @elseif($course->type=="vip")
                             Vip
                            @elseif($course->type=="cash")
                            Cash
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('courses.destroy' , ['course'=>$course->id]) }}" method="post">

                                @method('DELETE')
                                @csrf
                                <div class="btn btn-group">
                                    <a href="{{ route('courses.edit', [ 'course'=>$course->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">{{ _('Delete') }}</button>
                                </div>
                            </form>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
                </div>
            {{ $courses ->links() }}

            </div>



        </div>
    </div>


@endsection
