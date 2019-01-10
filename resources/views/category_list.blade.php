<ul>
@foreach($categories as $category)
        <li>{{ $category->category_name }}
            @if(count( $category->childs) > 0 )
                <ul>
                @foreach($category->childs as $subcategory)
                    <li>{{ $subcategory->category_name }}</li>
                @endforeach 
                </ul>
            @endif
        </li>                   
@endforeach
</ul>