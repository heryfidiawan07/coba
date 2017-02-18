<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>Verification email</title>
	<link href="/css/app.css" rel="stylesheet">
</head>
<body>
		<h1 style="text-align: center;">Welcome to Fidawa</h1>
		<h3 style="text-align: center;">fidawa.com - verification</h3>
		<h3 style="text-align: center;">-- Hello Agan..{{$user->name}} --</h3>
		<p style="text-align: center;">klik link di bawah untuk verifikasi akun anda</p>
		<br>
		<a style="padding: 10px 10px; background-color: blue; color: white; text-align: center;" href="http://www.fidawa.com/verify/{{$user->token}}/{{$user->id}}">klik di sini untuk verifikasi email</a><!--  -->
		<br>
		<h5 style="text-align: center;">atau klik link di bawah ini</h5>
		<a href="http://www.fidawa.com/verify/{{$user->token}}/{{$user->id}}">http://www.fidawa.com/verify/{{str_random(50)}}</a>
		<br>
		<div style="list-style: none; text-decoration: none;">
				<ul style="display: inline-block;">
	    		  <li><a href="https://web.facebook.com/fidawadiskusi/">Facebok</a></li>
	      		<li><a href="http://www.fidawa.com/threads">Forum diskusi</a></li>
	      		<li><a href="http://www.fidawa.com/fjb">Forum jual beli</a></li>
	    	</ul>
	  </div>
	  <br>
		<h4 style="color: #636b6f; text-align: center;"> &copy; fidawa 2016-2017</h4>
</body>
</html>