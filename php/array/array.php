<?php
 $students=["Rashed", "Khaled", "Mahmud", "Hasan"];
 $student=["name"=>"Rashed", "age"=>25, "gender"=>"male", "address"=>"dhaka"];
//   for($i=0; $i < count( $students); $i++ ){
//       echo  $students[$i] . "<br>";
//   }
//    foreach ( $students as $key => $student) {
//        $key ++;
//        echo "{$key}.{$student} <br>";
//    }

 $student=["name"=>"Rashed", "age"=>25, "gender"=>"male", "address"=>"dhaka"];

 $keys= array_keys($student);

//  for($i=0; $i < count( $student); $i++){
//      echo $student[$keys[$i]];
//  }

//  print_r( array_keys( $student)); 

// foreach($student as $key => $value){
//     //   echo "{$key}: {$value} <br>";
//       echo $key.":".$value."<br>";
// }

 $students=[
    ["name"=>"Rashed", "age"=>25, "gender"=>"male", "address"=>"dhaka"],
    ["name"=>"Masud", "age"=>24, "gender"=>"male", "address"=>"rajshahi"],
    ["name"=>"Khaled", "age"=>23, "gender"=>"male", "address"=>"rangpur"],
    ["name"=>"Nasim", "age"=>24, "gender"=>"male", "address"=>"Chittagong"],
    ["name"=>"Hasan", "age"=>22, "gender"=>"male", "address"=>"Barishal"],
 ];


  // foreach($students as $student){
  //   //   print_r( $student);
  //   //   echo "<br>";
    
  //    foreach($student as $key => $value){
  //        echo "{$key}: {$value}";
  //        echo "<br>";
  //    }

  //    echo "<br>";
  //    echo "<br>";
  // }

  //  foreach($students as $student){
  //   echo "Name:{$student["name"]}<br>";
  //   echo "Age:{$student["age"]}<br>";
  //   echo "Address:{$student["address"]}<br>";
  //   echo "<br>";
  //   echo "<br>";
  // }

   $students=[
    (object)["name"=>"Rashed", "age"=>25, "gender"=>"male", "address"=>"dhaka"],
    (object)["name"=>"Masud", "age"=>24, "gender"=>"male", "address"=>"rajshahi"],
    (object)["name"=>"Khaled", "age"=>23, "gender"=>"male", "address"=>"rangpur"],
    (object)["name"=>"Nasim", "age"=>24, "gender"=>"male", "address"=>"Chittagong"],
    (object)["name"=>"Hasan", "age"=>22, "gender"=>"male", "address"=>"Barishal"],
 ];


  foreach ($students as $student) {
    echo "Name:{$student->name}<br>";
    echo "Age:{$student->age}<br>";
    echo "Address:{$student->address}<br>";
    echo "<br>";
    echo "<br>";

  }

 $jsonobj= json_encode( $students);
//  print_r( $jsonobj);

 $students=["Rashed", "Khaled", "Mahmud", "Hasan"];
 $student=["name"=>"Rashed", "age"=>25, "gender"=>"male", "address"=>"dhaka"];

  $students[4]="Jamshed";
  $students[0]="Masud";

  $student["gender"]="Female";
  $student["age"]=22;
  $student["name"]="Fatema";
  // print_r( $student);
  $students=[
    ["name"=>"Nasim", "age"=>24, "gender"=>"male", "address"=>"Chittagong"],
    ["name"=>"Hasan", "age"=>22, "gender"=>"male", "address"=>"Barishal"],
 ];

 $students[4]["name"]="Jahid";
 $students[5] = ["name"=>"Himel", "age"=>22, "gender"=>"male", "address"=>"Barishal"];

  $player1["name"]= "Hamza";
  $player1["club"]= "lester_city";
  $player1["age"]= 23;
  $player1["address"]= "sylhet";

  $player2["name"]= "Karim";
  $player2["club"]= "lester_city";
  $player2["age"]= 23;
  $player2["address"]= "sylhet";

  $players[]= $player1;
  $players[]= $player2;

  print_r($players);

?>