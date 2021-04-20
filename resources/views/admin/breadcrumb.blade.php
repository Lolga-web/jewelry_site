
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">личный кабинет</li>
        <li class="breadcrumb-item" aria-current="page">{{ $title }}</li>
        @if(!empty($category))
            <li class="breadcrumb-item" aria-current="page">{{ $category->title }}</li>
        @endif
    </ol>
</nav>