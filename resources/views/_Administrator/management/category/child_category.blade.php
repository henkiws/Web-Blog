{{-- <li>{{ $child_category->name }}</li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('_Administrator/management/category/child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif --}}

<li>{{ $child_category->name }}</li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('_Administrator/management/category/child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif