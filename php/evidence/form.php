<?php

$errors = [];
     $name =  "";
    $email = "";
    $city =  "";
    $subjects = [];
   
    $address = "";
    $gender =  "";


if (isset($_POST["btn_submit"])) {
    //  print_r($_POST);
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $city = $_POST["city"] ?? "";
    $subjects = $_POST["subject"] ?? [];
    $subject = implode("|", $subjects);
    $address = $_POST["address"] ?? "";
    $gender = $_POST["gender"] ?? "";

    $pattern_name= "/^[a-zA-Z _]{4,}$/";
    if ($name == "") {
        $errors["name"] = "Name field is required !";
    }elseif(!preg_match($pattern_name, $name)){
       $errors["name"] = "Invalid Name ! Give at list 4 charecter";
    }

    $pattern_email= "/^[a-zA-Z0-9_]{3,}[@][a-z]{2,}[.][a-z]{2,}$/";
    if ($email == "") {
        $errors["email"] = "Email field is required !";
    }else if(!preg_match($pattern_email,$email)){
        $errors["email"] = "Invalild Email !";
    }

    if ($city == "") {
        $errors["city"] = "city field is required !";
    }
    if ($address == "") {
        $errors["address"] = "address field is required !";
    }
    if ($gender == "") {
        $errors["gender"] = "gender field is required !";
    }
    if ($subject == "") {
        $errors["subject"] = "subject field is required !";
    }

    // print_r($errors);
    $data= "$name,$email,$city,$address,$gender,$subject";

    file_put_contents("students_data.txt", $data, FILE_APPEND);
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
        <div>
            <label for="name">User Name</label> <br>
            <input type="text" name="name" id="name"  value="<?php echo $name  ?>">
            <?php echo  isset($errors["name"]) ? "<p style='color:red'>{$errors["name"]}</p>" : "" ?>
        </div>
        <div>
            <label for="email">User email</label> <br>
            <input type="text" name="email" id="email"  value="<?php echo $email  ?>">
            <?php echo  isset($errors["email"]) ? "<p style='color:red'>{$errors["email"]}</p>" : "" ?>
        </div>
        <div>
            <label for="city">City</label> <br>
            <select name="city" id="city">
                <option disabled selected>select your city</option>
                <option <?php echo  $city == "Dhaka" ? "selected" : ""  ?> value="Dhaka">Dhaka</option>
                <option <?php echo  $city == "Rajshahi" ? "selected" : ""  ?> value="Rajshahi">Rajshahi</option>
                <option <?php echo  $city == "Barishal" ? "selected" : ""  ?> value="Barishal">Barishal</option>
                <option <?php echo  $city == "Sylhet" ? "selected" : ""  ?> value="Sylhet">Sylhet</option>
            </select>
            <?php echo  isset($errors["city"]) ? "<p style='color:red'>{$errors["city"]}</p>" : "" ?>
        </div>
        <div>
            <label for="gender">Gender</label> <br>
            <input <?= $gender == "male" ? "checked":""  ?> type="radio" name="gender" id="Male" value="male"> Male
            <input  <?= $gender == "female" ? "checked": ""  ?> type="radio" name="gender" id="Female" value="female"> Female
            <?php echo  isset($errors["gender"]) ? "<p style='color:red'>{$errors["gender"]}</p>" : "" ?>
        </div>
        <div>
            <label for="subject">Subject</label> <br>
            <input <?= in_array("PHP", $subjects) ? "checked":"" ?> type="checkbox" name="subject[]" id="PHP" value="PHP"> PHP
            <input <?= in_array("CSS", $subjects) ? "checked":"" ?> type="checkbox" name="subject[]" id="CSS" value="CSS"> CSS
            <input type="checkbox" name="subject[]" id="Bootstrap" value="Bootstrap"> Bootstrap
            <input type="checkbox" name="subject[]" id="MYSQL" value="MYSQL"> MYSQL
            <input type="checkbox" name="subject[]" id="Javascript" value="Javascript"> Javascript
            <?php echo  isset($errors["subject"]) ? "<p style='color:red'>{$errors["subject"]}</p>" : "" ?>
        </div>
        <div>
            <label for="address">Address</label> <br>
            <textarea name="address" id="address"> <?php echo $address  ?> </textarea>
            <?php echo  isset($errors["address"]) ? "<p style='color:red'>{$errors["address"]}</p>" : ""?>
        </div>

        <div>
            <!-- <input type="submit" name="btn_submit" > -->
            <button type="submit" name="btn_submit">Submit</button>
        </div>

    </form>
</body>

</html>

