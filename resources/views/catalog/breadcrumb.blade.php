
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Каталог</li>
        <li class="breadcrumb-item" @if(!$subcategory) aria-current="page" @endif>
            @if($subcategory)
                <a href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => null]) }}">{{ $category->title }}</a>
            @else
                {{ $category->title }}
            @endif
        </li>
        @if($subcategory)
            <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->title }}</li>
        @endif
    </ol>
</nav>