    <!-- Page Content -->
    <div class="page-heading bacablog-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Blog</h4>
              <h2>Mari Gemar Membaca</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <?php foreach ($artikel as $art) : ?>
            <div class="col-md-12">
              <div class="section-heading bacablog">
                <h1><?= $art->judul_artikel ?></h1>
              </div>
            </div>
            <div class="col-md-9">
              <div id="section" class="box">
                <div id="content">
                  <ul class="articles box">
                    <li>
                      <p><img src="<?php echo base_url() ?>assets/images/uploaded_image/<?= $art->gambar_artikel ?>" alt="" class="f-left" />
                        <?= $art->isi_artikel ?>
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php 
            endforeach; 
            $banyak = count($artikel_lain);
            if ($banyak > 0) :
          ?>
          <div class="col-md-3">
            <div class="aside">
              <div class="section-heading">
                <h2>Artikel Lain</h2>
              </div>
              <?php 
                foreach ($artikel_lain as $art2) : 
                $isi      = $art2->isi_artikel;
                $ar_isi   = explode(' ', $isi);
                $banyak   = count($ar_isi);
                if ($banyak > 20) {
                    $isi      = $ar_isi[0];
                    for ($x = 1; $x < 20; $x++) {
                    $isi = $isi . ' ' . $ar_isi[$x];
                    }
                    $isi = $isi . ' ...';
                }
              ?>
                <div class="sidenews">
                  <h6><?= $art2->judul_artikel ?></h6>
                <p class="box"> <img src="<?php echo base_url() ?>assets/images/uploaded_image/<?= $art2->gambar_artikel ?>" alt="" class="f-left art" /> <?= $isi ?><br />
                  <a href="<?= base_url().'blog/baca/'.$art2->id_artikel ?>">Read More...</a> 
                </p>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
