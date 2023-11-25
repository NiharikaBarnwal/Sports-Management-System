
<?php

//Connecting another file
include 'connection.php';

echo "<br><br>";

//Run a Query
$query_str = "SELECT * FROM employee";
$result = mysqli_query($connection,$query_str);

/*
//Loop through result (only needed for retriving data)
while($result_array_row = mysqli_fetch_array($result)) {
    echo $result_array_row['emp_id'].'-'.$result_array_row['emp_name']."<br>";
}
*/
?>

<table border=1>
    <tr>
        <td>Emp ID</td>
        <td>Name</td>
    </tr>

<?php
    while($result_array_row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo '<td>'.$result_array_row['emp_id'].'</td>';
        echo '<td>'.$result_array_row['emp_name'].'</td>';
        echo '</tr>';
    }

?>
</table>