@extends('layouts.app')

@section('title', '| контакты')

@section('content')

    @include('breadcrumb', ['title' => 'контакты'])

    <div class="main_content_body">
        <div class="contacts_wrp">

            <div class="contacts_block col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="contacts_address">
                    <h2 class="main_content_title">Адрес</h2>
                    <p class="contacts_address_text">г.Амурск, пр.Мира,19</p>
                    <p class="contacts_address_text">офис 212 (2 этаж)</p>
                </div>

                <div class="contacts_contacts">
                    <h2 class="main_content_title">Контакты</h2>
                    <div class="contacts_contacts_body">
                        <a href="tel:+79141699900">8-914-169-99-00</a>
                        <a href="mailto:uvelir-amk@mail.ru">uvelir-amk@mail.ru</a>
                    </div>
                </div>
            </div>

            <div class="contacts_schedule col-lg-6 col-md-6 col-sm-12 col-12">
                <h2 class="main_content_title">График работы</h2>
                <div class="contacts_schedule_body">
                    <div>
                        <p class="contacts_schedule_day">понедельник</p>
                        <p class="contacts_schedule_time">10:00 - 18:00</p>
                    </div>
                    <div>
                        <p class="contacts_schedule_day">вторник</p>
                        <p class="contacts_schedule_time">10:00 - 18:00</p>
                    </div>
                    <div>
                        <p class="contacts_schedule_day">среда</p>
                        <p class="contacts_schedule_time">10:00 - 18:00</p>
                    </div>
                    <div>
                        <p class="contacts_schedule_day">четверг</p>
                        <p class="contacts_schedule_time">10:00 - 18:00</p>
                    </div>
                    <div>
                        <p class="contacts_schedule_day">пятница</p>
                        <p class="contacts_schedule_time">10:00 - 18:00</p>
                    </div>
                    <div>
                        <p class="contacts_schedule_day">суббота</p>
                        <p class="contacts_schedule_time">10:00 - 15:00</p>
                    </div>
                    <div>
                        <p class="contacts_schedule_day">воскресенье</p>
                        <p class="contacts_schedule_time">выходной</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contacts_map">
            <img class="contacts_map_img" src="{{ asset('storage/img/main/map.png') }}" alt="map-img">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A236d502619b4939568f3182c3887f493b264bd1f3526c38a18402ea9c01360af&amp;max-width=1200&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>

    </div>

@endsection
