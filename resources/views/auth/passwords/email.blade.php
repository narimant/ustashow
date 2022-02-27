@extends('frontend.frontendlayout.frontendmaster')


@section('style')
    <link rel="stylesheet" href="frontend/css/all.min.css" >
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection




@section('content')



<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href="../index.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a>
                        <h1 class="mb-1 fw-bold">{{__('messages.Forgot Password')}}</h1>
                        <p>{{__('messages.Fill the form to reset your password.')}}</p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('messages.E-Mail Address') }}</label>



                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.Send Password Reset Link') }}
                            </button>
                        </div>
                        <span>{{__('messages.Return to')}} <a href="{{route('login')}}">{{__('messages.Sign In')}}</a></span>

                    </form>
                    <!-- Form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
