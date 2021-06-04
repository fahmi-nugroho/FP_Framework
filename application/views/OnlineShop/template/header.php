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

    <!-- Additional Scripts -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/owl.js"></script>
    <script src="<?php echo base_url() ?>assets/js/slick.js"></script>
    <script src="<?php echo base_url() ?>assets/js/isotope.js"></script>
    <script src="<?php echo base_url() ?>assets/js/accordions.js"></script>
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
          <button class="navbar-toggler" id="btnNavbar" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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

              <!-- <li class="nav-item">
                <a class="nav-link <?= (uri_string() == "login" || uri_string() == "register") ? "active" : "" ; ?>" href="<?php echo base_url() ?>login">Login</a>
              </li> -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= (uri_string() == "keranjang") ? "active" : "" ; ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  User
                </a>
                <ul class="dropdown-menu dropcustom" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Profil</a></li>
                  <li><a class="dropdown-item" onclick="hideDropdown()" data-bs-toggle="offcanvas" href="#keranjang" role="button" aria-controls="keranjang">Keranjang</a></li>
                  <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="offcanvas offcanvas-end" data-bs-scroll="false" tabindex="-1" id="keranjang" aria-labelledby="keranjangLabel" style="width: 450px;">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="keranjangLabel">Keranjang</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div id="isiKeranjang" class="offcanvas-body pt-0">

        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function () {
          tampilKeranjang();
        })

        function hideDropdown() {
          $("#btnNavbar").removeClass("collapsed").prop("aria-expanded", false);
          $("#navbarResponsive").removeClass("show");
        }

        function tampilKeranjang() {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>OnlineShop/keranjang",
            data: "action=tampil",
            success: function(data){
              $("#isiKeranjang").html(data);
            }
          })
        }

        function masukKeranjang(id) {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>OnlineShop/keranjang",
            data: "action=tambah&id=" + id + "&jumlah=" + $("#inputJumlah-"+id).val(),
            success: function(data){
              $("#inputJumlah-"+id).prop("max", JSON.parse(data).sisa);
              if (JSON.parse(data).sisa == 0) {
                $("#inputJumlah-"+id).next().next().html("Semua stok sudah masuk keranjang");
              } else {
                $("#inputJumlah-"+id).next().next().html("Masukkan jumlah dengan benar");
              }
              jumlahProduct('#inputJumlah-'+id, 0);
              tampilKeranjang();
            }
          })
        }

        function tambahKeranjang(id) {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>OnlineShop/keranjang",
            data: "action=tambah&id=" + id + "&jumlah=1",
            success: function(data){
              $("#inputJumlah-"+id).prop("max", JSON.parse(data).sisa);
              if (JSON.parse(data).sisa == 0) {
                $("#inputJumlah-"+id).next().next().html("Semua stok sudah masuk keranjang");
              } else {
                $("#inputJumlah-"+id).next().next().html("Masukkan jumlah dengan benar");
              }
              // console.log(JSON.parse(data).sisa);
              jumlahProduct('#itemKeranjang-'+id, 0);
              jumlahProduct('#inputJumlah-'+id, 0);
              tampilKeranjang();
            }
          })
        }

        function kurangKeranjang(id) {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>OnlineShop/keranjang",
            data: "action=kurang&id=" + id,
            success: function(data){
              // var sisa = Number($("#inputJumlah-"+id).prop("max"));
              // $("#inputJumlah-"+id).prop("max", ++sisa);
              $("#inputJumlah-"+id).prop("max", JSON.parse(data).sisa);
              if (JSON.parse(data).sisa == 0) {
                $("#inputJumlah-"+id).next().next().html("Semua stok sudah masuk keranjang");
              } else {
                $("#inputJumlah-"+id).next().next().html("Masukkan jumlah dengan benar");
              }
              jumlahProduct('#itemKeranjang-'+id, 0);
              jumlahProduct('#inputJumlah-'+id, 0);
              tampilKeranjang();
            }
          })
        }

        function ubahKeranjang(id) {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>OnlineShop/keranjang",
            data: "action=ubah&id=" + id + "&jumlah=" + $("#itemKeranjang-"+id).val(),
            success: function(data){
              // var sisa = Number($("#inputJumlah-"+id).prop("max"));
              // $("#inputJumlah-"+id).prop("max", ++sisa);
              $("#inputJumlah-"+id).prop("max", JSON.parse(data).sisa);
              if (JSON.parse(data).sisa == 0) {
                $("#inputJumlah-"+id).next().next().html("Semua stok sudah masuk keranjang");
              } else {
                $("#inputJumlah-"+id).next().next().html("Masukkan jumlah dengan benar");
              }
              jumlahProduct('#itemKeranjang-'+id, 0);
              jumlahProduct('#inputJumlah-'+id, 0);
              tampilKeranjang();
            }
          })
        }
      </script>

    </header>
