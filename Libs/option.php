<?php

/**
 * Created by PhpStorm.
 * User: pishroo
 * Date: 03/06/2017
 * Time: 11:37 AM
 */
class option extends amlak
{
    public function __construct(){
        $this->amlak = new amlak();
    }
    function get_option($key){

        $sql = "select * from `option` where `value` = ?";
        $data = array($key);
        $res = $this->amlak->select($sql,$data);
        foreach ($res as $row){
            return $row['value'];
        }

    }

}