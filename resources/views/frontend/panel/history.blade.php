@component('frontend.panel.master')



    <div style="margin: 20px;">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>مقدار پرداخت</th>
                <th>وضعیت پرداخت</th>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->price }} تومان</td>
                    <td>{{ $payment->payment == 1 ? 'موفق' : 'ناموفق'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endcomponent
