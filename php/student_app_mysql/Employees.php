<?php

include_once "BaseModel.php";
class Employees extends BaseModel
{
   protected static $table= "Employees";

   
}

// $em=new Employees();
// print_r($em->Create([
//     "name"=>"Hadi",
//     "designation"=>"manager",
// ]));

print_r(Employees::Find(2));


