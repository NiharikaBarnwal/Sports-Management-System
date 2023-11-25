<?php
session_start();
$user_id =$_REQUEST['user_id'];
$password1 =$_REQUEST['password'];

include 'connection.php';

$check_qry = "SELECT * FROM user where user_id='$user_id' and password='$password1'";

$result = mysqli_query($connection,$check_qry);
$rows_result = mysqli_num_rows($result);  //no. of results returned

if($rows_result == 1)
{
    $row = mysqli_fetch_array($result);
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['loggedin'] = true;
    header('location:carousel.php');
}
else
    $_SESSION['loggedin'] = false;
?>