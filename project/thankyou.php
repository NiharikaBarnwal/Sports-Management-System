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
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url("img/Thank you cricket card copy.jpg"); 
  background-size: cover;
  background-position: center;
  opacity: 0.8;}
    </style>
</head>
<body>

<?php
    include 'navbar.php';
?>
<div class="container-fluid">
    <img src="img/Thank you cricket card copy12.jpg" class="d-block w-100">
    <h2 class="text-center"><b>YOUR RESPONSE HAS BEEN RECORDED</b></h2>
  </div>

<?php
    include 'footer.php';
?>
</body>
</html>