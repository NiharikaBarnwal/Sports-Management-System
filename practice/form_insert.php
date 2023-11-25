<?php
include 'connection.php';

echo '<pre>';

print_r($_REQUEST);
print_r($_FILES);


$random = rand(4,1000);
$player_img = $_FILES['player_img'];
$image_name = $player_img['name'];
$from_location = $player_img['tmp_name'];
$new_image = $random.$image_name;
$destination ='upload_img/'.$new_image;

$output = move_uploaded_file($from_location,$destination);


$player_id = $_REQUEST['player_id'];
$player_name = $_REQUEST['player_name'];
$player_gender = $_REQUEST['Gender'];
$player_dob = $_REQUEST['player_dob'];

//$edu[] = $_REQUEST['edu[]'];
$mode = $_REQUEST['mode'];

if($mode == 'Add') {
    $sql_stmt="INSERT into player values('$player_id','$player_name','$player_gender','$player_dob','$new_image')";
}
else{
    $sql_stmt="UPDATE player SET player_name='$player_name', player_gender='$player_gender', player_dob='$player_dob',player_img='$new_image' where player_id='$player_id'";
}

$result = mysqli_query($connection,$sql_stmt);

if($mode == 'Add'){
    $last_code = mysqli_insert_id($connection);
}

/*if($result)
{
    header('location:edit.php');
}
?>*/