<?php
//connecting to mysql database(connection is done only once, so done on a seperate file)
$host = 'localhost';
$user = 'niharika';
$password = 'mansi';
$dbname = 'silicon';
$connection = mysqli_connect($host,$user,$password,$dbname);
//$port = '3306'; (if the port i different from default port)

if($connection)
{
    echo 'Connected successfully'; 
}
else
    echo 'Connection error';
?>