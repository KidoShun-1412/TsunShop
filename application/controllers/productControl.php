<?php

class productControl extends BaseController
{

    /**
     * 
     * get all product
     */
    public function getAllProduct(){
        $productModel = $this->model('productModel');
        $allProduct = $productModel->getAll();
        $data = [];
        foreach ($allProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function getLastestProduct(){
        $productModel = $this->model('productModel');
        $lastestProduct = $productModel->getLastest();
        $data = [];  
        foreach ($lastestProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function getFastestProduct(){
        $productModel = $this->model('productModel');
        $fastestProduct = $productModel->getFastestDp();
        $data = []; 
        foreach ($fastestProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }
    public function getDePriceProduct(){
        $productModel = $this->model('productModel');
        $DePriceProduct = $productModel->getDePrice();
        $data = []; 
        foreach ($DePriceProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }
    public function getInPriceProduct(){
        $productModel = $this->model('productModel');
        $InPriceProduct = $productModel->getInPrice();
        $data = []; 
        foreach ($InPriceProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function getLastestProductBT(){
        $id_t=$this->input('id_t');
        $productModel = $this->model('productModel');
        $lastestProduct = $productModel->getLastestBT($id_t);
        $data = [];  
        foreach ($lastestProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function getFastestProductBT(){
        $id_t=$this->input('id_t');
        $productModel = $this->model('productModel');
        $fastestProduct = $productModel->getFastestBT($id_t);
        $data = []; 
        foreach ($fastestProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }
    public function getDePriceProductBT(){
        $id_t=$this->input('id_t');
        $productModel = $this->model('productModel');
        $DePriceProduct = $productModel->getDePriceBT($id_t);
        $data = []; 
        foreach ($DePriceProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }
    public function getInPriceProductBT(){
        $id_t=$this->input('id_t');
        $productModel = $this->model('productModel');
        $InPriceProduct = $productModel->getInPriceBT($id_t);
        $data = []; 
        foreach ($InPriceProduct as $val) {
            // if($val->stock <= 0) continue;
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }

        echo json_encode($data);
    }
     
    public function infoProduct($id){

        $res = array();
        $account = $this->getSession('Account');
                 
        $productModel = $this->model('productModel');      
        $Product = $productModel->getOne($id);
               
        if($account!=null)
        {
            $cartModel = $this->model('cartModel');
            $res['status'] = true;
            $id_c = $cartModel->getIdCart($account)->id;
            $data =$cartModel->getQuantityCartCD($id_c, $id);
            $quantity=$data['quantity'];
            if($quantity== $Product->stock)
            {
                $stock="Sản phẩm đã quá giới hạn mua.Vui lòng kiểm tra lại giỏ hàng."; 
                $Display="none";
            }
        }      
        if($Product->stock > 0 )                 
        {
            $stock=$Product->stock;
            $Display="";                   
        }
        else
        {
            $stock="Hết hàng"; 
            $Display="none";
        }  
        $this->view("product", "infoProduct", array($Product,$stock,$Display));
      
    }
    public function getByType($id){
        $productModel = $this->model('productModel');
        $ProductsByType = $productModel->getByType($id);
        $data = [];
        foreach ($ProductsByType as $val) {
            $row = '<div class="product col pb-2 pl-0 pr-0" show="show">';
            $row.='<div class="border-hover d-flex align-items-end flex-column m-1 h-100">';
            $row.='<div class="hovereffect">';
            $row.='<a href="'.BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.='<img id="img" class="img-fluid" src="'.$val->img.'">';
            $row.='</a></div>';
            $row.='<div class="mt-auto"><p class="m-2"><a class="name-product" href="';
            $row.=BASEURL.'/product/infoProduct/'.$val->id.'">';
            $row.=$val->name;
            $row.='</a></p><p class="price-product m-2">';
            $row.=$this->formatPrice($val->price);
            $row.=' ₫</p></div></div></div>';
            $data[] = $row;
        }
        $idtype=$id;
        $this->view("product","getByType", array($data,$idtype));
    }
    public function addCart(){
        $response = array();
        $productModel = $this->model('productModel');
        $acc = $this->input('account');
        $id_p = $this->input('id_p');
        $quan = $this->input('quan');

        $response['status'] = false;
        if($productModel->addCart($acc, $id_p, $quan)){
            $response['status'] = true;
        }

        echo json_encode($response);
    }

    public function checkQuantity(){
        $res = array();
        // $account = $this->getSession('Account');
        $id_p = $this->input('id_p');
        $quan = $this->input('quan');
        $productModel = $this->model('productModel');
        $res['status'] = true;
        // $id_c = $productModel->checkQuantity($id_p,$quan)->id;
        $data=$productModel->checkQuantity($id_p, $quan);
        if($data['status'] ==false){
            $res['status'] = false;
            $res['acquan']=$data['acquan'];
        }
        echo json_encode($res);
    }
}
