@extends('layouts.app')

@section('title', '| Поиск')

@section('content')

    <h2 class="search_title">Результаты поиска</h2>

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

            <div class="empty_search">
                <div class="empty_search_wrp">
                    <p>К сожалению, по вашему запросу ничего не найдено. Проверьте правильность ввода или попробуйте изменить запрос.</p>
                    <div class="empty_search_btns">
                        <a href="/" class="empty_search_main_link">Вернуться на главную</a>
                        <a href="#" class="empty_search_catalog_link">Перейти в каталог</a>
                    </div>
                </div>
            </div>
            
        @endforelse       
            
    </div>

    <div class="product_pagination">{{ $products->appends(request()->input())->links() }}</div>
    <div class="mobile_product_pagination">{{ $products->appends(request()->input())->onEachSide(0)->links() }}</div>

@endsection