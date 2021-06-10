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
          <?php if (uri_string() != "checkout"): ?>
            <button class="navbar-toggler" id="btnNavbar" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <?php endif; ?>
          <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
            <?php if (uri_string() != "checkout"): ?>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link <?= (empty(uri_string())) ? "active" : "" ; ?>" href="<?php echo base_url() ?>">Home</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?= (substr(uri_string(), 0, 5) == "batik") ? "active" : "" ; ?>" href="<?php echo base_url() ?>batik">Batik</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?= (uri_string() == "blog") ? "active" : "" ; ?>" href="<?php echo base_url() ?>blog">Blog</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?= (uri_string() == "about") ? "active" : "" ; ?>" href="<?php echo base_url() ?>about">Tentang Kami</a>
                </li>

                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1): ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= (uri_string() == "keranjang") ? "active" : "" ; ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php echo $_SESSION['nama'] ?>
                    </a>
                    <ul class="dropdown-menu dropcustom" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Profil</a></li>
                      <li><a class="dropdown-item" onclick="hideDropdown()" data-bs-toggle="offcanvas" href="#keranjang" role="button" aria-controls="keranjang">Keranjang</a></li>
                      <li><a class="dropdown-item" href="<?php echo base_url() ?>OnlineShop/logout">Logout</a></li>
                    </ul>
                  </li>
                <?php else: ?>
                  <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == "login" || uri_string() == "register") ? "active" : "" ; ?>" href="<?php echo base_url() ?>login">Login</a>
                  </li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </nav>

      <div class="offcanvas offcanvas-end" data-bs-scroll="false" tabindex="-1" id="keranjang" aria-labelledby="keranjangLabel" style="width: 450px;">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="keranjangLabel">Keranjang</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0">
          <div id="isiKeranjang">

          </div>
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
              jumlahProduct('#inputJumlah-'+id, JSON.parse(data).stok);
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
              jumlahProduct('#itemKeranjang-'+id, JSON.parse(data).stok);
              jumlahProduct('#inputJumlah-'+id, JSON.parse(data).stok);
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
              $("#inputJumlah-"+id).prop("max", JSON.parse(data).sisa);
              if (JSON.parse(data).sisa == 0) {
                $("#inputJumlah-"+id).next().next().html("Semua stok sudah masuk keranjang");
              } else {
                $("#inputJumlah-"+id).next().next().html("Masukkan jumlah dengan benar");
              }
              jumlahProduct('#itemKeranjang-'+id, JSON.parse(data).stok);
              jumlahProduct('#inputJumlah-'+id, JSON.parse(data).stok);
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
              jumlahProduct('#itemKeranjang-'+id, JSON.parse(data).stok);
              jumlahProduct('#inputJumlah-'+id, JSON.parse(data).stok);
              tampilKeranjang();
            }
          })
        }

        // function openCheckout() {
        //   $("#isiKeranjang").css('transform', 'translateX(-500px)');
        //   $("#isiCheckout").css('transform', 'translateX(0px)');
        // }

        function button(id_input, bol) {
          // console.log("button = " + id_input);
          // console.log($("input[id*='inputJumlah']").length);
          var input = $(id_input);
          var value = Number(input.val());

          if (bol == 0) {
            input.val(--value);
            if (id_input.includes("itemKeranjang")) {
              kurangKeranjang(id_input.substr(15));
            } else {
              jumlahProduct(id_input);
            }
          } else {
            input.val(++value);
            if (id_input.includes("itemKeranjang")) {
              tambahKeranjang(id_input.substr(15));
            } else {
              jumlahProduct(id_input);
            }
          }

          // console.log(value);
        };

        function jumlahProduct(id_input, stok){
          // console.log("jumlah = " + id_input);
          // console.log(id_input);
          // console.log(id_input.includes("inputJumlah"));
          var input = $(id_input);
          var plus = input.next();
          var min = input.prev();
          var regex = /[0-9]+/;

          if (id_input.includes("inputJumlah")) {
            var tersedia = Number(input.prop("max"));
          } else {
            var tersedia = $("#itemKeranjang-"+id_input.substr(15)).prop("max");
          }

          if (input.val() <= 1) {
            min.prop("disabled", true);
          } else {
            min.prop("disabled", false);
          }

          if (id_input.includes("inputJumlah")) {
            if (input.val() >= tersedia) {
              plus.prop("disabled", true);
            } else {
              plus.prop("disabled", false);
            }
          } else {
            if (input.val() >= stok) {
              plus.prop("disabled", true);
            } else {
              plus.prop("disabled", false);
            }
          }

          if (regex.test(input.val())) {
            if (id_input.includes("inputJumlah")) {
              if (input.val() >= 1 && input.val() <= tersedia) {
                input.removeClass('is-invalid');
                plus.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
                min.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
              } else {
                input.addClass('is-invalid');
                plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
                min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
              }
            }else if (id_input.includes("itemKeranjang")) {
              if (input.val() >= 1 && input.val() <= stok) {
                input.removeClass('is-invalid');
                plus.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
                min.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
              } else {
                input.addClass('is-invalid');
                plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
                min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
              }
            }
          } else {
            input.addClass('is-invalid');
            plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
            min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
          }

          if (id_input.includes("inputJumlah")) {
            if (input.hasClass('is-invalid')) {
              $("#btnMasukKeranjang").prop("disabled", true);
            } else {
              $("#btnMasukKeranjang").prop("disabled", false);
            }
          } else {
            if (input.hasClass('is-invalid')) {
              $("#checkout").prop("disabled", true);
            } else {
              $("#checkout").prop("disabled", false);
            }
          }
        }
      </script>

    </header>
