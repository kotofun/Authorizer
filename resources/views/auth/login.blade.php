@extends('layout.master')

@inject('mapper', 'App\Services\RedirectMapper')

@section('content')
    <p>Авторизуйтесь</p>
    <ul class="social">
        <li class="social__item{{ !empty($user) && in_array('facebook', $user['authored_providers']) ? " social__item_style_authored" : '' }}">
            <a href="{{ route('socialize.request', ['provider' => 'facebook', 'r' => $mapper->getRedirectHere()]) }}">
                <svg role="img" title="Facebook social account" width="40" height="40">
                    <use xlink:href="/images/icons.svg#social-fb"/>
                </svg>
            </a>
        </li>
        <li class="social__item{{ !empty($user) && in_array('vkontakte', $user['authored_providers']) ? " social__item_style_authored" : '' }}">
            <a href="{{ route('socialize.request', ['provider' => 'vkontakte', 'r' => $mapper->getRedirectHere()]) }}">
                <svg role="img" title="VKontakte social account" width="40" height="40">
                    <use xlink:href="/images/icons.svg#social-vk"/>
                </svg>
            </a>
        </li>
        <li class="social__item{{ !empty($user) && in_array('google', $user['authored_providers']) ? " social__item_style_authored" : '' }}">
            <a href="{{ route('socialize.request', ['provider' => 'google', 'r' => $mapper->getRedirectHere()]) }}">
                <svg role="img" title="Google + social account" width="40" height="40">
                    <use xlink:href="/images/icons.svg#social-gp"/>
                </svg>
            </a>
        </li>
    </ul>
@endsection
