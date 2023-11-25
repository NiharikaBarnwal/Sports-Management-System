<!DOCTYPE html> <?php session_start();?>
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

    <script src="js/myscript.js"></script>
</head>
<body>
  
    <?php
    include 'navbar.php';
    ?>

    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000">
            <img src="img\470f80c7a28a39a9d797be2feca068ef (1).jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="img\sprinting-e15585302043581 (1).jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="img\1200-467634080-basketball-game1 (1).jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
<br><br>
<div class="container mt-3">
<div class="container row row-cols-1 row-cols-md-6 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="img\CRICKET (1).jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Cricket</h5>
        <p class="card-text">Cricket is a bat-and-ball game played between two teams of 11 players on a field at the centre of which is a 22-yard pitch with a wicket at each end.</p>
        <a href="#" class="btn btn-primary">More Info</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img\nba-wallpaper-iphone-basketball-.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Basketball</h5>
        <p class="card-text">Basketball is a team sport in which two teams, compete with the primary objective of shooting a basketball through the defender's hoop. </p>
        <br><a href="#" class="btn btn-primary">More Info</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img\football for over 50s (1).jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Football</h5>
        <p class="card-text">Football is a family of team sports that involve, to varying degrees, kicking a ball to score a goal.</p>
        <br><br><br><a href="#" class="btn btn-primary">More Info</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img\Badminton Wallpapers 01 (2).jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Badminton</h5>
        <p class="card-text">Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. </p>
        <br><br><br><a href="#" class="btn btn-primary">More Info</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img\Proper-Sprinting-Technique-featu.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Sprinting</h5>
        <p class="card-text">Sprinting is running over a short distance at the top-most speed of the body in a limited period of time.</p>
        <br><br><a href="#" class="btn btn-primary">More Info</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img\swimming (1).jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Swimming</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <br><br><a href="#" class="btn btn-primary">More Info</a>
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