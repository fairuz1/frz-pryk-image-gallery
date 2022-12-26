<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proyek Laravel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com"
    ><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lightbox2/dist/css/lightbox.min.css') }}">

    {{-- @vite(['resources/js/app.js']) --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@400;500;700&display=swap');
        
        html { 
            scroll-behavior: smooth; 
        }
        
        :root {
            --calmBlack: #111723;
            --primaryLightBlue: #E4F4F9;
            --secondaryLightBlue: #93C9C7;
            --lightPurple: #848DD3;
            --hintColor: #535760;
            --warningRed: #CC3766;
        }

        * { 
            padding: 0; 
            margin: 0; 
            font-family: 'Open Sans', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

        .btn .btn-login {
            color: var(--calmBlack);
            background: var(--primaryLightBlue);

        }

        body { 
            background-color: white; 
            color: var(--calmBlack);
        }

        img { 
            height: 100%; 
            width: 100%; 
        }

        .sections { 
            height: 100vh; 
        }

        .nav-height { 
            height: 10vh; 
        }

        .custom-positions { 
            width: 100vw; 
            height: 90vh;
        }

        .glass {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.14);
            color: #2E2E2E;
        }

        .login-alert {
            position: fixed;
            bottom: 0;
            right: 0;
            margin: 2rem;
        }

        .custom-alert { 
            background-color: #F7ECDE; 
            font-size: 1.2em; 
            border-color: #E9DAC1;
            color: #472D2D;
        }

        .btn-primary {
            background-color: #319DA0;
            border: none;
            color: snow;
            font-size: 1.3em;
        }

        .btn-danger {
            background-color: #F96666;
            border: none;
            color: snow;
            font-size: 1.3em;
        }

        .btn-primary:hover, .btn-primary:focus, .btn-primary:active:focus, .btn-primary.active, .open.dropdown-toggle.btn-primary {
            color: snow;
            background-color: #2E2E2E !important;
        }

        .btn-danger:hover, .btn-danger:focus, .btn-danger:active:focus, .btn-danger.active, .open.dropdown-toggle.btn-danger {
            color: snow;
            background-color: #2E2E2E !important;
        }

        .btn-secondary:hover, .btn-secondary:focus, .btn-secondary:active:focus, .btn-secondary.active, .open.dropdown-toggle.btn-secondary {
            color: snow;
            background-color: #2E2E2E !important;
        }

    </style>
</head>

<body class="hold-transition sidebar-collapse" id="mainBody">
    
    @if (!Auth::guest())
        {{-- navbar --}}
        @include('layouts.header')
            
        {{-- sidebar --}}
        @include('layouts.sidebar')
    @endif

    {{-- content --}}
    @yield('content')
    
    {{-- footer --}}
    {{-- @include('layouts.footer') --}}

    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>