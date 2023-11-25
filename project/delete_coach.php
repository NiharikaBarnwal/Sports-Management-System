<?php

include 'connection.php';

$coach_id = $_REQUEST['coach_id'];

$del_stmt = "DELETE FROM coach where coach_id = '$coach_id'";

$request = mysqli_query($connection,$del_stmt);


if($request)
{
    header('location:modify_coach.php');
}
?>