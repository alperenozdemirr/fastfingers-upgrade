<?php include'header.php';?>
<div class="contanier" >
	<?php if($userCount!=1){ ?>
		<div class="login-info"><h1>Sıralamaya katılabilmek için giriş yap!</h1></div>
	<?php } ?>
	<div id="screenContanier"> 
		<div id="words"> </div>

		<div id="inputContanier"> 
			<input type="text" id="inputWords"> 
			<div id="kronometre"></div>
			<button id="tryBtn">&#9851;</button>
		</div>
	</div>
	<div id="resultScreen" class="result">
		<div class="resulHead">
			<b>Sonuç</b> Ekran Görüntüsü
		</div>
		<div class="resultDks">
			<span id="resultText" style="color:green;font-size:40px;font-weight: bold;"></span><span style="color:darkgray;font-size:13px;">(Kelime Yazabiliyorum)</span>
		</div>
<input type="hidden" id="userid" value="<?php if ($userCount==1){echo $userCheck['id'];}?>">
		<input type="hidden"   id="trueWordInput">
		<input type="hidden"  id="falseWordInput" >
		<input type="hidden"  id="keyupInput" >
		<div class="resultRows">
			<span>Tuşa Basma</span><span id="keyupText" style="color: blue;"></span>
		</div>
		<div class="resultRows">
			<span>Doğru Kelime</span><span id="trueWordText" style="color: green;"></span>
		</div>
		<div class="resultRows">
			<span>Yanlış Kelime</span><span id="falseWordText" style="color: red;"></span>
		</div>
		<div class="resultRows">

			<?php if($userCount==1){ ?>
			<button id="newScore">Skoru Listele</button>
			<?php }else{ ?>
				<button disabled style="opacity:0.5;" id="newScore">Skoru Listelemek İçin<br>Giriş Yap</button>
			<?php } ?>
		</div>
	</div>

	<div  class="highScoreContanier">
		<div class="description">
			<span><p><b>Top Rankings:</b> Top 20 Lists </p></span><span><button  id="tryLists">&#9851;</button></span>
		</div>
		<table  class="scoreList">
			<thead>
				<th>#</th>
				<th></th>
				<th>Kullanıcı Adı</th>
				<th>Net</th>
				<th>Tuş vuruşu/Sn</th>
			</thead>
			<tbody id="scoreListTb">
			
			</tbody>
		</table>
	</div>

	<div id="changePassword" class="changePassword">
		<span id="passwordClose"><img src="image/close.png"></span>
		<h1>Şifreni Değiştir</h1>
		<form action="action/action.php" method="POST">
			<input type="hidden" name="userID" value="<?php echo $userCheck['id']; ?>">
			<label>Yeni Şifre</label>
			<input type="password" name="newPassword">
			
			
			<label>Tekrar Yeni Şifre</label>
			<input type="password" name="confirmPassword">
			<button type="submit" id="btnPassword" name="changePassword">Şifreyi Güncelle</button>
		</form>
	</div>

</div>
<div id="changeİmgContanier" class="changeİmgContanier">
	<div class="changeİmage">
		 <span id="changeClose"><img src="image/close.png"></span>
		<div class="change-info">
			<h1>Profil Resmini Güncelle</h1>
		</div>
			<div class="changeContent">
			<form action="action/action.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $userCheck['id']; ?>">
			<input type="file" name="userİmage" id="images">
			</div>
			<div class="changeContent">
			<button   name="btnChangeİmg" id="btnİmage">Resmi Güncelle</button>
			</form>
			</div>
		
		
		
	</div>
	</div>

	<div class="footer">
		<span>
			<ul>
				<li><a href="index.php">Anasayfa</a></li>
				<li><a href="#">Profil</a></li>
				<li><a  href="#">Skor Listesi</a></li>
				<li><a href="login.php">Giriş Yap</a></li>
				
			</ul>
			</span>
		<span>
			<ul>
				<li><a href="https://www.linkedin.com/in/alperen-%C3%B6zdemir-253286252/">@Linkedin<br></a></li>
				<li><a href="#">#Suppport | Ozdemiiralperen@gmail.com</a></li>
				<li><a href="#">#Clone App | fastfingers</a></li>
				<li><a href="#">Alp Eren Özdemir</a></li>
				
			</ul>
			</span>
	</div>
	<script src="script/http_services.js"></script>
	<script src="script/app.js"></script>
	

</body>
</html>