@extends('layouts.app')

@section('content')

    <h2 class="main_content_title">Изготовление по индивидуальному заказу</h2>

    <div class="main_content_body">
        <p class="main_content_text">
            Наша мастерская занимается изготовлением любых ювелирных украшений
            как по каталогам, так и по индивидуальному заказу. Изделия по индивидуальному 
            заказу - это полностью ручная работа. Вы можете принести фото
            или эскиз изделия, или просто обьяснить ваши пожелания мастеру. Так же
            мы можем изготовить копию другого изделия, например, утерянной серьги или
            бижутерии. Примеры таких работ:
        </p>

        <div class="main_content_img_block">
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/01.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/02.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/03.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/04.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/05.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/06.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/07.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/08.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/09.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/10.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/11.jpg') }}" alt="individual-img">
            </div>
            <div class="works_item">
                <img class="main_content_img" src="{{ asset('storage/img/individual/12.jpg') }}" alt="individual-img">
            </div>    
        </div>
    </div>

@endsection