<?php

class sabtmelk_model extends Model
{
    function __construct()
    {

        parent::__construct();

    }


    public function sabtmelk(){

        $amlak = new amlak();

        $user = '';
        $pass = '';
        //setcookie
        if(!isset($_COOKIE['rand_email']) && !isset($_COOKIE['rand_pass'])){
            $user = name();
            $pass = pass();
            setcookie("rand_email",$user, time() + (60 * 3), "/");
            setcookie("rand_pass",$pass, time() + (60 * 3), "/");
        }else{
            $user = $_COOKIE['rand_email'];
            $pass = $_COOKIE['rand_pass'];
        }


        $logged_in = false;
        if(isset($_SESSION['name'])){
            $name = $_SESSION['name'];
            $sql = "select * from `user` WHERE `name` = ?";
            $data = array($name);
            //$res = $amlak->select($sql,$data);
            $count = $amlak->Rowcount($sql,$data);
            if ($count > 0){
                $logged_in = true;
            }else{
                $logged_in = false;
            }
        }else{
            $logged_in = false;
        }


        //check cookie and insert user into database
        if ($logged_in){
            $user = $_SESSION['name'];
            $pass = "";
        }else{
            $sql_cookie = "INSERT INTO `user` (`name` , `family` , `email` , `mobile` , `password` ) VALUES ('','',?,'',?)";
            $data = array($user,$pass);
            $res = $amlak->Idu($sql_cookie,$data);
        }

        $error = "";
        $ok = "true";
        if(isset($_POST['shahr'])){
            $op1 = $_POST['op1'];
            $_SESSION['op1'] = $op1;
            if($op1 == "1"){

                if($_POST['shahr'] == "" || $_POST['ostan'] == "" || $_POST['edame_address'] == "" || $_POST['noe_melk'] == "" || $_POST['tedad_khab'] == "" || $_POST['tozih'] == "" || $_POST['gheymat_kharid'] == "" ||  $_POST['gheymat'] == "" ||  $_POST['masahat'] == "" || $_POST['tel'] == "" || $_POST['malek'] == ""){

                    $error .= "فیلدهارو تکمیل نمایید"."<br>";
                    $ok = "false";

                }//check empty


                $ostan = $_POST['ostan'];
                $shahr = $_POST['shahr'];
                $edame_address = $_POST['edame_address'];
                $noe_melk = $_POST['noe_melk'];
                $gheymat = $_POST['gheymat'];
                $tedad_khab = $_POST['tedad_khab'];
                $tozih = $_POST['tozih'];
                $gheymat_kharid = $_POST['gheymat_kharid'];
                $masahat = $_POST['masahat'];
                $ejare = $_POST['ejare'];
                $rahn = $_POST['rahn'];
                $malek = $_POST['malek'];
                $tel = $_POST['tel'];



                $sql = "INSERT INTO `add_melk` (`ostan` , `shahr` , `edame_address` , `noe_melk` , `gheymat` , `tedad_khab` , `tozih` , `gheymat_kharid` , `masahat` , `ejare` , `rahn` , `malek` , `tel` ,`name_user` , `pass_user`) VALUES (
		?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
                $data = array($ostan,$shahr,$edame_address,$noe_melk,$gheymat,$tedad_khab,$tozih,$gheymat_kharid,$masahat,$ejare,$ejare,$malek,$tel,$user,$pass);
                $res = $amlak->Idu($sql,$data);

                if($res == 1)
                {

                    /*$_SESSION['ostan_name']= $ostan;
                    $_SESSION['noe'] = $noe_melk;
                    $_SESSION['metraj'] = $metraj;
                    $_SESSION['shahr'] = $shahr;
                    $_SESSION['tedadkhab'] = $tedad_khab;
                    $_SESSION['address'] = $edame_address;*/

                    $error .= "ملک ثبت شد"."<br>";

                    $ok = "true";
                }else{
                    $error .= "خطا در ثبت ملک"."<br>";
                    print_r($data);
                    $ok = "false";
                }

            }else{

                if($_POST['shahr'] == "" || $_POST['ostan'] == "" || $_POST['edame_address'] == "" || $_POST['noe_melk'] == "" || $_POST['tedad_khab'] == "" || $_POST['tozih'] == "" || $_POST['gheymat_kharid'] == "" ||  $_POST['gheymat'] == "" || $_POST['tel'] == "" || $_POST['ejare'] == "" || $_POST['rahn'] == "" || $_POST['malek'] == "" || $_POST['tel'] == ""){

                    $error .= "فیلدهارو تکمیل نمایید"."<br>";
                    $ok = "false";

                }//check empty

                $ostan = $_POST['ostan'];
                $shahr = $_POST['shahr'];
                $edame_address = $_POST['edame_address'];
                $noe_melk = $_POST['noe_melk'];
                $gheymat = $_POST['gheymat'];
                $tedad_khab = $_POST['tedad_khab'];
                $tozih = $_POST['tozih'];
                $gheymat_kharid = $_POST['gheymat_kharid'];
                $masahat = $_POST['masahat'];
                $ejare = $_POST['ejare'];
                $rahn = $_POST['rahn'];
                $malek = $_POST['malek'];
                $tel = $_POST['tel'];

                $_SESSION['rahn'] = $rahn;
                $_SESSION['ejare'] = $ejare;






                $sql = "INSERT INTO `add_melk` (`ostan` , `shahr` , `edame_address` , `noe_melk` , `gheymat` , `tedad_khab` , `tozih` , `gheymat_kharid` , `masahat` , `ejare` , `rahn` , `malek` , `tel`, `name_user` , `pass_user`) VALUES (
		?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
                $data = array($ostan,$shahr,$edame_address,$noe_melk,$gheymat,$tedad_khab,$tozih,$gheymat_kharid,$masahat,$ejare,$ejare,$malek,$tel,$user,$pass);
                $res = $amlak->Idu($sql,$data);

                if($res == 1)
                {

                    $error .= "ملک ثبت شد"."<br>";
                    $ok = "true";
                }
                else
                {
                    print_r($data);
                    $error .= "خطا در ثبت ملک"."<br>";
                    $ok = "false";
                }




            }



        }else{
            $error .= "خطا"."<br>";
            $ok = "false";
        }


        if ($ok == "true"){
            $sql_id = "SELECT * FROM `add_melk` ORDER BY `id` DESC LIMIT 1";
            $dat_id = array();
            $res_id = $amlak->select($sql_id,$dat_id);
            $_SESSION['id'] = $res_id[0]['id'];

        }


        echo '{"ok":"'.$ok.'","message":"'.$error.'"}';
        exit;




    }//sabtmelk

}