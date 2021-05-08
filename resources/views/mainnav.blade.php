
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

    <div class="main_nav_schedule">
            <h2 class="main_nav_title">График работы</h2>
            <div class="main_nav_schedule_body">
                <div>
                    <p class="main_nav_schedule_day">понедельник</p>
                    <p class="main_nav_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="main_nav_schedule_day">вторник</p>
                    <p class="main_nav_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="main_nav_schedule_day">среда</p>
                    <p class="main_nav_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="main_nav_schedule_day">четверг</p>
                    <p class="main_nav_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="main_nav_schedule_day">пятница</p>
                    <p class="main_nav_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="main_nav_schedule_day">суббота</p>
                    <p class="main_nav_schedule_time">10:00 - 15:00</p>
                </div>
                <div>
                    <p class="main_nav_schedule_day">воскресенье</p>
                    <p class="main_nav_schedule_time">выходной</p>
                </div>
            </div>
        </div>
</nav>