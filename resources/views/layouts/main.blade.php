<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!--- Fonte do Google --->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!--- CSS Bootstrap --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse">
                <a href="/">
                    <img src="#" alt="">
                </a>
                <ul>
                    @auth
                    <li class="nav-item"><a href="/products/create">Cadastrar produtos</a></li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                            onclick="event.preventDefault()
                            this.closest('form').submit();">Sair</a>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <li>
                        <a href="/login">Entrar</a>
                        <a href="/register">Cadastrar</a>
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