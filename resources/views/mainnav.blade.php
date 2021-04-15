
<nav class="main_nav">
    <ul class="main_nav_list">
        <a href="{{ route('home') }}" class="main_nav_link"><li class="main_nav_item">Главная</li></a>
        <a class="main_nav_link" onclick="showNav()"><li class="main_nav_item">Каталог</li></a>
        <ul class="main_nav_subnav catalog_subnav" style="display:none;">
            @foreach($categories as $category)
                <a href="{{ route('catalog.category.show', $category->slug) }}" class="main_nav_subnav_link">
                    <li class="main_nav_subnav_item">{{ $category->title }}</li>
                </a>
                @foreach($subcategories as $subcategory)
                    @if($category->id == $subcategory->category_id)
                        <a href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => $subcategory->slug]) }}" 
                            class="main_nav_subnav_link">
                            <li class="main_nav_subcategory_item">{{ $subcategory->title }}</li>
                        </a>
                    @endif
                @endforeach
            @endforeach
            <a href="{{ route('catalog.chains') }}" class="main_nav_subnav_link">
                <li class="main_nav_subnav_item">цепи</li>
            </a>
        </ul>
        <a href="{{ route('individual') }}" class="main_nav_link"><li class="main_nav_item">Индивидуальный заказ</li></a>
        <a href="{{ route('works') }}" class="main_nav_link"><li class="main_nav_item">Наши работы</li></a>
        <a href="{{ route('contacts') }}" class="main_nav_link"><li class="main_nav_item">Контакты</li></a>
    </ul>
</nav>