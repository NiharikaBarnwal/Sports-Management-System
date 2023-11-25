<!DOCTYPE html>   <?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--important line for bootstrap-->
    <title>Document</title>
    <!--Adding an external css file(bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/myscript.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body>

<!--navbar-->
<div>
<nav class="navbar navbar-expand-lg bg-light nav-underline" data-bs-theme="dark">
    <div>
      <img src="https://w7.pngwing.com/pngs/303/549/png-transparent-sport-logo-football-sports-logos-text-sport-logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
    </div>
        <div class="container-fluid">
          <a class="navbar-brand text-dark nav-underline" href="#"><h2><b>Nebula Sports</b></h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link text-dark" href="home.php">HOME</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark" href="about.php">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-dark" aria-current="page" href="career.php">CAREER</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark"  role="button" 
                data-bs-toggle="dropdown" aria-expanded="false">
                MODIFY
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="modify_user.php">User Modification</a></li>
                  <li><a class="dropdown-item" href="modify_ath.php">Athlete Modification</a></li>
                  <li><a class="dropdown-item" href="modify_coach.php">Coach Modification</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="user_form.php">REGISTRATION</a>
              </li>
              <li class="nav-item">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
                  <a href='logout.php'><button type="button" class="btn btn-info">
                    Logout
                  </button></a>
                <?php
                 echo 'Welcome '. $_SESSION['user_name'];
                } else {
                  ?>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Login
                  </button>
                <?php } ?>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button id="submit" class="btn btn-outline-dark" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>

    <?php
    
    include 'connection.php';
    ?>
    <div class="container">
    <div class="row">
        <div class="col-5"><img src="img\abstract-basketball-player-with- (3).jpg"></div>
        <div class="col-7 border" style="padding:16px">
        <h5 class="display-5 text-center"><b><b>Athelete Form</b></b></h5>
        <?php
        
            $mode = 'Add';
            $ath_sport_array = array();
            if(isset($_REQUEST['ath_id']) && is_numeric($_REQUEST['ath_id'])) {
                if($_REQUEST['ath_id'] > 0) {
                    $mode = 'Edit';
                    //Fetch data from main table
                    $ath_id = $_REQUEST['ath_id'];
                    $query_str = "SELECT * FROM athlete WHERE ath_id = ?";
                    $stmt = mysqli_prepare($connection,$query_str);
                    mysqli_stmt_bind_param($stmt,'i',$ath_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_array($result);

                    //Fetch data from child table
                    $query_qry = "SELECT * FROM athlete_sport WHERE ath_id = ?";
                    $stmt1 = mysqli_prepare($connection,$query_qry);
                    mysqli_stmt_bind_param($stmt1,'i',$ath_id);
                    mysqli_stmt_execute($stmt1);
                    $result_child = mysqli_stmt_get_result($stmt1);
                    while($row_child = mysqli_fetch_array($result_child)){
                        $ath_sport_array[] = $row_child['sport_id'];
                    }
                    //print_r($ath_sport_array); exit;
                }
            }
        ?>
        <div class="row"><br>
        <hr>
            <form id="myform" action="ath_form_insert.php" method="post"  enctype="multipart/form-data">
            <div class="mb-4 row">
                    <?php
                    if($mode == 'Add') {
                        echo"<input type=hidden name=mode value=Add>";
                    ?>
                   
                        <input class="form-control" type="hidden" name="player_id" >
                   
                    <?php
                    }else{
                        ?>
                        <input type=hidden name="player_id" value="<?php echo $row['ath_id'];?>">
                    <?php
                    }
                    ?>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Player Name</b></label></div>
                    <div class="col"><input class="form-control" required autofocus type="text" onchange="check_name(this)" name="player_name" value="<?php if ($mode=='Edit') echo $row['name']?>">
                    <small id="name_error" class="text-danger"></small></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Gender</b></label></div>
                    <div class="col"><select class="form-select" name="Gender">
                        <option value="">Select</option>
                        <option <?php if (($mode=='Edit') && $row['gender']=='Male') echo 'Selected' ;?> value="Male">Male</option>
                        <option <?php if (($mode=='Edit') && $row['gender']=='Female') echo 'Selected' ;?> value="Female">Female</option>
                        <option <?php if (($mode=='Edit') && $row['gender']=='Other') echo 'Selected' ;?> value="Other">Other</option>
                    </select></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Date of Birth</b></label></div>
                    <div class="col"><input class="form-control" type="date" name="player_dob"  max="2005-01-01" value="<?php if ($mode=='Edit') echo $row['dob']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Category</b></label></div>
                    <div class="col row">
                        <div class="col-3"><label for="radio_general_category"><input type="radio" name="category" value="General" <?php if (($mode=='Edit') && $row['caste']=='General') echo 'checked' ;?>> General</label></div>
                        <div class="col-2"><label for="radio_obc_category"><input type="radio" name="category" value="OBC" <?php if (($mode=='Edit') && $row['caste']=='OBC') echo 'checked' ;?>> OBC</label></div>
                        <div class="col-2"><label for="radio_sc_category"><input type="radio" name="category" value="SC" <?php if (($mode=='Edit') && $row['caste']=='SC') echo 'checked' ;?>> SC</label></div>
                        <div class="col-2"><label for="radio_st_category"><input type="radio" name="category" value="ST" <?php if (($mode=='Edit') && $row['caste']=='ST') echo 'checked' ;?>> ST</label></div>
                        <div class="col-2"><label for="radio_sebc_category"><input type="radio" name="category" value="SEBC" <?php if (($mode=='Edit') && $row['caste']=='SEBC') echo 'checked' ;?>> SEBC</label></div>
                    </div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Religion</b></label></div>
                    <div class="col"><select class="form-select" name="religion">
                        <option value="">Select</option>
                        <option <?php if (($mode=='Edit') && $row['religion']=='Hindu') echo 'Selected' ;?> value="Hindu">Hindu</option>
                        <option <?php if (($mode=='Edit') && $row['religion']=='Buddhist') echo 'Selected' ;?> value="Buddhist">Buddhist</option>
                        <option <?php if (($mode=='Edit') && $row['religion']=='Sikh') echo 'Selected' ;?> value="Sikh">Sikh</option>
                        <option <?php if (($mode=='Edit') && $row['religion']=='Jain') echo 'Selected' ;?> value="Jain">Jain</option>
                        <option <?php if (($mode=='Edit') && $row['religion']=='Other') echo 'Selected' ;?> value="Other">Other</option>
                    </select></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Address</b></label></div>
                    <div class="col"><input class="form-control" type="text" name="player_add" value="<?php if ($mode=='Edit') echo $row['addr']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Email-ID</b></label></div>
                    <div class="col"><input class="form-control" type="email" name="email" value="<?php if ($mode=='Edit') echo $row['email']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Phone no.</b></label></div>
                    <div class="col"><input class="form-control" type="text" name="player_phone" value="<?php if ($mode=='Edit') echo $row['phone']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Sport</b></label></div>
                    <div class="col row">
                    <?php
                    $sql = "SELECT * from sport";
                    $result = mysqli_query($connection,$sql);
                    while ($row1=mysqli_fetch_array($result)) {
                    ?>
                        <div class="checkbox-group checkbox-primary">
                        <input id="checkbox<?php echo $row1['sport_id']?>" name="sport[]" type="checkbox" value="<?php echo $row1['sport_id']?>"
                        <?php 
                        if (count($ath_sport_array) > 0) {
                            if (in_array($row1['sport_id'],$ath_sport_array)) {
                                echo ' checked';
                            }
                        }
                        ?>>
                        <label for="checkbox<?php echo $row1['sport_id']?>">
                            <b><?php echo $row1['name']?></b>
                        </label>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Upload image</b></label></div>
                    <div class="col"><input class="form-control" type="file" name="player_img">
                     <?php if ($mode=='Edit') {?> <img class="img-thumbnail" src="upload_img/<?php echo $row['ath_img']?>" > <?php } ?></div>
                </div>
                <div class="mb-2 row">
                    <div class="col-8"></div>
                    <div class="col-2"><input class="btn btn-secondary" type="reset"></div>
                    <div class="col"><input class="btn btn-primary" type="submit" name="submit" value="Submit"></div>
                </div>
                <div class="mb-2 row">
                    <div class="col-8"></div>
                    <div class="form-text col">We'll not share your privacy.</div>
                </div>
            </form>
             </div>
        </div>
    </div>
</div>
    <br><br>
    <?php
    include 'footer.php';
    ?>
    </body>

</html>