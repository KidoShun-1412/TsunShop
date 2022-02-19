<?php
class orderModel{
        // private  $fullName,  $phone, $address, $city, $province;
        private $db;

        public function __construct(){
            $this->db = new database;
        }
        
        public function insert($FullName, $Phone, $Address, $City, $Province, $Total, $Cd, $Account){
            $this->db->startTran();
            if($Account != ""){
                $this->db->Query('select id from mp_user where account=?',array($Account));
                $id_user = $this->db->fetch();
                $this->db->Query('insert into mp_order(id_user,ship_fee,total_price,ship_name,ship_phone,ship_address,ship_city,ship_province)
                    values(?,"20000",?,?,?,?,?,?)', array($id_user->id,$Total,$FullName,$Phone,$Address,$City,$Province));
            } else {
                $this->db->Query('insert into mp_order(ship_fee,total_price,ship_name,ship_phone,ship_address,ship_city,ship_province)
                    values("20000",?,?,?,?,?,?)', array($Total,$FullName,$Phone,$Address,$City,$Province));
            }
            
            if($this->db->rowCount() > 0){
                $this->db->Query('select id from mp_order order by id DESC');
                $id_order = $this->db->fetch();
                for($i=0; $i<Count($Cd); $i++){
                    $this->db->Query('insert into mp_order_detail(id_order,id_product,quantity,price) values(?,?,?,?)',
                        array($id_order->id,$Cd[$i]['id'],$Cd[$i]['quan'],$Cd[$i]['price']));
                    if($this->db->rowCount() <= 0){
                        $this->db->rollback();
                        return false;
                    }
                }
                $this->db->commit();
                return true;
            } else {
                $this->db->rollback();
                return false;
            }
            $this->db->commit();
        }
        public function getAllOrder(){
            $this->db->Query("select shp.name shpname, o.id, o.ship_name, o.ship_phone, o.ship_fee, o.total_price, o.status, 
            CONCAT(o.ship_address,', ',o.ship_province,', ',o.ship_city) address, u.account, o.date_created, o.date_modify 
            FROM (mp_order o left join mp_user u on o.id_user=u.id)
             left join mp_shipper shp on o.id_shipper= shp.id
              where o.status!='Đã hủy' ORDER BY o.id desc" );
            return $this->db->fetchAll();
        }

        public function getAllOrderCancel(){
            $this->db->Query("select shp.name shpname, o.id, o.ship_name, o.ship_phone, o.ship_fee, o.total_price, o.status, 
            CONCAT(o.ship_address,', ',o.ship_province,', ',o.ship_city) address, u.account, o.date_created, o.date_modify 
            FROM (mp_order o left join mp_user u on o.id_user=u.id)
             left join mp_shipper shp on o.id_shipper= shp.id
              where o.status='Đã hủy' ORDER BY o.id desc");
            return $this->db->fetchAll();
        }
        public function updateOrder($data){
            $this->db->Query('update mp_order set ship_fee=?, total_price=?, ship_name=?,
                    ship_address=?, ship_city=?, ship_province=?,id_shipper=? where id=?',$data);
            return $this->db->rowCount();
        }
        public function updateDetailOrder($data){
            $this->db->Query('update mp_order_detail set quantity=?, price=?
                    where id_order=? and id_product=?',$data);
            return $this->db->rowCount();
        }
        public function updateStatusConfirmed($id){
            $this->db->Query('update mp_order set status="Đã xác nhận" where id=?',array($id));
            return $this->db->rowCount();
        }
      

        public function getDetailOrder($id_o){
            $this->db->Query("select o.id, o.ship_name, o.ship_phone, o.ship_fee, o.ship_address,o.ship_province,o.ship_city,o.id_shipper
            FROM mp_order o where id=?",
                    array($id_o));
            return $this->db->fetch();
        }
    
        public function getDetailProductOrder($id_o){
            $this->db->Query("select od.id_product, p.name, od.quantity, od.price from mp_order_detail 
                    od join mp_product p on od.id_product=p.id where od.id_order=?",array($id_o));
            return $this->db->fetchAll();
        }

        public function getStatus($id){
            $this->db->Query('select status from mp_order where id=?', array($id));
            return $this->db->fetch();
        }
      

        public function updateStatusDeliver($id){
            $this->db->Query('update mp_order set status="Đang giao" where id=?',array($id));
            return $this->db->rowCount();
        }
            
        public function updateStatusCancel($id){
            $this->db->Query('update mp_order set status="Đã hủy" where id=?',array($id));
            return $this->db->rowCount();
        }

        public function updateStatusDone($id){
            $this->db->Query('update mp_order set status="Hoàn thành" where id=?',array($id));
            return $this->db->rowCount();
        }

        public function getAllShipper(){
            $this->db->Query('select id,name,phone from mp_shipper');
            return $this->db->fetchALl();
        }

        public function insert_shipper($data){
            $this->db->Query("insert into mp_shipper(name,phone) 
                    values(?,?)", $data);
            if($this->db->rowCount()){
                $this->db->Query("select id from mp_shipper ORDER by id DESC");
                return $this->db->fetch()->id;
            }
            return false;
        }
        public function get($id){
            $this->db->Query("select * from mp_shipper where id=?",array($id));
            return $this->db->fetch();
        }
       
        public function saveShipper($data_p){
            $this->db->Query("update mp_shipper set name=?,phone=? where id=?", $data_p);
            return $this->db->rowCount();
        }

        public function deleteShipper($data_p){
            $this->db->Query("delete from mp_shipper where id=?", $data_p);
            return $this->db->rowCount();
        }

        public function delete($id){
            $this->db->Query("delete from mp_order_detail where id_order=?", array($id));
            $this->db->Query("delete from mp_order where id=?", array($id));
            return $ck=true;
        }

        public function getOrderByAcc($account){
            $this->db->Query("select o.id, o.ship_name, o.ship_phone, o.ship_fee,o.status, 
            o.ship_address,o.ship_province,o.ship_city,o.total_price,o.date_created
             from mp_user u join mp_order o 
                on u.id=o.id_user where u.account=?",array($account));
            return $this->db->fetchAll();
        }


      


   

}
?>