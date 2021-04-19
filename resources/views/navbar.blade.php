
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">Ювелирная мастерская</a>
    <a class="navbar-phone" href="tel:+79141699900">&#9990 +7-914-169-99-00</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" onclick="showNav()" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Каталог
                </a>
                <div class="dropdown-menu catalog_subnav" aria-labelledby="navbarDropdown">
                    @if($categories)
                        @foreach($categories as $category)
                            <a href="{{ route('catalog.category.show', $category->slug) }}" class="dropdown-item">
                                {{ $category->title }} 
                            </a>
                            @if($subcategories)
                                @foreach($subcategories as $subcategory)
                                    @if($category->id == $subcategory->category_id)
                                        <a href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => $subcategory->slug]) }}" 
                                            class="dropdown-item">
                                            {{ $subcategory->title }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                    <a href="{{ route('catalog.chains') }}" class="dropdown-item">
                        цепи
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('individual') }}">Индивидуальный заказ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('works') }}">Наши работы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
            </li> 
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>