<?php
// declare(strict_types= 1);
/*
====================================================
PHP Functions - Detailed Notes & Examples
====================================================
*/
// 1. Defining and Calling Functions
// ----------------------------------
// Functions help you organize reusable code blocks.
// Syntax: function functionName(parameters) { code }

 function Hello($fname="Rakib", $lname="Islam"){
    echo "Hello {$fname} {$lname} <br>";
    echo "Hello ".$fname." ".$lname ;
 }

// Hello();

// function add( float $a , int $b):float{
//    return  $a + $b;
// }
// echo add(10,20); 

 // Call the function
//  function fullName(){
//     $fname="Hasan";
//     $lname="Mahmud";

//     echo $fname." ".$lname;
//  }

//  fullName();

// // 2. Function Parameters
// // -----------------------
// // a) Default Parameters

// function sayHello($a="Sir"){
//    echo "Hello $a";
// }

// sayHello();
// sayHello("Khaled");
// sayHello("Maksud");
// sayHello();

// // b) Optional Parameters (just by providing default value or not using them)
// function add($a, $b = 0) {
//     return $a + $b;
// }
// echo add(5, 10) . ""; // 5 + 0 = 5

// // c) Named Arguments (PHP 8+)

// function makeCoffee($type = "Cappuccino", $size = "Medium") {
//     echo "Making a $size $type.";
// }
// makeCoffee(size: "Large", type: "Espresso");


// // 3. Return Values
// // -----------------
// function muliplication($a , $b){
//    return   $a*$b;
// }
//  print(muliplication(5,6));


// // 4. Variable Scope
// // ------------------
// a) Local Scope

function localScopeExample() {
    $abc = "I'm local";
    echo $abc . "";
}

// localScopeExample();
//  echo $abc; // ERROR: undefined

// b) Global Scope
$globalVar = "I'm global";
function globalScopeExample() {
    global $globalVar;
    echo $globalVar . "";
}
// globalScopeExample();

// annonymus funciton / closuer

$greet= function() use($globalVar){
    // global $globalVar;
    echo "Hello Guest {$globalVar}";
};

// echo  $greet();

// // c) Static Variables - Retain value between function calls
// static $count = 0;
// function counter() {
//     global $count;
//     $count++;
//     echo "Count: $count";
// }
// counter();
// counter();
// counter();


// // 5. Anonymous Functions & Closures
// // -----------------------------------
// $greet =  function ($name) {
//     return "Hello, $name!";
// };
// echo $greet("Bob") . "";

// // Closure using 'use' to capture variables from outside
// $message = "Have a great day!";
// $greeter = function($name) use ($message) {
//     return "Hello, $name! $message";
// };
// echo $greeter("Charlie") . "";


// // 6. Recursion
// // -------------
// // Recursion: A function calling itself
// function factorial($n) {
//     // if ($n <= 1) return 1;
//      return $n * factorial($n - 1);
// }
// echo "Factorial of 5 is " . factorial(5) . "";
  
  function hello2($n){
    //  echo "hello <br>";
    //  if($n == 1) {
    //      return 1;
    //  }
    // return $n *  hello2($n -1) ;
  }

//   5 * 4 *3 * 2* 1
// echo  hello2(5);

 $number = 5;
 $result= 1;
 for($i=1; $i <=$number; $i++){
    $result *= $i; 
 }

 echo  $result;

// // --------------
// // - Functions can return any type (int, string, array, object).
// // - You can type-hint parameters and return values for safety.
// // - Avoid deep recursion for performance.
// // - Anonymous functions are useful for callbacks and array functions.

// // Example: Passing anonymous function to array_map
// $numbers = [1, 2, 3, 4];
// $squares = array_map(function($n) { return $n ** 2; }, $numbers);
//  print_r($squares);
?>
