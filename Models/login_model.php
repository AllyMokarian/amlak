<?php


class login_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function login(){


        //include("amlak.php");

        $amlak = new amlak();

        $message = "";
        $ok = "true";

        if (isset($_POST['email'])){
            if($_POST['email'] == '' || $_POST['password'] == '' || $_POST['capcha'] == ''){

                //echo '{"ok" : "false" , "mesage" : "لطفا فیلد هارو پر کنید"}';
                $message .= "لطفا فیلد هارو پر کنید"."<br>";
                $ok = "false";

            }else{
                $email = $_POST['email'];
                $password = $_POST['password'];

                if(!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z\.]+/",$email)) {

                    //echo '{"ok" : "false" , "mesage" : "ایمیل را درست وارد کنید"}';
                    $message .= "ایمیل را درست وارد کنید"."<br>";
                    $ok = "false";


                }

                if($_SESSION['captcha-text'] != $_POST['capcha']){

                    $message .= "کد امنیتی زا درست وارد کنید"."<br>";
                    $ok = "false";
                    //echo '{"ok" : "false" , "mesage" : "کد امنیتی زا درست وارد کنید"}';

                }
            }
            if($ok == "true"){

                $sql = "SELECT * FROM `user` WHERE `email`=? AND `password`=?";
                $data = array($email,$password);
                $res = $amlak->select($sql,$data);
                $count = $amlak->Rowcount($sql,$data);

                if($count > 0){

                    $_SESSION["name"]=$res[0]['name'];
                    $_SESSION["id"]= $res[0]['id'];
                    $_SESSION["email"]= $res[0]['email'];
                    $_SESSION["password"]= $res[0]['password'];

                    //$message = "success";
                    //$ok = true;

                    //echo '{"ok" : "true"}';

                }else{
                    $message .= "نام کاربری یا پس ورد شما نادرست میباشد."."<br>";
                    $ok = "false";
                }
            }

            echo '{"ok" : "'.$ok.'" , "message" : "'.$message.'"}';



        }


    }//login

}