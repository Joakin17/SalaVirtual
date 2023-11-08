<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Préstamos de Salas Biblioteca</title>
    <link rel="icon" href="{{ asset('imgs/logou.png') }}" type="image/png">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

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
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
        }

        .logo {
            width: 75px;
            height: 75px;
        }

        .register-box {
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
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="header-container text-center">
            <h2>Biblioteca Miguel De Cervantes</h2>
            <img src="{{ asset('imgs/logou.png') }}" alt="Logo" class="logo">
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-center">Formulario de registro a sala de prestamos</p>

                <form method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
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
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">Ya tienes cuenta, presiona aquí</a>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
