<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Admin {{ config("app.name") }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="{{'nav-item '.active('admin.index')}}">
                    <a class="nav-link" href="{{ route('admin.index') }}">Home</a>
                </li>
                <li class="{{'nav-item '.active('admin.posts.*')}}">
                    <a class="nav-link" href="{{ route('admin.posts.index') }}">Posts</a>
                </li>
                <li class="{{'nav-item '.active('admin.categories.*')}}">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">Categorias</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container clearfix mb-5">
        <nav class="mt-2" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin</a></li>
                @if (is_active('admin.posts.*'))
                    <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Post</a></li>
                @endif
                @if (is_active('admin.categories.*'))
                    <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categoria</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </nav>

        <h1 class="mb-4">@yield('title')</h1>
        @yield('content')
    </div>
    <footer class="bg-dark p-2 text-center fixed-bottom">
        <a href="https://github.com/NiltonMorais">Developed by @Nilton Morais</a>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>