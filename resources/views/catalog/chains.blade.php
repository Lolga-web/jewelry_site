@extends('layouts.app')

@section('title', '| цепи')

@section('content')

    @include('catalog.breadcrumb')

    <h2 class="main_content_title">Плетения цепей</h2>

    <p class="main_content_text">
        Цепи изготавливаются вручную. Длина цепи и тощина плетения - в зависимости от Ваших пожеланий.
    </p>

    <div class="product_list">
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <div class="product_item_img_wrp">
                    <img src="{{ asset('storage/img/chains/01.jpg') }}" alt="product_img" class="product_item_img">
                </div>
                <p class="product_item_article">"Кардинал"</p>
            </div>
        </div>
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <div class="product_item_img_wrp">
                    <img src="{{ asset('storage/img/chains/02.jpg') }}" alt="product_img" class="product_item_img">
                </div>
                <p class="product_item_article">"Итальянка"</p>
            </div>
        </div>
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <div class="product_item_img_wrp">
                    <img src="{{ asset('storage/img/chains/03.jpg') }}" alt="product_img" class="product_item_img">
                </div>
                <p class="product_item_article">"Бисмарк"</p>
            </div>
        </div>
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <div class="product_item_img_wrp">
                    <img src="{{ asset('storage/img/chains/04.jpg') }}" alt="product_img" class="product_item_img">
                </div>
                <p class="product_item_article">"Панцирное плетение"</p>
            </div>
        </div>
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <div class="product_item_img_wrp">
                    <img src="{{ asset('storage/img/chains/05.jpg') }}" alt="product_img" class="product_item_img">
                </div>
                <p class="product_item_article">"Панцирное плетение-2"</p>
            </div>
        </div>
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <div class="product_item_img_wrp">
                    <img src="{{ asset('storage/img/chains/06.jpg') }}" alt="product_img" class="product_item_img">
                </div>
                <p class="product_item_article">"Якорное плетение"</p>
            </div>
        </div>
    </div>

    <h2 class="main_content_title">Веревки</h2>

    <p class="main_content_text">
        Веревки изготавливаются вручную. Длина и тощина - в зависимости от Ваших пожеланий.
        Материал веревки капрон или кожа. Количество и модели вставок любые.
    </p>

    <div class="product_list">
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <img src="{{ asset('storage/img/chains/07.jpg') }}" alt="product_img" class="product_item_img">
            </div>
        </div>
        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="product_item_body">
                <img src="{{ asset('storage/img/chains/08.jpg') }}" alt="product_img" class="product_item_img">
            </div>
        </div>
    </div>



@endsection