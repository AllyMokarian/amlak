<?php

//require ('amlak.php');

class user extends amlak
{
    public function __construct(){
        $this->amlak = new amlak();
    }


     function get_user($id,$export){


        $sql = "select * from `user` WHERE `id` =?";
        $data = array($id);
        $res = $this->amlak->select($sql,$data);
        foreach ($res as $row){
            return $row[$export];
        }
    }

    function remove_user($id){
         $sql_delete = "DELETE FROM `user` WHERE `id` = ?";
         $data_delete = array($id);
         $res_delete = $this->amlak->Idu($sql_delete,$data_delete);
    }

    function logout_user(){
        unset ($_SESSION['name']);
        unset ($_SESSION['id']);
        unset ($_SESSION['email']);
        unset ($_SESSION['password']);
    }

    function is_user(){

        if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['email']) and isset($_SESSION['password'])){

            $user = $_SESSION['email'];
            $pass = $_SESSION['password'];

            $sql_exist = "select * from `user` where `email` = ? AND `password` = ?";
            $data = array($user,$pass);
            $res = $this->amlak->select($sql_exist,$data);
            $count = $this->amlak->Rowcount($sql_exist,$data);
            if ($count > 0){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }


    }

}