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
                <ul class="nav nav-tabs mt-3" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='' ? "active" : ''}}"  href="{{route('courses.index')}}"  > Articles Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='draft' ? "active" : ''}}"  href="{{route('courses.index',['show'=>'draft'])}}"  > Articles Draft @if($draftcount>0)<span class="badge badge-primary right">{{$draftcount}}@endif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->get('show')=='trash' ? "active" : ''}}"  href="{{route('courses.index',['show'=>'trash'])}}"  >Articles in Trash @if($trashcount>0)<span class="badge badge-danger right">{{$trashcount}}@endif</span></a>
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

                                <form action="
                                    @if(request()->get('show')=="trash")
                                {{ route('course.forceDelete' , ['id'=>$course->id]) }}
                                @else
                                {{ route('courses.destroy' , ['course'=>$course->id]) }}
                                @endif

                                    " method="post">
                                @method('DELETE')
                                @csrf

                                <div class="btn btn-group">
                                    <a   href="{{ route('courses.edit', [ 'course'=>$course->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                    @if(request()->get('show')=='trash')
                                        <a   href="{{ route('course.restore', [ 'id'=>$course->id]) }}" class="btn btn-success">{{ _('Restore') }}</a>
                                    @endif
                                    @if(request()->get('show')=='draft')
                                        <a   href="{{ route('course.publish', [ 'id'=>$course->id]) }}" class="btn btn-success">{{ _('Publish') }}</a>
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
            {{ $courses ->links() }}

            </div>



        </div>
    </div>


@endsection
