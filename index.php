<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>
    <h1>Best Calculator ever</h1>
<form role="form" action="index.php" method="post">
    <input type="number" name="n1">
    <input type="number" name="n2">
    <select name="op">
        <option value="+" >+</option>
        <option value="/" >/</option>
        <option value="-" >-</option>
        <option value="*" >*</option>
        </select>
    <input type="submit" name="submit" value="   =   ">
</form>




<?php

//main programme 
$results="";

//assinging a variable to a new object which then inherence all the properties and methods 
$cal= new Calculator();

//checks whether there was a submission and if so then run the following code
if(isset($_POST['submit'])){

    //here the object calls the getResult and passes these variables into the function getResult as x y and z 
    $results = $cal -> getResult($_POST['n1'],$_POST['n2'],$_POST['op']);
}

echo $results;


class Calculator
{
    public $x,$y;

    function checkoperation($operator){
        switch($operator){
            case "+":
            //just doing the same as with the procedual code but it only refers to the internal public variables x and y 
            return $this -> x + $this -> y;
            break;
            case "-":
            return $this -> x - $this -> y;
            break;
            case "*":
            return $this -> x * $this -> y;
            break;
            case "/":
            return $this -> x / $this -> y;
            break;
        }
    }

    function getResult($x,$y,$z){
    //this function is crucial because it enables the passing of the $_POST variables into the function 
    //these values are being assigned to the internal xy and z variables. 
        $this->x = $x;
        $this->y = $y;

        //here the value for z is being passed through to the checkoperation() function which is located within the class
        //at the same time the function is also being called and returns the value of the function 
        return $this -> checkoperation($z);
    }
}

?>



</body>
</html>