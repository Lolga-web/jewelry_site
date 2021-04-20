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

                <div class="catalog_search">
                    <form class="catalog_search_form" action="{{ route('admin.search') }}" method="GET">
                        <input type="text" class="form-control" name="article">
                        <input type="submit" class="btn btn-primary" value="Найти">
                    </form>
                </div>

                <h3>Результаты поиска:</h3>

                <div class="product_list">
                    @forelse($products as $product)
                        
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
                                    <form class="admin_product_item_form" method="POST" action="{{ route('admin.catalog.update', $product->product_id) }}" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form_wrp">
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
                                                    @foreach($categories as $item)
                                                        <option @if ($item->id == $product->category_id) selected
                                                                @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                    <option @if ($product->category_id == 0) selected
                                                                @endif value="0">-</option>
                                                </select>                                
                                            </div>

                                            @foreach($subcategories as $subcategory)
                                                @if($subcategory->category_id == $product->category_id)
                                                    <div class="form-group admin_product_form_group">
                                                        <label for="admin_product_item_category" class="col-form-label text-md-right">Подкатегория:</label>
                                                        <select name="subcategory_id" id="admin_product_category" class="form-control">
                                                            @foreach($subcategories as $item)
                                                                @if($product->category_id == $item->category_id)
                                                                <option @if ($item->id == $product->subcategory_id) selected
                                                                    @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                                                @endif
                                                            @endforeach
                                                            <option @if ($product->subcategory_id == 0) selected
                                                                    @endif value="0">-</option>
                                                        </select>                                
                                                    </div>
                                                    @break
                                                @endif
                                            @endforeach

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

                                            <div class="form-group admin_product_form_group">
                                                <label for="admin_product_item_weight" class="col-form-label text-md-right">Приоритет:</label>
                                                @if($errors->has('priority'))
                                                    <div class="alert alert-danger" role="alert">
                                                        @foreach($errors->get('priority') as $error)
                                                            <p>{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <input id="admin_product_item_weight" type="number" class="form-control" name="priority" 
                                                    value="{{ $product->priority ?? '' }}">
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
                                        </div>
                                        
                                        <div class="form_wrp">
                                            <div class="form-group admin_product_item_filters">
                                                <div class="form-check">
                                                    <input name="stones" type="checkbox" value="1"
                                                        @if($product->stones == 1) checked @endif
                                                        id="admin_product_item_stones" class="form-check-input">
                                                    <label for="admin_product_item_stones">с камнями</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="nostones" type="checkbox" value="1"
                                                        @if($product->nostones == 1) checked @endif
                                                        id="admin_product_item_nostones" class="form-check-input">
                                                    <label for="admin_product_item_nostones">без камней</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="pearls" type="checkbox" value="1"
                                                        @if($product->pearls == 1) checked @endif
                                                        id="admin_product_item_pearls" class="form-check-input">
                                                    <label for="admin_product_item_pearls">с жемчугом</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="male" type="checkbox" value="1"
                                                        @if($product->male == 1) checked @endif
                                                        id="admin_product_item_male" class="form-check-input">
                                                    <label for="admin_product_item_male">мужские</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="female" type="checkbox" value="1"
                                                        @if($product->female == 1) checked @endif
                                                        id="admin_product_item_female" class="form-check-input">
                                                    <label for="admin_product_item_female">женские</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="newborn" type="checkbox" value="1"
                                                        @if($product->newborn == 1) checked @endif
                                                        id="admin_product_item_newborn" class="form-check-input">
                                                    <label for="admin_product_item_newborn">рождение</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="zodiac" type="checkbox" value="1"
                                                        @if($product->zodiac == 1) checked @endif
                                                        id="admin_product_item_zodiac" class="form-check-input">
                                                    <label for="admin_product_item_zodiac">знаки зодиака</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="love" type="checkbox" value="1"
                                                        @if($product->love == 1) checked @endif
                                                        id="admin_product_item_love" class="form-check-input">
                                                    <label for="admin_product_item_love">любовь</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="muslim" type="checkbox" value="1"
                                                        @if($product->muslim == 1) checked @endif
                                                        id="admin_product_item_muslim" class="form-check-input">
                                                    <label for="admin_product_item_muslim">мусульманские</label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="enamel" type="checkbox" value="1"
                                                        @if($product->enamel == 1) checked @endif
                                                        id="admin_product_item_enamel" class="form-check-input">
                                                    <label for="admin_product_item_enamel">эмаль</label>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">
                                                Изменить
                                            </button> 
                                        </div>
                                    </form>

                                </div>
                                <form class="admin_admin_catalog_btns" action="{{ route('admin.catalog.destroy', $product->product_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                            </div>
                        </div>

                    @empty
                        <p>В данной категории ничего не найдено</p>
                    @endforelse

                    <div class="product_pagination">{{ $products->appends(request()->input())->links() }}</div>
                    <div class="mobile_product_pagination">{{ $products->appends(request()->input())->onEachSide(0)->links() }}</div>
                        
                </div>

            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif
    
    @endguest

@endsection