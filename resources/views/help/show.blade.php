@inject('mapper', 'App\Services\RedirectMapper')
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
    @include('help.style')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
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
    <form>
        <fieldset>
            <legend>Хочу помочь: <span class="required">*</span></legend>
            <ul class="help-list help-type">
                <li class="help-list__item">
                    <input type="radio" class="styled-box styled-box__radio with-sub-list" name="help_type"
                           id="help_translate"
                           value="help_translate">
                    <label for="help_translate">Переводить</label>
                    <ul class="help-list help-translate sub-list">
                        @foreach([
                            'Aeronautics/Astronautics',
                            'Anthropology',
                            'Architecture',
                            'Athletics/Physical Education',
                            'Biology/Biological Engineering',
                            'Brain/Cognitive Sciences',
                            'Chemistry/Chemical Engineering',
                            'Civil & Environmental Engineering',
                            'Comparative Media Studies',
                            'Concourse',
                            'Earth, Atmospheric & Planetary Sciences',
                            'Economics',
                            'Information Technology',
                            'Circuits & Electronics',
                            'Engineering Systems Division',
                            'Experimental Study Group',
                            'Global Studies & Languages',
                            'Health Sciences & Technology',
                            'History',
                            'Linguistics & Philosophy',
                            'Literature',
                            'Materials Science & Engineering',
                            'Mathematics',
                            'Mechanical Engineering',
                            'Media Arts & Sciences',
                            'Music & Theater Arts',
                            'Nanotechnology & Nanoscience',
                            'Nuclear Science & Engineering',
                            'Physics',
                            'Political Science',
                            'Science, Technology & Society',
                            'Sloan School of Management',
                            'Underactuated Robotics',
                            'Urban Studies & Planning',
                            'Writing & Humanistic Studies'
                            ] as $section)
                            <?php $snaked = snake_case(str_replace(['&', '/', ','], ' ', $section)); ?>
                            <li class="help-list__item">
                                <input type="checkbox" class="styled-box styled-box__check"
                                       name="help_translate[]" value="{{ $snaked }}"
                                       id="{{ $snaked }}">
                                <label for="{{ $snaked }}">{{ $section }}</label>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="help-list__item">
                    <input type="radio" class="styled-box styled-box__radio" name="help_type" id="help_edit"
                           value="help_edit">
                    <label for="help_edit">Редактировать</label>
                </li>
                <li class="help-list__item">
                    <input type="radio" class="styled-box styled-box__radio" name="help_type" id="help_latex"
                           value="help_latex">
                    <label for="help_latex">Верстать в LaTeX</label>
                </li>
                <li class="help-list__item">
                    <input type="radio" class="styled-box styled-box__radio" name="help_type" id="help_video"
                           value="help_video">
                    <label for="help_video">Заниматься видеомонтажом</label>
                </li>
                <li class="help-list__item">
                    <input type="radio" class="styled-box styled-box__radio" name="help_type" id="help_develop"
                           value="help_develop">
                    <label for="help_develop">Заниматься разработкой</label>
                </li>
                <li class="help-list__item">
                    <input type="radio" class="styled-box styled-box__radio" name="help_type" id="help_design"
                           value="help_design">
                    <label for="help_design">Заниматься дизайном</label>
                </li>
            </ul>
        </fieldset>
        <fieldset>
            <legend>Со мной можно связаться: <span class="required">*</span></legend>
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
        </fieldset>
        <fieldset>
            <legend>Дополнительный контакт:</legend>
            <div class="combobox">
                <select name="additional_type" id="additional_type">
                    <option value="email">Email</option>
                    <option value="telegram">Telegram</option>
                </select>
                <div class="dropdown__container">
                    <span class="dropdown__selected" data-value="email">Email</span>
                    <div class="dropdown">
                        <span class="dropdown__item dropdown__item_active" data-value="email">Email</span>
                        <span class="dropdown__item" data-value="telegram">Telegram</span>
                    </div>
                </div>
                <input type="text" name="additional" class="combobox__input">
            </div>
        </fieldset>
        <fieldset>
            <legend>Комментарий:</legend>
            <textarea name="comment" id="comment" rows="10"></textarea>
        </fieldset>
        <input type="submit" id="submit" value="Регистрация"><br>
        <span class="description"><span class="required">*</span> - Обязательное к заполнению поле</span>
    </form>
</div>
@include('help.scripts')
</body>
</html>
