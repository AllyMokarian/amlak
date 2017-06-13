<?php


class takmili extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function loadView(){
        $this->views->render("sabtmelk/takmili");
    }

    function run(){
        $this->model->sabt_takmili();
    }


}