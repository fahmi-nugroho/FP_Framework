    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">Semua Produk</li>
                  <!-- <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
                  <li data-filter=".dav">First Minute</li> -->
              </ul>
            </div>
          </div>

          <div class="col-md-12">
            <div class="filters-content">
              <div class="row grid">
                <?php foreach ($db as $row): ?>
                  <div class="col-lg-4 col-md-4 all">
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
                <?php endforeach; ?>

              </div>
            </div>
          </div>
          <div class="col-md-12">
            <?php echo $this -> pagination -> create_links(); ?>
          </div>
        </div>
      </div>
    </div>
