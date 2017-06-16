<?php


class pagination_model extends Model
{
  function __construct()
  {
    parent::__construct();
  }

  function paginate()
  {

    $amlak = new amlak();
    //echo "hello";
    $namayesh = $_POST['namayesh'];
    $safhe = $_POST['safhe'];

    $limit = $namayesh;
    $offset = ($safhe-1)*$namayesh;


    $sql = "SELECT * FROM `user` Limit ? OFFSET ?";
    $pre=$amlak->connect->prepare($sql);
    $pre->bindValue(1, (int) $limit, PDO::PARAM_INT);
    $pre->bindValue(2, (int) $offset, PDO::PARAM_INT);
    $pre->execute();
    $res=$pre->fetchAll(PDO::FETCH_ASSOC);


    $sql = "SELECT * FROM `user`";
    $count = $amlak->Rowcount($sql,array());
    $pageCount = ceil($count/$namayesh);

    $responce = array(["pageCount"=>$pageCount],$res);

    echo json_encode($responce);

  }//city

}
