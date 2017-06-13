<?php


class ckfinder extends controller
{
    function __construct()
    {
        parent::__construct();
        //$this->views->render("Index/index");

    }

    function loadView(){
        $this->views->render("../ckfinder/samples/full-page-open.html");
    }

}