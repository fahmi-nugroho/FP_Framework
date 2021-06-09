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
              <h2>Daftarkan Jasa Pengiriman Baru</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php echo form_open_multipart(base_url().'adminpengiriman'); ?>
              <div class="row">
                <input name="input" type="hidden" class="form-control" id="input" placeholder="Input" required="" value="Tambah">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Kurir" required="" value="<?= set_value('nama') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('harga', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga Kurir" required="" value="<?= set_value('harga') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Tambah</button>
                  </fieldset>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Daftar Pengiriman</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php 
              $banyak = count($pengiriman);
              $no = 1; 
              if ($banyak > 0) : 
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No.</th>
                  <th scope="col" class="text-center">Nama Kurir</th>
                  <th scope="col" class="text-center">Harga Kurir</th>
                  <th scope="col" colspan="1" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($pengiriman as $pmn) : ?>
                  <th scope="row" class="text-center"><?= $no++ ?></th>
                  <td class="text-center"><?= $pmn->nama_kurir ?></td>
                  <td class="text-center"><?= $pmn->harga_kurir ?></td>
                  <td class="text-center">
                    <?= anchor('adminpengiriman/edit/'.$pmn->id_kurir, '<button type="button" class="btn btn-warning">Edit</button>') ?>
                    <span onclick="javascript: return confirm('Anda yakin hapus?')">
                        <?= anchor('OnlineShopAdmin/hapus_kurir/'.$pmn->id_kurir, '<button type="button" class="btn btn-danger">Hapus</button>') ?>
                    </span>
                  </td>
                </tr>
              </tbody>
              <?php endforeach; ?>
            </table>
          </div>
          <?php else : ?>
          <div class="col-md-12 text-center">
            <h1>Pengiriman Kosong</h1>
          </div>
          <?php  
            endif;
            ?> 
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