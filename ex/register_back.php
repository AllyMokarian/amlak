<?php

include("amlak.php");
$amlak = new amlak();
// $check=isset($_POST['dd'])
// if ($check == 'mghdarValue'){
// }


if(isset($_POST['send'])){
	
	
	$check =isset($_POST['check']);

		if($check == "1"){
			
			
						
			if($_POST['username'] == "" || $_POST['family'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['tel'] == "" || $_POST['amlak_name'] == "" || $_POST['tel_amlak'] == "" || $_POST['city'] == "")
			{
				//echo "فیلدهارو تکمیل کنید";
				header('Location: register.php?error=yes');
				
			}//check empty field
			else
			{
				$username = $_POST['username'];
				$family = $_POST['family'];
				$email = $_POST['email'];
				$amlak_name = $_POST['amlak_name'];
				$tel_amlak = $_POST['tel_amlak'];
				$city = $_POST['city'];
				$password = $_POST['password'];
				$tel = $_POST['tel'];
				
				$sql = "select * from `user` where `name` = ? OR `email` = ? ";
				$data = array($username,$email);
				$res = $amlak->select($sql,$data);
				$count = $amlak->Rowcount($sql,$data);
				if($count > 0){
					header('Location: register.php?user=exist');
				}else{
					$sql2 = "INSERT INTO `user` (`name` , `family` , `email` , `mobile` , `password` , `amlak_name` , `amlak_tel` , `amlak_city`) VALUES 
							( ?, ?, ?, ?, ? , ? , ? , ?)";
					$data = array($username,$email,$family,$password,$tel,$amlak_name,$tel_amlak,$city);
					$res = $amlak->Idu($sql2,$data);
					if($res == 1){
						header('Location: register.php?user=ok');
					}else{
						echo "error";
					}
				
				}
				
			}
					
	
		}else{
			
			if($_POST['username'] == "" || $_POST['family'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['tel'] == "")
			{
				//echo "فیلدهارو تکمیل کنید";
				header('Location: register.php?error=yes');
				
			}//check empty field
		else
		{
			$username = $_POST['username'];
			$family = $_POST['family'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$tel = $_POST['tel'];
			
			$sql = "select * from `user` where `name` = ? OR `email` = ? ";
			$data = array($username,$email);
			$res = $amlak->select($sql,$data);
			$count = $amlak->Rowcount($sql,$data);
			if($count > 0){
				header('Location: register.php?user=exist');
			}else{
				$sql2 = "INSERT INTO `user` (`name` , `family` , `email` , `mobile` , `password` ) VALUES 
						( ?, ?, ?, ?, ?)";
				$data = array($username,$email,$family,$password,$tel);
				$res = $amlak->Idu($sql2,$data);
				header('Location: register.php?user=ok');
			}
			
		}
	}

}
		



?>