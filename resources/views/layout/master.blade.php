<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8"/>
    <meta content="503d8909f76eb7ce" name="yandex-verification"/>
    <meta content="w3xT4haMqIDKUGh6FQvWDSkPFwCsRMC0Xe4gzOZhLqQ" name="google-site-verification"/>
    <meta content="width=960, initial-scale=1, maximum-scale=1, minimal-ui" name="viewport"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="Курсомир" itemprop="name"/>
    <meta content="summary" name="twitter:card"/>
    <meta content="Курсомир" name="twitter:site"/>
    <meta content='Хочу помочь проекту "Курсомир"' name="twitter:title"/>
    <meta content="kursomir.ru" name="twitter:domain"/>
    <meta content="Курсомир" property="og:site_name"/>
    <meta content="http://kursomir.ru/login" property="og:url"/>
    <meta content="website" property="og:type"/>
    <meta content='Хочу помочь проекту "Курсомир"' property="og:title"/>
    <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык"
          property="og:description"/>
    <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык"
          name="twitter:description"/>
    <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык" itemprop="description"/>
    <meta content="http://kursomir.ru/images/kursomir.png" property="og:image"/>
    <meta content="http://kursomir.ru/images/kursomir.png" name="twitter:image:src"/>

    <title>Хочу помочь</title>
    <meta content="http://kursomir.ru/images/kursomir.png" itemprop="image"/>
    @include('layout.style')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body>

<div class="headline-wrapper">
    <nav class="headline">
        <div class="headline__item headline__left">
            <a class="headline-logo__link" href="https://kursomir.ru">
                <svg role="img" class="headline-logo" title="logo" width="140" height="35.9">
                    <use xlink:href="/images/icons.svg#logo"/>
                </svg>
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
    @yield('content')
</div>
</body>
</html>
