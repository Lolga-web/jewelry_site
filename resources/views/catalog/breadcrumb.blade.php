
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="{{ route('catalog.index') }}">Каталог</a>
        </li>
        <li class="breadcrumb-item active" @if(!$subcategory) aria-current="page" @endif>
            @if($subcategory)
                <a class="breadcrumb-link" href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => null]) }}">{{ $category->title }}</a>
            @else
                {{ $category->title }}
            @endif
        </li>
        @if($subcategory)
            <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->title }}</li>
        @endif
    </ol>
</nav>