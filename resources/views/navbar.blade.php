
<nav class="navbar navbar-light navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img class="navbar-logo" src="{{ asset('storage/img/main/logo.png') }}" alt="logo">
    </a>
    <p class="navbar-city">г.Амурск</p>
    <a class="navbar-phone" href="tel:+79141699900">8 (914) 169-99-00</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" onclick="showNav()" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Каталог
                </a>
                <div class="dropdown-menu catalog_subnav" aria-labelledby="navbarDropdown">
                    @if($categories)
                        @foreach($categories as $category)
                            <a href="{{ route('catalog.category.show', $category->slug) }}" class="dropdown-item navbar-dropdown-item">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    @endif
                    <a href="{{ route('catalog.chains') }}" class="dropdown-item navbar-dropdown-item">
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
        <form class="form-inline my-2 my-lg-0 mobile_search_form" action="{{ route('catalog.search') }}" method="GET">
            <input id="search_value" class="form-control mr-sm-2" type="search" name="article" placeholder="Введите артикул" 
                value="{{ request()->input('article') }}" aria-label="Search" oninput="checkSearch()">
            <button id="search_btn" class="btn btn-outline-success my-2 my-sm-0" type="submit" disabled>Поиск</button>
        </form>
        <a class="navbar-collapse-phone" href="tel:+79141699900">8 (914) 169-99-00</a>
    </div>
</nav>
