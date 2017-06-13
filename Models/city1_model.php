<?php


class city1_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function city1()
    {

        $amlak = new amlak();

        $idostan = $_POST['id_ostan'];

        $sqlostan = "SELECT * FROM `city` WHERE `province_id` =? ";

        $dataostan = array($idostan);
        $resostan = $amlak->select($sqlostan,$dataostan);

        echo json_encode($resostan);

    }//city

}