@extends('layout.master')

@section('content')
    <div class="content">
        <div class="content_auth">
            <h3>Регистрация</h3>
            <form method="POST" id="register-form" action="{{ route('auth.register.create') }}">
                <input type="text" name="last_name" required="required" placeholder="Фамилия">
                <input type="text" name="first_name" required="required" placeholder="Имя">
                <input type="email" name="email" required="required" placeholder="Email"/>
                <input type="email" name="email_confirmation" required="required" placeholder="Подтверждение Email"/>
                <input type="password" name="password" required="required" placeholder="Пароль"/>
                <input type="password" name="password_confirmation" required="required" placeholder="Подтверждение пароля"/>
                <button type="submit" form="register-form" class="white_button">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
