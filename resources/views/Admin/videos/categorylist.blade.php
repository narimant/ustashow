<ul class="list-group">
@foreach($child as $item)



        <li class="list-group-item ">
            @for($a=0;$a<$i;$a++) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@endfor<input type="checkbox" name="category[]" value="{{ $item->id }}"  /> {{ $item->name }}
        </li>


        @if($item->sub_category->count())
            @php $i++; @endphp
            @include('Admin.articles.categorylist',['child' => $item->sub_category ,'i' => $i])
        @endif

@endforeach
</ul>
