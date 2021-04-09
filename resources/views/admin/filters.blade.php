@extends('layouts.app')

@section('content')

    @guest
        <p>У вас нет прав доступа к этой странице</p>
    @else 
        
        @if (Auth::user()->is_admin)

            <div class="main_content_top">
                <h2 class="main_content_title">Личный кабинет: Админ | Фильтры</h2>

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

            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif
    
    @endguest

@endsection