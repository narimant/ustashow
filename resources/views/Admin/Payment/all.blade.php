@extends('Admin.master')


@section('content')

    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header d-flex align-content-center">
                    <h3 class="card-title ">All Payment</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ _('auther name') }}</th>
                    <th>{{_('Price')}}</th>
                    <th>{{_('Pay Type')}}</th>
                    <th>{{_('Settings')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($payments as $payment)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td> {{$payment->user->name }}</td>
                        <td>{{ $payment->price }}</td>

                        @if($payment->course_id=='vip')
                            <td>vip</td>
                        @else
                            <td><a href="{{ $payment->course->path() }}"> {{ $payment->course->title }}</a></td>
                        @endif




                        <td>

                            <form action="{{ route('payments.destroy' , ['payment'=>$payment->id]) }}" method="post">

                                @method('delete')
                                @csrf
                                <div class="btn btn-group">

                                    <button class="btn btn-danger" type="submit">{{ _('delete') }}</button>
                                </div>
                            </form>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
                </div>
            {{ $payments->links() }}
                </div>

            </div>
        </div>


@endsection
