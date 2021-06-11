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
            <button class="btn btn-outline-secondary" type="submit" id="uploadProfil" name="submit" value="upload">Upload</button>
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
              <th scope="col">Kurir</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pembelian as $beli): ?>
              <tr>
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
                <td>Rp <?php echo number_format($beli->total, 0, ',', '.') ?>
                <td><?php echo $beli->status ?></td>
                <td>
                  <!--
                  Menunggu Pembayaran
                  Menunggu Pengiriman / Silahkan Ambil Pesanan
                  Proses Pengiriman
                  Pesanan Selesai
                  Pesanan Dibatalkan
                  -->
                  <button type="button" name="button" class="btn btn-sm btn-primary px-3">Detail</button>
                  <?php if ($beli->status == "Menunggu Pembayaran"): ?>
                    <button type="button" name="button" class="btn btn-sm btn-warning px-3">Bayar</button>
                    <button type="button" name="button" class="btn btn-sm btn-danger px-3">Batal</button>
                  <?php elseif ($beli->status == "Proses Pengiriman" || $beli->status == "Silahkan Ambil Pesanan") : ?>
                    <button type="button" name="button" class="btn btn-sm btn-warning px-3">Selesai</button>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer bg-transparent border-0 text-end px-0">
    </div>
  </div>
</div>
