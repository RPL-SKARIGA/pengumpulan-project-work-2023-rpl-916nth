<?php 
require "config/db_connect.php";
require "config/function.libs.php";
?>
<html>
    <head>
        <title>Berita Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    </head>
    <body>
      
    </body>
</html>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <i class="fab fa-github fa-2x mx-3 ps-1"></i>
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="cari.php" class="cari" method="get"> 
        <div class="form-white input-group" style="width: 250px;margin-top:15px" >
          <input class="form-control me-2" type="search" name="txt_cari" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <ul class="navbar-nav d-flex flex-row ms-auto me-3">
        <li class="nav-item me-3 me-lg-0 dropdown">
          <a class="nav-link dropdown-toggle" href="profile.php" id="navbarDropdown1" role="button" data-mdb-toggle="dropdown"
            aria-expanded="false">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22"
              alt="" loading="lazy" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->

