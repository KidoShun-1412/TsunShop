<?php


class productModel
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }
    /**
     * 
     * get all type product
     * 
     * id, name, brand, color, price, img, short_dis, dis, type_id, 
     * type_name, quantity, status, date_created, date_modify
     */

    
    public function getAll()
    {
        $this->db->Query("select mp.id, mp.name, mp.price, mp.img, mp.short_discription, mp.discription,mp.stock,
         tp.id type_id, tp.name type_name, mp.status, mp.date_created, mp.date_modify
          FROM mp_product mp join mp_type_product tp on mp.id_type=tp.id") ;          
        return $this->db->fetchAll();
    }
      
    public function getLastest()
    {
        $this->db->Query("select mp.id, mp.name, mp.price, mp.img, mp.short_discription, mp.discription,mp.stock,
         tp.id type_id, tp.name type_name, mp.status, mp.date_created, mp.date_modify
          FROM mp_product mp join mp_type_product tp on mp.id_type=tp.id
          where mp.status='ACTIVE'   
          ORDER by mp.date_created desc
          
          Limit 10") ;          
        return $this->db->fetchAll();
    }
    public function getLastestBT($id_t)
    {
        $this->db->Query("select mp.id, mp.name, mp.price, mp.img, mp.short_discription, mp.discription,mp.stock,
         tp.id type_id, tp.name type_name, mp.status, mp.date_created, mp.date_modify
          FROM mp_product mp join mp_type_product tp on mp.id_type=tp.id
          WHERE tp.id=? and mp.status='ACTIVE'   
          ORDER by mp.date_created desc
          Limit 10",array($id_t)) ;          
        return $this->db->fetchAll();
    }
    public function getFastestDp()
    {
        $this->db->Query("SELECT p.id,sum(od.quantity) as soluong,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock,
        p.date_created,
        tp.id as type_id,tp.name as type_name
        FROM (mp_product p JOIN mp_order_detail od ON p.id= od.id_product)JOIN mp_type_product tp on p.id_type=tp.id
        where  p.status='ACTIVE' 
        GROUP BY id 
        ORDER BY SUM(od.quantity) DESC
        LIMIT 10") ;          
        return $this->db->fetchAll();
    }
    public function getFastest()
    {
        $this->db->Query("SELECT p.id,sum(od.quantity) as soluong,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock,
        p.date_created,
        tp.id as type_id,tp.name as type_name
        FROM (mp_product p JOIN mp_order_detail od ON p.id= od.id_product)JOIN mp_type_product tp on p.id_type=tp.id
        where  p.status='ACTIVE' and month(od.date_modify)=month(sysdate()) 
        GROUP BY id 
        ORDER BY SUM(od.quantity) DESC
        LIMIT 10") ;          
        return $this->db->fetchAll();
    }
    public function getLowest()
    {
        $this->db->Query("SELECT p.id,sum(od.quantity) as soluong,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock,
        p.date_created,
        tp.id as type_id,tp.name as type_name
        FROM (mp_product p JOIN mp_order_detail od ON p.id= od.id_product)JOIN mp_type_product tp on p.id_type=tp.id
        where  p.status='ACTIVE'  and month(od.date_modify)=month(sysdate()) 
        GROUP BY id 
        ORDER BY SUM(od.quantity) ASC
        LIMIT 10") ;          
        return $this->db->fetchAll();
    }

    public function getProductNoHope()
    {
        $this->db->Query("SELECT p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock,
        p.date_created,
        tp.id as type_id,tp.name as type_name
        FROM mp_product p JOIN mp_type_product tp on p.id_type=tp.id
        WHERE p.id not in(SELECT id_product FROM mp_order_detail ) and p.status='ACTIVE' ")  ;          
        return $this->db->fetchAll();
    }
    public function getFastestBT($id_t)
    {
        $this->db->Query("SELECT p.id,SUM(od.quantity) as soluong,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock
        FROM (mp_product p JOIN mp_order_detail od ON p.id= od.id_product) JOIN mp_type_product tp on p.id_type=tp.id
        WHERE tp.id=? and p.status='ACTIVE'   
        GROUP BY id 
        ORDER BY SUM(od.quantity) DESC
        LIMIT 10", array($id_t)) ;          
        return $this->db->fetchAll();
    }
    public function getDePrice()
    {
        $this->db->Query("SELECT p.id,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock
        FROM mp_product p   
        where p.status='ACTIVE'       
        ORDER BY p.price desc") ;          
        return $this->db->fetchAll();
    }
    public function getDePriceBT($id_t)
    {
        $this->db->Query("SELECT p.id,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock
        FROM mp_product p JOIN mp_type_product tp ON p.id_type = tp.id
        WHERE tp.id=? and p.status='ACTIVE'        
        ORDER BY p.price desc",array($id_t)) ;          
        return $this->db->fetchAll();
    }
    public function getInPrice()
    {
        $this->db->Query("SELECT p.id,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock
        FROM mp_product p  
        where p.status='ACTIVE'         
        ORDER BY p.price asc") ;          
        return $this->db->fetchAll();
    }
    public function getInPriceBT($id_t)
    {
        $this->db->Query("SELECT p.id,p.id, p.name, p.price, p.img, p.short_discription, p.discription,p.stock
        FROM mp_product p JOIN mp_type_product tp ON p.id_type = tp.id
        WHERE tp.id=? and p.status='ACTIVE'      
        ORDER BY p.price asc",array($id_t)) ;          
        return $this->db->fetchAll();
    }
    /**
     * 
     * 
     * get info product to display
     */
    public function getOne($id)
    {
        $this->db->Query("select mp.id, mp.name, mp.stock, mp.price, mp.img, mp.short_discription, mp.discription,
        tp.id type_id, tp.name type_name, mp.status, mp.date_created, mp.date_modify
        FROM mp_product mp join mp_type_product tp on mp.id_type=tp.id
        where mp.id=?",array($id));             
        return $this->db->fetch();
    }
    /**
     * 
     * get products by id_type
     */
    public function getByType($id)
    {
        $this->db->Query("select mp.id, mp.name, mp.stock, mp.price, mp.img, mp.short_discription, mp.discription,
         tp.id type_id, tp.name type_name, mp.status, mp.date_created, mp.date_modify FROM mp_product mp
          join mp_type_product tp on mp.id_type=tp.id
          where tp.id=? and mp.status='ACTIVE'",array($id));
        return $this->db->fetchAll();
    }
    /**
     * 
     * active product
     */
    public function activeProduct($id)
    {
        $this->db->Query("update mp_product set status='ACTIVE' where id=?", array($id));
        return $this->db->rowCount();
    }
    /**
     * 
     * disable product
     */
    public function disableProduct($id)
    {
        $this->db->Query("update mp_product set status='DISABLE' where id=?", array($id));
        return $this->db->rowCount();
    }
    /**
     * 
     * get one product by id
     */
    public function get($id){
        $this->db->Query("select * from mp_product where id=?",array($id));
        return $this->db->fetch();
    }
 
    /**
     * 
     * save type product
     */
    public function save($data_p){
        $this->db->Query("update mp_product set name=?,stock=?,price=?,
            img=?, short_discription=?, discription=?, id_type=? where id=?", $data_p);
        return $this->db->rowCount();
    }
 
   

    /**
     * 
     * insert type product
     */
    public function insert($data){
        $this->db->Query("insert into mp_product(name,stock,price,img,short_discription,discription,id_type) 
                values(?,?,?,?,?,?,?)", $data);
        if($this->db->rowCount()){
            $this->db->Query("select id from mp_product ORDER by id DESC");
            return $this->db->fetch()->id;
        }
        return false;
    }
    /**
     * 
     * add cart detail
     */
    public function addCart($acc, $id_p, $quan){
        $this->db->Query("select c.id from mp_cart c join mp_user u on c.id_user = u.id 
                where u.account=?", array($acc));
        $u = $this->db->fetch();
        
        $this->db->Query("insert into mp_cart_detail(id_cart,id_product,quantity) values(?,?,?)", 
                array($u->id,$id_p,$quan));
        $ck = false;
        if(!$this->db->rowCount()){
            $this->db->Query("update mp_cart_detail set quantity=quantity+? where id_cart=? and id_product=?", 
                array($quan,$u->id,$id_p));
            $ck = true;
        } else {
            $ck = true;
        }
        return $ck;
    }
    /**
     * 
     * delete all warehouse details
     */
    public function deleteAllWarehouseDetails($id_p){
        $this->db->Query("delete from mp_warehouse_detail where id_product=?",array($id_p));
        return $this->db->rowCount();
    }

    
    public function stockProduct($id_p)
    {
        $this->db->query('select stock from mp_product where id=?',array($id_p));
         
        return $this->db->fetchAll();
    }

    
    public function updateStockProduct($data)
    {
    
        $this->db->query('update mp_product set stock=? where id=?',$data);
        return $this->db->fetchAll();
      
    }

    public function restoreStockProduct($data)
    {
        $this->db->query('update mp_product set stock=stock+? where id=?',$data);
        return $this->db->fetchAll();   
    }
    public function checkQuantity($id_p,$quan)
    {
        $ck= true;
        $this->db->query('select stock from mp_product where id=?',array($id_p));
        $product = $this->db->fetch();
        $ckquan= $product->stock;
        if($ckquan < $quan)
        {
            $ck=false;
        }
        $res = array();
        $res['status'] = $ck;
        $res['acquan'] = $ckquan;
        return $res;
    }

    
    
}
