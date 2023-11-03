<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<script type="text/javascript" src="script/jquery-3.6.0.min.js"></script>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kayıt Ol</title>
</head>
<body>
<div class="contanier">
	<div class="loginPanel">
		<div class="h2">
			<h2>Kayıt Ol</h2>
		</div>
		
		<form action="action/action.php" method="POST">
			<span>
				<p>E-posta</p><input type="email" name="email">
			</span>
			<span>
				<p>Kullanıcı Adınız</p><input type="text" name="username">
			</span>

		<span>
			<p>Şifre</p><input placeholder="min:8" type="password" name="password">
		</span>
		<span>
			<p>Tekrar Şifre</p><input placeholder="min:8" type="password" name="confirmPassword">
		</span>
		<button type="submit" name="userRegister" class="btnLogin">Kayıt Ol</button>
		<span>
		<a href="login.php">Zaten Kayıtlıyım?</a>
		<a href="index.php">Ziyaretçi Olarak Devam Et</a>
	</span>
	</form>
	
	
	</div>
</div>
</body>
</html>