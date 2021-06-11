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
        <?php echo form_open_multipart(base_url().'checkout'); ?>
        <div class="row mb-3">
          <label for="telepon" class="col-md-3 col-lg-2 col-form-label">Nomor Telepon</label>
          <div class="col-md-9 col-lg-5">
            <input type="text" class="form-control" value="<?php echo $user[0]['telepon'] ?>" placeholder="Nomor Telepon" id="telepon" name="telepon" required>
          </div>
          <div class="col offset-md-3 offset-lg-0 align-self-center">
            <?= form_error('telepon', '<span class="badge bg-danger">', '</span>') ?>
          </div>
        </div>
        <fieldset class="row">
          <legend class="col-form-label col-md-3 col-lg-2 pt-0">Metode</legend>
          <div class="col-md-9 col-lg-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metode" value="Ambil" id="takeaway" required>
              <label class="form-check-label" for="takeaway">
                Ambil ditempat ( <a class="text-decoration text-danger" href="https://goo.gl/maps/bRPeMFpdHat1B4Ds7" target="_blank"><?php echo $jetis[0]['alamat'] ?></a> )
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metode" value="Kirim" id="delivery">
              <label class="form-check-label" for="delivery">
                Kirim ke rumah
              </label>
            </div>
          </div>
        </fieldset>

        <div id="delivSetting" class="border-top border-danger mt-3 pt-3">
          <div class="row mb-3">
            <div class="col-md-3 col-lg-2 fw-normal mb-2 mb-md-0">Alamat</div>
            <div class="col-md-9 col-lg-10 text-end">
              <textarea class="form-control" rows="3" id="alamat" name="alamat" disabled><?php echo $user[0]['alamat'] ?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-3 col-lg-2 fw-normal align-self-center mb-2 mb-md-0">Kurir</div>
            <div class="col-6 col-md-4 col-lg-3">
              <select class="form-select" aria-label=".form-select-sm example" name="hargaKurir" id="hargaKurir" disabled>
                <option value="" selected disabled>Pilih kurir</option>
                <?php foreach ($kurir as $key): ?>
                  <option value="<?php echo $key->harga_kurir ?>"><?php echo $key->nama_kurir ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-6 col-md-5 align-self-center" id="vhargaKurir">
              Rp 0
            </div>
            <div class="col-md-3 align-self-center">
              <?= form_error('hargaKurir', '<span class="badge bg-danger">', '</span>') ?>
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
        <input type="hidden" name="alamatJetis" value="<?php echo $jetis[0]['alamat'] ?>">
        <input type="hidden" id="kurir" name="kurir">
        <input type="hidden" id="bayartotal" name="bayartotal" value="<?php echo $totalHarga ?>">
        <button class="btn btn-success px-5 mt-2" type="submit" name="bayar" value="bayar">Bayar</button>
        <?php echo form_close(); ?>
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
    $("#bayartotal").val(total);
    total = new Intl.NumberFormat('id-ID').format(total);
    totalOngkir = new Intl.NumberFormat('id-ID').format(totalOngkir);

    $("#vhargaKurir").html("Rp " + harga);
    $("#overKir div").html("Ongkos Kirim ("+$("#hargaKurir option:selected").html()+")");
    $("#kurir").val($("#hargaKurir option:selected").html());
    $("#overKir div").next().html("Rp " + totalOngkir);
    $("#totalBayar").html("Rp " + total);
  })

  $("#takeaway").click(function () {
    // console.log("tes");
    // $("#delivSetting").css('opacity', '0').css('height', '0');
    // $("#bodyDeliv ").css('max-height', '140px');

    $("#vhargaKurir").html("Rp 0");
    $("#overKir div").html("Ongkos Kirim (-)");
    $("#kurir").val("Ambil ditempat");
    $("#overKir div").next().html("Rp 0");
    $("#bayartotal").val(<?php echo $totalHarga ?>);
    $("#totalBayar").html("Rp <?php echo number_format($totalHarga, 0, ',', '.') ?>");
    $("#hargaKurir").attr("required", false).attr("disabled", true);
    $("#hargaKurir option:first-child").prop('selected', true);
    $("#alamat").attr("required", false).attr("disabled", true);
  })
  $("#delivery").click(function () {
    // console.log("tes");
    // $("#delivSetting").css('opacity', '1').css('height', 'auto');
    $("#hargaKurir").attr("required", true).attr("disabled", false);
    // $("#hargaKurir option:first-child").prop('selected', false);
    $("#alamat").attr("required", true).attr("disabled", false);
    // $("#bodyDeliv ").css('max-height', '313px');
  })
</script>
