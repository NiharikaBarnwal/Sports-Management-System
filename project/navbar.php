  

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
                <a class="nav-link active text-dark" aria-current="page" href="home.php">HOME</a>
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