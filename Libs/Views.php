<?php

/**
 * Created by PhpStorm.
 * User: pishroo
 * Date: 22/05/2017
 * Time: 02:59 PM
 */
class views
{
    function __construct()
    {

    }

    public function render($name){

        //require ("Views/header.php");
        require ("Views/".$name.".php");
        //require ("Views/footer.php");


    }//render

}