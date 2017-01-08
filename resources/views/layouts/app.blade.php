<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- to google -->
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta content='Indonesia' name='geo.placename'/>
    <meta name="language" content="id" />
    <meta name="Description" CONTENT="Diskusikan apa yang ingin anda tanyakan di forum. Forum Jual Beli Cari barang atau pasang iklan anda di sini GRATIS.">
    <!-- to google -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Facebook -->
    <meta property="og:url"           content="http://www.fidawa.com" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Fidawa - Forum diskusi dan Forum Jual Beli." />
    <meta property="og:description"   content="Diskusikan apa yang ingin anda tanyakan di forum. Forum Jual Beli Cari barang atau pasang iklan anda di sini GRATIS." />
    <meta property="og:image"         content="http://www.fidawa.com/icon.png" />
    <!-- Facebook -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fidawa - Forum diskusi dan Forum Jual Beli.</title>
    <link href='http://fidawa.com/icon.png' rel='shortcut icon'>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/progress.css">
    <link rel="stylesheet" type="text/css" href="/css/slider1.css">
    <link rel="stylesheet" href="/css/welcontent.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
    <div id="app">
        @include('layouts.partials.nav')
        <div class="container" style="min-height: 560px; height: 100%;">
            @yield('content')
        </div>
        <br>
        <div class="text-center">
            <div class="fb-like" data-href="http://www.fidawa.com" data-width="250" data-height="250" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="true"></div>
        </div>
        <br>
        @include('footer.footer') 
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/welcontent.js"></script>
    <script type="text/javascript" src="/js/get.js"></script>
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/slider-22.0.6.mini.js" type="text/javascript"></script>
    <script src="/js/browse.js" type="text/javascript"></script>
    <script src="/js/slider1.js" type="text/javascript"></script>
</body>
</html>
