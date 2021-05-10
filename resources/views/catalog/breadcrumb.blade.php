
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="/">Главная</a>
        </li>
        <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="{{ route('catalog.index') }}">каталог</a>
        </li>
        @if($subcategory)
            <li class="breadcrumb-item">
                <a class="breadcrumb-link" href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => null]) }}">{{ $category->title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->title }}</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
        @endif       
    </ol>
</nav>