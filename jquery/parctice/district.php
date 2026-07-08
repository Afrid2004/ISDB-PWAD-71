<?php 
$db = new mysqli("localhost", "root", "", "test");
$tx = "core_";

$id=$_GET["aslam"];
$poin=$_GET["akader"];

$district = $db->query("select * from {$tx}districts where division_id=$id");

echo json_encode($district->fetch_all(MYSQLI_ASSOC));
 //print_r($district->fetch_all(MYSQLI_ASSOC)) ;



?>