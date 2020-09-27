<?php
class Controller{
    protected $id;
    public function view($view,$data=[]){
        require_once "./mvc/views/shows/".$view.".php";
    }
    public function viewManage($view,$data=[]){
        require_once "./mvc/views/managements/".$view.".php";
       
       
    }
}
