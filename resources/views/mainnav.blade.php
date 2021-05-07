
<nav class="main_nav">
    <ul class="main_nav_list">
        <li class="main_nav_item"><a href="{{ route('home') }}" class="main_nav_link">Главная</a></li>
        <li class="main_nav_item"><a class="main_nav_link show_nav @if(!empty($category)) gold @endif" onclick="showNav()">Каталог</a></li>
        <ul class="main_nav_subnav catalog_subnav" @if(empty($category)) style="display:none;" @endif>
            @if($categories)
                @foreach($categories as $item)
                        <a class="main_nav_subnav_link" href="{{ route('catalog.category.show', $item->slug) }}">
                            <li class="main_nav_subnav_item 
                                @if(!empty($category) && ($category->id == $item->id)) light-grey @endif">
                                {{ $item->title }}
                            </li>
                        </a>
                @endforeach
            @endif
        </ul>
        <li class="main_nav_item"><a href="{{ route('individual') }}" class="main_nav_link">Индивидуальный заказ</a></li>
        <li class="main_nav_item"><a href="{{ route('works') }}" class="main_nav_link">Наши работы</a></li>
        <li class="main_nav_item"><a href="{{ route('contacts') }}" class="main_nav_link">Контакты</a></li>
    </ul>
</nav>