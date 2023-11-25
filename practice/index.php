This line is outside my php tag and is outputted as it is without getting processed.
<br><br>

<?php
echo"This is my php line";

//$myarray = array(); (creating empty array)

echo "<br><br>";

//Creating an array
$myarray = ['apple','orange','pineapple'];
print"I love to eat ".$myarray[0];

$arrlength=count($myarray);
echo "<br>Array length is ".$arrlength;

echo "<br>";

for($i=0;$i<$arrlength;$i++){
    echo "<br>".$myarray[$i];
}

echo "<br><br>";

//Creating manually indexed array (Asssociative array)
$myarray = ['myfav'=>'apple','ihate'=>'orange','great'=>'pineapple'];
print"I hate ".$myarray['ihate'];

echo "<br>";

//foreach loop
foreach($myarray as $index=>$values){
    echo "<br>".$index.'-'.$values;
}
echo "<br>";    
foreach($myarray as $v){
    echo "<br>".$v;
}

//Variable declaration
$a="<br>This is a string<br>";
echo "<br>".$a."<br>";

//constants are created
define('COLLEGE',"Silicon Institute of Technology");
echo COLLEGE;
define('x',5);
echo "<br>".x;

echo "<br><br>";

//Creating a function
function myfunction() {
    $myfuntionvar = 'This i snot accessible from outside';
    echo COLLEGE." is located in Bhubaneswar";
}
myfunction();
//echo $myfuntionvar;  (Shows error)

echo "<br><br>";

//operators
$a=5+4;
$a += 10;
echo $a."<br>";

//Tells the datatype
var_dump($a);

echo "<br><br>";

//$$ use
$apple='orange';
$orange='pineapple';
echo $apple;
echo "<br>";
echo $$apple;

//'  ' is not interprated
$apple='orange';
$orange='$apple';
echo "<br>";
echo $$apple;

//"  " is interprated
$apple='orange';
$orange="$apple";
echo "<br>";
echo $$apple;

echo "<br><br>";

//Shows time in GMT
echo date("l js \of  F Y h:i:s A");

echo "<br><br>";

//For changing time_zone
date_default_timezone_set('asia/kolkata');
echo date("l js \of  F Y h:i:s A");
/*
//connecting to mysql database(connection is done only once, so done on a seperate file)
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'silicon';
$connection = mysqli_connect($host,$user,$password,$dbname);*/
?>