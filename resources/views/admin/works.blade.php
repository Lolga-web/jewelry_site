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

                <form class="admin_works_add_form" method="POST" action="{{ route('admin.works.store') }}" 
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="file" name="img">
                    </div>
                    @if ($errors->has('image'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('image') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group admin_works_form_group">
                        <label for="admin_works_item_priority" class="col-form-label text-md-right">Приоритет:</label>
                        @if($errors->has('priority'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('priority') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <input id="admin_works_item_priority" class="admin_works_item_priority" type="number" class="form-control" name="priority" value="0">
                    </div>

                    <button type="submit" class="btn btn-primary add_news_btn">
                       Добавить
                    </button> 
                </form>

                <div class="admin_works_list">
                    @if($images)
                        @foreach($images as $image)

                            <div class="admin_works_item">
                                <img class="admin_works_img" src="{{ asset('storage/img/works/'. $image->img) }}">
                                <form class="admin_works_delete" action="{{ route('admin.works.destroy', $image) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="admin_works_delete_btn" type="image" src="{{ asset('storage/img/main/delete.png') }}">
                                </form>
                                <form class="admin_works_item_form" method="POST" action="{{ route('admin.works.update', $image) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group admin_works_form_group">
                                        <label for="admin_works_item_priority" class="col-form-label text-md-right">Приоритет:</label>
                                        @if($errors->has('priority'))
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->get('priority') as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                        <input id="admin_works_item_priority" class="admin_works_item_priority" type="number" class="form-control" name="priority" 
                                            value="{{ $image->priority ?? '' }}">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Изменить">
                                </form>
                            </div>

                        @endforeach
                    @else
                        <p>Нет фото</p>
                    @endif
                </div>
                    <div class="product_pagination">{{ $images->links() }}</div>
                    <div class="mobile_product_pagination">{{ $images->onEachSide(0)->links() }}</div>
            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif
    
    @endguest

@endsection