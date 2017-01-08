<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- to google -->
    <meta name="Description" CONTENT="Diskusikan apa yang ingin anda tanyakan di forum. Forum Jual Beli cari barang atau pasang iklan anda di sini GRATIS.">
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta name="google" content="nositelinkssearchbox" />
    <!-- to google -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fidawa - Forum atau tempat diskusi dan sharing.</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/welcontent.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        body{
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }
        #title{
            margin-top: 100px;
            font-size: 60px;
        }

    </style>
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        <div class="container" style="min-height: 561px; height: 100%;">
            <p id="title">@include('layouts.partials.welcomecontent')</p>
        </div>
        <div class="footer">
        @include('footer.footer') 
        </div>
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/welcontent.js"></script>
</body>
</html>
