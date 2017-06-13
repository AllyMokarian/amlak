<?php


class city extends controller
{
    function __construct()
    {
        parent::__construct();
        //$this->views->render("Index/index");

    }

    function run(){
        $this->model->city();
    }

}