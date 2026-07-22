<?php 

class Product123{
 public $id;
 public $name;
 public $unit_price;
 public $purchase_price;
 public $photo;
 public $created_at;

 public function __construct()
 {
 }

 public function set($id,$name,$unit_price,$purchase_price,$photo)
 { 
    $this->id=$id;
    $this->name=$name;
    $this->unit_price=$unit_price;
    $this->purchase_price=$purchase_price;
    $this->photo=$photo;
 }


 public function save(){
   global $db;
   $stmt= $db->query("insert into products(name, unit_price,purchase_price, photo)
   values ('$this->name','$this->unit_price', '$this->purchase_price', '$this->photo') ");
   return $db->insert_id;
 }
 public function update(){
   global $db;
   $stmt= $db->query("update products  set name= '$this->name', unit_price= '$this->unit_price',
   purchase_price= '$this->purchase_price' , photo='$this->photo' where id= $this->id");
   return $db->insert_id;
 }
 public static function all(){
   global $db;
   $stmt= $db->query("select * from products");
   return  array_map(fn($d)=> (object) $d,$stmt->fetch_all(MYSQLI_ASSOC));
 }
 public static function find($id){
    global $db;
   $stmt= $db->query("select * from products where id= $id");
   return  $stmt->fetch_object();
 }
 public static function delete($id){
     global $db;
     $stmt= $db->query("delete from products where id= $id");
   return  $stmt;
 }

}
?>