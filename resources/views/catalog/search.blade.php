@extends('layouts.app')

@section('title', '| Поиск')

@section('content')

    <div class="product_list">
        @forelse($products as $product)
        
            <div class="product_item col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="product_item_body">
                    <div class="product_item_img_wrp">
                        <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                    </div>
                    <p class="product_item_article">Артикул: {{ $product->article }}</p>
                </div>
            </div>
    
        @empty
            <p>К сожалению, по вашему запросу ничего не найдено. Проверьте правильность ввода или попробуйте изменить запрос.</p>
        @endforelse       
            
    </div>

    <div class="product_pagination">{{ $products->appends(request()->input())->links() }}</div>
    <div class="mobile_product_pagination">{{ $products->appends(request()->input())->onEachSide(0)->links() }}</div>

@endsection