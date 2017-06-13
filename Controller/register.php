<?php


class register extends controller
{
    function loadView(){
        $this->views->render("register/register");
    }

   public function run(){
        $this->model->register();
    }

}
