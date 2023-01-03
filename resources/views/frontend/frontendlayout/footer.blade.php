<div class="footer mt-5">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>@lang('messages.All Rights Reserved.')© 2022  </span>
            </div>
            <!-- Links -->
            <div class="col-12 col-md-6">

                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="{{route('contact.index')}}">{{__('messages.contact')}}</a>

                    @foreach($footerPages->get() as $footer)
                    <a class="nav-link active ps-0" href="{{$footer->path()}}">{{ $footer->title }}</a>
                    @endforeach


                </nav>
            </div>
        </div>
    </div>
</div>
