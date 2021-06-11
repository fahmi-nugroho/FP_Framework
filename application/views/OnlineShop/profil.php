<div class="container pt-4" style="margin-top: 80px">
  <div class="card border-0">
    <div class="card-body pt-4">

      <div class="row">
        <div class="col-lg-4 text-center pe-lg-3 align-self-center">
          <?php echo form_open_multipart(base_url().'profil'); ?>
          <div class="rounded-circle d-flex justify-content-center mx-auto border border-secondary" style="height: 200px; width: 200px; overflow: hidden;">
            <?php if (empty($user['foto'])): ?>
              <img src="<?php echo base_url() ?>/assets/images/account.png" alt="...">
            <?php else: ?>
              <img src="<?php echo base_url() ?>/assets/images/uploaded_image/<?= $user['foto'] ?>" alt="...">
            <?php endif; ?>
          </div>
          <div class="input-group mt-4 mb-3">
            <input type="file" name="foto" class="form-control mx-auto" id="gambarUploadProfil" aria-describedby="uploadProfil" aria-label="Upload" accept=".jpeg, .jpg, .png" required>
            <button class="btn btn-primary" type="submit" id="uploadProfil" name="submit" value="upload">Upload</button>
          </div>
          <?php if (isset($error[0])) echo $error[0]; ?>
          <?php echo form_close(); ?>
        </div>

        <div class="col-lg-8 ps-lg-3">
          <?php echo form_open_multipart(base_url().'profil'); ?>
          <label for="namaUser" class="form-label fs-4">Edit Profil</label>
          <div class="input-group">
            <span class="input-group-text border-0 justify-content-center" id="inputGroup-sizing-default" style="width: 90px">Nama</span>
            <input type="text" class="form-control" name="nama" id="namaUser" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $user['nama_user'] ?>">
          </div>
          <?= form_error('nama', '<span class="badge bg-danger" style="margin-left: 90px">', '</span>') ?>
          <div class="input-group mt-3">
            <span class="input-group-text border-0 justify-content-center" id="inputGroup-sizing-default" style="width: 90px">Email</span>
            <input type="email" class="form-control" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $user['email'] ?>">
          </div>
          <?= form_error('email', '<span class="badge bg-danger" style="margin-left: 90px">', '</span>') ?>
          <div class="input-group mt-3">
            <span class="input-group-text border-0 justify-content-center" id="inputGroup-sizing-default" style="width: 90px">Telepon</span>
            <input type="text" class="form-control" name="telepon" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $user['telepon'] ?>">
          </div>
          <?= form_error('telepon', '<span class="badge bg-danger" style="margin-left: 90px">', '</span>') ?>
          <div class="input-group mt-3">
            <span class="input-group-text border-0 justify-content-center" style="width: 90px">Alamat</span>
            <textarea class="form-control" name="alamat" aria-label="With textarea"><?php echo $user['alamat'] ?></textarea>
          </div>
          <?= form_error('alamat', '<span class="badge bg-danger" style="margin-left: 90px">', '</span>') ?>
        </div>
      </div>
      <div class="text-end">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ubahPassword">Ubah Password</button>
        <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="ubahPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <?php echo form_open_multipart(base_url().'profil'); ?>
        <div class="modal-header">
          <h5 class="modal-title" id="ubahPasswordLabel">Ubah Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="passLama" class="form-label">Password Lama</label>
            <input type="password" class="form-control" id="passLama" name="passLama">
            <?= form_error('passLama', '<span class="badge bg-danger">', '</span>') ?>
          </div>
          <div class="mb-3">
            <label for="passBaru" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="passBaru" name="passBaru">
            <?= form_error('passBaru', '<span class="badge bg-danger">', '</span>') ?>
          </div>
          <div class="mb-3">
            <label for="passBaruKonfirmasi" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="passBaruKonfirmasi" name="passBaruKonfirmasi">
            <?= form_error('passBaruKonfirmasi', '<span class="badge bg-danger">', '</span>') ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success" name="submit" value="simpanPass">Simpan</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <div class="card border-0 mt-4">
    <div class="card-header bg-transparent border-0 fw-bold">
      <h5>List Pembelian</h5>
    </div>
    <div class="card-body border border-primary rounded p-2">
      <div class="table-responsive">
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <th scope="col">Nomer Order</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Alamat</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pembelian as $beli): ?>
              <?php
              if ($beli->status == "Menunggu Pengiriman" || $beli->status == "Menunggu Pembayaran") {
                  echo "<tr class='table-primary'>";
              } elseif ($beli->status == "Proses Pengiriman" || $beli->status == "Silahkan Ambil Pesanan") {
                  echo "<tr class='table-warning'>";
              } elseif ($beli->status == "Pesanan Selesai") {
                  echo "<tr class='table-success'>";
              } elseif ($beli->status == "Pesanan Dibatalkan") {
                  echo "<tr class='table-danger'>";
              } else {
                  echo "<tr>";
              }
              ?>
                <td><?php echo $beli->id_order ?></td>
                <td><?php echo $beli->tanggal ?></td>
                <td>
                  <?php
                    if (strlen($beli->alamat) > 40) {
                      echo substr($beli->alamat, 0, 37)."...";
                    } else {
                      echo $beli->alamat;
                    }
                  ?>
                </td>
                <td>Rp <?php echo number_format($beli->total, 0, ',', '.') ?></td>
                <td><?php echo $beli->status ?></td>
                <td>
                  <!--
                  Menunggu Pembayaran
                  Menunggu Pengiriman / Silahkan Ambil Pesanan
                  Proses Pengiriman
                  Pesanan Selesai
                  Pesanan Dibatalkan
                  -->
                  <button type="button" class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#detail-<?= $beli->id_order ?>">Detail</button>
                  <?php if ($beli->status == "Menunggu Pembayaran"): ?>
                    <button type="button" name="button" class="btn btn-sm btn-warning px-3" data-bs-toggle="modal" data-bs-target="#bayar-<?= $beli->id_order ?>">Bayar</button>
                    <button type="button" name="button" class="btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#batal-<?= $beli->id_order ?>">Batal</button>
                  <?php elseif ($beli->status == "Proses Pengiriman" || $beli->status == "Silahkan Ambil Pesanan") : ?>
                    <button type="button" name="button" class="btn btn-sm btn-success px-3" data-bs-toggle="modal" data-bs-target="#selesai-<?= $beli->id_order ?>">Selesai</button>
                  <?php endif; ?>
                </td>

                <!-- Modal -->
                <div class="modal fade" id="detail-<?= $beli->id_order ?>" tabindex="-1" aria-labelledby="detail-<?= $beli->id_order ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="detail-<?= $beli->id_order ?>Label">Detail Pembelian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body pt-2">

                        <div class="card border-0 border-bottom border-primary rounded-0 pb-1">
                          <div class="card-body p-0">

                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <div class="row">
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    ID Order
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $beli->id_order ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Status
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $beli->status ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Tanggal
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?= date("j M Y\, H:i", $beli->id_order) ?>
                                  </div>
                                </div>
                              </li>
                            </ul>

                          </div>
                          <div class="card-footer bg-transparent border-0 pt-1 pb-0">
                            <?php if (!empty($beli->bukti)): ?>
                              <button class="btn btn-info mb-2 btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Bukti Pembayaran
                              </button>
                              <div class="collapse pb-1" id="collapseExample">
                                <div class="card card-body">
                                  <img src="<?php echo base_url() ?>assets/images/bukti_pembayaran/<?php echo $beli->bukti ?>" class="img-fluid mx-auto" alt="..." style="width: 300px">
                                </div>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>

                        <div class="card border-0 border-bottom border-primary rounded-0 mt-3">
                          <div class="card-header bg-transparent border-0 fw-bold py-0">
                            <h5>Barang</h5>
                          </div>
                          <div class="card-body p-0">

                            <ul class="list-group list-group-flush px-3">
                              <?php foreach ($detail[$beli->id_order] as $batik): ?>
                                <li class="list-group-item border-0 p-0">
                                  <div class="d-flex align-items-center py-3">
                                    <div class="flex-shrink-0">
                                      <div class="d-flex align-items-center justify-content-center" style="width: 50px !important; height: 50px !important; overflow: hidden !important;">
                                        <a href="<?php echo base_url() ?>batik/produk/<?php echo $batik->id_batik ?>"><img class="img-fluid" src="<?php echo base_url() ?>assets/images/Batik/<?php echo $batik->gambar ?>" alt="..."></a>
                                      </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                      <div class="row pb-2">
                                        <a class="text-decoration-none text-dark col" href="<?php echo base_url() ?>batik/produk/<?php echo $batik->id_batik ?>"><?php echo $batik->nama_batik ?></a>
                                      </div>
                                      <div class="row">
                                        <div class="col text-muted">
                                          <?php echo $batik->jumlah ?> barang<span class="text-primary"> @ Rp <?php echo number_format($batik->harga, 0, ',', '.') ?></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="flex-shrink-0 me-3">
                                      <?php if (isset($rating[$batik->id_order][$batik->id_batik]) && $beli->status == "Pesanan Selesai"): ?>
                                        <!-- <button type="button" class="btn btn-info btn-sm px-4" name="button">Rating</button> -->
                                        <button class="btn btn-info btn-sm px-4" type="button" data-bs-toggle="collapse" data-bs-target="#rating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>" aria-expanded="false" aria-controls="rating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>">
                                          Rating
                                        </button>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </li>
                                <div class="collapse pb-3" id="rating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>">
                                  <div class="card card-body">
                                    <?php echo form_open_multipart(base_url().'profil'); ?>
                                    <label id="labelInputRating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>" for="inputRating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>" class="form-label text-center">
                                      <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                    </label>
                                    <input type="range" name="rating" class="form-range" min="0" max="10" step="1" id="inputRating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>" value="0">
                                    <input type="hidden" name="order" value="<?= $batik->id_order ?>">
                                    <input type="hidden" name="batik" value="<?= $batik->id_batik ?>">
                                    <button type="submit" class="btn btn-primary ms-auto mt-2 px-3 btn-sm" name="submit" value="submitRating">Simpan</button>
                                    <?php echo form_close(); ?>

                                    <script type="text/javascript">
                                      $("#inputRating-<?= $batik->id_order ?>-<?= $batik->id_batik ?>").on('change', function () {
                                        let text = "";
                                        let rating = $(this).val();
                                        let dua = Math.floor(rating / 2);
                                        let satu = rating % 2;
                                        let nol = Math.floor((10 - rating) / 2);

                                        for (let i = 0; i < dua; i++) {
                                          text += '<i class="fa fa-star"></i>';
                                        }
                                        for (let i = 0; i < satu; i++) {
                                          text += '<i class="fa fa-star-half-o"></i>';
                                        }
                                        for (let i = 0; i < nol; i++) {
                                          text += '<i class="fa fa-star-o"></i>';
                                        }

                                        $(this).prev().html(text);
                                      })
                                    </script>
                                  </div>
                                </div>
                              <?php endforeach; ?>
                            </ul>

                          </div>
                        </div>

                        <div class="card border-0 mt-3">
                          <div class="card-header bg-transparent border-0 fw-bold py-0">
                            <h5>Pengiriman</h5>
                          </div>
                          <div class="card-body px-0">

                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <div class="row">
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Kurir
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $beli->kurir ?>
                                  </div>
                                  <?php if ($beli->kurir != "Ambil ditempat"): ?>
                                    <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                      Resi
                                    </div>
                                    <div class="col-10 pb-2">
                                      <?php if (empty($beli->resi)): ?>
                                        -
                                      <?php else: ?>
                                        <?php echo $beli->resi ?>
                                      <?php endif; ?>
                                    </div>
                                  <?php endif; ?>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Alamat
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $beli->alamat ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Telepon
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $beli->notelp ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Total Harga
                                  </div>
                                  <div class="col-10 pb-2">
                                    Rp <?php echo number_format($beli->total, 0, ',', '.') ?>
                                  </div>
                                </div>
                              </li>
                            </ul>

                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary px-4 btn-sm" data-bs-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="bayar-<?= $beli->id_order ?>" tabindex="-1" aria-labelledby="bayar-<?= $beli->id_order ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="bayar-<?= $beli->id_order ?>Label">Bayar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?php echo form_open_multipart(base_url().'profil'); ?>
                        <div class="modal-body">
                          <div class="input-group mt-4 mb-3">
                            <input type="hidden" name="idOrder" value="<?= $beli->id_order ?>">
                            <input type="hidden" name="kurir" value="<?= $beli->kurir ?>">
                            <input type="file" name="gambar" class="form-control mx-auto" aria-describedby="uploadBayar-<?= $beli->id_order ?>" aria-label="Upload" accept=".jpeg, .jpg, .png" required>
                            <button class="btn btn-primary" type="submit" id="uploadBayar-<?= $beli->id_order ?>" name="submit" value="uploadBayar">Upload</button>
                          </div>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="selesai-<?= $beli->id_order ?>" tabindex="-1" aria-labelledby="selesai-<?= $beli->id_order ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="selesai-<?= $beli->id_order ?>Label">Selesai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?php echo form_open_multipart(base_url().'profil'); ?>
                        <div class="modal-body">
                          <strong>Apakah anda yakin ?</strong>
                          <br><br>
                          Pastikan pesanan <span class="text-success">#<?php echo $beli->id_order ?></span> sudah anda terima dengan baik.
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="idOrder" value="<?= $beli->id_order ?>">
                          <button type="button" class="btn btn-secondary px-4 btn-sm" data-bs-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary px-4 btn-sm" name="submit" value="selesai">Selesai</button>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="batal-<?= $beli->id_order ?>" tabindex="-1" aria-labelledby="batal-<?= $beli->id_order ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="batal-<?= $beli->id_order ?>Label">Batalkan Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?php echo form_open_multipart(base_url().'profil'); ?>
                        <div class="modal-body">
                          <strong>Apakah anda yakin ingin membatalkan <span class="text-danger">#<?php echo $beli->id_order ?></span> ?</strong>
                          <br><br>
                          Pesanan yang sudah dibatalkan tidak bisa diurung kan!
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="idOrder" value="<?= $beli->id_order ?>">
                          <button type="button" class="btn btn-secondary px-4 btn-sm" data-bs-dismiss="modal">Tidak</button>
                          <button type="submit" class="btn btn-primary px-4 btn-sm" name="submit" value="batal">Ya</button>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
