<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="News Information and discussion.">
    <!-- to google -->
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta content='Indonesia' name='geo.placename'/>
    <meta name="language" content="id" />
    <meta name="description" content="@yield('description')" />
    <!-- to google -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Facebook -->
    <meta property="og:url"           content="@yield('url')" />
    <!-- with logical -->
    <meta property="fb:app_id"        content="186938375115089" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="@yield('title')" />
    <meta property="og:description"   content="@yield('description')" />
    <meta property="og:image"         content="@yield('image')" />
    <!-- Facebook -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- untuk icon pd title -->
    <link href='http://fidawa.com/icon.png' rel='shortcut icon'>
    <!-- Styles -->
    @yield('css')
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/welcontent.css">
    <link rel="stylesheet" href="/css/kategoryModal.css">
    <link rel="stylesheet" href="/css/loop.css">
    <!-- Scripts -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="fb-root"></div>
<script>
     window.fbAsyncInit = function() {
        FB.init({
          appId      : '186938375115089',
          xfbml      : true,
          version    : 'v2.7'
        });
        FB.AppEvents.logPageView();
    };
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
            @include('layouts.partials.kategoryModal')
            @yield('content')
        </div>
        <br>
        <div class="text-center">
            <div class="fb-like" data-href="https://www.facebook.com/fidawadiskusi/" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </div>
        <hr>
        @include('footer.footer')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/fjbajax.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/get.js"></script>
    <script src="/js/browse.js" type="text/javascript"></script>
    @yield('js')
</body>
</html>
