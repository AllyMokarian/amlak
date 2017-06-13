<?php


class city_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function city()
    {

        $amlak = new amlak();

        $id = $_POST['id_ostan'];

        $sql = "SELECT * FROM `city` WHERE `province_id` =? ";

        $data = array($id);
        $res = $amlak->select($sql,$data);

        echo json_encode($res);

    }//city

}