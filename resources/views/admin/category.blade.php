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

                <h3 class="admin_category_title">Список категорий:</h3>

                <div class="admin_category_list">
                    @foreach($categories as $category)
                        <div class="admin_category_item">
                            <div class="admin_category_item_text">
                                {{ $category->title }}
                                <form class="admin_category_delete" action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="admin_category_delete_btn" type="image" src="{{ asset('storage/img/main/delete.png') }}">
                                </form>
                            </div>
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

            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif

    @endguest

@endsection
