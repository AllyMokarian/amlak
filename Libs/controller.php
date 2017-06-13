<?php

/**
 * Created by PhpStorm.
 * User: pishroo
 * Date: 22/05/2017
 * Time: 02:52 PM
 */
class controller
{
    function __construct()
    {
        $this-> views = new views();
        //echo "<br>Main Controller<br>";
    }

     function load_model($name){
        $path = "models/".$name."_model.php";
        if(file_exists($path))
        {
            require($path);

            $ModelName = $name."_model";
           // echo $ModelName;
            $this-> model = new $ModelName();
        }
    }

}