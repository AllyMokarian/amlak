<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_amlak";

$dsn = "mysql:host=$servername;dbname=$dbname";

try{
$connect = new PDO($dsn,$username,$password);
$connect->exec("SET CHARACTER SET utf8");
$connect->exec("set names utf8");
}
catch(PDOException $error){
	echo $error->__tostring();
	
}


?>