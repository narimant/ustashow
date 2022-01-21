@extends('Admin.master')

@section('script')
    <script>
        $(document).ready(function () {
            $('#user_id').selectpicker();
            $('#role_id').selectpicker();
        })
    </script>
@endsection


@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2 >Register Role</h2>
        <form class="form-horizontal" action="{{ route('lvl.update',['user'=>$user->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    Edit for User : {{$user->name}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="role_id" class="control-label">Roles</label>
                    <select class="form-control" name="role_id" id="role_id">
                        @foreach(\App\Role::all() as $role)
                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : ''}}>{{ $role->name }} - {{ $role->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">Add</button>
                </div>
            </div>
        </form>
    </main>
@endsection
