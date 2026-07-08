
<?php 
$db = new mysqli("localhost", "root", "", "hrm");
$tx = "";
$divisions = $db->query("select * from {$tx}employes");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    
   <h1>Employee</h1>
      <input type="checkbox" id="checkall">
     <label class="checkall">Check All</label>
   <hr>

   <ul>

     <?php 
     while ($row =$divisions->fetch_object() ):
     ?>
      <li>
          <input class="employee" type="checkbox" />
          <label data-id="<?php echo  $row->id ?>" for=""><?php echo  $row->name ?></label>
      </li>
     <?php 
     
    endwhile;
     
     ?>
      
   </ul>

   <div>
        <button class="submit">Submit</button>
   </div>


 <script>
    
     $(function(){
       
         $("#checkall").on("change", function(){
           let allcheck=$(this).is(":checked")
           if(allcheck){
                $(".employee").prop('checked', true)
             }else{
                $(".employee").prop('checked', false)
             }
         })

         var employee=[];
         $(".submit").on("click", function(){


             $(".employee:checked").each(function(){
                let name=  $(this).next("label").text()
                let id=  $(this).next("label").attr('data-id')
                employee.push({id:id, name:name})

             })

             console.log(employee);
             
         })
     })
 </script>
</body>
</html>