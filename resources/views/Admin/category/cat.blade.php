


@foreach($child as $item)

    <option value="{{ $item->id }}" > @for($a=0;$a<$i;$a++) - @endfor {{ $item->name }}</option>


        @if($item->sub_category->count())
            @php $i++; @endphp
            @include('Admin.category.cat',['child' => $item->sub_category ,'i' => $i])
        @endif
    @endforeach
