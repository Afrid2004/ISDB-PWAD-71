<?php   
   //Local
   
     define("SERVER","localhost");
     define("USER","root");
     define("DATABASE","project71");
     define("PASSWORD","");

   // Remote
    //define("SERVER","localhost");
    //define("USER","root");//rajib
    //define("DATABASE","hosting");
    //define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
  

?>
