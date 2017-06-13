<?php

include("amlak.php");
$amlak = new amlak();

$id = $_POST['id_ostan'];

$sql = "SELECT * FROM `city` WHERE `province_id` =? ";

$data = array($id);
$res = $amlak->select($sql,$data);

echo json_encode($res);

/*
include("connection.php");

$id = $_POST['ajaxid'];
$sql = "SELECT * FROM `city` WHERE `province_id` =".$id." ";
$pre =$connect->prepare($sql);
$pre->execute();
$res=$pre->fetchAll(PDO::FETCH_NUM);

echo json_encode($res);

*/
?>