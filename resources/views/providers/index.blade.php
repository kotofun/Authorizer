<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta content="503d8909f76eb7ce" name="yandex-verification" />
      <meta content="w3xT4haMqIDKUGh6FQvWDSkPFwCsRMC0Xe4gzOZhLqQ" name="google-site-verification" />
      <meta content="width=960px, initial-scale=1, maximum-scale=1, minimal-ui" name="viewport" />
      <meta content="IE=edge" http-equiv="X-UA-Compatible" />
      <meta content="Курсомир" itemprop="name" />
      <meta content="summary" name="twitter:card" />
      <meta content="Курсомир" name="twitter:site" />
      <meta content="Вход" name="twitter:title" />
      <meta content="kursomir.ru" name="twitter:domain" />
      <meta content="Курсомир" property="og:site_name" />
      <meta content="http://kursomir.ru/login" property="og:url" />
      <meta content="website" property="og:type" />
      <meta content="Вход" property="og:title" />
      <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык" property="og:description" />
      <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык" name="twitter:description" />
      <meta content="Мы - сообщество людей, желающих сделать перевод лекций MIT на русский язык" itemprop="description" />
      <meta content="http://kursomir.ru/images/kursomir.png" property="og:image" />
      <meta content="http://kursomir.ru/images/kursomir.png" name="twitter:image:src" />
      <meta name="csrf-param" content="authenticity_token" />
      <meta name="csrf-token" content="NQm4M+XSLpgFgXd8jedcvK2t5fdONeS1opOcc9xOA0c+d6H6hpa/6I9bL+U1e7h/VocleRYotF/lustkS2QJdw==" />

      <title>Вход</title>
      <link href="{{ URL::asset('css/master.css') }}" rel="stylesheet" type="text/css" />
      <meta content="http://kursomir.ru/images/kursomir.png" itemprop="image" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,300,300italic,700,700italic" rel="stylesheet" />
   </head>
   <body>
      <header></header>
      <div class="content">
         <div class="content_auth">
            <h3>Авторизация</h3>
            <form method="post" id="login-form">
               <input type="text" name="username" required="" placeholder="Логин"/>
               <input type="password" name="userpass" required="" placeholder="Пароль"/>
               <button type="submit" form="login-form" class="white_button">Войти</button>
               <a href="#"><p class="cursive">Забыли пароль?</p></a>
               
               <div class="content_auth_divider"></div>
               <p>Войти, используя аккаунты в социальных сетях:</p>
               <ul class="content_auth_social">
                  <a href="{{ route('socialize.request', ['provider' => 'facebook']) }}"><li class="content_auth_social-item fb-item"></li></a>
                  <a href="{{ route('socialize.request', ['provider' => 'vkontakte']) }}"><li class="content_auth_social-item vk-item"></li></a>
                  <a href="{{ route('socialize.request', ['provider' => 'twitter']) }}"><li class="content_auth_social-item tw-item"></li></a>
				  <a href="{{ route('socialize.request', ['provider' => 'google']) }}"><li class="content_auth_social-item go-item"></li></a>
                  <div class="clear"></div>
               </ul>
               
               <div class="content_auth_divider"></div>
               <p>Еще не зарегистрированы?</p>
               <a href="#"><button type="button" class="orange_button">Регистрация</button></a>
            </form>
         </div>
      </div>
      <footer>
         <div class="container">
            <a href="https://kursomir.ru"><div class="logo"></div></a>
            <p>Copyright © 2016 Курсомир</p>        
         </div>
      </footer>
   </body>
</html>