@extends('Admin.master')


@section('content')


    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Users</h3>
                    <div class="btn-group  ml-auto ">
                        <a href="{{ route('lvl.index') }}" class="btn btn-primary btn-sm">Manager Users</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-warning btn-sm">User Role</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">




            <thead>
            <tr>
                <th>#</th>
                <th>{{ _('User name') }}</th>
                <th>{{_('Email')}}</th>
                <th>{{_('Status')}}</th>
                <th>{{_('Settings')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1
            @endphp
            @foreach($users as $user)

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>0</td>

                    <td>
                        <form action="{{ route('users.destroy' , ['user'=>$user->id]) }}" method="post">

                            @method('DELETE')
                            @csrf
                            <div class="btn btn-group">
                                <a href="{{ route('user.edit', [ 'user'=>$user->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
                            </div>
                        </form>
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
                </div>
        {{ $users->links() }}
                </div>

            </div>
        </div>

@endsection
