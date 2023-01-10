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
                    <form method="post" action="{{route('user.update',['user'=>$user->id])}}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">{{__('adminPanel.Name')}}</label>
                            <input type="text" id="name"  class="form-control" value="{{$user->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="level">{{__('adminPanel.Level')}}</label>
                            <select name="level" class="form-control" id="level">
                                <option value="users">{{__('adminPanel.User')}}</option>
                                <option value="admin">{{__('adminPanel.Admin')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('adminPanel.Email')}}</label>
                            <input type="text" id="email" disabled value="{{$user->email}}" class="form-control disabled">
                        </div>
                        <div class="form-group">
                            <label for="password">{{__('adminPanel.Password')}}</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                <input type="submit" value="update" class="btn btn-primary ">
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
