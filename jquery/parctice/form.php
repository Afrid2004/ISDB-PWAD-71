<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body>
   <form action="" method="post">
     username <br>
     <input type="text" name="username" id="username"> <br>
     Email <br>
     <input type="text" name="email" id="email"> <br>

     <input type="submit" name="btn" id="btn" value="Submit">
   </form>

     <hr>
   <table border="1">
     <thead>
         <tr>
            <th>Name</th> 
            <th>email</th>
            <th>action</th>
        </tr>
     </thead>
      <tbody class="data_append">
        <tr >
        <td class="name">Rashed</td> 
        <td class="email"> rashed@gmamil.com</td>
        <td class=""> <button class="btn_delete">Delete</button></td>
        </tr>
      </tbody>
   </table>
   <script>
       $(function (){
          $("#btn").on("click",function(e){
           e.preventDefault()
           let username=$("#username").val();
           let email=$("#email").val();
           let html=`
             <tr >
                <td class="name">${username}</td> 
                <td class="email">${email}</td>
                <td class=""><button class='btn_delete'>Delete</button></td>
            </tr>
           `;
           $(".data_append").append(html);
           $("#email").val("");
           $("#username").val("");
          }); 

          $("table").delegate(".btn_delete", "click", function () {
            $(this).closest("tr").remove();
          });
          
          // $("body").on("click","div.click", function () {
          // });
         


      });

   </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>