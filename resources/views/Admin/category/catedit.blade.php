


@foreach($child as $item)

    @if($item->id != $category->id)

    <option value="{{ $item->id }}" > @for($a=0;$a<$i;$a++) - @endfor {{ $item->name }}</option>


    @if($item->sub_category->count())
        @php $i++; @endphp
        @include('Admin.category.catedit',['child' => $item->sub_category ,'i' => $i])
    @endif
    @endif
@endforeach
