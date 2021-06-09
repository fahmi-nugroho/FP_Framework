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
              <h2>Ubah Artikel</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php echo form_open_multipart(base_url().'adminartikel/edit/'.$artikel[0]->id_artikel); ?>
              <?php foreach($artikel as $art): ?>
                <div class="row">
                  <input name="input" type="hidden" class="form-control" id="input" placeholder="Input" required="" value="Ubah">
                  <input name="id" type="hidden" class="form-control" id="id" placeholder="ID Artikel" required="" value="<?= $art->id_artikel ?>">
                  <input name="gambarlama" type="hidden" class="form-control" id="gambarlama" placeholder="Gambarlama Artikel" required="" value="<?= $art->gambar_artikel ?>">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('judul', '<small class="text-danger pl-3">', '</small>') ?>
                  <fieldset>
                      <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Artikel" required="" value="<?= $art->judul_artikel ?>">
                  </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                  <?= form_error('isi', '<small class="text-danger pl-3">', '</small>') ?>
                    <fieldset>
                      <textarea name="isi" rows="6" class="form-control" id="isi" placeholder="Isi Artikel" required=""><?= $art->isi_artikel ?></textarea>
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