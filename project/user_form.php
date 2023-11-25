<!DOCTYPE html>  <?php session_start();?>
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
                <a class="nav-link text-dark" href="career.php">CAREER</a>
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
                <a class="nav-link active text-dark" aria-current="page" href="user_form.php">REGISTRATION</a>
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
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="check_login.php" method="post">
        <div class="modal-header row">
        <div class="col-1"><i class="bi bi-person-circle" style="font-size: 2rem;"></i></div>
          <div class="col-10"><h1 class="modal-title fs-5" id="exampleModalLabel">Login Please</h1></div>
          <div class="col-1"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <div class="col-4"><label class="form-label">User id</label></div>
            <div class="col"><input class="form-control" type="text" name="user_id"></div>
          </div>
          <div class="mb-1 row">
            <div class="col-4"><label class="form-label">Password</label></div>
            <div class="col"><input class="form-control" type="password" name="password"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Login</button></div>
          <div class="p-2 mb-1" style="text-align:right;"><a href="user_form.php">Don't have an account? Sign-up</a>
        </div>
      </form>
    </div>
  </div>
</div>




    <?php
    include 'connection.php';
    ?>
    <div class="container">
    <div class="row">
        <div class="col-7 border" style="padding:16px">
        <h5 class="display-5 text-center"><b><b>User Form</b></b></h5>
        
        <?php
        
            $mode = 'Add';
            if(isset($_REQUEST['user_id'])) {
                if($_REQUEST['user_id'] > 0) {
                    $mode = 'Edit';
                    $user_id = $_REQUEST['user_id'];
                    $query_str = "SELECT * FROM user WHERE user_id = $user_id";
                    $result = mysqli_query($connection,$query_str);
                    $row = mysqli_fetch_array($result);
                }
            }
        ?>
        <div class="row"><br>
            <hr>
            <form id="myform" action="user_insert.php" method="post"  enctype="multipart/form-data">
                <div class="mb-4 row">
                    <?php
                    if($mode == 'Add') {
                        echo"<input type=hidden name=mode value=Add>";
                    ?>
                    <div class="col-4"><label class="form-label"><b>User ID</b></label></div>
                    <div class="col">
                        <input autofocus class="form-control"  name="user_id" >
                    </div>
                    <?php
                    }else{
                        ?>
                        <input type=hidden name="user_id" value="<?php echo $row['user_id'];?>">
                    <?php
                    }
                    ?>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>User Name</b></label></div>
                    <div class="col"><input class="form-control" required type="text" onchange="check_name(this)" name="user_name" value="<?php if ($mode=='Edit') echo $row['user_name']?>">
                    <small id="name_error" class="text-danger"></small></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Gender</b></label></div>
                    <div class="col"><select class="form-select" name="Gender">
                        <option value="">Select</option>
                        <option <?php if (($mode=='Edit') && $row['user_gender']=='Male') echo 'Selected' ;?> value="Male">Male</option>
                        <option <?php if (($mode=='Edit') && $row['user_gender']=='Female') echo 'Selected' ;?> value="Female">Female</option>
                        <option <?php if (($mode=='Edit') && $row['user_gender']=='Other') echo 'Selected' ;?> value="Other">Other</option>
                    </select></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Date of Birth</b></label></div>
                    <div class="col"><input class="form-control" type="date" name="user_dob" value="<?php if ($mode=='Edit') echo $row['user_dob']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Email-ID</b></label></div>
                    <div class="col"><input class="form-control" type="email" name="email" value="<?php if ($mode=='Edit') echo $row['email']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Phone no.</b></label></div>
                    <div class="col"><input class="form-control" type="text" name="user_phone" value="<?php if ($mode=='Edit') echo $row['user_phone']?>"></div>
                </div>
                <div class="mb-4 row">
                    <div class="col-4"><label class="form-label"><b>Password</b></label></div>
                    <div class="col"><input class="form-control" required type="password" name="pass" value="<?php if ($mode=='Edit') echo $row['pass']?>"></div>
                </div>
                <div class="mb-2 row">
                    <div class="col-8"></div>
                    <div class="col-2"><input class="btn btn-secondary" type="reset"></div>
                    <div class="col"><input class="btn btn-primary" type="submit" name="submit" value="submit"></div>
                </div>
                <div class="mb-2 row">
                    <div class="col-8"></div>
                    <div class="form-text col">We'll not share your privacy.</div>
                </div>
            </form>
            </div>
            
        </div>
        <div class="col-2"><img src="img\what-is-the-definition-of-free-hit-in-cricket-768x64912.jpeg"></div>
    </div>
</div>
    <br><br>
    <?php
    include 'footer.php';
    ?>
    </body>

</html>