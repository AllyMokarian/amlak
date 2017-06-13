<?php


class sabtmelk extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function loadView(){
        $this->views->render("sabtmelk/index");
    }

    public function run(){
        //$this->model->hook();
        $this->model->sabtmelk();
    }
}