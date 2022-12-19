@extends('Admin.master')


@section('content')


    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Permissions</h3>
                    <a href="{{ route('permissions.create') }}" class="btn btn-warning  ml-auto p-2">Create Permission</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">


            <thead>
            <tr>
                <th>#</th>
                <th>{{ _('Roles name') }}</th>
                <th>{{_('Label')}}</th>

                <th>{{_('Settings')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1
            @endphp
            @foreach($permissions as $permission)

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->label}}</td>


                    <td>
                        <form action="{{ route('permissions.destroy' , ['permission'=>$permission->id]) }}" method="post">

                            @method('DELETE')
                            @csrf
                            <div class="btn btn-group">
                                 <a href="{{ route('permissions.edit', [ 'permission'=>$permission->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                <button class="btn btn-danger" type="submit">{{ _('Delete') }}</button>
                            </div>
                        </form>
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
                </div>
        {{ $permissions->links() }}
                </div>


            </div>
        </div>


@endsection
