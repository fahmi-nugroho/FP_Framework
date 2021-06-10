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
              $no = 1; 
              if ($banyak > 0) : 
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No.</th>
                  <th scope="col" class="text-center">ID Order</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Nama Pembeli</th>
                  <th scope="col" class="text-center">Alamat</th>
                  <th scope="col" class="text-center">Total Harga</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" colspan="3" class="text-center">Aksi</th>
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
                  <th scope="row" class="text-center"><?= $no++ ?></th>
                  <td class="text-center"><?= $trs->id_order ?></td>
                  <td class="text-center"><?= $trs->tanggal ?></td>
                  <td class="text-center"><?= $trs->nama ?></td>
                  <td class="text-center"><?= $trs->alamat ?></td>
                  <td class="text-center"><?= $trs->total ?></td>
                  <td class="text-center"><?= $trs->status ?></td>
                  <td class="text-center">
                    <button type="button" class="btn btn-primary">Detail</button>
                  </td>
                  <?php if ($trs->status != 'Menunggu Pengiriman') : ?>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning" disabled data-bs-toggle="button">Kirim</button>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-danger" disabled data-bs-toggle="button">Batal</button>
                  </td>
                  <?php else : ?>
                    <td class="text-center" onclick="javascript: return confirm('Anda yakin kirim?')">
                    <?= anchor('OnlineShopAdmin/update_transaksi/'.$trs->id_transaksi.'/kirim', '<button type="button" class="btn btn-warning">Kirim</button>') ?>
                  </td>
                  <td class="text-center" onclick="javascript: return confirm('Anda yakin batal?')">
                    <?= anchor('OnlineShopAdmin/update_transaksi/'.$trs->id_transaksi.'/batal', '<button type="button" class="btn btn-danger">Batal</button>') ?>
                  </td>
                  <?php endif; ?>
                </tr>
              </tbody>
              <?php endforeach; ?>
            </table>
          </div>
          <?php else : ?>
          <div class="col-md-12 text-center">
            <h1>Transaksi Kosong</h1>
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