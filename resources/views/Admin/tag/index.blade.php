@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">{{__('adminPanel.All Tags')}}</h3>
                    <a href="{{ route('tags.create') }}" class="btn btn-warning ml-auto p-2">{{__('adminPanel.Create Tag')}}</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="col-2">#</th>
                            <th>{{__('adminPanel.Tags Name')}}</th>

                            <th class="col-2">{{__('adminPanel.Settings')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($tags as $tag)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a href="{{$tag->path()}}"> {{$tag->name}}</a></td>


                                <td>
                                    <form action="{{ route('tags.destroy' , ['tag'=>$tag->id]) }}" method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a   href="{{ route('tags.edit', [ 'tag'=>$tag->id]) }}" class="btn btn-primary">{{__('adminPanel.Edit')}}</a>
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
                {{ $tags->links() }}
            </div>





        </div>
    </div>

@endsection
