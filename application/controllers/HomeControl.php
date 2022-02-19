<?php

class homeControl extends BaseController
{

    public function index()
    {
        $this->view("home", "index");
    }

    public function guide()
    {
        $this->view("home", "guide");
    }
    public function policy()
    {
        $this->view("home", "policy");
    }
    /**
     * 
     * get category
     */
  
    public function getCategory()
    {
        $typeProductModel = $this->model('typeProductModel');
        // $data = [];
        // for ($i = 1; $i < 5; $i++) {
            $data = $typeProductModel->getTypeProduct();
        //}
        echo json_encode($data);
    }
}
