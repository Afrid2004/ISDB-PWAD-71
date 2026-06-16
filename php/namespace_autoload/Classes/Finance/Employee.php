<?php 
namespace Classes\Finance;
use Classes\Model\BaseModel;

class Employee extends BaseModel{
   
   static $table= "employees";

   public function __construct()
   {
     echo "This is Employee Class";
   }



}





?>