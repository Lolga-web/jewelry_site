@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Каталог</li>
            <li class="breadcrumb-item" @if(!$subcategory) aria-current="page" @endif>
                @if($subcategory)
                    <a href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => null]) }}">{{ $category->title }}</a>
                @else
                    {{ $category->title }}
                @endif
            </li>
            @if($subcategory)
                <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->title }}</li>
            @endif
        </ol>
    </nav>

    @include('catalog.filters')

    <div class="product_list">
        @forelse($productsInCategory as $product)

            @if($category->id == 3) 
            
            <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12" style="height: 200px;">
                <div class="product_item_body">
                    <div class="product_item_img_wrp" style="height: 130px;">
                        <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                    </div>
                    <p class="product_item_article">Артикул: {{ $product->article }}</p>
                </div>
            </div>

            @else
        
            <div class="product_item col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="product_item_body">
                    <div class="product_item_img_wrp">
                        <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                    </div>
                    <p class="product_item_article">Артикул: {{ $product->article }}</p>
                </div>
            </div>

            @endif
    
        @empty
            <p>В данной категории ничего не найдено</p>
        @endforelse       
            
    </div>

    <div class="product_pagination">{{ $productsInCategory->appends(request()->input())->links() }}</div>
    <div class="mobile_product_pagination">{{ $productsInCategory->appends(request()->input())->onEachSide(0)->links() }}</div>

@endsection