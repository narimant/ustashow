<ul class="list-group">
@foreach($child as $item)



        <li class="list-group-item ">
            @for($a=0;$a<$i;$a++) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@endfor<input type="checkbox" name="category[]"
                                                                                        @foreach($article->categories()->get() as $category)
                                                                                            @if($category->id==$item->id)
                                                                                            checked
                                                                                            @endif
                                                                                        @endforeach
                                                                                                value="{{ $item->id }}"  /> {{ $item->name }}
        </li>


        @if($item->sub_category->count())
            @php $i++; @endphp
            @include('Admin.articles.categoryeditlist',['child' => $item->sub_category ,'i' => $i,'article'=>$article])
        @endif

@endforeach
</ul>
