
<?php  
   $db= new mysqli("localhost", "root", "", "school");

   if(isset($_POST['btn_submit'])){
      $role= $_POST['role'];
      $result= $db->query("call updateRole('$role', 8)");
      echo "saved successfully";
        //  print_r($result);
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
     <form action="" method="post">
         <label for="name">Role</label>
         <input type="text" name="role">
         <br>
         <input type="submit" name="btn_submit">
     </form>
</body>
</html>