Fetch all record from facility master
Loop through the result
Create  the HTML for the checkbox

<?php
$sql = "SELECT * from facility_master";
$result = mysql_query($connection,$sql);
while ($row=mysqli_fetch_array($result)) {
?>
    <div class="checkbox checkbox-primary">
    <input id="checkbox<?php echo $row['facility_master_id']?>" name="facilities[]" type="checkbox" value="<?php echo $row['facility_master_id']?>">
    <label for="checkbox<?php echo $row['facility_master_id']?>">
        <b><?php echo $row['facility_master_name']?></b>
    </label>
    </div>
<?php
}
?>