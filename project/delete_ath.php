<?php

include 'connection.php';

$ath_id = $_REQUEST['ath_id'];

$del_stmt = "DELETE FROM athlete where ath_id = '$ath_id'";

$request = mysqli_query($connection,$del_stmt);

$dl_st = "DELETE FROM athlete_sport where ath_id = '$ath_id'";
$request = mysqli_query($connection,$dl_st);


if($request)
{
    header('location:modify_ath.php');
}
?>