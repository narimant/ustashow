@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Tags</h3>
                    <a href="{{ route('tags.create') }}" class="btn btn-warning ml-auto p-2">Create Tag</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="col-2">#</th>
                            <th>{{ _('name') }}</th>

                            <th class="col-2">{{_('Settings')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($tags as $tag)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><A href="{{$tag->path()}}"> {{$tag->name}}</A></td>


                                <td>
                                    <form action="{{ route('tags.destroy' , ['tag'=>$tag->id]) }}" method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a   href="{{ route('tags.edit', [ 'tag'=>$tag->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
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
                {{ $tags->links() }}
            </div>





        </div>
    </div>

@endsection
