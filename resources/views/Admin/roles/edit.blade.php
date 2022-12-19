@extends('Admin.master')




@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">




        <h2 >Update Role</h2>

            @include('Admin.section.errors')
            <form action="{{route('roles.update',['role'=>$role->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label  for="name">Role Name</label>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control" id="name" placeholder="insert role name " >
                </div>
                <div class="form-group">
                    <label  for="label">Role Label</label>
                    <input type="text"  value="{{$role->label }}"  name="label"  class="form-control" id="label" placeholder="insert label " >


                </div>

                @php
                use App\Permission;
                $permisons=Permission::all();

                @endphp
                <div class="row">
                    @foreach($permisons as $permison)

                      <div class="col-md-3">
                          <input type="checkbox" name="permissions[]" value="{{$permison->id}}" {{ in_array($permison->id,$role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}> <label>{{$permison->name}}</label>
                      </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>

    </main>

@endsection
