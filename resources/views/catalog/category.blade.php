@extends('layouts.app')

@section('content')

    <h2>Категория: {{ $category }}</h2>

    <div class="product_list">
        @forelse($productsInCategory as $product)
            
            <div class="product_item col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="product_item_body">
                    <div class="product_item_img_wrp">
                        <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                    </div>
                    <p class="product_item_article">Артикул: {{ $product->article }}</p>
                </div>
            </div>

        @empty
            <p>В данной категории ничего не найдено</p>
        @endforelse

        <div class="product_pagination">{{ $productsInCategory->links() }}</div>
        <div class="mobile_product_pagination">{{ $productsInCategory->onEachSide(0)->links() }}</div>
            
    </div>

@endsection