<!DOCTYPE html>  <?php session_start();?>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
   

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
                <a class="nav-link  active dropdown-toggle text-dark"  role="button" 
                data-bs-toggle="dropdown"  aria-current="page" aria-expanded="false">
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



<br>
<h2 class="text-center"><b>Coach Modification</b></h2><hr>


<?php

//Connecting another file
include 'connection.php';

echo "<br><br>";

//Run a Query
$query_str = "SELECT * FROM coach";
$result = mysqli_query($connection,$query_str);



?>
<div class="container mb-2">
<table id="myTable" class="display table table-hover table-success table-striped align-middle">
    <thead>
    <tr class="table-primary align-middle">
        <th>Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Category</th>
        <th>Religion</th>
        <th>Address</th>
        <th>Phone no.</th>
        <th>E-mail</th>
        <th>Sport</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php
    while($result_array_row = mysqli_fetch_array($result)) {
        $query_str1 = "SELECT * FROM sport";
        $result1 = mysqli_query($connection,$query_str1);

        echo "<tr>";
        echo '<td>'.$result_array_row['name'].'</td>';
        echo '<td>'.$result_array_row['gender'].'</td>';
        echo '<td>'.$result_array_row['dob'].'</td>';
        echo '<td>'.$result_array_row['caste'].'</td>';
        echo '<td>'.$result_array_row['religion'].'</td>';
        echo '<td>'.$result_array_row['addr'].'</td>';
        echo '<td>'.$result_array_row['phone'].'</td>';
        echo '<td>'.$result_array_row['email'].'</td>';?>
        <td><?php while($result_array = mysqli_fetch_array($result1)) {
            if($result_array_row['sport_id'] == $result_array['sport_id']) {
                echo $result_array['name'];
            }
        }?></td>
        <td><img class="img-thumbnail" src="upload_img/<?php echo $result_array_row['coach_image']?>" ></td><?php
        echo '<td><a href=coach_form.php?coach_id='.$result_array_row['coach_id'].'>Edit</a></td>';
        echo '<td><a href=delete_coach.php?coach_id='.$result_array_row['coach_id'].'>Delete</a></td>';
        echo '</tr>';
    }

?>
</tbody>
</table>
</div>
<script>
    let table = new DataTable('#myTable');
</script>



<?php
    include 'footer.php';
?>


</body>
</html>