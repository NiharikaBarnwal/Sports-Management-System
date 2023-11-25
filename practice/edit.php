<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Including jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!--external js-->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
</head>
<body>
    

<?php

//Connecting another file
include 'connection.php';

echo "<br><br>";

//Run a Query
$query_str = "SELECT * FROM player";
$result = mysqli_query($connection,$query_str);

?>

<table id="myTable" class="display container">
    <thead>
    <tr>
        <th>Player ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php
    while($result_array_row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo '<td>'.$result_array_row['player_id'].'</td>';
        echo '<td>'.$result_array_row['player_name'].'</td>';
        echo '<td><a href=form.php?player_id='.$result_array_row['player_id'].'>Edit</a></td>';
        echo '<td><a href=delete.php?player_id='.$result_array_row['player_id'].'>Delete</a></td>';
        echo '</tr>';
    }

?>
</tbody>
</table>
<script>
    let table = new DataTable('#myTable');
</script>

</body>
</html>