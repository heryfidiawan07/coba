<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'fidawa.com') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/progress.css">
    <link rel="stylesheet" type="text/css" href="/css/slider1.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        <div class="container" style="min-height: 560px; height: 100%;">
            @yield('content')    
        </div>
        <hr>
        
        @include('footer.footer') 
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript" src="/js/get.js"></script>
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/slider-22.0.6.mini.js" type="text/javascript"></script>
    <script src="/js/slider1.js" type="text/javascript"></script>
</body>
</html>
