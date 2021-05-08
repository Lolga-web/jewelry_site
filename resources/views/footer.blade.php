
<footer class="footer">
    <div class="footer_content">
        <div class="footer_block col-md-2 col-sm-4 col-4">
            <h2 class="footer_title">Каталог</h2>
            <ul class="footer_menu_list">
                @if($categories)
                    @foreach($categories as $item)
                        @if($item->priority > 0)
                            <a class="footer_menu_link" href="{{ route('catalog.category.show', $item->slug) }}">
                                <li class="footer_menu_item">
                                    {{ $item->title }}
                                </li>
                            </a>
                        @endif
                    @endforeach
                @endif
                <a class="footer_menu_link" href="{{ route('catalog.index') }}">
                    <li class="footer_menu_item">еще категории</li>
                </a>
            </ul>
        </div>
        <div class="footer_block col-md-4 col-sm-12 col-12">
            <div class="footer_contacts">
                <h2 class="footer_title">Контакты</h2>
                <div class="footer_contacts_body">
                    <a href="tel:+79141699900">8-914-169-99-00</a>
                    <a href="mailto:uvelir-amk@mail.ru">uvelir-amk@mail.ru</a>
                    <p class="footer_address_text">г.Амурск, пр.Мира,19 оф.212 (2 этаж)</p>
                </div>
            </div>
            <div class="footer_social">
                <a href="https://www.instagram.com/uvelirnaya_masterskaya_amk" class="footer_social_link">
                    <svg class="footer_social_svg" height="15px" viewBox="0 0 511 511.9" xmlns="http://www.w3.org/2000/svg">
                        <path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"></path>
                        <path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"></path><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"></path>
                    </svg>
                </a>
                <a href="https://ok.ru/profile/580178958511" class="footer_social_link">
                    <svg class="footer_social_svg" height="15px" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.721 12.881c-.613 1.205.083 1.781 1.671 2.765 1.35.834 3.215 1.139 4.413 1.261-.491.472 1.759-1.692-4.721 4.541-1.374 1.317.838 3.43 2.211 2.141l3.717-3.585c1.423 1.369 2.787 2.681 3.717 3.59 1.374 1.294 3.585-.801 2.226-2.141-.102-.097-5.037-4.831-4.736-4.541 1.213-.122 3.05-.445 4.384-1.261l-.001-.001c1.588-.989 2.284-1.564 1.68-2.769-.365-.684-1.349-1.256-2.659-.267 0 0-1.769 1.355-4.622 1.355-2.854 0-4.622-1.355-4.622-1.355-1.309-.994-2.297-.417-2.658.267z"></path>
                        <path d="m11.999 12.142c3.478 0 6.318-2.718 6.318-6.064 0-3.36-2.84-6.078-6.318-6.078-3.479 0-6.319 2.718-6.319 6.078 0 3.346 2.84 6.064 6.319 6.064zm0-9.063c1.709 0 3.103 1.341 3.103 2.999 0 1.644-1.394 2.985-3.103 2.985s-3.103-1.341-3.103-2.985c-.001-1.659 1.393-2.999 3.103-2.999z"></path>
                    </svg>
                </a>
                <a href="https://wa.me/79141699900?text=Здравствуйте%2C" class="footer_social_link">
                    <svg class="footer_social_svg" height="28px" xmlns="http://www.w3.org/2000/svg" viewBox="-8 -7 40 40">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"></path>       
                    </svg>
                </a>
            </div>
        </div>
        <!--<div class="footer_schedule col-md-4 col-sm-12 col-12">
            <h2 class="footer_title">График работы</h2>
            <div class="footer_schedule_body">
                <div>
                    <p class="footer_schedule_day">понедельник</p>
                    <p class="footer_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="footer_schedule_day">вторник</p>
                    <p class="footer_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="footer_schedule_day">среда</p>
                    <p class="footer_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="footer_schedule_day">четверг</p>
                    <p class="footer_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="footer_schedule_day">пятница</p>
                    <p class="footer_schedule_time">10:00 - 18:00</p>
                </div>
                <div>
                    <p class="footer_schedule_day">суббота</p>
                    <p class="footer_schedule_time">10:00 - 15:00</p>
                </div>
                <div>
                    <p class="footer_schedule_day">воскресенье</p>
                    <p class="footer_schedule_time">выходной</p>
                </div>
            </div>
        </div>--> 
    </div>
    <div class="footer_mobile">
        <a class="footer_mobile_phone" href="tel:+79141699900">8-914-169-99-00</a>
        <p class="footer_address_text">г.Амурск, пр.Мира,19 оф.212 (2 этаж)</p>
        <div class="footer_social">
            <a href="https://www.instagram.com/uvelirnaya_masterskaya_amk" class="footer_social_link">
                <svg class="footer_social_svg" height="15px" viewBox="0 0 511 511.9" xmlns="http://www.w3.org/2000/svg">
                    <path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"></path>
                    <path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"></path><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"></path>
                </svg>
            </a>
            <a href="https://ok.ru/profile/580178958511" class="footer_social_link">
                <svg class="footer_social_svg" height="15px" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m4.721 12.881c-.613 1.205.083 1.781 1.671 2.765 1.35.834 3.215 1.139 4.413 1.261-.491.472 1.759-1.692-4.721 4.541-1.374 1.317.838 3.43 2.211 2.141l3.717-3.585c1.423 1.369 2.787 2.681 3.717 3.59 1.374 1.294 3.585-.801 2.226-2.141-.102-.097-5.037-4.831-4.736-4.541 1.213-.122 3.05-.445 4.384-1.261l-.001-.001c1.588-.989 2.284-1.564 1.68-2.769-.365-.684-1.349-1.256-2.659-.267 0 0-1.769 1.355-4.622 1.355-2.854 0-4.622-1.355-4.622-1.355-1.309-.994-2.297-.417-2.658.267z"></path>
                    <path d="m11.999 12.142c3.478 0 6.318-2.718 6.318-6.064 0-3.36-2.84-6.078-6.318-6.078-3.479 0-6.319 2.718-6.319 6.078 0 3.346 2.84 6.064 6.319 6.064zm0-9.063c1.709 0 3.103 1.341 3.103 2.999 0 1.644-1.394 2.985-3.103 2.985s-3.103-1.341-3.103-2.985c-.001-1.659 1.393-2.999 3.103-2.999z"></path>
                </svg>
            </a>
            <a href="https://wa.me/79141699900?text=Здравствуйте%2C" class="footer_social_link">
                <svg class="footer_social_svg" height="28px" xmlns="http://www.w3.org/2000/svg" viewBox="-8 -7 40 40">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"></path>       
                </svg>
            </a>
        </div>
    </div>
    <div class="footer_copyright">©Ювелирная мастерская - Амурск, 2020 - {{ date("Y") }}.</div>
</footer>