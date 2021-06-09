<div class="outer pt-3">
  <div class="container">

    <div class="row">
      <div class="col-4 text-start">
        <button class="btn btn-outline-dark" type="button" name="button" onclick="kembali()">Kembali</button>
      </div>
      <div class="col-4 text-center align-self-center">
        <h4>Checkout</h4>
      </div>
      <div class="col-4 text-end">

      </div>
    </div>

    <hr>

    <div class="card border-0">
      <div class="card-header bg-transparent border-0 mb-1">
        <h5>Keranjang</h5>
      </div>
      <div class="card-body border border-danger p-0">
        <?php
          $totalHarga = 0;
          $totalBarang = 0;
        ?>
        <ul class="list-group list-group-flush px-3">
          <?php foreach ($batiks as $batik): ?>
            <li class="list-group-item border-danger px-0">
              <div class="d-flex align-items-center py-2">
                <div class="flex-shrink-0">
                  <div class="d-flex align-items-center justify-content-center keranjang-img">
                    <a href="<?php echo base_url() ?>batik/produk/<?php echo $batik->id_batik ?>"><img class="img-fluid" src="<?php echo base_url() ?>assets/images/Batik/<?php echo $batik->gambar ?>" alt="..."></a>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="row pb-2">
                    <a class="text-decoration-none text-dark col" href="<?php echo base_url() ?>batik/produk/<?php echo $batik->id_batik ?>"><?php echo $batik->nama_batik ?></a>
                  </div>
                  <div class="row">
                    <div class="col text-muted">
                      <?php echo $_SESSION['cart']['cart_'.$batik->id_batik] ?> barang @ Rp <?php echo number_format($batik->harga, 0, ',', '.') ?>
                    </div>
                  </div>
                </div>
                <div class="flex-shrink-0 me-3">
                  <span class="align-self-center fs-5">
                    <?php
                      $subTotal = $_SESSION['cart']['cart_'.$batik->id_batik] * $batik->harga;
                      $totalHarga += $subTotal;
                      $totalBarang += $_SESSION['cart']['cart_'.$batik->id_batik];
                    ?>
                    Rp <?php echo number_format($subTotal, 0, ',', '.') ?>
                  </span>
                </div>
              </div>
            </li>
          <?php endforeach; ?>

        </ul>

      </div>
    </div>

    <div class="card border-0 mt-4">
      <div class="card-header bg-transparent border-0 fw-bold">
        <h5>Cara Pengiriman</h5>
      </div>
      <div class="card-body border border-danger" id="bodyDeliv">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="takeaway">
          <label class="form-check-label" for="takeaway">
            Ambil ditempat ( Jalan - Jalan )
          </label>
        </div>
        <div class="form-check mt-2">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="delivery">
          <label class="form-check-label" for="delivery">
            Kirim ke rumah
          </label>
        </div>

        <div id="delivSetting" class="border-top border-danger mt-3 pt-3">
          <div class="row">
            <div class="col-sm-2 fw-normal">Alamat</div>
            <div class="col-sm-10 text-end">
              <textarea class="form-control" rows="3" disabled>Jalan jalan</textarea>
              <button class="btn btn-outline-secondary btn-sm mt-2 px-3" type="button" name="button">Edit</button>
            </div>
          </div>
          <div class="row my-3">
            <div class="col-sm-2 fw-normal align-self-center">Nomor Telepon</div>
            <div class="col-sm-10 mb-0">
              <div class="row align-items-center">
                <div class="col-6">
                  <input type="text" class="form-control" value="087755565590" placeholder="name@example.com" disabled>
                </div>
                <div class="col-6">
                  <button class="btn btn-outline-secondary btn-sm px-3" type="button" name="button">Edit</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 fw-normal align-self-center">Kurir</div>
            <div class="col-sm-5">
              <select class="form-select" aria-label=".form-select-sm example" id="hargaKurir">
                <option value="0" selected>Pilih kurir</option>
                <?php foreach ($kurir as $key): ?>
                  <option value="<?php echo $key->harga_kurir ?>"><?php echo $key->nama_kurir ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-sm-5 align-self-center" id="vhargaKurir">
              Rp 0
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="card border-0 mt-4">
      <div class="card-header bg-transparent border-0 fw-bold">
        <h5>Ringkasan</h5>
      </div>
      <div class="card-body border border-danger p-2">

        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                Total Harga (<?php echo $totalBarang ?> barang)
              </div>
              <div class="col-6 text-end">
                Rp <?php echo number_format($totalHarga, 0, ',', '.') ?>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row" id="overKir">
              <div class="col-6">
                Ongkos Kirim (-)
              </div>
              <div class="col-6 text-end">
                Rp 0
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                Total Pembayaran
              </div>
              <div class="col-6 text-end" id="totalBayar">
                Rp <?php echo number_format($totalHarga, 0, ',', '.') ?>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="card-footer bg-transparent border-0 text-end px-0">
        <button class="btn btn-success px-5 mt-2" type="button" name="button">Bayar</button>
      </div>
    </div>

  </div>
</div>
<style media="screen">
  .navbar-brand{
    margin-top: 6px !important;
  }

  @media (max-width: 991px) {
    .navbar-brand{
      margin-top: -12px !important;
    }
  }
</style>
<script type="text/javascript">
  function kembali() {
    window.history.back();
  }

  $("#hargaKurir").change(function () {
    let harga = new Intl.NumberFormat('id-ID').format($(this).val());
    let totalOngkir = Number($(this).val()) * <?php echo $totalBarang ?>;
    let total = totalOngkir + (<?php echo $totalHarga ?>);
    total = new Intl.NumberFormat('id-ID').format(total);
    totalOngkir = new Intl.NumberFormat('id-ID').format(totalOngkir);

    $("#vhargaKurir").html("Rp " + harga);
    $("#overKir div").html("Ongkos Kirim ("+$("#hargaKurir option:selected").html()+")");
    $("#overKir div").next().html("Rp " + totalOngkir);
    $("#totalBayar").html("Rp " + total);
  })

  $("#takeaway").click(function () {
    // console.log("tes");
    // $("#delivSetting").css('opacity', '0').css('height', '0');
    $("#bodyDeliv ").css('max-height', '90px');

    $("#vhargaKurir").html("Rp 0");
    $("#overKir div").html("Ongkos Kirim (-)");
    $("#overKir div").next().html("Rp 0");
    $("#totalBayar").html("Rp <?php echo number_format($totalHarga, 0, ',', '.') ?>");
    $("#hargaKurir option[value='0']").prop('selected', true);
  })
  $("#delivery").click(function () {
    // console.log("tes");
    // $("#delivSetting").css('opacity', '1').css('height', 'auto');
    $("#bodyDeliv ").css('max-height', '356px');
  })
</script>
