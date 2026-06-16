<?php 
session_start();
include("db_config.php");


if(isset($_POST["btn_submit"])){
   $email= $_POST["email"];
   $password= $_POST["password"];

//  $stmt=$db->query("select * from users where email='$email' and password='$password'");
//  $result= $stmt->fetch_object();


   $stmt=$db->prepare("select * from users where email=? and password=?");
   $stmt->bind_param('ss', $email, $password);
   $stmt->execute();
   $result= $stmt->get_result()->fetch_object();






   if(isset($result->name)){
      $_SESSION['name']= $result->name;
      $_SESSION['email']= $result->email;

      header("location:index.php");
   }

    echo "incurrect email or password";

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
      <form action="#" method="post">
         <div>
             <label for="email">Email</label> <br>
             <input type="text" name="email" id="">
         </div>
         <div>
             <label for="password">Password</label> <br>
             <input type="text" name="password" id="">
         </div>
         <div>
             <input type="submit" name="btn_submit" id="">
         </div>

      </form>
</body>
</html>