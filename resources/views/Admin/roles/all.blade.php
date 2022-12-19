@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Roles</h3>

                    <div class="btn-group ml-auto p-2">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Create Role</a>
                        <a href="{{ route('permissions.index') }}" class="btn btn-warning btn-sm">User Permission</a>
                    </div>
                </div>
                <!-- /.card-body -->
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
                        @foreach($roles as $role)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->label}}</td>


                                <td>
                                    <form action="{{ route('roles.destroy' , ['role'=>$role->id]) }}" method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a href="{{ route('roles.edit', [ 'role'=>$role->id]) }}"
                                               class="btn btn-primary">{{ _('Edit') }}</a>
                                            <button class="btn btn-danger" type="submit">{{ _('Delete') }}</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
                {{ $roles->links() }}
            </div>


        </div>
    </div>


@endsection
