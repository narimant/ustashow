@component('frontend.panel.master')



    <div class="pb-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Side Navbar -->
                    <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                        <li class="nav-item ms-0" role="presentation">
                            <a class="nav-link active" id="bookmarked-tab" data-bs-toggle="pill" href="#bookmarked" role="tab" aria-controls="bookmarked" aria-selected="true">Profile </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning" role="tab" aria-controls="currentlyLearning" aria-selected="false">Payments</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#Vip" role="tab" aria-controls="Vip" aria-selected="false">Vip</a>
                        </li>

                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade active show" id="bookmarked" role="tabpanel" aria-labelledby="bookmarked-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">

                                        <!-- Card body -->
                                        <div class="card-body">

                                            <!-- List inline -->
                                            <ul class="list-group">
                                                <li class="list-group-item">username : {{ auth()->user()->name }}</li>
                                                <li class="list-group-item">email : {{ auth()->user()->email }}</li>
                                                @if(auth()->user()->isVip())
                                                    <li class="list-group-item"> زمان پایان اعتبار ویژه :{{ \Carbon\Carbon::parse(auth()->user()->viptime)->diffInDays() }}</li>
                                                @else
                                                    <li class="list-group-item">شما عضو ویژه نیستید</li>
                                                @endif
                                            </ul>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="currentlyLearning" role="tabpanel" aria-labelledby="currentlyLearning-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">

                                        <!-- Card body -->
                                        <div class="card-body">

                                            <!-- List inline -->
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

                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                    <p>You’ve reached the end of the list</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Vip" role="tabpanel" aria-labelledby="Vip-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">

                                        <!-- Card body -->
                                        <div class="card-body">

                                            <!-- List inline -->
                                            <div class="my-5">
                                                <form action="{{ route('panel.payment') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <select name="plan" class="form-select form-select-lg mb-3">
                                                        <option value="1">عضویت ویژه 1 ماه 10000 تومان</option>
                                                        <option value="3">عضویت ویژه 3 ماه 30000 تومان</option>
                                                        <option value="12">عضویت ویژه 12 ماه 120000 تومان</option>
                                                    </select>
                                                    <button type="submit"  class="btn btn-primary">افزایش اعتبار</button>
                                                </form>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                    <p>You’ve reached the end of the list</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






@endcomponent
