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

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Имя пользователя</label>

                            <div class="col-md-6">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('email') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Текущий пароль </label>

                            <div class="col-md-6">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('password') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Новый пароль</label>

                            <div class="col-md-6">
                                @if ($errors->has('newPassword'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('newPassword') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input id="password-confirm" type="password" class="form-control" name="newPassword">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Изменить профиль
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        @else
            <p>У вас нет прав доступа к этой странице</p>
        @endif
    
    @endguest

@endsection