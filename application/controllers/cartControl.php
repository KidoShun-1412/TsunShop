<?php

class cartControl extends BaseController
{

    public function info()
    {
        $this->view("cart", "info");
    }

    public function getInfoByIdProduct(){
        $product = $this->model('productModel');
        $res = array();
        $res['p'] = $product->getOne($this->input('id_p'));
        $res['quan'] = $this->input('quan');
        echo json_encode($res);
    }
    public function getCartInfo(){
        $res = array();
        $Account = $this->getSession('Account');
        $cartModel = $this->model('cartModel');
        $res = $cartModel->getCartInfo($Account);
        echo json_encode($res);
    }

    public function updateQuantity(){
        $res = array();
        $account = $this->getSession('Account');
        $id_p = $this->input('id_p');
        $quan = $this->input('quan');
        $cartModel = $this->model('cartModel');
        $res['status'] = false;
        $id_c = $cartModel->getIdCart($account)->id;
        if($cartModel->updateCartDetail($id_c, $id_p, $quan) > 0){
            $res['status'] = true;
        }

        echo json_encode($res);
    }

    
    public function checkQuantity(){
        $res = array();
        $account = $this->getSession('Account');
        $id_p = $this->input('id_p');
        $quan = $this->input('quan');
        $cartModel = $this->model('cartModel');
        $res['status'] = true;
        $id_c = $cartModel->getIdCart($account)->id;
        $data =$cartModel->checkCartDetail($id_c, $id_p, $quan);
        if( $data['status']==false){
            $res['status'] = false;
            $res['acquan'] = $data['acquan'];
        }

        echo json_encode($res);
    }
   

    public function removeCartDetail(){
        $res = array();
        $account = $this->getSession('Account');
        $id_p = $this->input('id_p');
        $cartModel = $this->model('cartModel');
        $res['status'] = false;
        $id_c = $cartModel->getIdCart($account)->id;
        if($cartModel->removeCartDetail($id_c, $id_p) > 0){
            $res['status'] = true;
        }

        echo json_encode($res);
    }
    public function removeAllCartDetail(){
        $res = array();
        $account = $this->getSession('Account');
        $cartModel = $this->model('cartModel');
        $res['status'] = false;
        $id_c = $cartModel->getIdCart($account)->id;
        if($cartModel->removeAllCartDetail($id_c) > 0){
            $res['status'] = true;
        }

        echo json_encode($res);
    }
    public function getUser(){
        $res = array();
        $Account = $this->getSession('Account');     
        $userModel = $this->model('userModel');
        $res = $userModel->getUserByAccount($Account);
        echo json_encode($res);
    }
}
