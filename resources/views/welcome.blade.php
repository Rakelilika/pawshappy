<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PawsHappy') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="styles" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <script src="js/cookies.js" type="text/javascript"></script>
</head>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container mt-10"> 
            <a class="navbar-brand navbar-logo" href="#">
                <img src="images/logo-blanco.png" alt="logo" class="logo-1">
                <!--<i class="fas fa-paw" style="color:white;font-size:26px;"></i>-->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"
                                    data-scroll-nav="0">Inicio</a></li>
                        @else
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"
                                        data-scroll-nav="0" title="Regístrate">Registro</a></li>
                            @endif
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"
                                    data-scroll-nav="0" title="Inicia sesión">Login</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <div class="banner text-center" data-scroll-index='0'>
            <div class="banner-overlay-welcome">
                <div class="container">
                    <h1 class="text-capitalize">{{ config('app.name', 'PawsHappy') }}</h1>
                    <p>
                        Busca un cuidador para tu mascota!
                        En esta plataforma podras registrarte como cuidador, como dueño de mascotas o
                        como ambas, en el mismo perfil!
                        Registra a tus mascotas y busca cuidadores.
                        Regsitrate como cuidador y te llegarán solicitudes de cuidado de mascotas.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="overbox3" class="cookie-banner">
        <p>Esta web utiliza cookies para obtener datos estadísticos de la navegación de los usuarios. 
            Si continúas navegando consideramos que aceptas su uso.</p>
        <button id="accept-cookies" class="accept-cookies pointer" onclick="aceptar_cookie();">Aceptar</button> &nbsp;
        <button id="privacidad" class="accept-cookies pointer mt-10">
            <a href="{{ route('privacidad') }}">Política de Privacidad</a>
        </button>
    </div>
</body>

</html>
