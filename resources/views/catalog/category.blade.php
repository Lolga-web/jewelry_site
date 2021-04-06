@extends('layouts.app')

@section('content')

    <h2>Категория: {{ $category }}</h2>

    <div class="product_list">
        @forelse($productsInCategory as $product)

            <div class="product_item col-md-3">
                <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_img">
                <p class="product_article">Артикул: {{ $product->article }}</p>
            </div>

        @empty
            <p>В данной категории ничего не найдено</p>
        @endforelse

        <div class="news_pagination">{{ $productsInCategory->links() }}</div>
            
    </div>

@endsection