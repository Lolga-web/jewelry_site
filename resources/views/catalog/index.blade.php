@extends('layouts.app')

@section('title', '| Каталог')

@section('content')

    @include('catalog.breadcrumb')

    <h2 class="catalog_title">Каталог</h2>

    <div class="catalog_list">
        @if($categories)
            @foreach($categories as $category)
                <h3 class="catalog_category_title">{{ $category->title }}</h3>
                @if($subcategories)
                    <div class="catalog_subcategory_list">
                        @foreach($subcategories as $subcategory)
                            @if($category->id == $subcategory->category_id)
                                <a class="catalog_subcategory_link col-lg-3 col-md-4 col-sm-6 col-6" 
                                    href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => $subcategory->slug]) }}">
                                    <div class="catalog_subcategory_item">
                                        <div class="catalog_subcategory_img_wrp">
                                            <img src="{{ asset('storage/img/catalog/' . $subcategory->img) }}" alt="subcategory_img" class="catalog_subcategory_img">
                                        </div>
                                        <p class="catalog_subcategory_title">{{ $subcategory->title }}</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        <a href="{{ route('catalog.category.show', $category->slug) }}" class="catalog_subcategory_link col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="catalog_subcategory_item">
                                <div class="catalog_subcategory_img_wrp">
                                    <img src="" alt="subcategory_img" class="catalog_subcategory_img">
                                </div>
                                <p class="catalog_subcategory_title">все {{ $category->title }}</p>
                            </div>
                        </a>
                        <div class="empty"></div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

@endsection