<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Агрегатор | @show</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @yield('menu')
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
