<?php
	
	try {

		$db=new PDO("mysql:host=localhost;dbname=fastfingers;charset=utf8;","root","12345678");
		//echo "success connection..";

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
		
 ?>