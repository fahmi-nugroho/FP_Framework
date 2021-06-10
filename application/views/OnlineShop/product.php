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
              (<?php echo $penjualan[0]->jumlah ?> penjualan)
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
          <p class="fs-6"><?php echo ucfirst($db[0]->deskripsi) ?></p>

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
                <input type="number" id="inputJumlah-<?php echo $db[0]->id_batik ?>" class="form-control text-center p-0 inputTextCustom" value="<?php echo ($db[0]->stok > 0) ? 1 : 0; ?>" max="<?php echo $max ?>" onkeyup="jumlahProduct('#inputJumlah-<?php echo $db[0]->id_batik ?>', <?= $db[0]->stok ?>)" required>
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
              <?php
            		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
            			echo '<button class="btn btn-success w-100" id="btnMasukKeranjang" onclick="masukKeranjang('.$db[0]->id_batik.')" type="button">+ Keranjang</button>';
            		} else {
                  echo '<button class="btn btn-success w-100" id="btnMasukKeranjang" onclick="notif()" type="button">+ Keranjang</button>';
                }
              ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    jumlahProduct('#itemKeranjang-<?php echo $db[0]->id_batik ?>');
    jumlahProduct('#inputJumlah-<?php echo $db[0]->id_batik ?>');
  });

  function notif() {
    alert("Harap login terlebih dahulu");
  }
</script>
