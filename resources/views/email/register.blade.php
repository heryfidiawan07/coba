<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verification email</title>
	<link href="/css/app.css" rel="stylesheet">
</head>
<body class="text-center">
	<h1>Welcome to Fidawa</h1>
	<h3>fidawa.com - verification</h3>
	<h4>-- hello agan..{{$user->name}} --</h4><!--  -->
	<p>klik link di bawah untuk verifikasi akun anda</p>
	<a style="padding: 10px 10px; background-color: #4490f4; color: black;" href="http://www.fidawa.com/verify/{{$user->token}}/{{$user->id}}">klik di sini untuk verifikasi email</a><!--  -->
	<br>
	<h5>atau klik link di bawah ini</h5>
	<a href="http://www.fidawa.com/verify/{{$user->token}}/{{$user->id}}">http://www.fidawa.com/verify/{{str_random(50)}}</a><!--  == -->
	<br>
	<div style="list-style: none; display: inline-block; text-decoration: none;">
		<ul>
      <li class="fotli"><a href="https://web.facebook.com/fidawadiskusi/">
      	<img id="icon" src="/background/login.svg">Facebok</a>
      </li>
      <li class="fotli"><a href="http://www.fidawa.com/threads">
      	<img id="icon" src="/background/forumc.svg">Forum</a>
      </li>
      <li class="fotli"><a href="http://www.fidawa.com/fjb">
      	<img id="icon" src="/background/shopc.svg">Fjb</a>
      </li>
    </ul>
  </div>
  <br>
	<h4 class="text-center" style="font-size: 14px; color: #636b6f;"> &copy; fidawa 2016-2017</h4>
</body>
</html>