<?php

/**
 * Created by PhpStorm.
 * User: pishroo
 * Date: 22/05/2017
 * Time: 04:18 PM
 */
class login extends controller
{
    function __construct()
    {
        //$this->views->render("Index/index");
    }

    function run(){
        $this->model->login();
    }
}