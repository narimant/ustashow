

<ul class="navbar-nav">

    @foreach(\App\Category::where('parent_id',null)->where('lang',app()->getLocale())->with('sub_category')->get() as $value)
        <li class="nav-item {{ $value->sub_category->count() ? "dropdown" :"" }}">
        <a class="nav-link  {{ $value->sub_category->count() ? "dropdown-toggle" :"" }}" href=" {{ $value->path() }}"  {{ $value->sub_category->count() ? "data-bs-toggle='dropdown''" :"" }} aria-haspopup="true" aria-expanded="false">
            {{ $value->name }}
        </a>
        @if($value->sub_category->count())


            @include('frontend.frontendlayout.cat',['child' => $value->sub_category ])
        @endif
        </li>
    @endforeach

</ul>








