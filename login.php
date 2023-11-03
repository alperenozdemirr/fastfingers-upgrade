<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<script type="text/javascript" src="script/jquery-3.6.0.min.js"></script>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giriş Yap</title>
</head>
<body>
<div class="contanier">
	<div class="loginPanel">
		<div class="h2">
			<h2>Giriş Yap</h2>
		</div>
		
		<form action="action/action.php" method="POST">
			<span>
				<p>E-posta</p><input type="email" name="email">
			</span>
		<span>
			<p>Şifre</p><input type="password" name="password">
		</span>
		<div class="rememberme">
			<input  type="checkbox" name="remember_me" value="1">Beni Hatırla
		</div>
		<button type="submit" name="userLogin" class="btnLogin">Giriş Yap</button>
		<span>
		
	</span>
	<span>
		<a href="register.php">Kayıtlı Değilim?</a>
		<a href="index.php">Ziyaretçi Olarak Devam Et</a>
	</span>
	</form>
	
	
	</div>
</div>
</body>
</html>