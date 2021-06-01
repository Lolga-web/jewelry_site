@extends('layouts.app')

@section('title', '| ' . $category->title)

@section('content')

    @include('catalog.breadcrumb')

    <p class="catalog_top_message">
        Обращаем Ваше внимание, что все изделия изготавливаются на заказ из золота или серебра по Вашим пожеланиям.
        Вставки возмоно сделать любые: фианиты разных цветов, драгоценные и полудрагоценные камни.
        Для уточнения стоимости изготовления,
        <a href="https://wa.me/79141699900?text=Здравствуйте%2C">пришлите нам фото/скриншот понравившейся модели с артикулом</a>.
    </p>

    @include('catalog.filters')

    <div class="product_pagination">{{ $products->appends(request()->input())->links() }}</div>
    <div class="mobile_product_pagination">{{ $products->appends(request()->input())->onEachSide(1)->links() }}</div>

    <div class="product_list">
        @forelse($products as $product)

            @if($category->id == 3)

            <div class="product_item col-lg-6 col-md-6 col-sm-12 col-12" style="height: 200px;">
                <div class="product_item_body">
                    <div class="product_item_img_wrp" style="height: 130px;">
                        <span class="load">Загрузка...</span>
                        <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                    </div>
                    <p class="product_item_article">Артикул: {{ $product->article }}</p>
                </div>
            </div>

            @else

            <div class="product_item col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="product_item_body">
                    <div class="product_item_img_wrp">
                        <span class="load">Загрузка...</span>
                        <img src="{{ asset('storage/img/catalog/' . $product->img) }}" alt="product_img" class="product_item_img">
                    </div>
                    <p class="product_item_article">Артикул: {{ $product->article }}</p>
                </div>
            </div>

            @endif

        @empty
            <div class="empty_catalog">
                <p>По заданным параметрам ничего не найдено.</p>
                <p>Попробуйте изменить параметры поиска.</p>
                <div class="empty_catalog_btns">
                    <a href="/">Вернуться на главную</a>
                    <a href="{{ route('catalog.index') }}">Перейти в каталог</a>
                </div>
            </div>
        @endforelse

    </div>

    <div class="product_pagination">{{ $products->appends(request()->input())->onEachSide(3)->links() }}</div>
    <div class="mobile_product_pagination">{{ $products->appends(request()->input())->onEachSide(1)->links() }}</div>

@endsection
