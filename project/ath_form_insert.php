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
$player_name = addslashes($_REQUEST['player_name']);
$player_gender = $_REQUEST['Gender'];
$player_dob = $_REQUEST['player_dob'];
$category = $_REQUEST['category'];
$religion = $_REQUEST['religion'];
$email = $_REQUEST['email'];
$player_add = $_REQUEST['player_add'];
$player_phone = $_REQUEST['player_phone'];

$sport = $_REQUEST['sport'];

$mode = $_REQUEST['mode'];

if($mode == 'Add') {
    $sql_stmt="INSERT into athlete values(null,'$player_name','$player_gender','$player_dob','$category','$religion','$player_add','$player_phone','$email','$new_image')";
}
else{
    $sql_stmt="UPDATE athlete SET name='$player_name', gender='$player_gender', dob='$player_dob',caste='$category',religion='$religion',addr='$player_add',phone='$player_phone',email='$email',ath_img='$new_image' where ath_id='$player_id'";
}

$result = mysqli_query($connection,$sql_stmt);

if($mode == 'Add'){
    $last_code = mysqli_insert_id($connection);
    foreach ($sport as $sport_id)
    {    
    $sql_stmt="INSERT into athlete_sport values(null,'$last_code','$sport_id')";
    $result = mysqli_query($connection,$sql_stmt);
    }
}

else{
    $sql_stmt="DELETE from athlete_sport WHERE ath_id='$player_id'";
    $result = mysqli_query($connection,$sql_stmt);
    foreach ($sport as $sport_id)
    {    
        $sql_stmt="INSERT into athlete_sport values(null,'$player_id','$sport_id')";
        $result = mysqli_query($connection,$sql_stmt);
    }   
}

if($result)
{
    header('location:thankyou.php');
}
?>