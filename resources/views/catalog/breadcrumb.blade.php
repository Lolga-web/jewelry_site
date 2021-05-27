
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="/">Главная</a>
        </li>
        @if($subcategory)
            <li class="breadcrumb-item">
                <a class="breadcrumb-link" href="{{ route('catalog.index') }}">каталог</a>
            </li>
            <li class="breadcrumb-item">
                <a class="breadcrumb-link" href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => null]) }}">{{ $category->title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->title }}</li>
        @elseif($category)
            <li class="breadcrumb-item">
                <a class="breadcrumb-link" href="{{ route('catalog.index') }}">каталог</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
        @else
            <li class="breadcrumb-item">каталог</li>
        @endif       
    </ol>
</nav>