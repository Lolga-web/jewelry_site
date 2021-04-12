
<div class="admin_menu">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.categories.index') }}">категории</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.filters.index') }}">фильтры</a>
        </li>
        <li class="nav-item dropdown">
            <p class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">каталог</p>
            <div class="dropdown-menu">
                @foreach($categories as $category)
                    <a href="{{ route('admin.catalog.show', $category->slug) }}" class="dropdown-item">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.works.index') }}">наши работы</a>
        </li>
    </ul>
</div>