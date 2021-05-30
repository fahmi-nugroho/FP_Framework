<div class="best-features about-features pt-3">
  <div class="container">
    <div class="row px-3">
      <div class="col-md-12">
        <div class="section-heading mb-4">
          <h2>Batik Lasem Madura</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="<?php echo base_url() ?>assets/images/Batik/batik khas sidoarjo, lasem dan madura.jpg" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Harga</h4>
            </div>
            <div class="col">
              : Rp <?php echo number_format(150000, 0, ',', '.') ?>
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
              : 241 x 110 cm
            </div>
          </div>
          <div class="row">
            <div class="col-3 col-sm-2 col-md-3 col-xl-2 pl-0">
              <h4>Stok</h4>
            </div>
            <div class="col">
              : 50 pcs
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
                <button class="btn btn-outline-secondary" type="button" id="btnMin" onclick="button(0)" disabled>-</button>
                <input type="number" id="inputJumlah" class="form-control text-center p-0" value="1" onkeyup="jumlahProduct()" required>
                <button class="btn btn-outline-secondary" type="button" id="btnPlus" onclick="button(1)">+</button>
                <div class="invalid-feedback text-center">
                  Masukkan jumlah dengan benar
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <button class="btn btn-success w-100" id="keranjang" type="button">+ Keranjang</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function button(pm) {
    var input = $("#inputJumlah");
    var value = input.val();

    if (pm == 0) {
      input.val(--value);
    } else {
      input.val(++value);
    }

    jumlahProduct();
  };

  function jumlahProduct(){
    var plus = $("#btnPlus");
    var min = $("#btnMin");
    var input = $("#inputJumlah");
    var regex = /[0-9]/;

    if (input.val() <= 1) {
      min.prop("disabled", true);
    } else {
      min.prop("disabled", false);
    }

    if (input.val() >= 50) {
      plus.prop("disabled", true);
    } else {
      plus.prop("disabled", false);
    }

    if (regex.test(input.val())) {
      if (input.val() >= 1 && input.val() <= 50) {
        input.removeClass('is-invalid');
        plus.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
        min.removeClass('btn-outline-danger').addClass('btn-outline-secondary');
      } else {
        input.addClass('is-invalid');
        plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
        min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
      }
    } else {
      input.addClass('is-invalid');
      plus.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
      min.removeClass('btn-outline-secondary').addClass('btn-outline-danger');
    }

    if (input.hasClass('is-invalid') || input.val() < 1 || input.val() > 50) {
      $("#keranjang").prop("disabled", true);
    } else {
      $("#keranjang").prop("disabled", false);
    }
  }
</script>
