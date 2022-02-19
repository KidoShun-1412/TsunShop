<?php


class warehouseModel
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }
    /**
     * 
     * get all ware house
     */
    public function getAll()
    {
        $this->db->Query("select * from mp_warehouse");
        return $this->db->fetchAll();
    }
    /**
     * 
     * active warehouse
     */
    public function activeWarehouse($id)
    {
        $this->db->Query("update mp_warehouse set status='ACTIVE' where id=?", array($id));
        return $this->db->rowCount();
    }
    /**
     * 
     * disable warehouse
     */
    public function disableWarehouse($id)
    {
        $this->db->Query("update mp_warehouse set status='DISABLE' where id=?", array($id));
        return $this->db->rowCount();
    }
    /**
     * 
     * save warehouse
     */
    public function save($data){
        $this->db->Query("update mp_warehouse set name=?, city=?, province=?, address=? where id=?", $data);
        return $this->db->rowCount();
    }
    /**
     * 
     * insert warehouse
     */
    public function insert($data){
        $this->db->Query("insert into mp_warehouse(name,city,province,address,status) 
                values(?,?,?,?,?)", $data);
        return $this->db->rowCount();
    }
    /**
     * 
     * check name unique
     */
    public function checkName($name){
        $this->db->Query("select * from mp_warehouse where name=?", array($name));
        return $this->db->rowCount();
    }
    /**
     * 
     * 
     * detail
     */
    public function details($id){
        $this->db->Query("select p.name, p.brand, wd.quantity, wd.date_created, wd.date_modify
        FROM ((select * from mp_product where status='ACTIVE') p 
        join mp_warehouse_detail wd on p.id=wd.id_product) where wd.id_warehouse=?", array($id));
        return $this->db->fetchAll();
    }
}
