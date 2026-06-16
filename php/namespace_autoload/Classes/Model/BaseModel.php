<?php 
namespace Classes\Model;


class BaseModel{
 protected static $table;

  static function All(){
    global $db;
    $table= static::$table;
    $stmt= $db->prepare("select * from {$table}");
    $stmt->execute();
    $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $result=[];
    foreach ($rows as $key => $row) {
         $result[]= (object) $row;
    }
    return $result;
    // return array_map(fn($row)=>(object) $row, $rows); 
 }

  static function Find(int $id){
    global $db;
    $table= static::$table;

    $stmt= $db->prepare("select * from $table where id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result()->fetch_object();
  }


static function Delete(int $id){
    global $db;
    $table= static::$table;

    $stmt= $db->prepare("delete from $table where id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }

   static function Save(array $data){
    global $db;
    $table= static::$table;
    $columns= implode(",",array_keys($data));
    $placeholders= implode(",", array_fill(0,count($data), "?"));
    $stmt= $db->prepare("insert into $table ($columns)values($placeholders)");
    
    $str= str_repeat("s", count($data));
    $values= array_values($data);
    $stmt->bind_param("$str", ...$values);
    $stmt->execute();
    return self::Find($db->insert_id);
   }


   static function Update(int $id , array $data){
     global $db;
     $table= static::$table;
     $setColumns=[];

     foreach ($data as $column => $value) {
        $setColumns[]="$column=?";
     }
     $columns= implode(",",$setColumns);
     $stmt= $db->prepare("update {$table} set  {$columns} where id=?");
     $str= str_repeat("s", count($data))."i";
     $values = array_values($data);
     $values[]= $id;
     $stmt->bind_param("$str",... $values);
     return $stmt->execute();

   }

 }




// class ABCD{
//     public static $name="parent";

//    public static function getClassName(){
//      echo static::$name;
//    } 
// }

// class ChildClass extends ABCD{
//     public static $name="ChildClass";
// }

//   ChildClass::getClassName();


//   self 
//   static 
?>

