<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Data Barang</title>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>
    <table id="dataTable3" class="table display">
        <thead>
            <tr>
            <th scope="col" class="text-center">No.</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Harga</th>
            <th scope="col" class="text-center">Ukuran</th>
            <th scope="col" class="text-center">Stok</th>
            <th scope="col" class="text-center">Deskripsi</th>
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#dataTable3').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
</body>
</html>
