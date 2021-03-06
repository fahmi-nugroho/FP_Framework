    <!-- Page Content -->
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
              <h2>Masukkan Produk Baru</h2>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <form id="contact" action="" method="post"> -->
            <?php echo form_open_multipart('adminproduk'); ?>
              <div class="row">
                <input name="input" type="hidden" class="form-control" id="input" placeholder="Input" required="" value="Tambah">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Batik" required="" value="<?= set_value('nama') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('harga', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga Batik" required="" value="<?= set_value('harga') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <?= form_error('panjang', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="panjang" type="text" class="form-control" id="panjang" placeholder="Panjang Batik" required="" value="<?= set_value('panjang') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <?= form_error('lebar', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="lebar" type="text" class="form-control" id="lebar" placeholder="Lebar Batik" required="" value="<?= set_value('lebar') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('stok', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="stok" type="text" class="form-control" id="stok" placeholder="Stok Batik" required="" value="<?= set_value('stok') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>') ?>
                    <fieldset>
                      <textarea name="deskripsi" rows="6" class="form-control" id="deskripsi" placeholder="Deskripsi Batik" required=""><?= set_value('panjang') ?></textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <input name="gambar" class="form-control" type="file" id="formFile" required="">
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Tambah</button>
                  </fieldset>
                </div>
              </div>
            <?php echo form_close(); ?>
            <!-- </form> -->
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

    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Daftar Produk</h2>
            </div>
          </div>
          <table class="table">
            <?php
              $banyak = count($produk);
              $no = 1;
              if ($banyak > 0) :  
            ?>
            <thead>
              <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Harga</th>
                <th scope="col" class="text-center">Ukuran</th>
                <th scope="col" class="text-center">Stok</th>
                <th scope="col" class="text-center">Deskripsi</th>
                <th scope="col" colspan="2" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk as $prd) :  ?>
              <tr>
                <th scope="row" class="text-center"><?= $no++ ?></th>
                <td class="text-center"><?= $prd->nama_batik ?></td>
                <td class="text-center"><?= $prd->harga ?></td>
                <td class="text-center"><?= $prd->ukuran ?></td>
                <td class="text-center"><?= $prd->stok ?></td>
                <?php
                  $deskripsi      = $prd->deskripsi;
                  $ar_deskripsi   = explode(' ', $deskripsi);
                  $banyak   = count($ar_deskripsi);
                  if ($banyak > 10) {
                    $deskripsi      = $ar_deskripsi[0];
                    for ($x = 1; $x < 10; $x++) {
                      $deskripsi = $deskripsi . ' ' . $ar_deskripsi[$x];
                    }
                    $deskripsi = $deskripsi . ' ...';
                  }
                ?>
                <td class="text-center"><?= $deskripsi ?></td>
                <td class="text-center">
                  <?= anchor('adminproduk/edit/'.$prd->id_batik, '<button type="button" class="btn btn-warning">Edit</button>') ?>
                </td>
                <td class="text-center" onclick="javascript: return confirm('Anda yakin hapus?')">
                  <?= anchor('OnlineShopAdmin/hapus_produk/'.$prd->id_batik.'/'.$prd->gambar, '<button type="button" class="btn btn-danger">Hapus</button>') ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php else : ?>
          <div class="col-md-12 text-center">
            <h1>Produk Kosong</h1>
          </div>
          <?php  
            endif;
          ?> 
          <div>
            <a class="btn btn-success mb-2" href="<?= base_url('OnlineShopAdmin/export/produk') ?>" role="button">Export Data</a>
          </div>
          <!-- <div class="col-md-12">
            <ul class="pages">
                <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>