<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DOLLARS MENUISERIE</title>
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body style="margin: 0; padding: 0;">
    @include('layouts.partials.sidebar')

    <div class="main-content" style="margin-left: 280px; min-height: 100vh; background: #f3f4f6; position: relative; z-index: 10;">
        @include('layouts.partials.header')

        <div class="content" id="main-content" style="padding: 2rem;">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
