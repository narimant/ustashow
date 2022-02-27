@extends('frontend.frontendlayout.frontendmaster')


@section('style')
    <link rel="stylesheet" href="frontend/css/all.min.css" >
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection




@section('content')

    <div class="container">
        <div class="row   g-0 mt-3 mb-3">
            <div class="col-lg-5 col-md-8 mx-auto py-3 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">


                            <div class="card-header">{{ __('messages.Verify Your Email Address') }}</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('messages.A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                {{ __('messages.Before proceeding, please check your email for a verification link.') }}
                                {{ __('messages.If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('messages.click here to request another') }}</button>.
                                </form>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
