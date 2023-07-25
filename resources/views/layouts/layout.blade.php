<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>
        @section('title')
        {{ $title }}
        @show
    </title>

    <link rel="icon" href="{{asset("img/db.png")}}">

    <link rel="stylesheet" href="{{asset("css/styles.css")}}">

  </head>
  <body>

<header data-bs-theme="dark">

@section('header')
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>Сайт-БД</h4>
          <p class="text-body-secondary">Этот сайт сделан с единственной целью - создать что-то реально работающее</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Навигация</h4>

          {{-- Показ содержимого в зависимости от того авторизован ли он --}}

          @auth
          <ul class="list-unstyled">
            <li>
                <a href="">
                  {{auth()->user()->name}}
                  @if (auth()->user()->avatar)
                      <img src="{{asset('storage/' . auth()->user()->avatar)}}" height="40px" alt="">
                  @endif
                </a>
            </li>

              @if(auth()->user()->isAdmin)
                  <li>
                      <a href="{{ route(('admin')) }}" style="color: #00D464">Админская зона</a>
                  </li>
              @endif

            <li><a href="{{ route(('logout')) }}" class="text-white">Выйти из системы</a></li>

            <hr>

            <li><a href="{{ route(('posts.index')) }}" class="text-white">Все статьи</a></li>
            <li><a href="{{ route(('posts.create')) }}" class="text-white">Добавить новую статью</a></li>

            <hr>

            <li><a href="{{ route(('images.index')) }}" class="text-white">Галерея фото</a></li>
            <li><a href="{{ route(('images.create')) }}" class="text-white">Добавить фото</a></li>

            <hr>

            <li><a href="{{ route(('test')) }}" class="text-white">Тестовая страница</a></li>
            <li><a href="{{ route(('send')) }}" class="text-white">Отправить сообщение</a></li>
            <li><a href="" class="text-white">1</a></li>

          </ul>
          @endauth

          @guest
          <ul class="list-unstyled">
            <li><a href="{{ route(('register.create')) }}" class="text-white">Регистрация</a></li>
            <li><a href="{{ route(('login')) }}" class="text-white">Авторизация</a></li>
          </ul>
          @endguest

        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="{{ route(('home')) }}" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Главная</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
@show
</header>

<main>
    <div class="container my-2">
      @include('layouts.alerts')
      @yield('content')
    </div>
</main>

@include('layouts.footer')

</body>
</html>
