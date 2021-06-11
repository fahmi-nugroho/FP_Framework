<div id="carouselExampleDark" class="carousel carousel-dark slide banner header-text" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="5000">
      <div class="d-block w-100 banner-item-01">
        <div class="text-content">
          <h4>Best Offer</h4>
          <h2>New Arrivals On Sale</h2>
        </div>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <div class="d-block w-100 banner-item-02">
        <div class="text-content">
          <h4>Flash Deals</h4>
          <h2>Get your best products</h2>
        </div>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="d-block w-100 banner-item-03">
        <div class="text-content">
          <h4>Last Minute</h4>
          <h2>Grab last minute deals</h2>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- Page Content -->
    <!-- Banner Starts Here -->
    <!-- <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Produk Terbaru</h2>
              <a href="<?php echo base_url() ?>batik">lihat semua produk <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php
            foreach ($db as $row) {
          ?>

          <div class="col-md-4">
            <div class="product-item">
              <div class="product-image d-flex align-items-center justify-content-center">
                <a href="<?php echo base_url() ?>batik/produk/<?php echo $row->id_batik ?>"><img src="<?php echo base_url() ?>assets/images/Batik/<?php echo $row->gambar ?>" alt=""></a>
              </div>
              <div class="down-content">
                <a href="<?php echo base_url() ?>batik/produk/<?php echo $row->id_batik ?>"><h4><?php echo $row->nama_batik ?></h4></a>
                <h6>Rp <?php echo number_format($row->harga, 0, ',', '.') ?></h6>
                <p class="text-break">
                  <?php
                    if (strlen($row->deskripsi) > 80) {
                      echo ucfirst(substr($row->deskripsi, 0, 80)."...");
                    } else {
                      echo ucfirst($row->deskripsi);
                    }
                  ?>
                </p>
                <ul class="stars">
                  <?php
                    $rating = $ratings[$row -> id_batik];
                    $dua = floor($rating / 2);
                    $satu = $rating % 2;
                    $nol = floor((10 - $rating) / 2);

                    for ($i=0; $i < $dua; $i++) {
                      echo '<li><i class="fa fa-star"></i></li>';
                    }
                    for ($i=0; $i < $satu; $i++) {
                      echo '<li><i class="fa fa-star-half-o"></i></li>';
                    }
                    for ($i=0; $i < $nol; $i++) {
                      echo '<li><i class="fa fa-star-o"></i></li>';
                    }
                  ?>
                </ul>
                <span>Terjual <?php echo $penjualan[$row->id_batik]->jumlah; ?></span>
              </div>
            </div>
          </div>

          <?php } ?>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Tentang Batik Jetis</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Kenapa Dinamakan Kampung Batik Jetis?</h4>
              <p>
                Dinamakan kampoeng batik tulis, karena sebagian besar warga Kelurahan Jetis Kecamatan Sidoarjo ini adalah pembatik. Mereka juga menjual langsung karya karyanya di rumah masing masing. Karena itu, kawasan ini dikukuhkan sebagai Kampoeng Batik Tulis Jetis, Sidoarjo.
              
                Batik pertama kali hadir di Kampung Jetis pada tahun 1675. Pelopor seni batik ini merupakan seorang pendakwah agama islam bernama Mbah Mulyadi yang datang dari suatu kerajaan yang ...
              </p>
              <a href="<?php echo base_url() ?>about" class="filled-button">Lanjut Baca</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
