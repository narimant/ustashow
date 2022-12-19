@extends('Admin.master')




@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">


                <div class="card-header">
                    <h3 class="card-title">
                        Create Permission
                    </h3>
                </div>
                <div class="card-body">


                    @include('Admin.section.errors')
                    <form action="{{route('permissions.store')}}" method="post" enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name"
                                   placeholder="insert permissions name ">
                        </div>
                        <div class="form-group">
                            <label for="label">Role Label</label>
                            <input type="text" value="{{old('label')}}" name="label" class="form-control" id="label"
                                   placeholder="insert label ">


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
