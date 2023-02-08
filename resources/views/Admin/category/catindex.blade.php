
@foreach($child as $item)
    <tr>
    <td>{{$j}}</td>
    <td><A href="{{$item->path()}}">@for($a=0;$a<$i;$a++) <i class="fas fa-long-arrow-alt-right"></i> @endfor {{$item->name}}</A></td>

        <td>
            {{$item->lang}}
        </td>
        <td>{{$item->category_mode}}</td>
    <td>
        <form action="{{ route('categories.destroy' , ['category'=>$item->id]) }}" method="post">

            @method('DELETE')
            @csrf
            <div class="btn btn-group">
                <a   href="{{ route('categories.edit', [ 'category'=>$item->id]) }}" class="btn btn-primary">{{ _('Edit') }}</a>
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" >{{ _('Delete') }}</button>
            </div>
        </form>
    </td>
    </tr>



    @if($item->sub_category->count())
        @php $i++; @endphp
        @include('Admin.category.catindex',['child' => $item->sub_category ,'i' => $i])
    @endif
@endforeach
