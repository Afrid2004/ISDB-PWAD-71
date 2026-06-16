<?php 
include_once "BaseModel.php";
class User extends BaseModel{
   static $table="users";




}


//  $r=  User::Update(3,["name"=> "Hamza Masud"]);
 print_r(User::Find(3));
//  $columns= implode(",",array_keys(["name"=> "Hamza","role"=>"admin", "password"=>"12345"]));
//  $str= implode(",", array_fill(0,5, "?"));
//  print_r( $str)
?>