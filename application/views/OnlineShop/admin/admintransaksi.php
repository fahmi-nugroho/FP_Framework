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

    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Daftar Transaksi</h2>
            </div>
          </div>
          <div class="col-md-12">
            <?php
              $banyak = count($transaksi);
              if ($banyak > 0) :
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center ps-4">ID Order</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Pembeli</th>
                  <th scope="col" class="text-center">Alamat</th>
                  <th scope="col" class="text-center">Total Harga</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" colspan="2" class="text-center pe-4">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($transaksi as $trs) :
                    if ($trs->status == "Menunggu Pengiriman") {
                        echo "<tr class='table-primary'>";
                    } elseif ($trs->status == "Proses Pengiriman") {
                        echo "<tr class='table-warning'>";
                    } elseif ($trs->status == "Pesanan Selesai") {
                        echo "<tr class='table-success'>";
                    } elseif ($trs->status == "Pesanan Dibatalkan") {
                        echo "<tr class='table-danger'>";
                    } else {
                        echo "<tr>";
                    }
                ?>
                  <td class="text-center ps-4"><?= $trs->id_order ?></td>
                  <td class="text-center"><?= $trs->tanggal ?></td>
                  <td class="text-center"><?= $trs->nama ?></td>
                  <td class="text-center">
                    <?php
                      if (strlen($trs->alamat) > 40) {
                        echo substr($trs->alamat, 0, 37)."...";
                      } else {
                        echo $trs->alamat;
                      }
                    ?>
                  </td>
                  <td class="text-center">Rp <?php echo number_format($trs->total, 0, ',', '.') ?></td>
                  <td class="text-center"><?= $trs->status ?></td>
                  <!--
                  Menunggu Pembayaran
                  Menunggu Pengiriman / Silahkan Ambil Pesanan
                  Proses Pengiriman
                  Pesanan Selesai
                  Pesanan Dibatalkan
                  -->
                  <?php if ($trs->status == "Menunggu Pengiriman"): ?>
                    <td class="text-center"><button type="button" class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#detail-<?= $trs->id_order ?>">Detail</button></td>
                    <td class="text-center pe-4"><button type="button" name="button" class="btn btn-sm btn-warning px-3" data-bs-toggle="modal" data-bs-target="#kirim-<?= $trs->id_order ?>">Kirim</button></td>
                  <?php else: ?>
                    <td class="text-center pe-4" colspan="2"><button type="button" class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#detail-<?= $trs->id_order ?>">Detail</button></td>
                  <?php endif; ?>
                </tr>
                <div class="modal fade" id="detail-<?= $trs->id_order ?>" tabindex="-1" aria-labelledby="detail-<?= $trs->id_order ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="detail-<?= $trs->id_order ?>Label">Detail Pembelian</h5>
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
                                    <?php echo $trs->id_order ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Status
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $trs->status ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Tanggal
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?= date("j M Y\, H:i", $trs->id_order) ?>
                                  </div>
                                </div>
                              </li>
                            </ul>

                          </div>
                          <div class="card-footer bg-transparent border-0 pt-1 pb-0">
                            <?php if (!empty($trs->bukti)): ?>
                              <button class="btn btn-info mb-2 btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Bukti Pembayaran
                              </button>
                              <div class="collapse pb-1" id="collapseExample">
                                <div class="card card-body">
                                  <img src="<?php echo base_url() ?>assets/images/bukti_pembayaran/<?php echo $trs->bukti ?>" class="img-fluid mx-auto" alt="..." style="width: 300px">
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
                              <?php foreach ($detail[$trs->id_order] as $batik): ?>
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
                                  </div>
                                </li>
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
                                    <?php echo $trs->kurir ?>
                                  </div>
                                  <?php if ($trs->kurir != "Ambil ditempat"): ?>
                                    <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                      Resi
                                    </div>
                                    <div class="col-10 pb-2">
                                      <?php if (empty($trs->resi)): ?>
                                        -
                                      <?php else: ?>
                                        <?php echo $trs->resi ?>
                                      <?php endif; ?>
                                    </div>
                                  <?php endif; ?>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Alamat
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $trs->alamat ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Telepon
                                  </div>
                                  <div class="col-10 pb-2">
                                    <?php echo $trs->notelp ?>
                                  </div>
                                  <div class="col-2 pb-2" style="font-weight: 600 !important;">
                                    Total Harga
                                  </div>
                                  <div class="col-10 pb-2">
                                    Rp <?php echo number_format($trs->total, 0, ',', '.') ?>
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
                <div class="modal fade" id="kirim-<?= $trs->id_order ?>" tabindex="-1" aria-labelledby="kirim-<?= $trs->id_order ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="kirim-<?= $trs->id_order ?>Label">Pengiriman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?php echo form_open_multipart(base_url().'admintransaksi'); ?>
                        <div class="modal-body">
                          <div class="alert alert-info" role="alert">
                            <h5 class="alert-heading">Perhatian!</h5>
                            <hr>
                            Pastikan untuk <strong>mengecek bukti pembayaran</strong> sebelum melakukan pengiriman.
                            <br>
                            <br>
                            Bukti pembayaran bisa dilihat pada <strong>bagian detail</strong>.
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Resi</label>
                            <input type="text" name="resi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor Resi">
                            <?= form_error('resi', '<span class="badge bg-danger">', '</span>') ?>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="idOrder" value="<?= $trs->id_order ?>">
                          <button type="button" class="btn btn-secondary px-4 btn-sm" data-bs-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary px-4 btn-sm" name="submit" value="kirimResi">Simpan</button>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php else : ?>
          <div class="col-md-12 text-center">
            <h1>Transaksi Kosong</h1>
          </div>
          <?php
            endif;
            ?>
          <div>
            <a class="btn btn-success mb-2" href="<?= base_url('OnlineShopAdmin/export/transaksi') ?>" role="button">Export Data</a>
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
