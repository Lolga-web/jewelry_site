@extends('layouts.app')

@section('title', '| наши работы')

@section('content')

    @include('breadcrumb', ['title' => 'наши работы'])

    <h2 class="main_content_title">Фото наших работ</h2>

    <div class="main_content_body">

        <div class="works_container">
            <div class="product_pagination">{{ $images->links() }}</div>
            <div class="mobile_product_pagination">{{ $images->onEachSide(0)->links() }}</div>

            <div class="works_list">
                @if($images)
                    @foreach($images as $image)
                        <div class="works_item">
                            <div class="works_img_wrp">
                                <img class="works_img" src="{{ asset('storage/img/works/'. $image->img) }}">
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Нет фото</p>
                @endif
            </div>

            <div class="product_pagination">{{ $images->links() }}</div>
            <div class="mobile_product_pagination">{{ $images->onEachSide(0)->links() }}</div>
        </div>

    </div>

@endsection