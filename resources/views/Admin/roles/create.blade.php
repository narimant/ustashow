@extends('Admin.master')




@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">


                <div class="card-header">
                    <h3 class="card-title">
                        Create Role
                    </h3>
                </div>
                <div class="card-body">






            @include('Admin.section.errors')
            <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf

                <div class="form-group">
                    <label  for="name">Role Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="insert role name " >
                </div>
                <div class="form-group">
                    <label  for="label">Role Label</label>
                    <input type="text"  value="{{old('label')}}"  name="label"  class="form-control" id="label" placeholder="insert label " >


                </div>

                @php
                use App\Permission;
                $permisons=Permission::all();
                @endphp
                <div class="row ">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#3</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($permisons as $permison)
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-label" name="permissions[]" value="{{$permison->id}}"> <label>{{$permison->name}}</label>
                                    </div>
                                </div>
                            @endforeach

                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled="">
                                <label for="customCheckbox1" class="custom-control-label">Bug</label>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

                </div>
            </div>
        </div>
    </div>

@endsection
