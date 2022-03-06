@extends('frontend.frontendlayout.frontendblanck')

@section('content')



    <div class="container-fluid">
    <div class="row align-items-center min-vh-100">
        <!-- col -->
        <div class="col-lg-6 col-md-12 col-12">
            <div class="px-xl-20 px-md-8 px-4 py-8 py-lg-0">
                <!-- content -->
                <div class="d-flex justify-content-between mb-7 align-items-center">
                    <a href="../index.html"><img src="../assets/images/brand/logo/logo.svg" alt="">
                    </a>
                </div>
                <div class="text-dark">
                    <h1 class="display-4 fw-bold">Get In Touch.</h1>
                    <p class="lead text-dark">
                        Fill in the form to the right to get in touch with someone on
                        our
                        team, and we will reach out shortly.
                    </p>
                    <div class="mt-8">
                        <p class="fs-4 mb-4">
                            If you are seeking support please visit our <a href="#">support
                                portal</a> before
                            reaching out directly.
                        </p>
                        <!-- address -->

                        <p class="fs-4"><i class="bi bi-telephone text-primary
                    me-2"></i> + 0123-456-7890</p>
                        <p class="fs-4"><i class="bi bi-envelope-open
                    text-primary me-2"></i> hello@geekui.com</p>
                        <p class="fs-4 d-flex"><i class="bi bi-geo-alt
                    text-primary me-2"></i> 2652 Kooter Lane Charlotte, NC 28263</p>
                    </div>
                    <div class="mt-10">
                        <!--Facebook-->
                        <a href="#" class="text-muted me-3">
                            <i class="mdi mdi-facebook fs-3"></i>
                        </a>
                        <!--Twitter-->
                        <a href="#" class="text-muted me-3">
                            <i class="mdi mdi-twitter  fs-3"></i>
                        </a>

                        <!--GitHub-->
                        <a href="#" class="text-muted">
                            <i class="mdi mdi-github fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- background color -->
        <div class="col-lg-6 d-lg-flex align-items-center w-lg-50 min-vh-lg-100 position-fixed-lg bg-cover bg-light top-0
          right-0">
            <div class="px-4 px-xl-20 py-8 py-lg-0">
                <!-- form section -->
                <div id="form">
                    <!-- form row -->
                    @include('Admin.section.errors')
                    <form class="row" method="post" action="{{route('contact.send')}}">
                        @csrf
                        @method('post')
                        <!-- form group -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="fname">First Name:<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="first_name" id="fname" placeholder="First Name" >
                        </div>
                        <!-- form group -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="lname">Last Name:<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="last_name" id="lname" placeholder="Last Name" >
                        </div>
                        <!-- form group -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="email">Email:<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" >
                        </div>


                        <!-- form group -->
                        <div class="mb-3 col-12">
                            <label class="text-dark form-label" for="messages">Message:</label>
                            <textarea class="form-control" id="messages" rows="3" placeholder="Messages" name="messages"></textarea>
                        </div>
                        <!-- button -->
                        <div class=" col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
