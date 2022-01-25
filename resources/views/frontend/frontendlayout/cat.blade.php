

<ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
@foreach($child as $item)

        <li class="dropdown-submenu dropend">
            <a class="dropdown-item dropdown-list-group-item {{ $item->sub_category->count() ? "dropdown-toggle" :"" }}" href="{{ $item->path() }}">
                {{ $item->name }}
            </a>





        @if($item->sub_category->count())

            @include('frontend.frontendlayout.cat',['child' => $item->sub_category ])
        @endif
        </li>
    @endforeach

</ul>



