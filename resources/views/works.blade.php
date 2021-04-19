@extends('layouts.app')

@section('content')

    <h2 class="main_content_title">Наши работы</h2>

    <div class="main_content_body">

        <div class="works_list">
            @if($images)
                @foreach($images as $image)
                    <div class="works_item">
                        <img class="works_img" src="{{ asset('storage/img/works/'. $image->img) }}">
                    </div>
                @endforeach
            @else
                <p>Нет фото</p>
            @endif

            <div class="product_pagination">{{ $images->links() }}</div>
            <div class="mobile_product_pagination">{{ $images->onEachSide(0)->links() }}</div>
        </div>

    </div>

@endsection