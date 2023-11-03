<?php
ob_start();
session_start();
include_once'../connection/connection.php';
function userControl(){
		$userCount=null;
if(isset($_SESSION['user_email'])){
  $email=$_SESSION['user_email'];
}
if(isset($_COOKIE['user_email'])){
  $email=$_COOKIE['user_email'];
}
	if (empty($email)) {
		header("Location:../index.php?status=unauthorized");
		exit;
	}
	
}	

	if(isset($_POST['userRegister'])){
		$email=htmlspecialchars($_POST['email']);
		$username=htmlspecialchars($_POST['username']);
		$password=$_POST['password'];
		$confirmPassword=$_POST['confirmPassword'];

		if ($password==$confirmPassword) {
			if (strlen($password)>=8) {
					
					$user=$db->prepare("SELECT * FROM users WHERE email=:email");
					$user->execute(array(
						'email'=>$email
					));
					$count=$user->rowCount();
					if ($count==0) {
						$userSave=$db->prepare("INSERT INTO users SET
							email=:email,
							username=:username,
							password=:password
							");
						$insert=$userSave->execute(array(
							'email'=> $email,
							'username'=> $username,
							'password'=> md5($password)
						));
						if ($insert) {
							header("Location:../login.php?status=success");
							exit;
						}else{
							header("Location:../register.php?status=try");
						exit;
						}
					}else{
						header("Location:../register.php?status=uniqemail");
						exit;
					}

			}else{
				header("Location:../register.php?status=lowpassword");
				exit;
			}
		}else{
			header("Location:../register.php?status=uniqualpassword");
			exit;
		}
	}


	if(isset($_POST['userLogin'])){
		$email=htmlspecialchars($_POST['email']);
		$password=md5($_POST['password']);
		$user=$db->prepare("SELECT * FROM users WHERE email=:email and password=:password");
		$user->execute(array(
			'email'=>$email,
			'password'=>$password
		));
		$count=$user->rowCount();

		if ($count==1) {

			if(!isset($_POST['remember_me'])){
                $_SESSION['user_email']=$email;
            }	
        
			if(isset($_POST['remember_me'])){
			setcookie("user_email", $email ,time() + (86400 * 7),"/");
			}
			header("Location:../index.php?status=successlogin");
			exit;
		}else{
			header("Location:../login.php?status=error");
			exit;
		}
	}

  	if(isset($_POST['btnChangeİmg'])){
  		userControl();
  		$user=$db->prepare("SELECT * FROM users WHERE email=:email");
		$user->execute(array('email'=>$email));
		$userCount=$user->rowCount();
		$userCheck=$user->fetch(PDO::FETCH_ASSOC);
		if ($userCheck['image']!=null) {
			unlink("../image/user/".$userCheck->image);
		}
  		//resim varsa ilk önce sil
  		$directory="../image/user/";
  		$image=$_FILES['userİmage']["name"];

  		$random_name=rand(1000000,9999999);
  		$newName=$random_name.$image;
 		$user=$db->prepare("UPDATE users SET image=:image WHERE id={$_POST['id']}");
 		$save=$user->execute(array('image'=>$newName));
 		if ($save) {
 			move_uploaded_file($_FILES["userİmage"]["tmp_name"],$directory.$newName);
 			header("Location:../index.php");
 			exit;
 		}else{
 			header("Location:../index.php");
 			exit;
 		}
  	}
  	//8298125alp

  	/*if (isset($_GET['btnScoreList'])) {
  		//$scoreGet= $db->query("SELECT * FROM score_list",PDO::FETCH_OBJ)->fetchAll();
  		$scoreGet= $db->query("SELECT score_list.true_word,score_list.false_word,score_list.keystroke,users.username,users.image FROM score_list join users on score_list.user_id=users.id",PDO::FETCH_OBJ)->fetchAll();
  		header("Content-Type","application/json");
  		$scoreList=json_encode($scoreGet);
  		echo $scoreList;
  	}*/

  	if (isset($_GET['scoreList'])) {
  		
  		//$scoreGet= $db->query("SELECT * FROM score_list",PDO::FETCH_OBJ)->fetchAll();
  		$scoreGet= $db->query("SELECT score_list.true_word,score_list.false_word,score_list.keystroke,users.username,users.image FROM score_list join users on score_list.user_id=users.id ORDER BY true_word DESC LIMIT 20",PDO::FETCH_OBJ)->fetchAll();
  		$number=1;
  		foreach ($scoreGet as $score) {
 	if ($score->image==null) {$setImage="image/user.png";}else{$setImage="image/user/".$score->image;}
  			echo '<tr>'.
  			'<td class="low-td">'.$number.'</td>'.
  			'<td class="low-td">'.
  			'<img width="30" src="'.$setImage.'">'.'</td>'.
  			'<td class="long-td">'.$score->username.'</td>'.
  			'<td class="low-td">'.$score->true_word.'</td>'.
  			'<td class="low-td">'.$score->keystroke.'</td>'
  			.'</tr>'.'</br>';
  			$number++;
  		}
  		
  	}

  	
  	

  	if (isset($_POST['newScore'])) {
  		$newScore=$db->prepare("INSERT INTO score_list SET user_id=:id,true_word=:true_word,false_word=:false_word,keystroke=:keystroke");
  		$newScore->execute(array(
  			'id'=>$_POST['userid'],
  			'true_word'=>$_POST['trueword'],
  			'false_word'=>$_POST['falseword'],
  			'keystroke'=>$_POST['keystroke']
  		));

  	}

if (isset($_POST['changePassword'])) {
	userControl();
	$id=$_POST['userID'];
	$newPassword=htmlspecialchars($_POST['newPassword']);
	$confirmPassword=htmlspecialchars($_POST['confirmPassword']);
	$pass=md5($newPassword);
	if ($newPassword==$confirmPassword) {
		$changePassword=$db->prepare("UPDATE users SET password=:new_password WHERE id=$id");
		$save=$changePassword->execute(array('new_password'=>$pass));
		if ($save) {
			header("Location:../index.php?status=passwordOK");
			exit;
		}else{
			header("Location:../index.php?status=passwordNO");
			exit;
		}
	}else{
		header("Location:../index.php?status=passwordOK");
			exit;
	}

	

}







 ?>	

