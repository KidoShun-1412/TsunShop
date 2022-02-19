<?php


class typeProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }
    /**
     * 
     * get all type product
     */

    public function gettest()
    {
        $this->db->Query("select id from mp_category");
        return $this->db->fetchAll();
    }

    public function getAll()
    {
        $this->db->Query("select tp.id, tp.name, count(p.id_type) quantity, tp.status, tp.date_created
        from (mp_type_product tp left join mp_product p on tp.id = p.id_type)        
        group by p.id_type, tp.id");
        return $this->db->fetchAll();
    }

    /**
     * 
     * get one type product
     */
    public function get($id='1')
    {
        $this->db->Query("select * from mp_type_product where id=?",array($id));
        return $this->db->fetch();
    }
    /**
     * 
     * active type product
     */
    public function activeTypeProduct($id)
    {
        $this->db->Query("update mp_type_product set status='ACTIVE' where id=?", array($id));
        return $this->db->rowCount();
    }
    /**
     * 
     * disable type product
     */
    public function disableTypeProduct($id)
    {
        $this->db->Query("update mp_type_product set status='DISABLE' where id=?", array($id));
        return $this->db->rowCount();
    }
    /**
     * 
     * save type product
     */
    public function save($data){
        $this->db->Query("update mp_type_product set  name=? where id=?", $data);
        return $this->db->rowCount();
    }
    /**
     * 
     * insert type product
     */
    public function insert($data){
        $this->db->Query("insert into mp_type_product(name,status) 
                values(?,?)", $data);
        return $this->db->rowCount();
    }
    /**
     * 
     * check name unique
     */
    public function checkName($name){
        $this->db->Query("select * from mp_type_product where name=?", array($name));
        return $this->db->rowCount();
    }
    /**
     * 
     * get all type product by id_category
     */
    public function getTypeProduct()
    {
        $this->db->Query("select id, name
        from mp_type_product where status='ACTIVE'");

        return $this->db->fetchAll();
    }
}
