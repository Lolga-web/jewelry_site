@extends('layouts.app')

@section('content')

    @guest
        <p>У вас нет прав доступа к этой странице</p>
    @else 
        
        @if (Auth::user()->is_admin)

            <div class="main_content_top">
                <h2 class="main_content_title">Личный кабинет: Админ | Категории</h2>

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

                <h3 class="admin_category_title">Список категорий:</h3>

                <div class="admin_category_list">
                    @foreach($categories as $category)
                        <div class="admin_category_item">
                            {{ $category->title }}
                            <form class="admin_category_delete" action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="admin_category_delete_btn" type="image" src="{{ asset('storage/img/main/delete.png') }}">
                            </form>
                        </div>
                    @endforeach
                </div>

                <form class="admin_category_add_form" method="POST" action="{{ route('admin.categories.store') }}">
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

                    <button type="submit" class="btn btn-primary">
                       Добавить
                    </button> 
                </form>

                <h3 class="admin_category_title">Список подкатегорий:</h3>

                <div class="admin_category_list">
                    @foreach($subcategories as $subcategory)
                        <div class="admin_category_item">{{ $subcategory->title }}
                            <form class="admin_category_delete" action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="admin_category_delete_btn" type="image" src="{{ asset('storage/img/main/delete.png') }}">
                            </form>
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