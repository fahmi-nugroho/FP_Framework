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
            <?php echo form_open_multipart('OnlineShopAdmin/tambah_produk'); ?>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Batik" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga Batik" required="">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <fieldset>
                    <input name="panjang" type="text" class="form-control" id="panjang" placeholder="Panjang Batik" required="">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <fieldset>
                    <input name="lebar" type="text" class="form-control" id="lebar" placeholder="Lebar Batik" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="stok" type="text" class="form-control" id="stok" placeholder="Stok Batik" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <textarea name="deskripsi" rows="6" class="form-control" id="deskripsi" placeholder="Deskripsi Batik" required=""></textarea>
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
              <?php
                $no = 1; 
                foreach ($produk as $prd) : 
              ?>
              <tr>
                <th scope="row" class="text-center"><?= $no++ ?></th>
                <td class="text-center"><?= $prd->nama_batik ?></td>
                <td class="text-center"><?= $prd->harga ?></td>
                <td class="text-center"><?= $prd->ukuran ?></td>
                <td class="text-center"><?= $prd->stok ?></td>
                <td class="text-center"><?= $prd->deskripsi ?></td>
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
          <!-- <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_01.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Produk 1</h4>
                <span>CO-Founder</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_02.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Produk 2</h4>
                <span>Product Expert</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_03.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Produk 3</h4>
                <span>Chief Marketing</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_04.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Produk 4</h4>
                <span>Product Specialist</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_05.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Produk 5</h4>
                <span>Product Photographer</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_06.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Produk 6</h4>
                <span>General Manager</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div> -->
          <div class="col-md-12">
            <ul class="pages">
                <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>