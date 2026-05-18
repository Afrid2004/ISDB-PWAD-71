
<?php
   $number= "";
   $result="";
  if(isset($_POST["btn_submit"])){
    $number = $_POST["number"];
    
    // echo $number;
    
    $result=1;
    for($i=1;$i<=$number; $i++ ){
         $result *= $i;
    }
    // echo  $result;
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
        <label for="nubmer">Number</label> <br>
        <input type="number" name="number" id=""> <br> <br>
        <button type="submit" name="btn_submit">Submit</button>
      </form>

       <h3> The factorial of <?= $number ?> is <?= $result  ?> </h3>
</body>
</html>