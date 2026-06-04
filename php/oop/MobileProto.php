<?php 

include_once "IMobileRule.php";


abstract class MobileProto implements IMobileRule{

 public function powerbutton(){
    echo "power on";
 }
 public function chargingport(){
    echo "Mobile is charging";
 }

 public abstract function app();

 
 protected function dial(){
    echo "input phone nubmer";
 }

 protected function connectNetwork(){
    echo "connect to the network";
 }




}










?>