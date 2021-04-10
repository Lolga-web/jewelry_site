@extends('layouts.app')

@section('content')

    @guest
        <p>У вас нет прав доступа к этой странице</p>
    @else 
        
        @if (Auth::user()->is_admin)

            <div class="main_content_top">
                <h2 class="main_content_title">Личный кабинет: Админ | Каталог</h2>

                <div class="admin_logout_block">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="main_content_body">

                @include('admin.menu')

                <h3>Категория: {{ $category->title }}</h3>

                <div class="product_list">
                    @forelse($productsInCategory as $product)

                        @if($category->id == 3) 
                        
                        <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12" style="height: 200px;">
                            <div class="product_item_body">
                                <div class="product_item_img_wrp" style="height: 130px;">
                                    <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                                </div>
                                <p class="product_item_article">Артикул: {{ $product->article }}</p>
                                <p class="product_item_article">Вес: {{ $product->weight }}</p>
                                <form class="admin_catalog_btns" action="{{ route('admin.catalog.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.catalog.edit', $product) }}" type="button" class="btn btn-success">Редактировать</a>
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                            </div>
                        </div>

                        @else
                    
                        <div class="product_item col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="product_item_body">
                                <div class="product_item_img_wrp">
                                    <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                                </div>
                                <p class="product_item_article">Артикул: {{ $product->article }}</p>
                                <p class="product_item_article">Вес: {{ $product->weight }}</p>
                                <form class="admin_catalog_btns" action="{{ route('admin.catalog.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.catalog.edit', $product) }}" type="button" class="btn btn-success">Редактировать</a>
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                            </div>
                        </div>

                        @endif
                
                    @empty
                        <p>В данной категории ничего не найдено</p>
                    @endforelse

                    <div class="product_pagination">{{ $productsInCategory->links() }}</div>
                    <div class="mobile_product_pagination">{{ $productsInCategory->onEachSide(0)->links() }}</div>
                        
                </div>

            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif
    
    @endguest

@endsection