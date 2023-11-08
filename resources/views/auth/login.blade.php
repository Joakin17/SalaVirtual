<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Préstamos de Salas Biblioteca</title>
    <link rel="icon" href="{{ asset('imgs/logou.png') }}" type="image/png">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background: white;
            color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #F6C03D;
            color: #fff;
            border-radius: 8px;
        }

        .header-container h2 {
            margin: 0;
            font-size: 24px;
        }

        .logo {
            width: 75px;
            height: 75px;
        }

        .login-box {
            width: 400px;
            margin: auto;
        }

        .card {
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .login-box-msg {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            border-radius: 4px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            background-color: #F6C03D;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #e3a11a;
        }

        /* Any other styles you want to add */

    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="header-container text-center" >
            <h2>Biblioteca Miguel De Cervantes</h2>
            <img src="{{ asset('imgs/logou.png') }}" alt="Logo" class="logo">
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <h3  class="login-box-msg">Sistemas de prestamos</h3>

                <form method="post" action="{{ url('/login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="E-Mail"
                            class="form-control @error('email') is-invalid @enderror"
                            autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password"
                            name="password"
                            placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Iniciar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
