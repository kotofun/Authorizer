@extends('layout.master')

@section('content')
    <div class="content">
        <div class="content_auth">
            <h3>Регистрация</h3>
            <form method="POST" id="register-form" action="{{ route('auth.register.create') }}">
                <input type="text" name="last_name" required="required" placeholder="Фамилия" value="{{ $last_name or '' }}">
                @include('auth.error', ['errors' => $errors->get('last_name')])
                <input type="text" name="first_name" required="required" placeholder="Имя" value="{{ $first_name or '' }}">
                @include('auth.error', ['errors' => $errors->get('first_name')])
                <input type="email" name="email" required="required" placeholder="Email" value="{{ $email or '' }}"/>
                @include('auth.error', ['errors' => $errors->get('email')])
                <input type="email" name="email_confirmation" required="required" placeholder="Подтверждение Email"/>
                @include('auth.error', ['errors' => $errors->get('email_confirmation')])
                <input type="password" name="password" required="required" placeholder="Пароль"/>
                @include('auth.error', ['errors' => $errors->get('password')])
                <input type="password" name="password_confirmation" required="required" placeholder="Подтверждение пароля"/>
                @include('auth.error', ['errors' => $errors->get('password_confirmation')])
                <button type="submit" form="register-form" class="white_button">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
