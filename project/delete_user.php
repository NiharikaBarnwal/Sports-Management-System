<?php

include 'connection.php';

$user_id = $_REQUEST['user_id'];

$del_stmt = "DELETE FROM user where user_id = '$user_id'";

$request = mysqli_query($connection,$del_stmt);


if($request)
{
    header('location:modify_user.php');
}
?>