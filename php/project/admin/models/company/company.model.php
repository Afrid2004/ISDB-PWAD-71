<?php 

  class Company{
   
   public $id;
   public $name;
   public $email;
   public $country_id;
   public $road;
   public $phone;
   public $district_id;
   public $created_at;

   public function __construct()
   {
   }
  

   public function set($id,$name, $email,$country_id, $road,$phone,$district_id)
   {
     $this->id=$id;
     $this->name=$name;
     $this->email=$email;
     $this->country_id=$country_id;
     $this->road=$road;
     $this->phone=$phone;
     $this->district_id=$district_id;
   }
   


     public function create(){
       global $db;
       $stmt= $db->query("insert into company (name, email, country_id, road,phone, district_id)
        values('$this->name', 
          '$this->email',
          '$this->country_id',
          '$this->road',
          '$this->phone',
          '$this->district_id'
        )
       ");
       return $db->insert_id;
     }
     public function update(){
       global $db;
       $stmt= $db->query("update company set 
          name= '$this->name', 
          email= '$this->email',
          country_id= '$this->country_id',
          road= '$this->road',
          phone='$this->phone',
          district_id= '$this->district_id'
          where id= $this->id
       ");
       return $stmt;
     }

     public static function all(){
       global $db;
       $stmt= $db->query("select * from company");
       return  array_map( fn($d)=> (object) $d, $stmt->fetch_all(MYSQLI_ASSOC));
     }
     public static function find($id){
       global $db;
       $stmt= $db->query("select * from company where id=$id");
       return   $stmt->fetch_object();
     }
     public static function delete($id){
       global $db;
       $stmt= $db->query("delete  from company where id= $id");
       return $stmt;
     }



     

  }
?>