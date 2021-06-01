@extends('layouts.app')

@section('title', '| личный кабинет')

@section('content')

    @guest
        <p>У вас нет прав доступа к этой странице</p>
    @else

        @if (Auth::user()->is_admin)

            @include('admin.breadcrumb')

            <div class="main_content_body">

                @include('admin.menu')

                <h3 class="admin_category_title">Список подкатегорий:</h3>

                <div class="admin_category_list">
                    @foreach($subcategories as $subcategory)
                        <div class="admin_category_item">
                            <form class="admin_category_delete" action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="admin_category_delete_btn" type="image" src="{{ asset('storage/img/main/delete.png') }}">
                            </form>
                            <img class="admin_category_img" src="{{ asset('storage/img/catalog/' . $subcategory->img) }}" alt="subcategory-img">
                            <div class="admin_category_item_text">
                                <form class="admin_category_edit_form" method="POST" action="{{ route('admin.subcategories.update', $subcategory->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input class="admin_category_edit_title" type="text" class="form-control" name="title"
                                        value="{{ $subcategory->title ?? '' }}" placeholder="Название...">
                                    <input id="admin_category_add_img" class="admin_category_add_title" type="text" class="form-control" name="img"
                                        value="{{ $subcategory->img ?? '' }}" placeholder="Изображение...">
                                        <button type="submit" class="btn btn-success">
                                            Изменить
                                         </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form class="admin_category_add_form" method="POST" action="{{ route('admin.subcategories.store') }}">
                    @csrf
                    <div class="form-group admin_category_form_group">
                        <label for="admin_category_add_title" class="col-form-label text-md-right">Название:</label>
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <input id="admin_category_add_title" class="admin_category_add_title" type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group admin_category_form_group">
                        <label for="admin_category_add_img" class="col-form-label text-md-right">Изображение:</label>
                        @if($errors->has('img'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('img') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <input id="admin_category_add_img" class="admin_category_add_title" type="text" class="form-control" name="img">
                    </div>

                    <div class="form-group admin_category_form_group">
                        <label for="admin_category_add_category" class="col-form-label text-md-right">Категория:</label>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <select name="category_id" id="admin_category_add_category" class="form-control">
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                       Добавить
                    </button>
                </form>

            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif

    @endguest

@endsection
