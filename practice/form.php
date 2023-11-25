<!DOCTYPE html>  <!--important line for bootstrap-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--important line for bootstrap-->
    <title>Document</title>
    <!--Adding an external css file(bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Including jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!--external js-->
    <script src="js/myscript.js"></script>
</head>
<body>
    <?php
    include 'navbar.php' ;
    ?>
    <div class="container">
        <h5 class="display-5 text-center"><b><b>Athelete Form</b></b></h5>
        <?php
        
            $mode = 'Add';
            if(isset($_REQUEST['player_id'])) {
                if($_REQUEST['player_id'] > 0) {
                    $mode = 'Edit';
                    include 'connection.php';
                    $player_id = $_REQUEST['player_id'];
                    $query_str = "SELECT * FROM player WHERE player_id = $player_id";
                    $result = mysqli_query($connection,$query_str);
                    $row = mysqli_fetch_array($result);
                }
            }
        ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 border" style="padding:16px">
            <form id="myform" action="form_insert.php" method="post"  enctype="multipart/form-data">
                <div class="mb-2 row">
                    <?php
                    if($mode == 'Add') {
                        echo"<input type=hidden name=mode value=Add>";
                    ?>
                    <div class="col-4"><label class="form-label">Player ID</label></div>
                    <div class="col">
                        <input id="emp_id"class="form-control" type="number" name="player_id">
                        <small class="text-danger" id="emp_id_error">The employee id cannot be less than 100</small>
                    </div>
                    <?php
                    }else{
                        ?>
                        <input type=hidden name="player_id" value="<?php echo $row['player_id'];?>">
                    <?php
                    }
                    ?>
                </div>
                <div class="mb-2 row">
                    <div class="col-4"><label class="form-label">Player Name</label></div>
                    <div class="col">
                        <input id="emp_name" class="form-control" type="text" onchange="check_name(this)" name="player_name" value="<?php if ($mode=='Edit') echo $row['player_name']?>">
                        <small id="name_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-2 row">
                    <div class="col-4"><label class="form-label">Gender</label></div>
                    <div class="col"><select class="form-select" name="Gender">
                        <option value="">Select</option>
                        <option <?php if (($mode=='Edit') && $row['player_gender']=='Male') echo 'Selected' ;?> value="Male">Male</option>
                        <option <?php if (($mode=='Edit') && $row['player_gender']=='Female') echo 'Selected' ;?> value="Female">Female</option>
                        <option <?php if (($mode=='Edit') && $row['player_gender']=='Other') echo 'Selected' ;?> value="Other">Other</option>
                    </select></div>
                </div>
                <div class="mb-2 row">
                    <div class="col-4"><label class="form-label">Date of Birth</label></div>
                    <div class="col"><input class="form-control" type="date" name="player_dob" value="<?php if ($mode=='Edit') echo $row['player_dob']?>"></div>
                </div>
                    <!--<label for="checkbox_10th_edu"><input type="checkbox" name="edu[]" value="1">Completed 10th</label>
                    <label for="checkbox_12th_edu"><input type="checkbox" name="edu[]" value="2">Completed 12th</label>
                    <label for="checkbox_grad_edu"><input type="checkbox" name="edu[]" value="3">Completed graduation</label>
                    <br><br>-->
                <div class="mb-2 row">
                    <div class="col-4"><label class="form-label">Upload image</label></div>
                    <div class="col"><input class="form-control" type="file" name="player_img"></div>
                </div>
                <div class="mb-2">
                    <input class="btn btn-primary" type="submit" name="submit" value="submit">
                </div>
                    <div class="form-text">We'll not share your privacy.</div>
            </form>
             </div>
            <div class="col-2"></div>
        </div>
    </div>
    </body>
<br><br><br><br><br>
    <?php
    include 'footer.php';
    ?>
</html>