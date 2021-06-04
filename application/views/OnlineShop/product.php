<div class="best-features about-features pt-3">
  <div class="container">
    <div class="row px-3">
      <div class="col-md-12">
        <div class="section-heading mb-4">
          <?php
            // print_r(explode(" ", $db[0]->ukuran));
            // echo $db[0]->ukuran;
          ?>
          <h2><?php echo $db[0]->nama_batik ?></h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image" style="height: 500px; overflow: hidden;">
          <img src="<?php echo base_url() ?>assets/images/Batik/<?php echo $db[0]->gambar ?>" alt="" style="width: 100%; min-height: 500px;">
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Harga</h4>
            </div>
            <div class="col">
              : Rp <?php echo number_format($db[0]->harga, 0, ',', '.') ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Rating</h4>
            </div>
            <div class="col">
              :
              <span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </span>
              (101 penjualan)
            </div>
          </div>
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Ukuran</h4>
            </div>
            <div class="col">
              : <?php echo $db[0]->ukuran ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Stok</h4>
            </div>
            <div class="col">
              <?php $stok = $db[0]->stok; ?>
              : <?php echo $stok.(($stok > 1) ? " pcs" : " pc"); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Deskripsi</h4>
            </div>
            <div class="col">
              :
            </div>
          </div>
          <?php $txt = "batik khas sidoarjo, lasem dan madura, semuanya hampir memiliki pewarnaan yang serupa. Dimana warna warna ngejreng dan berani banyak dipilih. namun untuk batik madura, motif yang diaplikasi adalah tentang bunga atau tumbuhan, tidak memiliki kebiasaan bermotif hewan. ini sangat berkaitan dengan kulturnya yang religius." ?>
          <p class="fs-6"><?php echo ucfirst($txt) ?></p>

          <div class="row">
            <div class="col-12 col-xl-6 mb-3">
              <div class="input-group">
                <?php
                if (isset($_SESSION['cart']['cart_'.$db[0]->id_batik])) {
                  $max = $db[0]->stok - $_SESSION['cart']['cart_'.$db[0]->id_batik];
                } else {
                  $max = $db[0]->stok;
                }
                ?>
                <button class="btn btn-outline-secondary" type="button" onclick="button('#inputJumlah-<?php echo $db[0]->id_batik ?>', 0)">-</button>
                <input type="number" id="inputJumlah-<?php echo $db[0]->id_batik ?>" class="form-control text-center p-0 inputTextCustom" value="<?php echo ($db[0]->stok > 0) ? 1 : 0; ?>" max="<?php echo $max ?>" onkeyup="jumlahProduct('#inputJumlah-<?php echo $db[0]->id_batik ?>', 0)" required>
                <button class="btn btn-outline-secondary" type="button" onclick="button('#inputJumlah-<?php echo $db[0]->id_batik ?>', 1)">+</button>
                <div class="invalid-feedback text-center">
                  <?php
                    if ($db[0]->stok == 0) {
                      echo "Stok kosong";
                    } else if (isset($_SESSION['cart']['cart_'.$db[0]->id_batik]) && ($db[0]->stok == $_SESSION['cart']['cart_'.$db[0]->id_batik])) {
                      echo "Semua stok sudah masuk keranjang";
                    } else {
                      echo "Masukkan jumlah dengan benar";
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <button class="btn btn-success w-100" id="btnMasukKeranjang" onclick="masukKeranjang(<?php echo $db[0]->id_batik ?>)" type="button">+ Keranjang</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    jumlahProduct('#itemKeranjang-<?php echo $db[0]->id_batik ?>', 0);
    jumlahProduct('#inputJumlah-<?php echo $db[0]->id_batik ?>', 0);
  });

  function button(id_input, bol) {
    console.log("button = " + id_input);
    // console.log($("input[id*='inputJumlah']").length);
    var input = $(id_input);
    var value = Number(input.val());

    if (bol == 0) {
      input.val(--value);
      if (id_input.includes("itemKeranjang")) {
        kurangKeranjang(id_input.substr(15));
      } else {
        jumlahProduct(id_input, 0);
      }
    } else {
      input.val(++value);
      if (id_input.includes("itemKeranjang")) {
        tambahKeranjang(id_input.substr(15));
      } else {
        jumlahProduct(id_input, 0);
      }
    }

    console.log(value);
  };

  function jumlahProduct(id_input, cek){
    console.log("jumlah = " + id_input);
    // console.log(id_input);
    // console.log(id_input.includes("inputJumlah"));
    var input = $(id_input);
    var plus = input.next();
    var min = input.prev();
    // console.log(plus.prop("onclick"));
    var regex = /[0-9]/;
    if (id_input.includes("inputJumlah")) {
      var tersedia = Number(input.prop("max"));
    } else {
      var tersedia = $("#inputJumlah-<?php echo $db[0]->id_batik ?>").prop("max");
    }
    // console.log(input.prop("max"));
    // console.log(tersedia);

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
      if (input.val() >= <?php echo $db[0]->stok ?>) {
        plus.prop("disabled", true);
      } else {
        plus.prop("disabled", false);
      }
    }

    // console.log(input.val() + " = " + tersedia);
    // console.log(input.val() >= 1 && input.val() <= tersedia);
    if (regex.test(input.val())) {
      if (id_input.includes("inputJumlah")) {
        if (input.val() >= 1 && input.val() <= tersedia) {
          console.log("b");
          input.removeClass('is-invalid');
          plus.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
          min.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
        } else {
          console.log("d");
          input.addClass('is-invalid');
          plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
          min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
        }
      }

      if (id_input.includes("itemKeranjang")) {
        if (input.val() >= 1 && input.val() <= <?php echo $db[0]->stok ?>) {
          console.log("a");
          if (cek == 1) {
            // ubahKeranjang(id_input.substr(15));
          }
          input.removeClass('is-invalid');
          plus.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
          min.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
        } else {
          console.log("c");
          input.addClass('is-invalid');
          plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
          min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
        }
      }
    } else {
      console.log("x");
      input.addClass('is-invalid');
      plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
      min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
    }

    if (input.hasClass('is-invalid')) {
      $("#btnMasukKeranjang").prop("disabled", true);
    } else {
      $("#btnMasukKeranjang").prop("disabled", false);
    }
  }
</script>
