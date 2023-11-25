<?php

include 'connection.php';

$player_id = $_REQUEST['player_id'];

$del_stmt = "DELETE FROM player where player_id = '$player_id'";

$request = mysqli_query($connection,$del_stmt);

if($request)
{
    header('location:edit.php');
}
?>