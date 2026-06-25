<?php 

$db=new PDO("sqlite:batch71.db");
//   $db->exec("
//       create table departments(
//         id integer primary key autoincrement,
//         name text, 
//         location text,
//         phone text 
//       );
//   ");
//    $db->exec("
//        insert into departments(name, location ,  phone)
//        values 
//        ('admin', 'dhaka', '2545456'),
//        ('hr', 'dhaka', '2545456'),
//        ('sales', 'dhaka', '2545456'),
//        ('marketing', 'dhaka', '2545456');
//   ");
//  $stmt= $db->query("select * from departments")->fetchAll();
//  print_r($stmt);
 $db->exec("update departments set name='Accounting' where id=1");
 $stmt= $db->query("select * from departments")->fetchAll();
 print_r($stmt);

?>