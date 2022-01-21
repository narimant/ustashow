@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">Admin Users</h3>
                    <a href="{{ route('lvl.create') }}" class="btn btn-warning ml-auto p-2">Register User Role</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">


            <thead>
            <tr>
                <th>#</th>
                <th>{{ _('User name') }}</th>
                <th>{{_('Email')}}</th>
                <th>{{_('Role')}}</th>
                <th>{{_('Settings')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1
            @endphp
            @foreach($roles as $role)
                @if(count($role->users))
                    @foreach($role->users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$role->name}} - {{$role->label}}</td>

                        <td>
                            <form action="{{ route('lvl.destroy' , ['user'=>$user->id]) }}" method="post">

                                @method('DELETE')
                                @csrf
                                <div class="btn btn-group">
                                    <a href="{{ route('lvl.edit', [ 'user'=>$user->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                                    <button class="btn btn-danger" type="submit">{{ _('Delete') }}</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif

            @endforeach


            </tbody>
        </table>
                </div>
        {{ $roles->links() }}
                </div>





            </div>
        </div>

@endsection
