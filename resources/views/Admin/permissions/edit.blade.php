@extends('Admin.master')




@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">




        <h2 >Create Role</h2>

            @include('Admin.section.errors')
            <form action="{{route('permissions.update',['permission'=>$permission->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label  for="name">Role Name</label>
                    <input type="text" name="name" value="{{$permission->name}}" class="form-control" id="name" placeholder="insert role name " >
                </div>
                <div class="form-group">
                    <label  for="label">Role Label</label>
                    <input type="text"  value="{{$permission->label }}"  name="label"  class="form-control" id="label" placeholder="insert label " >


                </div>




                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>

    </main>

@endsection
