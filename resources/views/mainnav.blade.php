
<nav class="main_nav">
    <ul class="main_nav_list">
        <a href="{{ route('home') }}" class="main_nav_link"><li class="main_nav_item">Главная</li></a>
        <a class="main_nav_link" onclick="showNav()"><li class="main_nav_item">Каталог</li></a>
        <ul class="main_nav_subnav catalog_subnav" style="display:none;">
                <a href="catalog?category=8" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Гарнитуры</li></a>
                <a href="catalog?category=1" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Серьги</li></a>
                <a href="catalog?category=2" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Кольца</li></a>
                <a href="catalog?category=11" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Браслеты</li></a>
                <a href="catalog?category=9" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Подвески</li></a>
                <a href="catalog?category=10" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Колье</li></a>
                <a href="catalog?category=13" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Броши</li></a>
                <a href="catalog?category=14" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Брелки</li></a>
                <a href="catalog?category=12" class="main_nav_subnav_link"><li class="main_nav_subnav_item">Кресты</li></a>
        </ul>
        <a href="{{ route('works') }}" class="main_nav_link"><li class="main_nav_item">Наши работы</li></a>
        <a href="{{ route('contacts') }}" class="main_nav_link"><li class="main_nav_item">Контакты</li></a>
    </ul>
</nav>