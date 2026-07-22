<?php 

class CustomerApi{

  function index(){
   echo json_encode(['customers'=> Customer::all()]);
  }





}







?>