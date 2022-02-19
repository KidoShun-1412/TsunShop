<?php

class userModel{

    private $account, $password, $fullName, $email, $phone, $address, $city, $province;
    private $db;

    public function __construct(){
        $this->db = new database;
    }
    /**
     * 
     * set data for modal
     */
    public function setData($Account, $Password, $FullName, $Email, $Phone, $Address, $City, $Province){
        $this->account = $Account;
        $this->password = $Password;
        $this->fullName = $FullName;
        $this->email = $Email;
        $this->phone = $Phone;
        $this->address = $Address;
        $this->city = $City;
        $this->province = $Province;
    }
    /**
     * 
     * create user
     */
    //return true or false
    public function signup(){
        return $this->db->Query("CALL createUser(?,?,?,?,?,?,?,?)", $this->toArray());
    }
    /**
     * 
     * check acount exit
     */
    //return rows selected
    public function checkAccount(){
        $this->db->Query("select * from mp_user where account=?", array($this->account));
        return $this->db->rowCount();
    }
    /**
     * 
     * check account valid
     */
    //return rows selected
    public function checkActive(){
        $this->db->Query("select * from mp_user where status='ACTIVE' and account=?", array($this->account));
        return $this->db->rowCount();
    }
    /**
     * 
     * check phone unique
     */
    //return rows selected
    public function checkPhone(){
        $this->db->Query("select * from mp_user where phone=?", array($this->phone));
        return $this->db->rowCount();
    }
    /**
     * 
     * check password
     */
    //return rows selected
    public function checkPassword(){
        $this->db->Query("select * from mp_user where account=? and password=?", array($this->account, $this->password));
        return $this->db->rowCount();
    }
    /**
     * 
     * update last date access
     */
    public function updateLastAccess(){
        $this->db->Query("update mp_user set 
                        date_last_access=SYSDATE() 
                        where id=?", 
            array($this->getIdUser($this->account)));
        return $this->db->rowCount();
    }
    /**
     * 
     * set data model by account
     */
    public function getUser($Account){
        $this->db->Query("select * from mp_user where account=?", array($Account));
        $obj = $this->db->fetch();
        
        $this->account = $obj->account;
        $this->password = $obj->password;
        $this->fullName = $obj->full_name;
        $this->email = $obj->email;
        $this->phone = $obj->phone;
        $this->address = $obj->address;
        $this->city = $obj->city;
        $this->province = $obj->province;
        //return $obj;
    }
    public function getUserByAccount($Account){
        $this->db->Query("select * from mp_user where account=?", array($Account));
         return  $this->db->fetch();
        
        // $this->account = $obj->account;
        // $this->password = $obj->password;
        // $this->fullName = $obj->full_name;
        // $this->email = $obj->email;
        // $this->phone = $obj->phone;
        // $this->address = $obj->address;
        // $this->city = $obj->city;

    }
    /**
     * 
     * get id user by account
     */
    public function getIdUser($Account){
        $this->db->Query("select * from mp_user where account =?", array($Account));
        $obj = $this->db->fetch();
        return $obj->id;
    }
    /**
     * 
     * update user
     */
    //return rows update
    public function updateUser(){
        $this->db->Query("update mp_user set full_name=?, email=?, address=?, city=?, province=? where id=?",
            array($this->fullName, $this->email, $this->address, $this->city, $this->province, $this->getIdUser($this->account)));
        return $this->db->rowCount();
    }
    /**
     * 
     * update password
     */
    //return rows update
    public function updatePassword($newPassword){
        $this->db->Query("update mp_user set password=? where account=?",
            array($newPassword, $this->account));
        return $this->db->rowCount();
    }
    /**
     * 
     * get avtar
     */
    public function getImg($Account){
        $this->db->Query("select img from mp_user where account=?",
            array($Account));
        return $this->db->fetch();
    }
    /**
     * 
     * set avatar
     */
    public function setImg($img){
        $this->db->Query("update mp_user set img=? where account=?",
            array($img, $this->account));
        return $this->db->rowCount();
    }
    /**
     * 
     * disable account
     */
    public function deleteAccount(){
        $this->db->Query("update mp_user set status='DISABLE' where id=?", 
            array($this->getIdUser($this->account)));
        return $this->db->rowCount();
    }
    /**
     * 
     * active account
     */
    public function activeAccount(){
        $this->db->Query("update mp_user set status='ACTIVE' where id=?", 
            array($this->getIdUser($this->account)));
        return $this->db->rowCount();
    }
    /**
     * 
     * return all user type array[obj, obj, ...]
     */
    public function getAll(){
        $this->db->Query("select * from mp_user");
        return $this->db->fetchAll();
    }


    public function getTopUser(){
        $this->db->Query("select sum(o.total_price) as tongtien, u.account,u.full_name,u.address,u.city,u.province,u.phone,
        u.date_created,u.date_last_access
        FROM (mp_order o join mp_user u on o.id_user=u.id)
        GROUP BY u.account
        ORDER BY sum(o.total_price) desc
        LIMIT 10
        ");
        return $this->db->fetchAll();
    }
    /**
     * 
     * return data to array
     */
    public function toArray(){
        return array(
            $this->account,
            $this->password,
            $this->fullName,
            $this->email,
            $this->phone,
            $this->address,
            $this->city,
            $this->province
        );
    }

    
}

?>