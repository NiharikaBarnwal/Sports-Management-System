<?php
include 'connection.php';

echo '<pre>';

print_r($_REQUEST);
print_r($_FILES);


$random = rand(4,1000);
$coach_img = $_FILES['coach_img'];
$image_name = $coach_img['name'];
$from_location = $coach_img['tmp_name'];
$new_image = $random.$image_name;
$destination ='upload_img/'.$new_image;

$output = move_uploaded_file($from_location,$destination);

$coach_id = $_REQUEST['coach_id'];
$coach_name = addslashes($_REQUEST['coach_name']);
$coach_gender = $_REQUEST['Gender'];
$coach_dob = $_REQUEST['coach_dob'];
$category = $_REQUEST['category'];
$religion = $_REQUEST['religion'];
$email = $_REQUEST['email'];
$coach_add = $_REQUEST['coach_add'];
$coach_phone = $_REQUEST['coach_phone'];

$sport = $_REQUEST['sport'];

$mode = $_REQUEST['mode'];

if($mode == 'Add') {
    $sql_stmt="INSERT into coach values(null,'$coach_name','$coach_gender','$coach_dob','$category','$religion','$coach_add','$coach_phone','$email','$sport','$new_image')";
}
else{
    $sql_stmt="UPDATE coach SET name='$coach_name', gender='$coach_gender', dob='$coach_dob',caste='$category',religion='$religion',addr='$coach_add',phone='$coach_phone',email='$email',sport_id='$sport',coach_image='$new_image' where coach_id='$coach_id'";
}

$result = mysqli_query($connection,$sql_stmt);

if($result)
{
    header('location:thankyou.php');
}
?>