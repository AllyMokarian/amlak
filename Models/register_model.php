<?php


class register_model extends Model
{

    function register(){

        $amlak = new amlak();



        $error = "";
        $ok = "true";

        if(isset($_POST['username'])){


            $check =isset($_POST['check']);

            if($check == "1"){



                if($_POST['username'] == "" || $_POST['family'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['tel'] == "" || $_POST['amlak_name'] == "" || $_POST['tel_amlak'] == "" || $_POST['search_address'] == "")
                {
                    //echo "فیلدهارو تکمیل کنید";
                    //header('Location: register.php?error=yes');

                    $error .= "لطفا فیلد هارو پر کنید"."<br>";
                    $ok = "false";

                }//check empty field
                else
                {
                    $username = $_POST['username'];
                    $family = $_POST['family'];
                    $email = $_POST['email'];
                    $amlak_name = $_POST['amlak_name'];
                    $tel_amlak = $_POST['tel_amlak'];
                    //$city = $_POST['city'];
                    $password = $_POST['password'];
                    $tel = $_POST['tel'];
                    $search_address = $_POST['search_address'];

                    $sql = "select * from `user` where `name` = ? OR `email` = ? ";
                    $data = array($username,$email);
                    $res = $amlak->select($sql,$data);
                    $count = $amlak->Rowcount($sql,$data);
                    if($count > 0){

                        //header('Location: register.php?user=exist');
                        $error .= "نام کاربری و ایمیل شما تکراری میباشد"."<br>";
                        $ok = "false";

                    }else{


                        $sql2 = "INSERT INTO `user` (`name` , `family` , `email` , `mobile` , `password` , `amlak_name` , `amlak_tel` , `amlak_city`) VALUES 
								( ?, ?, ?, ?, ? , ? , ? , ?)";
                        $data = array($username,$family,$email,$tel,$password,$amlak_name,$tel_amlak,$search_address);
                        $res = $amlak->Idu($sql2,$data);
                        if($res == 1){

                            //header('Location: register.php?user=ok');
                            $error .= "کاربر ثبت شد"."<br>";
                            $ok = "true";

                        }else{
                            //echo "error";
                            $error .= "خطا در ثبت"."<br>";
                            $ok = "false";
                        }

                    }


                }


            }else{

                if($_POST['username'] == "" || $_POST['family'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['tel'] == "")
                {

                    $error .= "فیلدهارو تکمیل کنید"."<br>";
                    $ok = "false";

                }//check empty field
                else
                {
                    $username = $_POST['username'];
                    $family = $_POST['family'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $tel = $_POST['tel'];

                    $sql = "select * from `user` where `name` = ? OR `email` = ? ";
                    $data = array($username,$email);
                    $res = $amlak->select($sql,$data);
                    $count = $amlak->Rowcount($sql,$data);
                    if($count > 0){
                        //header('Location: register.php?user=exist');
                        $error .= "نام کاربری و ایمیل شما تکراری میباشد"."<br>";
                        $ok = "false";

                    }else{



                        $sql2 = "INSERT INTO `user` (`name` , `family` , `email` , `mobile` , `password` ) VALUES 
							( ?, ?, ?, ?, ?)";
                        $data = array($username,$family,$email,$tel,$password);
                        $res = $amlak->Idu($sql2,$data);
                        //header('Location: register.php?user=ok');
                        if($res == 1){
                            $error .= "کاربر ثبت شد"."<br>";
                            $ok = "true";
                        }else{
                            $error .= "خطا در ثبت"."<br>";
                            $ok = "false";
                        }


                    }


                }

            }

            echo '{"ok":"'.$ok.'","message":"'.$error.'"}';
            exit;
        }



    }//register

}