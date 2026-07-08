<?php 
$db= new mysqli("localhost","root","","test");
$id= $_GET["id"];
// $id= 2;
$customerdetl= $db->query("select * from core_products where id=$id");
$result= $customerdetl->fetch_object();

echo json_encode($result) ;
?>