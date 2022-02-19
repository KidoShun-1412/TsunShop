<?php


class adminControl extends BaseController
{

    public function index()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin", "index");
        } else {
            $this->redirect('admin/login');
        }
    }
    public function login()
    {
        if (isset($_POST['Password'])) {
            if (PASSWORDADMIN == $this->input('Password') && ACCOUNTADMIN== $this->input('Account')) {
                $this->setSession('Admin', true);
                $this->redirect('admin');
            } else {
                $this->view("admin", "login", array('msg' => 'Sai mật khẩu'));
            }
        } else if ($this->getSession('Admin')) {
            $this->redirect('admin');
        } else {
            $this->view("admin", "login");
        }
    }
    public function logout()
    {
        $this->unsetSession('Admin');
        $this->redirect('admin');
    }
    // user
    public function info_user()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/user", "info");
        } else {
            $this->redirect('admin/login');
        }   
    }
    public function getAllUser()
    {
        $userModel = $this->model('userModel');
        $allUser = $userModel->getAll();
        $i = 1;
        $data = [];
        foreach ($allUser as $val) {
            $row = [];
            $row[] = '<span>'.$i++.'</span>';
            $row[] = '<span>'.$val->account.'</span>';
            $row[] = '<span>'.$val->full_name.'</span>';
            //$row[] = '<span>'.$val->email.'</span>';
            $row[] = '<span>'.$val->phone.'</span>';
            //$row[] = '<span>'.$val->city.'</span>';
            $row[] = '<span>'.$val->address. '</span>';
            if ($val->status == "ACTIVE") {
                $row[] = '<button class="btn status btn-success" account="' . $val->account . '">'
                    . $val->status . '</button>';
            } else {
                $row[] = '<button class="btn status btn-danger" account="' . $val->account . '">'
                    . $val->status . '</button>';
            }
            //$row[] = '<span>'.$val->province. '</span>';
            
            //$row[] = '<span>'.$val->date_created.'</span>';
            $row[] = '<span>'.$val->date_last_access.'</span>';
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function info_TopUser()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/thongke", "topuser");
        } else {
            $this->redirect('admin/login');
        }   
    }
    public function getTopUser()
    {
        $userModel = $this->model('userModel');
        $allUser = $userModel->getTopUser();
        $i = 1;
        $data = [];
        foreach ($allUser as $val) {
            $row = [];
            $row[] = '<span>'.$i++.'</span>';
            $row[] = '<span>'.$val->account.'</span>';
            $row[] = '<span>'.$val->full_name.'</span>';
            // $row[] = '<span>'.$val->email.'</span>';
            $row[] = '<span>'.$val->phone.'</span>';
            $row[] = '<span>'.$val->city.'</span>';
            // if ($val->status == "ACTIVE") {
            //     $row[] = '<button class="btn status btn-success" account="' . $val->account . '">'
            //         . $val->status . '</button>';
            // } else {
            //     $row[] = '<button class="btn status btn-danger" account="' . $val->account . '">'
            //         . $val->status . '</button>';
            // }
            $row[] = '<span>'.$val->province. '</span>';
            $row[] = '<span>'.$val->address. '</span>';
            $row[] = '<span>'.$val->tongtien. '</span>';
            $row[] = '<span>'.$val->date_created.'</span>';
            $row[] = '<span>'.$val->date_last_access.'</span>';
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
    public function disableUser()
    {
        $response = array();
        $userModel = $this->model('userModel');
        $userModel->setData(
            $this->input('Account'),
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        );
        $response['status'] = false;
        if ($userModel->deleteAccount()) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    public function activeUser()
    {
        $response = array();
        $userModel = $this->model('userModel');
        $userModel->setData(
            $this->input('Account'),
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        );
        $response['status'] = false;
        if ($userModel->activeAccount()) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    // warehouse
    /**
     * 
     * redrict info warehouse
     */
    // public function info_warehouse()
    // {
    //     if ($this->getSession('Admin')) {
    //         $this->view("admin/warehouse", "info");
    //     } else {
    //         $this->redirect('admin/login');
    //     }
    // }
    // /**
    //  * 
    //  * redrict insert warehouse
    //  */
    // public function insert_warehouse()
    // {
    //     if ($this->getSession('Admin')) {
    //         $this->view("admin/warehouse", "insert");
    //     } else {
    //         $this->redirect('admin/login');
    //     }
    // }
    // /**
    //  * 
    //  * return all warehouse type obj
    //  */
    // public function getAllWarehouse()
    // {
    //     $warehouseModel = $this->model('warehouseModel');
    //     $allWarehouse = $warehouseModel->getAll();
    //     $i = 1;
    //     $data = [];
    //     foreach ($allWarehouse as $val) {
    //         $row = [];
    //         $row[] = $i++;
    //         $row[] = '<span class="w-name" id_w="' . $val->id . '">' . $val->name . '</span>';
    //         $row[] = '<span class="w-city" id_w="' . $val->id . '">' . $val->city . '</span>';
    //         $row[] = '<span class="w-province" id_w="' . $val->id . '">' . $val->province . '</span>';
    //         $row[] = '<span class="w-address" id_w="' . $val->id . '">' . $val->address . '</span>';
    //         if ($val->status == "ACTIVE") {
    //             $row[] = '<button class="btn status btn-success" id_w="' . $val->id . '">'
    //                 . $val->status . '</button>';
    //             $row[] = '<button class="btn modify btn-info" id_w="' . $val->id . '"
    //                 data-toggle="modal" data-target="#modify-warehouse">Sửa</button>';
    //             $row[] = '<button class="btn detail btn-info" id_w="' . $val->id . '"
    //                 data-toggle="modal" data-target="#detail-warehouse">Chi tiết</button>';
    //         } else {
    //             $row[] = '<button class="btn status btn-danger" id_w="' . $val->id . '">'
    //                 . $val->status . '</button>';
    //             $row[] = '<button class="btn modify btn-info" id_w="' . $val->id . '"
    //                 data-toggle="modal" data-target="#modify-warehouse" disabled>Sửa</button>';
    //             $row[] = '<button class="btn detail btn-info" id_w="' . $val->id . '"
    //                 data-toggle="modal" data-target="#detail-warehouse" disabled>Chi tiết</button>';
    //         }
    //         $row[] = $val->date_created;
    //         $data[] = $row;
    //     }

    //     echo json_encode(['data' => $data]);
    // }
    // /**
    //  * 
    //  * disable warehouse
    //  */
    // public function disableWarehouse()
    // {
    //     $response = array();
    //     $warehouseModel = $this->model('warehouseModel');
    //     $response['status'] = false;
    //     if ($warehouseModel->disableWarehouse($this->input('id'))) {
    //         $response['status'] = true;
    //     }
    //     echo json_encode($response);
    // }
    // /**
    //  * 
    //  * active warehouse
    //  */
    // public function activeWarehouse()
    // {
    //     $response = array();
    //     $warehouseModel = $this->model('warehouseModel');
    //     $response['status'] = false;
    //     if ($warehouseModel->activeWarehouse($this->input('id'))) {
    //         $response['status'] = true;
    //     }
    //     echo json_encode($response);
    // }
    // /**
    //  * 
    //  * save warehouse
    //  */
    // public function saveWarehouse()
    // {
    //     $response = array();
    //     $data = [
    //         $this->input('name'),
    //         $this->input('city'),
    //         $this->input('province'),
    //         $this->input('address'),
    //         $this->input('id')
    //     ];
    //     $warehouseModel = $this->model('warehouseModel');
    //     $response['status'] = false;
    //     if ($warehouseModel->save($data)) {
    //         $response['status'] = true;
    //     }
    //     echo json_encode($response);
    // }
    // /**
    //  * 
    //  * 
    //  * insert warehouse
    //  */
    // public function insertWarehouse()
    // {
    //     $response = array();
    //     $data = [
    //         $this->input('name'),
    //         $this->input('city'),
    //         $this->input('province'),
    //         $this->input('address'),
    //         $this->input('status')
    //     ];
    //     $warehouseModel = $this->model('warehouseModel');
    //     $response['status'] = false;
    //     if ($warehouseModel->insert($data)) {
    //         $response['status'] = true;
    //     } else if ($warehouseModel->checkName($data[0]) > 0) {
    //         $response['NameError'] = 'Kho đã tồn tại';
    //     } else {
    //         $response['msg'] = 'Lỗi không xác định!!';
    //     }
    //     echo json_encode($response);
    // }
    // /**
    //  * 
    //  * 
    //  * details warehouse
    //  */
    // public function detailsWarehouse($id)
    // {
    //     $warehouseModel = $this->model('warehouseModel');
    //     $allWarehouse = $warehouseModel->details($id);
    //     $i = 1;
    //     $data = [];
    //     foreach ($allWarehouse as $val) {
    //         $row = [];
    //         $row[] = $i++;
    //         $row[] = '<span>' . $val->name . '</span>';
    //         $row[] = '<span>' . $val->brand . '</span>';
    //         $row[] = '<span>' . $val->quantity . '</span>';
    //         $row[] = $val->date_modify;
    //         $data[] = $row;
    //     }

    //     echo json_encode(['data' => $data]);
    // }
    //type product
    public function info_type_product()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/product/type", "info");
        } else {
            $this->redirect('admin/login');
        }
    }

    /**
     * 
     * return all type-product type obj
     */
    public function getAllTypeProduct()
    {
        $typeProductModel = $this->model('typeProductModel');
        $allTP = $typeProductModel->getAll();
        $i = 1;
        $data = [];
        foreach ($allTP as $val) {
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="tp-name" id_tp="' . $val->id . '">' . $val->name . '</span>';
            $row[] = '<span class="tp-quantity" id_tp="' . $val->id . '">' . $val->quantity . '</span>';
            // $row[] = '<span class="tp-category" id_tp="'
            //     . $val->id . '" id_category="' . $val->id_category . '">'
            //     . $val->name_category . '</span>';
            if ($val->status == "ACTIVE") {
                $row[] = '<button class="btn status btn-success" id_tp="' . $val->id . '">'
                    . $val->status . '</button>';
                $row[] = '<button class="btn modify btn-info" id_tp="' . $val->id . '"
                    data-toggle="modal" data-target="#modify-type-product">Sửa</button>';
            } else {
                $row[] = '<button class="btn status btn-danger" id_tp="' . $val->id . '">'
                    . $val->status . '</button>';
                $row[] = '<button class="btn modify btn-info" id_tp="' . $val->id . '"
                    data-toggle="modal" data-target="#modify-type-product" disabled>Sửa</button>';
            }
            $row[] = $val->date_created;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
    /**
     * 
     * disable type product
     */
    public function disableTypeProduct()
    {
        $response = array();
        $typeProductModel = $this->model('typeProductModel');
        $response['status'] = false;
        if ($typeProductModel->disableTypeProduct($this->input('id'))) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    /**
     * 
     * active warehouse
     */
    public function activeTypeProduct()
    {
        $response = array();
        $typeProductModel = $this->model('typeProductModel');
        $response['status'] = false;
        if ($typeProductModel->activeTypeProduct($this->input('id'))) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    /**
     * 
     * save warehouse
     */
    public function saveTypeProduct()
    {
        $response = array();
        $data = [
            // $this->input('id_category'),
            $this->input('name'),
            $this->input('id')
        ];
        $typeProductModel = $this->model('typeProductModel');
        $response['status'] = false;
        if ($typeProductModel->save($data)) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    /**
     * 
     * 
     * insert warehouse
     */
    public function insertTypeProduct()
    {
        $response = array();
        $data = [
            $this->input('name'),
            // $this->input('id_category'),
            $this->input('status')
        ];
        $typeProductModel = $this->model('typeProductModel');
        $response['status'] = false;
        if ($typeProductModel->insert($data)) {
            $response['status'] = true;
        } else if ($typeProductModel->checkName($data[0]) > 0) {
            $response['NameError'] = 'Loại sản phẩm đã tồn tại';
        } else {
            $response['msg'] = 'Lỗi không xác định!!';
        }
        echo json_encode($response);
    }
    public function insert_type_product()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/product/type", "insert");
        } else {
            $this->redirect('admin/login');
        }
    }
    // product
    public function info_product()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/product", "info");
        } else {
            $this->redirect('admin/login');
        }
    }
    /**
     * 
     * get all product
     */
    public function getAllProduct()
    {
        $productModel = $this->model('productModel');
        $allProduct = $productModel->getAll();
        $i = 1;
        $data = [];
        foreach ($allProduct as $val) {
            // if ($val->quantity == null) $val->quantity = 0;
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="p-name" id_p="' . $val->id . '">' . $val->name . '</span>';
            $row[] = '<span class="p-type-name" id_p="'
                . $val->id . '" type_id="' . $val->type_id . '">'
                . $val->type_name . '</span>';
            // $row[] = '<span class="p-brand" id_p="' . $val->id . '">' . $val->brand . '</span>';
            // if ($val->color == null) {
            //     $row[] = '<span class="p-color">none</span>';
            // } else {
            //     $row[] = '<input disabled type="color" class="form-control p-color" 
            //         id_p ="' . $val->id . '"value="' . $val->color . '">';
            // }
            $row[] = '<span class="p-price" id_p="' . $val->id . '">' . $val->price . '</span>';
            $row[] = '<span class="p-quantity" id_p="' . $val->id . '">' . $val->stock . '</span>';
            if ($val->status == "ACTIVE") {
                $row[] = '<button class="btn status btn-success" id_p="' . $val->id . '">'
                    . $val->status . '</button>';
                $row[] = '<button class="btn modify btn-info" id_p="' . $val->id . '"
                    data-toggle="modal" data-target="#modify-product">Sửa</button>';
            } else {
                $row[] = '<button class="btn status btn-danger" id_p="' . $val->id . '">'
                    . $val->status . '</button>';
                $row[] = '<button class="btn modify btn-info" id_p="' . $val->id . '"
                    data-toggle="modal" data-target="#modify-product" disabled>Sửa</button>';
            }
            $row[] = '<span class="p-short-discription" id_p="' . $val->id . '">' . $val->short_discription . '</span>';
            //$row[] = '<span class="p-discription" id_p="' . $val->id . '">' . $val->discription . '</span>';
            if ($val->img != null) {
                $row[] = '<img id="img" width="100px" src = "' . $val->img . '"id_p="' . $val->id . '">';
            } else {
                $row[] = '<img id="img" width="100px" src="../public/assets/img/product.png" id_p="' . $val->id . '">';
            }
            $row[] = $val->date_created;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function product_fast()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/thongke", "fastest");
        } else {
            $this->redirect('admin/login');
        }
    }
    public function getProductFast()
    {
        $productModel = $this->model('productModel');
        $allProduct = $productModel->getFastest();
        $i = 1;
        $data = [];
        foreach ($allProduct as $val) {
            // if ($val->quantity == null) $val->quantity = 0;
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="p-name" id_p="' . $val->id . '">' . $val->name . '</span>';
            $row[] = '<span class="p-type-name" id_p="'
                . $val->id . '" type_id="' . $val->type_id . '">'
                . $val->type_name . '</span>';
          
            $row[] = '<span class="p-price" id_p="' . $val->id . '">' . $val->price . '</span>';
     
            $row[] = '<span class="p-count-id" id_p="' . $val->id . '">' . $val->soluong . '</span>';
            $row[] = '<span class="p-short-discription" id_p="' . $val->id . '">' . $val->short_discription . '</span>';
            
            //$row[] = '<span class="p-discription" id_p="' . $val->id . '">' . $val->discription . '</span>';
            if ($val->img != null) {
                $row[] = '<img id="img" width="100px" src = "' . $val->img . '"id_p="' . $val->id . '">';
            } else {
                $row[] = '<img id="img" width="100px" src="../public/assets/img/product.png" id_p="' . $val->id . '">';
            }
            $row[] = $val->date_created;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
    public function product_low()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/thongke", "lowest");
        } else {
            $this->redirect('admin/login');
        }
    }
    public function getProductLow()
    {
        $productModel = $this->model('productModel');
        $allProduct = $productModel->getLowest();
        $i = 1;
        $data = [];
        foreach ($allProduct as $val) {
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="p-name" id_p="' . $val->id . '">' . $val->name . '</span>';
            $row[] = '<span class="p-type-name" id_p="'
                . $val->id . '" type_id="' . $val->type_id . '">'
                . $val->type_name . '</span>';          
            $row[] = '<span class="p-price" id_p="' . $val->id . '">' . $val->price . '</span>';     
            $row[] = '<span class="p-count-id" id_p="' . $val->id . '">' . $val->soluong . '</span>';
            $row[] = '<span class="p-short-discription" id_p="' . $val->id . '">' . $val->short_discription . '</span>';                       
            if ($val->img != null) {
                $row[] = '<img id="img" width="100px" src = "' . $val->img . '"id_p="' . $val->id . '">';
            } else {
                $row[] = '<img id="img" width="100px" src="../public/assets/img/product.png" id_p="' . $val->id . '">';
            }
            $row[] = $val->date_created;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function product_nohope()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/thongke", "nohope");
        } else {
            $this->redirect('admin/login');
        }
    }

    public function getProductNoHope()
    {
        $productModel = $this->model('productModel');
        $allProduct = $productModel->getProductNoHope();
        $i = 1;
        $data = [];
        foreach ($allProduct as $val) {   
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="p-name" id_p="' . $val->id . '">' . $val->name . '</span>';
            $row[] = '<span class="p-type-name" id_p="'. $val->id . '" type_id="' . $val->type_id . '">'. $val->type_name . '</span>';          
            $row[] = '<span class="p-price" id_p="' . $val->id . '">' . $val->price . '</span>';                
            $row[] = '<span class="p-short-discription" id_p="' . $val->id . '">' . $val->short_discription . '</span>';                
            if ($val->img != null) {
                $row[] = '<img id="img" width="100px" src = "' . $val->img . '"id_p="' . $val->id . '">';
            } else {
                $row[] = '<img id="img" width="100px" src="../public/assets/img/product.png" id_p="' . $val->id . '">';
            }
            $row[] = $val->date_created;
            $data[] = $row;
        }
        echo json_encode(['data' => $data]);
    }

    public function getAllShipper()
    {
        $orderModel = $this->model('orderModel');
        $allShipper = $orderModel->getAllShipper();
        $i = 1;
        $data = [];
        foreach ($allShipper as $val) {
            // if ($val->quantity == null) $val->quantity = 0;
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="p-name" id_s="' . $val->id . '">' . $val->name . '</span>';
            $row[] = '<span class="p-phone" id_s="'. $val->id .'">'. $val->phone . '</span>';
            $row[] = '<button class="btn modify_shp btn-info" id_s="' . $val->id .
             '" data-toggle="modal" data-target="#modify-shipper">Sửa</button>';
            $row[] = '<button class="btn delete_shp btn-danger" id_s="' . $val->id . '" >Xóa</button>';
         
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
    /**
     * 
     * disable product
     */
    public function disableProduct()
    {
        $response = array();
        $productModel = $this->model('productModel');
        $response['status'] = false;
        if ($productModel->disableProduct($this->input('id'))) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    /**
     * 
     * active product
     */
    public function activeProduct()
    {
        $response = array();
        $productModel = $this->model('productModel');
        $response['status'] = false;
        if ($productModel->activeProduct($this->input('id'))) {
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    /**
     * 
     * 
     * get type product for tag select
     */
    public function getTypeProductForTagSelect()
    {
        $response = array();
        $TypeProductModel = $this->model('TypeProductModel');
        $response['status'] = true;
        $allTP = $TypeProductModel->getAll();
        $data = array();
        foreach ($allTP as $val) {
            $row = array();
            $row[] = $val->id;
            $row[] = $val->name;
            $data[] = $row;
        }
        $response['data'] = $data;
        echo json_encode($response);
    }

    public function getShipperForTagSelect()
    {
        $response = array();
        $orderModel = $this->model('orderModel');
        $response['status'] = true;
        $allSHP = $orderModel->getAllShipper();
        $data = array();
        foreach ($allSHP as $val) {
            $row = array();
            $row[] = $val->id;
            $row[] = $val->name;
            $data[] = $row;
        }
        $response['data'] = $data;
        echo json_encode($response);
    }
    /**
     * 
     * 
     
     * get one product
     */
    public function getOneProduct()
    {
        $response = array();
        $productModel = $this->model('productModel');
        $response['status'] = true;
        $productModel = $productModel->get($this->input('id'));
        $response['data'] = $productModel;
        echo json_encode($response);
    }

    public function getOneShipper()
    {
        $response = array();
        $orderModel = $this->model('orderModel');
        $response['status'] = true;
        $orderrModel = $orderModel->get($this->input('id'));
        $response['data'] = $orderrModel;
        echo json_encode($response);
    }
    // public function getOneProduct()
    // {
    //     $response = array();
    //     $productModel = $this->model('productModel');
    //     $response['status'] = true;      
    //     $response['data'] = $productModel->get($this->input('id'));
       
    //     echo json_encode($response);
    // }
    
    // public function getWarehouseByIdProduct()
    // {
    //     $response = array();
    //     $productModel = $this->model('productModel');
    //     $response['status'] = true;
    //     $productModel = $productModel->getWarehouse($this->input('id'));
    //     $response['data'] = $productModel;
    //     echo json_encode($response);
    // }
    /**
     * 
     * save product
     */
    public function saveProduct()
    {
        $response = array();
        $data_p = [
            $this->input('name'),
            $this->input('stock'),        
            $this->input('price'),
            $this->input('img'),
            $this->input('short_discription'),
            $this->input('discription'),
            $this->input('id_type'),
            $this->input('id')
        ];
        //quantity, id_pro, id_ware
        // $id_pro = $this->input('id');    
        $productModel = $this->model('productModel');
        $response['status'] = false;
        $productModel->save($data_p);        
        $response['status'] = true;        
        echo json_encode($response);
    }

    public function saveShipper()
    {
        $response = array();
        $data_s = [
            $this->input('name'),
            $this->input('phone'),        
            $this->input('id')
        ];
        //quantity, id_pro, id_ware
        // $id_pro = $this->input('id');    
        $orderModel = $this->model('orderModel');
        $response['status'] = false;
        $orderModel->saveShipper($data_s);        
        $response['status'] = true;        
        echo json_encode($response);
    }

    public function deleteShipper()
    {
        $response = array();
        $data_s = [
                 
            $this->input('id')
        ];
         
        $orderModel = $this->model('orderModel');
        $response['status'] = false;
        $orderModel->deleteShipper($data_s);        
        $response['status'] = true;        
        echo json_encode($response);
    }
    /**
     * 
     * 
     * insert product
     */
    public function insertProduct()
    {
        $response = array();
        $data_p = [
            $this->input('name'),
            // $this->input('brand'),
            // $this->input('color'),
            $this->input('stock'),
            $this->input('price'),
            $this->input('img'),
            $this->input('short_discription'),
            $this->input('discription'),
            $this->input('id_type')
        ];
        // $data_w = $this->input('warehouse');
        $productModel = $this->model('productModel');
        $response['status'] = false;
        $id = $productModel->insert($data_p);    
        $response['status'] = true;
        
        echo json_encode($response);
    }
    public function insert_product()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/product", "insert");
        } else {
            $this->redirect('admin/login');
        }
    }

    //shipper
    public function insert_shipper()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/shipper", "insert");
        } else {
            $this->redirect('admin/login');
        }
    }

    public function insertShipper()
    {
        $response = array();
        $data_s = [
            $this->input('name'),         
            $this->input('phone'),         
        ];
        // $data_w = $this->input('warehouse');
        $orderModel = $this->model('orderModel');
        $response['status'] = false;
        $id = $orderModel->insert_shipper($data_s);    
        $response['status'] = true;
        
        echo json_encode($response);
    }
    // order
    public function info_order()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/order", "info");
        } else {
            $this->redirect('admin/login');
        }
    }

    public function info_shipper()
    {
        if ($this->getSession('Admin')) {
            $this->view("admin/shipper", "info");
        } else {
            $this->redirect('admin/login');
        }
    }
    

    public function getAllOrder(){
        $orderModel = $this->model('orderModel');
        $allOrder = $orderModel->getAllOrder();
        $data = [];
        $i = 1;
        foreach ($allOrder as $val) {
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="o-full-name">'
                . $val->ship_name . '</span>';
            $row[] = '<span class="o-phone">' . $val->ship_phone . '</span>';
            $row[] = '<span class="o-shipping-fee">' . $this->formatPrice($val->ship_fee) . '</span>';
            $row[] = '<span class="o-total-price">' . $this->formatPrice($val->total_price) . '</span>';
            $row[] = '<span class="o-shipper-name">' . $val->shpname . '</span>';
            if ($val->status == 'Chờ xác nhận') {
                $row[] = '<button class="btn modify btn-info" id_o="' . $val->id . '"
                data-toggle="modal" data-target="#modify-order" id="modify">Chi tiết</button>';
                $row[] = '<span class="btn btn-secondary o-status">'.$val->status.'</span>' ;
                $row[] = '<button class="btn o-cancel btn-danger" id_o="' . $val->id
                    . '">Hủy đơn hàng</button>';
                //$row[] = '<button class="btn next-status btn-primary" id_o="' . $val->id . '"disabled>Chuyển</button>';
            } else if ($val->status == 'Đã xác nhận') {
               
                $row[] = '<button class="btn modify btn-info" id_o="' . $val->id . '"
                    data-toggle="modal" data-target="#modify-order">Chi tiết</button>';
                $row[] = '<span class="btn btn-success o-status">'.$val->status.'</span>&nbsp<i class="fa fa-forward next-status"  id_o="' . $val->id . '"aria-hidden="true"></i>';
                $row[] = '<button class="btn o-cancel btn-danger" id_o="' . $val->id
                . '">Hủy đơn hàng</button>';
                // $row[] = '<button class="btn next-status btn-primary" id_o="' . $val->id . '"
                //     >Chuyển</button>';
            } else if($val->status == 'Đang giao') {
                
                $row[] = '<button class="btn modify btn-info" id_o="' . $val->id . '"
                    data-toggle="modal" data-target="#modify-order">Chi tiết</button>';
                $row[] = '<span class="btn btn-warning o-status">'.$val->status.'</span>&nbsp <i class="fa fa-forward next-status"  id_o="' . $val->id . '"aria-hidden="true"></i>';
                $row[] = '<button class="btn o-cancel btn-danger" id_o="' . $val->id
                . '">Hủy đơn hàng</button>';
                // $row[] = '<button class="btn next-status btn-primary" id_o="' . $val->id . '"
                //     >Chuyển</button>';
            }
            else  {
                
                $row[] = '<button class="btn detail btn-info" id_o="' . $val->id . '"
                    data-toggle="modal" data-target="#detail-order">Chi tiết</button>';
                $row[] = '<span class="btn btn-warning o-status">'.$val->status.'</span>';                 ;
                $row[] = '<button class="btn o-cancel btn-danger" id_o="' . $val->id
                . ' "disabled>Hủy đơn hàng </button>';
            }
            
           
            $row[] = '<span class="o-address" id_o="' . $val->id . '">' . $val->address . '</span>';
            if ($val->account == null){
                $row[] = '<span class="o-account" id_o="' . $val->id . '"><i>(none)</i></span>';
            } else {
                $row[] = '<span class="o-account" id_o="' . $val->id . '">'.$val->account.'</span>';
            }
            $row[] = $val->date_created;
            $row[] = $val->date_modify;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function detailOrder(){
        $orderModel = $this->model('orderModel');
        $productModel = $this->model('productModel');
        $id = $this->input('id_o');
        $res = array();
        $res['order'] = $orderModel->getDetailOrder($id);

        $res['shp']=$orderModel->get($res['order']->id_shipper);

        $res['od'] = $orderModel->getDetailProductOrder($id);
        $w = array();
        for($i=0; $i<count($res['od']); $i++){
             $w[] = $productModel->stockProduct($res['od'][$i]->id_product);
        }
        $res['w'] = $w;
        echo json_encode($res);
    }

    public function confirmOrder(){
        $res = array();
        $o = $this->input('o');
        $od = $this->input('od');
        $orderModel = $this->model('orderModel');
        $productModel = $this->model('productModel');
  

        $data = array(
            $o['shipping_fee'],
            $o['total_price'],
            $o['full_name'],
            $o['address'],
            $o['city'],
            $o['province'],
            $o['id_shipper'],
            $o['id']          
        );
        $orderModel->updateOrder($data);             
        for($i=0; $i<count($od); $i++){
            $data_st = array(
                $od[$i]['quan_w'],
                $od[$i]['id_p']            
            );
            $productModel->updateStockProduct($data_st);
            $data_od = array(            
                $od[$i]['quan'],
                $od[$i]['price'],
                $o['id'],
                $od[$i]['id_p']
            );
            $orderModel->updateDetailOrder($data_od);        
        }

        $orderModel->updateStatusConfirmed($o['id']);
        $res['status'] = true;            
        echo json_encode($res);                           
    }

    public function nextStatus(){
        $res = array();
        $orderModel = $this->model('orderModel');
        $id = $this->input('id');
        $status = $orderModel->getStatus($id)->status;
        if($status == "Đã xác nhận"){
            $orderModel->updateStatusDeliver($id);
        } else {
            $orderModel->updateStatusDone($id);
        }
        $res['status'] = true;
        echo json_encode($res);
    }

    public function cancel(){
        $res = array();
        $orderModel = $this->model('orderModel');
        $id = $this->input('id');
        $status = $orderModel->getStatus($id)->status;
        if($status != "Chờ xác nhận"){
            $od = $orderModel->getDetailProductOrder($id);
            $productModel = $this->model('productModel');
            foreach($od as $val) {
                $data = [
                    $val->quantity,
                    $val->id_product,                   
                ];
                $productModel->restoreStockProduct($data);
            }
        }
        $orderModel->updateStatusCancel($id);
        $res['status'] = true;
        echo json_encode($res);
    }
    public function deleteOrder(){
        $res = array();
        $orderModel = $this->model('orderModel');
        $id = $this->input('id');
        
        $orderModel->delete($id);
        $res['status'] = true;
        echo json_encode($res);
    }
    // order have cancel
    public function order_cancel(){
        if ($this->getSession('Admin')) {
            $this->view("admin/order", "orderCancel");
        } else {
            $this->redirect('admin/login');
        }
    }
    public function getAllOrderCancel(){
        $orderModel = $this->model('orderModel');
        $allOrder = $orderModel->getAllOrderCancel();
        $data = [];
        $i = 1;
        foreach ($allOrder as $val) {
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="o-full-name">'
                . $val->ship_name . '</span>';
            $row[] = '<span class="o-phone">' . $val->ship_phone . '</span>';
            $row[] = '<span class="o-shipping-fee">' . $this->formatPrice($val->ship_fee) . '</span>';
            $row[] = '<span class="o-total-price">' . $this->formatPrice($val->total_price) . '</span>';                                    
            $row[] = '<button class="btn detail btn-info" id_o="' . $val->id . '"
                data-toggle="modal" data-target="#detail-order">Chi tiết</button>';                        
            $row[] = '<button class="btn o-delete btn-danger" id_o="' . $val->id. '">Xóa đơn hàng</button>';
                                                         
            if ($val->account == null){
                $row[] = '<span class="o-account" id_o="' . $val->id . '"><i>(none)</i></span>';
            } else {
                $row[] = '<span class="o-account" id_o="' . $val->id . '">'.$val->account.'</span>';
            }
            $row[] = '<span class="o-address" id_o="' . $val->id . '">' . $val->address . '</span>';
            $row[] = $val->date_created;
            $row[] = $val->date_modify;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
    // invoice
  
    public function getAllInvoice(){
        $orderModel = $this->model('orderModel');
        $allOrder = $orderModel->getAllInvoice();
        $data = [];
        $i = 1;
        foreach ($allOrder as $val) {
            $row = [];
            $row[] = $i++;
            $row[] = '<span class="o-full-name">'
                . $val->full_name . '</span>';
            $row[] = '<span class="o-phone">' . $val->phone . '</span>';
            $row[] = '<span class="o-shipping-fee">' . $this->formatPrice($val->shipping_fee) . '</span>';
            $row[] = '<span class="o-total-price">' . $this->formatPrice($val->total_price) . '</span>';
            $row[] = '<button class="btn detail btn-info" id_o="' . $val->id . '"'
                .'data-toggle="modal" data-target="#detail-order">Chi tiết hóa đơn</button>';
            if ($val->account == null){
                $row[] = '<span class="o-account" id_o="' . $val->id . '"><i>(none)</i></span>';
            } else {
                $row[] = '<span class="o-account text-center" id_o="' . $val->id . '">'.$val->account.'</span>';
            }
            $row[] = '<span class="o-address" id_o="' . $val->id . '">' . $val->address . '</span>';
            $row[] = $val->date_created;
            $row[] = $val->date_modify;
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

   
     public function info_invoice()
     {
         if ($this->getSession('Admin')) {
             $this->view("admin/order/invoice", "info");
         } else {
             $this->redirect('admin/login');
         }
     }

}
