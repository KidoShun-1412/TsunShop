<?php

class userControl extends BaseController{
    public function __construct(){
        $this->userModel = $this->model('userModel');
    }
    public function signup(){
        $this->unsetSession('Account');
        $this->view("user","signup");
    }
    public function login(){
        if($this->getSession('Account')){
            $this->redirect("/user/profile");
        } else {
            $this->view("user","login");
        }
    }
    public function profile(){
        if($this->getSession('Account')){
            $userPro = [
                'Account',
                'Password',
                'FullName',
                'Email',
                'Phone',
                'Address',
                'City',
                'Province'
            ];
            $this->userModel->getUser($this->getSession('Account'));
            $this->view("user","profile",array_combine($userPro,$this->userModel->toArray()));
        } else {
            $this->redirect("/user/login");
        }
    }
    public function logout($msg="Bạn đã đăng xuất thành công"){
        $this->unsetSession('Account');
        $this->view("user","login",array("msg" => $msg));
    }
    public function logout_s($msg="Xóa tài khoản thành công"){
        $this->unsetSession('Account');
        $this->view("user","login",array("msg" => $msg));
    }
    public function createAccount(){
        $response = array();
        $userData = [
            'Account' => $this->input('Account'),
            'Password' => $this->input('Password'),
            'FullName' => $this->input('FullName'),
            'Email' => $this->input('Email'),
            'Phone' => $this->input('Phone'),
            'Address' => $this->input('Address'),
            'City' => $this->input('City'),
            'Province' => $this->input('Province'),
        ];
        $this->userModel->setData(
            $userData['Account'],
            $userData['Password'],
            $userData['FullName'],
            $userData['Email'],
            $userData['Phone'],
            $userData['Address'],
            $userData['City'],
            $userData['Province']
        );
        $response['status'] = $this->userModel->signup($userData);
        if($response['status'] == false){
            if($this->userModel->checkAccount() > 0){
                $response['AccountError'] = "Tài khoản đã tồn tại";
             }
            if($this->userModel->checkPhone() > 0){
                $response['PhoneError'] = "Số điện thoại đã được sử dụng cho tài khoản khác";
            }
        }
        echo json_encode($response);
    }

    public function loginAccount(){
        $response = array();
        $userData = [
            'Account' => $this->input('Account'),
            'Password' => $this->input('Password'),
            'FullName' => "",
            'Email' => "",
            'Phone' => "",
            'Address' => "",
            'City' => "",
            'Province' => "",
        ];
        $this->userModel->setData(
            $userData['Account'],
            $userData['Password'],
            $userData['FullName'],
            $userData['Email'],
            $userData['Phone'],
            $userData['Address'],
            $userData['City'],
            $userData['Province']
        );
        if($this->userModel->checkAccount() < 1){
            $response['AccountError'] = "Tài khoản không tồn tại";
        } else if ($this->userModel->checkActive() < 1){
            $response['AccountError'] = "Tài khoản đã bị xóa";
        } else {
            if($this->userModel->checkPassword() < 1){
                $response['PasswordError'] = "Sai mật khẩu";
                $response['status'] = false;
            } else {
                if($this->userModel->updateLastAccess() > 0){
                    $response['status'] = true;
                    $this->setSession('Account', $userData['Account']);
                } else {
                    $response['status'] = true;
                }
            }
        }
        echo json_encode($response);
    }

    public function updateUser(){
        $response = array();
        $userData = [
            'Account' => $this->input('Account'),
            'Password' => $this->input('Password'),
            'FullName' => $this->input('FullName'),
            'Email' => $this->input('Email'),
            'Phone' => $this->input('Phone'),
            'Address' => $this->input('Address'),
            'City' => $this->input('City'),
            'Province' => $this->input('Province'),
        ];
        $this->userModel->setData(
            $userData['Account'],
            $userData['Password'],
            $userData['FullName'],
            $userData['Email'],
            $userData['Phone'],
            $userData['Address'],
            $userData['City'],
            $userData['Province']
        );
        if($this->userModel->updateUser() > 0){
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }
        echo json_encode($response);
    }

    public function updatePassword($newPassword){
        $response = array();
        $userData = [
            'Account' => $this->input('Account'),
            'Password' => $this->input('Password'),
            'FullName' => $this->input('FullName'),
            'Email' => $this->input('Email'),
            'Phone' => $this->input('Phone'),
            'Address' => $this->input('Address'),
            'City' => $this->input('City'),
            'Province' => $this->input('Province'),
        ];
        $this->userModel->setData(
            $userData['Account'],
            $userData['Password'],
            $userData['FullName'],
            $userData['Email'],
            $userData['Phone'],
            $userData['Address'],
            $userData['City'],
            $userData['Province']
        );
        //echo $userData['Password'];
        if($this->userModel->checkPassword() < 1){
            $response['PasswordError'] = "Sai mật khẩu!!";
            $response['status'] = false;
        } else {
            if($this->userModel->updatePassword($newPassword) > 0){
                $response['status'] = true;
            } else {
                $response['status'] = false;
            }
        }
        echo json_encode($response);
    }

    public function setImg(){
        $response = array();
        $userData = [
            'Account' => $this->input('Account'),
            'Password' => $this->input('Password'),
            'FullName' => $this->input('FullName'),
            'Email' => $this->input('Email'),
            'Phone' => $this->input('Phone'),
            'Address' => $this->input('Address'),
            'City' => $this->input('City'),
            'Province' => $this->input('Province'),
            'Img' => $this->input('Img')
        ];
        $this->userModel->setData(
            $userData['Account'],
            $userData['Password'],
            $userData['FullName'],
            $userData['Email'],
            $userData['Phone'],
            $userData['Address'],
            $userData['City'],
            $userData['Province']
        );
        $response['status'] = false;
        
        if($this->userModel->setImg($userData['Img']) > 0){
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    public function deleteAccount(){
        $response = array();
        $this->userModel->setData(
            $this->getSession('Account'),
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        );
        $response['status'] = false;
        if($this->userModel->deleteAccount() > 0){
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    public function getAll(){
        return $this->userModel->getAll();
    }
    public function getOrderByAcc(){
             
        $account = $this->getSession('Account');  
                                                 
        $orderModel = $this->model('orderModel');
        $allOrder = $orderModel->getOrderByAcc($account);
        $data = [];
        $i = 1;
        foreach ($allOrder as $val) {
            $row = [];
    
            $row[] = '<span class="o-full-name">'
                . $val->ship_name . '</span>';
            $row[] = '<span class="o-phone">' . $val->ship_phone . '</span>';
            //$row[] = '<span class="o-shipping-fee">' . $this->formatPrice($val->ship_fee) . '</span>';
            $row[] = '<span class="o-total-price">' . $this->formatPrice($val->total_price) . '</span>';           
            $row[] = '<span class="o-status">'.$val->status.'</span>';                 ;                          
            $row[] = '<span class="o-address" id_o="' . $val->id . '">' . $val->ship_address . '</span>';           
            $row[] = $val->date_created;

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
}







?>