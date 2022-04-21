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

                    @include('Admin.section.errors')
                    <div class="mb-4">

                        <h1 class="mb-1 fw-bold">{{ __('messages.Login') }}</h1>

                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('messages.E-Mail Address') }}</label>
                            <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('messages.Password') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input" id="remember">
                                <label class="form-check-label " for="remember">    {{ __('messages.Remember Me') }}</label>
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}"> {{ __('messages.Forgot Your Password?') }}</a>
                            </div>
                        </div>


                        <div class="mb-2 text-center">
                            <div class="g-recaptcha" data-sitekey="6LdyHrMdAAAAAK5U2jKzq7E6ze6fNicoOK6DQgXg"></div>
                        </div>
                        <div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary ">{{ __('messages.Sign In') }}</button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="mt-4 text-center ">

                            <!--google-->
                            <a href="{{route('google.login')}}" class="btn btn-block btn-social btn-social-outline btn-google " >
                                <i class="fab fa-google "></i>
                            </a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
