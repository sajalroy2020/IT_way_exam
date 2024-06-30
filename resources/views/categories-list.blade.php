<li>
    <div data-parentid="{{$category->parent_id}}" class="name" data-name={{$category->name}} data-id={{$category->id}}>{{ $category->name }}</div>
    @if ($category->children->count())
        <ul>
            @foreach ($category->children as $child)
                @include('categories-list', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
