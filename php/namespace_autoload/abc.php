<?php 
include_once "db_config.php";
include_once "autoload.php";

use \Classes\Student;
use \Classes\Education\Teacher;
use \Classes\Education\School;
use Classes\Finance\Employee;

// $teacher = new Teacher();
// $student = new Student();
// $school = new School($teacher, $student);

print_r(Employee::All());

 
// include "Mango.php";
// include "Fruit.php";


 


?>