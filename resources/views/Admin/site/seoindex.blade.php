@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">Main Site Seo</h3>
                    <a href="{{ route('siteseo.create') }}" class="btn btn-warning ml-auto p-2">Create Seo</a>
                </div>



                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ _('Seto Title') }}</th>
                            <th>{{_('Seo Description')}}</th>
                            <th>{{_('Seo language')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($siteseo as $seo)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{$seo->site_title}}</td>
                                <td> {{$seo->site_description}}</td>
                                <td> {{$seo->lang}}</td>
                                <td>
                                    <form action="{{ route('siteseo.destroy' , ['siteseo'=>$seo->id]) }}" method="post">

                                        @method('DELETE')
                                        @csrf
                                        <div class="btn btn-group">
                                            <a   href="{{ route('siteseo.edit', [ 'siteseo'=>$seo->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>

                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" >{{ _('Delete') }}</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body paginate -->

            </div>





        </div>
    </div>

@endsection
