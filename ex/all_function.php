<?php
session_start();
?>

<?php
include("amlak.php");
$amlak = new amlak();
/**
 * Created by PhpStorm.
 * User: pishroo
 * Date: 22/04/2017
 * Time: 11:28 PM
 */

class test
{
    //redirect
    function redirect($page,$parametr){
        if(isset($page) && isset($parametr)) {
            $page_url = $page.".php?".$parametr;
            header("location: $page_url");
            exit;
        }
        elseif(isset($page)){
            $page_url = $page.".php";
            header("location: $page_url");
            exit;
        }
    }


}

class connect
{

    function query($sql)
    {
        $server_name = "127.0.0.1";
        $server_username = "root";
        $server_password = "";
        $Db_name = "db_amlak";

        $con = mysqli_connect($server_name, $server_username, $server_password, $Db_name);
        mysqli_query($con, "set names utf8");
        mysqli_query($con, "set charset utf8");
        if ($con) {
            $result = mysqli_query($con, $sql);
            if (!$result) {
                echo "خطا در کوئری";
            }
            return $result;
        } else {
            echo "خطا در اتصال کانکشن";
        }


    }



}