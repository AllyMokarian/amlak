<?php

class Index extends controller
{
    function __construct()
    {
        parent::__construct();
        //echo "index page";


    }

    function loadView(){
        $this->views->render("Index/index");
    }

}


?>