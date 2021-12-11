<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/stile.css">

    <!--- Fonte do Google --->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!--- CSS Bootstrap --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/logo.png" alt="">
                </a>
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item"><a href="/dashboard" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="/products/create" class="nav-link">Cadastrar produtos</a></li>
                    <li class="nav-item"><a href="/products/category" class="nav-link">Cadastrar categoria</a></li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                            onclick="event.preventDefault()
                            this.closest('form').submit();" class="nav-link">Sair</a>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header> 
    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    
    <footer>
        <p>E-Commerce &copy; 2022</p>
    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>