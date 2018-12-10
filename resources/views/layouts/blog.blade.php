<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config("app.name") }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    </nav>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-8 offset-1">
                @yield('content')
            </div>
            <div class="col-md-3 mt-5">
                <h3 class="mt-4">Categorias</h3>
                <div class="list-group">
                    @foreach(\App\Models\Category::all() as $category)
                        <a href="#" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark p-2 text-center fixed-bottom">
        <a href="https://github.com/NiltonMorais">Developed by @Nilton Morais</a>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>