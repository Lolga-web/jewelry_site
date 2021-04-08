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
            <img class="main_content_img" src="{{ asset('storage/img/individual/5.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/7.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/15.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/3.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/20.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/16.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/10.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/18.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/19.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/8.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/1.jpg') }}" alt="individual-img">
            <img class="main_content_img" src="{{ asset('storage/img/individual/11.jpg') }}" alt="individual-img">
        </div>
    </div>

@endsection