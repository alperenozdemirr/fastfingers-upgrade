<?php 
ob_start();
session_start();
	require_once'connection/connection.php'; 
	$userCount=null;
if(isset($_SESSION['user_email'])){
  $email=$_SESSION['user_email'];
}
if(isset($_COOKIE['user_email'])){
  $email=$_COOKIE['user_email'];
}
	if(isset($email)){
		$user=$db->prepare("SELECT * FROM users WHERE email=:email");
	$user->execute(array('email'=>$email));
	$userCount=$user->rowCount();
	$userCheck=$user->fetch(PDO::FETCH_ASSOC);
	
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&amp;display=swap" rel="stylesheet">
	<title>FastFingers-Turkey</title>

	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body >
<div class="header">
	<span><a href="index.php"> <img class="bayrak" src="image/bayrak.gif"></a><h1>FastFingers-Turkey</h1>
	</span>
	<span>
		<?php if($userCount==1){?>
				<div onmouseover="userPanelOpen()" onmouseout="userPanelClose()" class="userNav">
<div class="userNavContent">
		<div class="image-crop">
			<?php if($userCheck['image']==null){ ?>
		<img src="image/user.png">
	<?php }else{?>
		<img src="image/user/<?php echo $userCheck['image']; ?>">
	<?php }?>
	</div>
		<h1>Hesabım</h1>
		<span class="open-user">
			<img src="image/alt-ok.png">
		</span>
		
	</div>
<div id="user-info" class="user-info">

	<div class="user-item">
		<h3><?php echo $userCheck['username']; ?></h3>
	</div>
	<div id="changeOpen" class="user-item">
		<a href="#"><h3>Profilim resmi değiştir</h3></a>
	</div>
	<div id="passwordOpen" class="user-item">
		<a href="index.php#changePassword"><h3>Şifremi değiştir</h3></a>
	</div>
	<div class="user-item">
		<a href="logout.php"><h3>Güvenli Çıkış</h3></a>
	</div>
	
	
</div>
</div>
<?php }else{ ?>
		<a href="login.php"><button class="login-link">Giriş Yap</button></a>
<a href="register.php"><button class="signup-link">Kayıt Ol</button></a>
<?php }?>
	</span>

</div>