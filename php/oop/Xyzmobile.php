<?php 

include_once "MobileProto.php";


class PocoM3 extends MobileProto{

  public function __construct()
  {
    //  echo "This is model pocoM3";
  }

  public function app()
  {
     echo "android application";
  }
  public function display()
  {
     echo "my display is 6 inc";
  }

  public function makeCall(){
     $this->dial();
     $this->connectNetwork();
     echo "Phone is ringing";
  }

  public function takePhoto(){
    $this->camera();

    echo "photo is taken by back camera";
  }


  public function makeVideo(){

  }

  private function camera(){
    echo "my back camera is 50 megapx";
  }
}



//  $p1= new PocoM3();

//  $p1->takePhoto();
//  print_r($p1);



?>