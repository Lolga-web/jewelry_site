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
                        
                        <div class="admin_product_item col-lg-12">
                            <div class="admin_product_item_body">
                                <div class="admin_product_item_img_wrp">
                                    <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                                </div>
                                <div class="admin_product_item_param">
                                    <div class="form-group admin_product_form_group">
                                        <label for="admin_product_item_article" class="col-form-label text-md-right">Артикул:</label>
                                        <p class="admin_product_item_article">{{ $product->article }}</p>
                                    </div>
                                    <form method="POST" action="{{ route('admin.catalog.update', $product) }}" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group admin_product_form_group">
                                            <label for="admin_product_item_category" class="col-form-label text-md-right">Категория:</label>
                                            @if ($errors->has('category_id'))
                                                <div class="alert alert-danger" role="alert">
                                                    @foreach ($errors->get('category_id') as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </div>
                                            @endif
                                            <select name="category_id" id="admin_product_category" class="form-control">
                                                @forelse($categories as $item)
                                                    <option @if ($item->id == $category->id) selected
                                                            @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                                @empty
                                                    <option value="0">Нет категорий</option>
                                                @endforelse
                                            </select>                                
                                        </div>

                                        <div class="form-group admin_product_form_group">
                                            <label for="admin_product_item_weight" class="col-form-label text-md-right">Вес:</label>
                                            @if($errors->has('weight'))
                                                <div class="alert alert-danger" role="alert">
                                                    @foreach($errors->get('weight') as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <input id="admin_product_item_weight" type="text" class="form-control" name="weight" 
                                                value="{{ $product->weight ?? '' }}">
                                        </div>

                                        <div class="admin_product_item_filters">
                                            @foreach($filters as $item)
                                                <div class="form-check">
                                                    <input 
                                                        name="{{ $item->title }}" type="checkbox" value="1"
                                                        id="admin_product_item_{{ $item->title }}" class="form-check-input">
                                                    <label for="admin_product_item_{{ $item->title }}">{{ $item->title }}</label>
                                                </div>
                                                @if ($errors->has('{{ $item->title }}'))
                                                    <div class="alert alert-danger" role="alert">
                                                        @foreach ($errors->get('{{ $item->title }}') as $error)
                                                            {{ $error }}
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="form-group admin_product_form_img">
                                            <label for="admin_product_item_img" class="col-form-label text-md-right">Изображение:</label>
                                            <input id="admin_product_item_img" type="file" name="img">
                                        </div>
                                        @if ($errors->has('img'))
                                            <div class="alert alert-danger" role="alert">
                                                @foreach ($errors->get('img') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif

                                        <button type="submit" class="btn btn-primary">
                                            Изменить
                                        </button> 
                                    </form>

                                </div>
                                <form class="admin_admin_catalog_btns" action="{{ route('admin.catalog.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                            </div>
                        </div>

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