<?php 
try {
   $db = new mysqli("localhost", "root", "","school");
} catch (\Throwable $th) {
   echo  $th->getMessage();
}


class Database{
  protected static? mysqli $conncetion= null; 
  public static function connect():mysqli{
   if(self::$conncetion == null){
     self::$conncetion= new mysqli("localhost", "root", "", "batch71");
     if(self::$conncetion->connect_errno){
        die("connect failed");
     }
   }
  return self::$conncetion;
  }

}




?>