<div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Halaman Admin</h4>
              <h2>Selamat Datang Admin</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-insert about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Ubah Produk</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php echo form_open_multipart(base_url().'OnlineShopAdmin/ubah_produk'); ?>
              <?php foreach($produk as $prd): ?>
                <div class="row">
                    <input name="id" type="hidden" class="form-control" id="id" placeholder="ID Produk" required="" value="<?= $prd->id_batik ?>">
                    <input name="gambarlama" type="hidden" class="form-control" id="gambarlama" placeholder="Gambarlama Produk" required="" value="<?= $prd->gambar ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Batik" required="" value="<?= $prd->nama_batik ?>">
                    </fieldset>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga Batik" required="" value="<?= $prd->harga ?>">
                      </fieldset>
                    </div>
                    <?php  
                      $ukuran     = $prd->ukuran;
                      $ar_ukuran  = explode(' ', $ukuran);
                      $panjang    = $ar_ukuran[0];
                      $lebar      = $ar_ukuran[2];
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <fieldset>
                        <input name="panjang" type="text" class="form-control" id="panjang" placeholder="Panjang Batik" required="" value="<?= $panjang ?>">
                      </fieldset>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <fieldset>
                        <input name="lebar" type="text" class="form-control" id="lebar" placeholder="Lebar Batik" required="" value="<?= $lebar ?>">
                      </fieldset>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <input name="stok" type="text" class="form-control" id="stok" placeholder="Stok Batik" required="" value="<?= $prd->stok ?>">
                    </fieldset>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <textarea name="deskripsi" rows="6" class="form-control" id="deskripsi" placeholder="Deskripsi Batik" required=""><?= $prd->deskripsi ?></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <input name="gambar" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" id="form-submit" class="filled-button">Ubah</button>
                    </fieldset>
                    </div>
                </div>
              <?php endforeach; ?>
            <?php echo form_close(); ?>
          </div>
          <!-- <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </div>