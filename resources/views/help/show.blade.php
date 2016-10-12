@extends('layout.master')

@inject('mapper', 'App\Services\RedirectMapper')

@section('content')
    <form method="post">
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
                                       name="help_value[]" value="{{ $snaked }}"
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
                <input type="text" name="additional_value" class="combobox__input">
            </div>
        </fieldset>
        <fieldset>
            <legend>Комментарий:</legend>
            <textarea name="comment" id="comment" rows="10"></textarea>
        </fieldset>
        <input type="submit" id="submit" value="Регистрация"{{ !empty($user)?:' disabled="disabled"' }}><br>
        <span class="description"><span class="required">*</span> - Обязательное к заполнению поле</span>
    </form>
    @include('help.scripts')
@endsection
