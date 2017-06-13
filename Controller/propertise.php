<?php


class propertise extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function loadView(){
        $this->views->render("sabtmelk/test/propertise");
    }

    function run(){

        $this->model->propertise();
    }

}