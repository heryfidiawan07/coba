<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Hery Fidiawan') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        body{
            background-image: url('background/wall.jpg');
            background-size: 160%;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }
        #title{
            margin-top: 200px;
            font-size: 60px;
        }

    </style>
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        <div class="container" style="min-height: 560px; height: 100%;">
            <p id="title" class="text-center">fidia.com</p>
        </div>
        <div class="footer">
        @include('footer.footer') 
        </div>
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
