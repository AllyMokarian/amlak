<?php

/**
 * Created by PhpStorm.
 * User: pishroo
 * Date: 22/05/2017
 * Time: 02:46 PM
 */
class url
{
    function __construct()
    {
        //echo $_GET['url'];
        if(!isset($_GET['url'])){
            $url = 'Index';
        }else
        {
            $url = $_GET['url'];
        }

        $url = explode('/',$url);

        if(!file_exists("Controller/".$url[0].".php")){
            echo "not found";
            //header('location:error.html');
        }else{
            $file= "Controller/".$url[0].".php";
            require ($file);
            $controller = new $url[0]();
            $controller->load_model($url[0]);
            if(!empty($url[1]))
            {
                $method_name = $url[1];
                if (method_exists($controller,$method_name)){
                    if(!empty($url[2])){
                        $parametr = $url[2];
                        $controller->$method_name($parametr);

                    }else{
                        $controller->$method_name();
                    }

                }else{
                    echo "<br>method not found<br>";
                }
            }else{
                $controller->loadView();
            }

            //empty
            exit();
        }
    }

}