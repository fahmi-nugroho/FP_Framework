<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Batik Jetis</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--
    TemplateMo 546 Sixteen Clothing
    https://templatemo.com/tm-546-sixteen-clothing
    -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="<?php echo base_url() ?>"><h2>Batik <em>Jetis</em></h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link <?= (empty(uri_string())) ? "active" : "" ; ?>" href="<?php echo base_url() ?>">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= (substr(uri_string(), 0, 6) == "produk") ? "active" : "" ; ?>" href="<?php echo base_url() ?>produk">Produk</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= (uri_string() == "blog") ? "active" : "" ; ?>" href="">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= (uri_string() == "about") ? "active" : "" ; ?>" href="<?php echo base_url() ?>about">Tentang Kami</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= (uri_string() == "login" || uri_string() == "register") ? "active" : "" ; ?>" href="<?php echo base_url() ?>login">Login <!--<span class="badge bg-danger">4</span>--></a>
              </li>

              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  User
                </a>
                <ul class="dropdown-menu dropcustom" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Profil</a></li>
                  <li><a class="dropdown-item" href="#">Cart</a></li>
                  <li><a class="dropdown-item active" href="#" aria-current="true">Logout</a></li>
                </ul>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
    </header>
