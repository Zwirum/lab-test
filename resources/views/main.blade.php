<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        @yield('links')
    </head>
    <body>
        <nav class="menu">
            <a class="menu_link" href="/">Info</a>
            <a class="menu_link" href="/news">News</a>
            <a class="menu_link" href="#">Life</a>
        </nav>

        <div class="content">
            @yield('content')
        </div>

        <script src="{{ asset("/js/app.js") }}"></script>
        @yield('scripts')
    </body>
</html>
