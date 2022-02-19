<?php

class ttControl extends BaseController
{
    public function index(){
        $this->view("t","t");
    }

    public function insert(){
        $db = new Database;
        $db->Query("insert into imggg values(?)", array($this->input('img')));
        
        echo $db->rowCount();
    }

    public function select(){
        $db = new Database;
        $db->Query("select img from imggg");
        
        echo json_encode($db->fetch());
    }
}