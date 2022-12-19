@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">footer Settings</h3>

                </div>



                <div class="card-body">
                    <form method="post" action="{{route('footer.store')}}">
                        @csrf
                        @method('POST')
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ _('Pages Title') }}</th>
                            <th>{{ _('Status For Footer') }}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($pages as $page)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{$page->title}}</td>
                                <td> <input type="checkbox" name="attachTo[]" value="{{$page->id}}" class="form-check form-control-lg" {{$page->attachTo=='footer' ?'checked' : ''}}> </td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-primary">{{__('messages.Save')}}</button>
                    </form>
                </div>
                <!-- /.card-body paginate -->

            </div>





        </div>
    </div>

@endsection
