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
              <h2>Buat Artikel Baru</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php echo form_open_multipart(base_url().'adminartikel'); ?>
              <div class="row">
                <input name="input" type="hidden" class="form-control" id="input" placeholder="Input" required="" value="Tambah">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('judul', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Artikel" required="" value="<?= set_value('judul') ?>">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('isi', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                    <textarea name="isi" rows="6" class="form-control" id="isi" placeholder="Isi Artikel" required=""><?= set_value('isi') ?></textarea>
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
          </div>
        </div>
      </div>
    </div>

    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Daftar Artikel</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php
              $banyak = count($artikel);
              $no = 1;
              if ($banyak > 0) :
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No.</th>
                  <th scope="col" class="text-center">Judul</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Isi</th>
                  <th scope="col" colspan="2" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($artikel as $art) :  ?>
                <tr>
                  <th scope="row" class="text-center"><?= $no++ ?></th>
                  <td class="text-center"><?= $art->judul_artikel ?></td>
                  <td class="text-center"><?= $art->tanggal_artikel ?></td>
                  <?php
                    $isi      = $art->isi_artikel;
                    $ar_isi   = explode(' ', $isi);
                    $banyak   = count($ar_isi);
                    if ($banyak > 10) {
                      $isi      = $ar_isi[0];
                      for ($x = 1; $x < 10; $x++) {
                        $isi = $isi . ' ' . $ar_isi[$x];
                      }
                      $isi = $isi . ' ...';
                    }
                  ?>
                  <td class="text-center"><?= $isi  ?></td>
                  <td class="text-center">
                    <?= anchor('adminartikel/edit/'.$art->id_artikel, '<button type="button" class="btn btn-warning">Edit</button>') ?>
                  </td>
                  <td class="text-center" onclick="javascript: return confirm('Anda yakin hapus?')">
                    <?= anchor('OnlineShopAdmin/hapus_artikel/'.$art->id_artikel.'/'.$art->gambar_artikel, '<button type="button" class="btn btn-danger">Hapus</button>') ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php else : ?>
          <div class="col-md-12 text-center">
            <h1>Artikel Kosong</h1>
          </div>
          <?php endif; ?>
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
