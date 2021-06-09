    <!-- Page Content -->
    <div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Daftar</h4>
              <div class="contact-form">
              <form id="contact" action="<?php echo base_url() ?>register" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control mb-0" id="email" placeholder="Alamat Email" required>
                      <?= form_error('email', '<span class="badge bg-danger fs-6 fw-normal">', '</span>') ?>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 30px">
                    <fieldset>
                      <input name="password" type="password" class="form-control mb-0" id="password" placeholder="Password" required>
                      <?= form_error('password', '<span class="badge bg-danger fs-6 fw-normal">', '</span>') ?>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 30px">
                    <fieldset>
                      <input name="confirmpassword" type="password" class="form-control mb-0" id="confirmpassword" placeholder="Confirm Password" required>
                      <?= form_error('confirmpassword', '<span class="badge bg-danger fs-6 fw-normal">', '</span>') ?>
                    </fieldset>
                  </div>
                  <div class="col-lg-12" style="margin-top: 30px">
                    <fieldset>
                      <a type="submit" id="form-submit" class="filled-button" href="<?php echo base_url() ?>login">Masuk</a>
                      <button type="submit" name="daftar" value="daftar" id="form-submit" class="filled-button">Daftar</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Background</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis.</p>
              <a href="<?php echo base_url() ?>about" class="filled-button mt-0">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
