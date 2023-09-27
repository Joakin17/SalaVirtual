<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title style="color: white;">Préstamos de Salas Biblioteca</title>
    
    <link rel="icon" href="{{ asset('imgs/logou.png') }}" type="image/png">
    
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
   
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-custom-red shadow-sm">
<a class="navbar-brand text-white" href="{{ route('home') }}">
    <img src="{{ asset('imgs/logou.png') }}" alt="Logo" style="width: 75px;"> Biblioteca Miguel de Cervantes
</a>

            <div class="container">
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                <ul class="nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">
                            Home
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/prestamocompus">
                            Sala Virtual
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/prestamosalas">
                            Salas de Estudio
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-button" href="{{ route('estadistica') }}">
                            Estadísticas
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-button" href="/usuarios">
                            Usuarios
                        </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif
    
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle username" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>                  
                </ul>
            </div>
            <style>
                
        /* Estilos para el nav */
    .navbar {
        padding: 15px 0;
        text-align: center;
    }
    .bg-custom-red {
        background-color: #333333; 
    }
    
        .navbar::before {
            content: "";
            position: absolute;
            top: -30px;
            left: 0;
            right: 0;
            height: 50px;
            background-color: #F6C03D; 
            border-radius: 50%;
        }
        .navbar .nav-link {
            color: #9D2720;
            background-color: #F6C03D;
            padding: 8px 16px;
            margin: 3px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            
        }
        .navbar .nav-link:hover {
            background-color: #9D2720;
            color: #F6C03D;
            transition: 0.3s;
        }
        .navbar .nav-link.username {
            color: white;
        }

    </style>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="container">
                <div class="float-right d-none d-sm-block">
                </div>
                <strong>Copyright &copy; 2023 <a href="https://catolica.edu.sv">Universidad Católica de El Salvador</a>.</strong>
            </div>
        </footer>
    </div>
     <!-- esto  de aqui hace que funcionen los modal -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('third_party_scripts')
    @stack('page_scripts')
</body>
</html>
