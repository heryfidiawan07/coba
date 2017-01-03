<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verification email</title>
	<link href="/css/app.css" rel="stylesheet">
</head>
<body>
	<h3>fidawa.com - verification</h3>
	<p>hi..{{$user->name}}</p>
	<p>klik link di bawah untuk verifikasi akun anda</p>
	<a href="http://www.fidawa.com/verify/{{$user->token}}/{{$user->id}}">klik di sini untuk verifikasi email</a>
	<p>atau klik link di bawah ini</p>
	<a href="http://www.fidawa.com/verify/{{$user->token}}/{{$user->id}}">{{$user->token}}/{{$user->id}}</a>
	<div class="text-center">
    <ul>
      <li class="fotli"><a href="https://web.facebook.com/fidawadiskusi/">Facebok</a></li>
      <li class="fotli"><a href="http://www.fidawa.com/threads">Forum</a></li>
      <li class="fotli"><a href="http://www.fidawa.com/fjb">Fjb</a></li>
    </ul>
  </div>
	<p class="text-center" style="font-size: 14px; color: #636b6f;"> &copy; fidawa.com 2016-2017</p>
</body>
</html>