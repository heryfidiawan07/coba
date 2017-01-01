<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h3>fidia.com-verification</h3>
	<p>hi..{{$user->name}}</p>
	<p>klik link di bawah untuk verifikasi akun anda</p>
	<a href="http://localhost:8000/verify/{{$user->token}}/{{$user->id}}">klik di sini untuk verifikasi email</a>
	<p>Happy discussion @fidia.com</p>
	<div class="text-center">
    <ul>
      <li class="fotli"><a href="">Facebok</a></li>
      <li class="fotli"><a href="">Forum</a></li>
      <li class="fotli"><a href="">Twitter</a></li>
    </ul>
  </div>
	<p class="text-center" style="font-size: 14px; color: #636b6f;"> &copy; fidia.com 2016</p>
</body>
</html>