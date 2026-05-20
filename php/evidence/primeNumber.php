
<?php 
    if(isset($_POST["btn_submit"])){
      $number= $_POST["number"];
      function isPrime($n){
         if($n < 2){
            return false;
         };
         for($i=2 ; $i < $n ; $i++){
             if($n % $i == 0){
               return false;
             }
         }
         return true;
      }
      $result=  isPrime($number) ? "<h1 class='green'>{$number} is a prime Number</h1>" :"<h1 class='red'>{$number} is not a prime Number</h1>";

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .green{
            color: green;
        }
        .red{
            color: red;
        }
    </style>
</head>
<body>
      <form action="#" method="get" >
        <label for="number">Enter a Number</label> <br>
        <input type="number" name="number"> <br>
        <input type="submit" name="btn_submit">
      </form>

      <?php 
          if(isset($result)):  echo $result; endif;  
      ?>
</body>
</html>