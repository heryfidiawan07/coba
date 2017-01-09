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
    <meta property="fb:app_id"        content="186938375115089" />
    <meta property="og:url"           content="http://fidawa.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Fidawa - Forum diskusi dan Forum Jual Beli." />
    <meta property="og:description"   content="Diskusikan apa yang ingin anda tanyakan di forum. Cari barang atau pasang iklan anda di forum jual beli." />
    <meta property="og:image"         content="http://fidawa.com/icon.png" />
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
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=186938375115089";
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
            <div class="fb-like" data-href="http://fidawa.com/" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </div>
        <hr>
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
