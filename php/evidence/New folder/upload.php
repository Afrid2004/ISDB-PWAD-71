
<?php 

  if(isset($_POST["btn_submit"])){
     $file= $_FILES["file"];
     $name= $file["name"];
     $tmp_name= $file["tmp_name"];
     $type= $file["type"];
     $size= $file["size"];
     print_r($file);
     echo "<br>";
     print_r(1024 * 1024 * 1);
     if($size  <= 1024 * 1024 * 1){
             move_uploaded_file($tmp_name,"upload/$name");
             echo  "<embed src='upload/$name' type=''>";
     }else{
         echo " allowed file size is 1mb ";
     }
    //  print_r(  $file);
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
     <form action="#" method="post" enctype="multipart/form-data">
    
       <input type="file" name="file">

        <input type="submit" name="btn_submit">
     </form>
</body>
</html>