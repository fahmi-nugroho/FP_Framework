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
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="<?php echo base_url() ?>"><h2>Batik <em>Jetis</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item <?= (empty(uri_string())) ? "active" : "" ; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>">Home
                    <?php if (empty(uri_string())): ?>
                        <span class="sr-only">(current)</span>
                    <?php endif; ?>
                </a>
              </li>
              <li class="nav-item <?= (uri_string() == "produk") ? "active" : "" ; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>produk">Produk</a>
                <?php if (uri_string() == "produk"): ?>
                    <span class="sr-only">(current)</span>
                <?php endif; ?>
              </li>
              <li class="nav-item <?= (uri_string() == "blog") ? "active" : "" ; ?>">
                <a class="nav-link" href="">Blog</a>
                <?php if (uri_string() == "blog"): ?>
                    <span class="sr-only">(current)</span>
                <?php endif; ?>
              </li>
              <li class="nav-item <?= (uri_string() == "about") ? "active" : "" ; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>about">Tentang Kami</a>
                <?php if (uri_string() == "about"): ?>
                    <span class="sr-only">(current)</span>
                <?php endif; ?>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>login">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
