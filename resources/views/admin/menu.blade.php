
<div class="admin_menu">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.categories.index') }}">категории</a>
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
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.catalog.create') }}">добавить в каталог</a>
        </li>
    </ul>

    <div class="admin_logout_block">
        <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Выйти') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
