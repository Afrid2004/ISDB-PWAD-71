<?php 
include_once "BaseModel.php";

class Student extends BaseModel{
    
   static $table="students";

}


print_r(Student::All());

?>