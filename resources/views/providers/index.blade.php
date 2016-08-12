@extends('layout.master')

@section('content')
    <div class="content">
        <div class="content_auth">
            <h3>Авторизация</h3>
            <form method="POST" id="login-form">
                <input type="email" name="email" required="required" placeholder="Email"/>
                <input type="password" name="password" required="required" placeholder="Пароль"/>
                <button type="submit" form="login-form" class="white_button">Войти</button>
                <a href="#"><p class="cursive">Забыли пароль?</p></a>
            </form>

            <div class="content_auth_divider"></div>
            <p>Войти, используя аккаунты в социальных сетях:</p>
            <ul class="content_auth_social">
                <a href="{{ route('socialize.request', ['provider' => 'facebook']) }}">
                    <li class="content_auth_social-item fb-item"></li>
                </a>
                <a href="{{ route('socialize.request', ['provider' => 'vkontakte']) }}">
                    <li class="content_auth_social-item vk-item"></li>
                </a>
                <a href="{{ route('socialize.request', ['provider' => 'twitter']) }}">
                    <li class="content_auth_social-item tw-item"></li>
                </a>
                <a href="{{ route('socialize.request', ['provider' => 'google']) }}">
                    <li class="content_auth_social-item go-item"></li>
                </a>
                <div class="clear"></div>
            </ul>

            <div class="content_auth_divider"></div>
            <p>Еще не зарегистрированы?</p>
            <a href="#">
                <button type="button" class="orange_button">Регистрация</button>
            </a>
        </div>
    </div>

@endsection
