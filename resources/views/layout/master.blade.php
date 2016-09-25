<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta content="503d8909f76eb7ce" name="yandex-verification"/>
    <meta content="w3xT4haMqIDKUGh6FQvWDSkPFwCsRMC0Xe4gzOZhLqQ" name="google-site-verification"/>
    <meta content="width=960px, initial-scale=1, maximum-scale=1, minimal-ui" name="viewport"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="Курсомир" itemprop="name"/>
    <meta content="summary" name="twitter:card"/>
    <meta content="Курсомир" name="twitter:site"/>
    <meta content="Вход" name="twitter:title"/>
    <meta content="kursomir.ru" name="twitter:domain"/>
    <meta content="Курсомир" property="og:site_name"/>
    <meta content="http://kursomir.ru/login" property="og:url"/>
    <meta content="website" property="og:type"/>
    <meta content="Вход" property="og:title"/>
    <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык"
          property="og:description"/>
    <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык"
          name="twitter:description"/>
    <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык" itemprop="description"/>
    <meta content="http://kursomir.ru/images/kursomir.png" property="og:image"/>
    <meta content="http://kursomir.ru/images/kursomir.png" name="twitter:image:src"/>

    <title>Хочу помочь</title>
    <meta content="http://kursomir.ru/images/kursomir.png" itemprop="image"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
    <style>
        html {
            font-family: 'Open Sans', sans-serif;
        }

        .headline-wrapper {
            height: 480px;
            background: #f07066 url("/images/robo.svg") 50% 90px no-repeat;
        }

        .headline {
            display: block;
            height: 80px;
            background: #fff;
            padding: 0 18.5714285714%;
        }

        .headline__item {
            display: inline-block;
            height: 80px;
            width: auto;
        }

        .headline__left {
            float: left;
        }

        .headline-logo {
            vertical-align: middle;
        }

        .headline-logo__link {
            display: inline-block;
            line-height: 80px;
            height: 80px;
        }

        .headline__right {
            float: right;
        }

        .headline__bar {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .headline__bar-item {
            display: inline-block;
            margin-left: 45px;
            height: 80px;
            line-height: 80px;
        }

        .headline__bar-item:first-child {
            margin-left: 0;
        }

        .headline__bar-link {
            text-decoration: none;
            color: #333333;
            display: inline-block;
        }

        .headline__bar-link:hover,
        .headline__bar-link:active,
        .headline__bar-item_active {
            cursor: pointer;
            color: #ec4e42;
            border-bottom: 2px solid #ec4e42;
            height: 78px;
        }

        fieldset {
            border: none;
            margin: 50px 0 0;
            padding: 0;
        }

        fieldset:first-child {
            margin: 0;
        }

        legend {
            font-weight: bold;
            margin-bottom: 16px;
        }

        .content-wrapper {
            padding: 40px;
            display: block;
            width: 42.8571428571%;
            margin: -100px auto 0;
            background-color: #fff;
        }

        .help-type {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .help-type__item {
            display: block;
            margin-top: 10px;
        }

        .help-type__item:first-child {
            margin-top: 0;
        }

        input[type='radio'].help-type__radio {
            display: none;
        }

        input[type='radio'].help-type__radio + label {
            position: relative;
            cursor: pointer;
            display: inline-block;
            padding-left: 25px;
        }

        input[type='radio'].help-type__radio + label:before,
        input[type='radio'].help-type__radio + label:after {
            content: "";
            display: inline-block;
            width: 14px;
            height: 14px;
            margin-right: 10px;
            position: absolute;
            left: 0;
            bottom: 1px;
            background-color: transparent;
            border-radius: 15px;
            border: 1px solid #cccccc;
        }

        input[type='radio'].help-type__radio + label:after {
            border: none;
            display: none;
        }

        input[type='radio'].help-type__radio + label:hover:before {
            border-color: #ec4e42;
        }

        input[type='radio'].help-type__radio:checked + label:before {
            width: 16px;
            height: 16px;
            background: #ec4e42;
            border: none;
        }

        input[type='radio'].help-type__radio:checked + label:after {
            content: "";
            display: inline-block;
            width: 6px;
            height: 6px;
            background-color: #fff;
            left: 5px;
            bottom: 6px;
        }

        .social {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .social__item {
            display: inline-block;
            margin-left: 20px;
            line-height: 0;
        }

        .social__item:first-child {
            margin-left: 0;
        }

        .social__icon {
            width: 45px;
            height: 45px;
            display: inline-block;
            background: url("/images/icons.png");
            cursor: pointer;
        }

        .socials__icon_vk {
            background-position: -45px;
        }

        .socials__icon_gp {
            background-position: -180px;
        }

        #submit {
            padding: 15px;
            background: #ec4e42;
            border: none;
            font-weight: bold;
            color: #fff;
            font-size: 16px;
            margin-bottom: 16px;
        }

        #submit:hover {
            cursor: pointer;
            background: #d74d41;
        }

        .additional {
            padding-left: 100px;
            height: 40px;
            width: 300px;
        }

        textarea {
            border: 1px solid #cccccc;
            width: 520px;
            height: 80px;
            margin-bottom: 20px;
        }

        .description {
            color: #cccccc;
            font-size: 10px;
        }
    </style>
</head>
<body>

<div class="headline-wrapper">
    <nav class="headline">
        <div class="headline__item headline__left">
            <a class="headline-logo__link" href="https://kursomir.ru">
                <img class="headline-logo" src="/images/logo.svg" alt="Курсомир">
            </a>
        </div>
        <div class="headline__item headline__right">
            <ul class="headline__bar">
                <li class="headline__bar-item"><a href="#" class="headline__bar-link">Курсы</a></li>
                <li class="headline__bar-item"><a href="#" class="headline__bar-link">Новости</a></li>
                <li class="headline__bar-item"><a href="#" class="headline__bar-link">О проекте</a></li>
                <li class="headline__bar-item headline__bar-item_active">Хочу помочь</li>
            </ul>
        </div>
    </nav>
</div>

<div class="content-wrapper">
    <form>
        <fieldset>
            <legend>Хочу помочь:</legend>
            <ul class="help-type">
                <li class="help-type__item">
                    <input type="radio" class="help-type__radio" name="help_type" id="help_translate"
                           value="help_translate">
                    <label for="help_translate">Переводить</label>
                </li>
                <li class="help-type__item">
                    <input type="radio" class="help-type__radio" name="help_type" id="help_edit" value="help_edit">
                    <label for="help_edit">Редактировать</label>
                </li>
                <li class="help-type__item">
                    <input type="radio" class="help-type__radio" name="help_type" id="help_latex" value="help_latex">
                    <label for="help_latex">Верстать в LaTeX</label>
                </li>
                <li class="help-type__item">
                    <input type="radio" class="help-type__radio" name="help_type" id="help_video" value="help_video">
                    <label for="help_video">Заниматься видеомонтажом</label>
                </li>
                <li class="help-type__item">
                    <input type="radio" class="help-type__radio" name="help_type" id="help_develop"
                           value="help_develop">
                    <label for="help_develop">Заниматься разработкой</label>
                </li>
                <li class="help-type__item">
                    <input type="radio" class="help-type__radio" name="help_type" id="help_design" value="help_design">
                    <label for="help_design">Заниматься дизайном</label>
                </li>
            </ul>
        </fieldset>
        <fieldset>
            <legend>Со мной можно связаться:</legend>
            <ul class="social">
                <li class="social__item">
                    <a class="social__icon socials__icon_fb"
                       href="{{ route('socialize.request', ['provider' => 'facebook']) }}"></a>
                </li>
                <li class="social__item">
                    <a class="social__icon socials__icon_vk"
                       href="{{ route('socialize.request', ['provider' => 'vkontakte']) }}"></a>
                </li>
                <li class="social__item">
                    <a class="social__icon socials__icon_gp"
                       href="{{ route('socialize.request', ['provider' => 'google']) }}"></a>
                </li>
            </ul>
        </fieldset>
        <fieldset>
            <legend>Дополнительный контакты:</legend>
            <div>
                <input type="text" name="additional" class="additional">
            </div>
        </fieldset>
        <fieldset>
            <legend>Комментарий:</legend>
            <textarea name="comment" id="comment" rows="10"></textarea>
        </fieldset>
        <input type="submit" id="submit" value="Регистрация"><br>
        <span class="description">* - Обязательное к заполнению поле</span>
    </form>
</div>

</body>
</html>
