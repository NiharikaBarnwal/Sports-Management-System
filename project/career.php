<!DOCTYPE html>  <?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Including jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!--external js-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>.fakeimg {
  height: 200px;
  background: #aaa;
  }

  .background-image {
  position: absolute;
  top: 5;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url("img/1088620.jpg"); 
  background-size: cover;
  background-position: center;
  opacity: 1;}
    </style>
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



<!--content-->
<h2 class="text-center background-image"><b>CAREER</b></h2>



<div class="container  rounded shadow p-5 border-top border-4 text-center g-0"><hr>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/52851cf8eab8eab16175e9111 (1).jpg" class="img-fluid  rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Athlete</h5>
        <p class="card-text">An athlete (also sportsman or sportswoman) is a person who competes in one or more sports that involve physical strength, speed, or endurance.</p><br>
        <p class="card-text"><small class="text-body-secondary"><a href="ath_form.php">Click here</a> to be a real athlete</small></p>
      </div>
    </div>
  </div>
</div>


<div class="row g-0">
    <div class="col-7"></div>
<div class="card mb-3 col" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/foster-a-coaching-culture1 (3).jpg" class="img-fluid  rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Coach</h5>
        <p class="card-text">An athletic coach is a person coaching in sport, involved in the direction, instruction, and training of a sports team or athlete.</p><br>
        <p class="card-text"><small class="text-body-secondary"><a href="coach_form.php">Click here</a> to be a coach of real athlete</small></p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>



<?php
    include 'footer.php';
    ?>
    
</body>
</html>