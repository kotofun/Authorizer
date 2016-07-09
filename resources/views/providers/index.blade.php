<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсомир</title>
</head>
<body>
<ul>
    <li><a href="{{ route('socialize.request', ['provider' => 'vkontakte']) }}">Вконтакте</a></li>
    <li><a href="{{ route('socialize.request', ['provider' => 'google']) }}">Google +</a></li>
    <li><a href="{{ route('socialize.request', ['provider' => 'facebook']) }}">Facebook</a></li>
    <li><a href="{{ route('socialize.request', ['provider' => 'twitter']) }}">Twitter</a></li>
</ul>
</body>
</html>
