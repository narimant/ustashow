@extends('Admin.master')


@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">




        <h2 >All Articles</h2>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
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
                            <td>{{ $payment->course->title }}</td>
                            @endif




                        <td>
                            <form action="{{ route('payments.update' , ['payment'=>$payment->id]) }}" method="post">

                                @method('patch')
                                @csrf
                                <div class="btn btn-group">

                                    <button class="btn btn-primary" type="submit">{{ _('accept') }}</button>
                                </div>
                            </form>
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
            {{ $payments->links() }}
        </div>
    </main>

@endsection
