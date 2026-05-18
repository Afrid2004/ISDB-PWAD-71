<?php

$isLogin= null;
echo $isLogin ? "Welcome to our site " :"Pls login";
if($isLogin){
 echo "welcome";
}else{
  echo "pls login";
}


 $login =  $isLogin ?? "pls login";
 echo $login;
 echo   $isLogin ? "welcome": "Pls login";
 echo   $isLogin ?? "Pls login";

 if($isLogin){
   echo "Welcome";
 }else{
     echo "Pls login";
 }


  $color="red";
  switch($color){
     case "red":
      echo "$color is my favorit color";
      break;
      case "Yellow" :
      echo "$color is my favorit color";
      break;

      default:
       echo "$color is my favorit color";
      break;

  }

    // 1 init 
    // 2.condition 
    // 3. inc / dec

  //  for($i=1 ; $i<=5; $i++ ){
  //     echo "I love bangladesh <br>";
  //  }

  // $i=1;
  //  while($i <= 5){
  //    echo "This is batch71 <br>";
  //   $i++;
  //  }


  //  $i=1;
  //  do{
  //    echo "{$i}. This is batch71 <br>";
   
  //   if($i >= 10){
  //      break;
  //    }
  //   $i++;
  //  }while(true);


  for($i=1; $i<=10; $i++){
     if($i == 5){
       // break; 
       continue;
     } 
    echo "{$i} ";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
</body>
</html>