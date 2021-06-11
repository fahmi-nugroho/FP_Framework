<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShopAdmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_artikel');
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
		$this->load->model('m_kurir');
	}

	public function adminartikel()
	{
		$submit = $this->input->post('input');

		if ($submit == 'Tambah') {
			$this->form_validation->set_rules('judul', 'Judul', 'trim');
			$this->form_validation->set_rules('isi', 'Isi', 'trim');

			if ($this->form_validation->run() == true){
				$judul		= $this->input->post('judul');
				$isi		= $this->input->post('isi');
				$tanggal	= date('Y-m-d');
				$gambar		= $_FILES['gambar'];
				$ext		= $gambar['name'];
				$ext		= explode(".", $ext);
				$ext		= strtolower(end($ext));

				if ($gambar=""){

				} else {
					$config['upload_path']		= './assets/images/uploaded_image';
					$config['allowed_types']	= 'jpg|png|jpeg';
					$config['file_name']		= uniqid("", true).".".$ext;

					$this->upload->initialize($config);
					if (!$this->upload->do_upload('gambar')){
						echo "Upload Gagal";
						die();
					} else {
						$gambar = $this->upload->data('file_name');
					}
				}

				$data = array(
					'judul_artikel'			=> $judul,
					'isi_artikel'			=> $isi,
					'tanggal_artikel'		=> $tanggal,
					'gambar_artikel'		=> $gambar,
				);

				$this->m_artikel->input_data($data, 'artikel');
				redirect('adminartikel');
			}
		}

		$data['artikel'] = $this->m_artikel->tampil_artikel()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminartikel', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function hapus_artikel()
	{
		$id = $this->uri->segment(3);
		$gambar = $this->uri->segment(4);
		$where = array ('id_artikel' => $id);
		$this->m_artikel->hapus_data($where, 'artikel');
		unlink('./assets/images/uploaded_image/'.$gambar);
		redirect('adminartikel');
	}

	public function edit_artikel($id){
		$submit = $this->input->post('input');
		if ($submit == 'Ubah') {
			if ($this->form_validation->run() == true) {
				$this->form_validation->set_rules('judul', 'Judul', 'trim');
				$this->form_validation->set_rules('isi', 'Isi', 'trim');

				$id			= $this->input->post('id');
				$judul		= $this->input->post('judul');
				$isi		= $this->input->post('isi');
				$tanggal	= date('Y-m-d');
				$gambarlama	= $this->input->post('gambarlama');
				$gambar		= $_FILES['gambar'];
				$ext		= $gambar['name'];
				$ext		= explode(".", $ext);
				$ext		= strtolower(end($ext));

				if ($gambar=""){

				} else {
					$config['upload_path']		= './assets/images/uploaded_image';
					$config['allowed_types']	= 'jpg|png|jpeg';
					$config['file_name']		= uniqid("", true).".".$ext;

					$this->upload->initialize($config);
					if (!$this->upload->do_upload('gambar')){
						echo "Upload Gagal";
						die();
					} else {
						$gambar = $this->upload->data('file_name');
						if ($gambarlama != ""){
							unlink('./assets/images/uploaded_image/'.$gambarlama);
						}
					}
				}

				$data = array(
					'judul_artikel'			=> $judul,
					'isi_artikel'			=> $isi,
					'tanggal_artikel'		=> $tanggal,
					'gambar_artikel'		=> $gambar,
				);

				$where = array(
					'id_artikel'			=> $id,
				);
				$this->m_artikel->edit_artikel($where, $data, 'artikel');
				redirect('adminartikel');
			}
		}

		$where = array('id_artikel' => $id);
		$data['artikel'] = $this->m_artikel->edit_data($where, 'artikel')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editartikel', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function adminproduk()
	{
		$submit = $this->input->post('input');
		if ($submit == 'Tambah') {
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('harga', 'Harga', 'integer');
			$this->form_validation->set_rules('panjang', 'Panjang', 'integer');
			$this->form_validation->set_rules('lebar', 'Lebar', 'integer');
			$this->form_validation->set_rules('stok', 'Stok', 'integer');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');

			$this -> form_validation -> set_message('integer', '{field} harus berupa angka.');

			if ($this->form_validation->run() == true){
				$nama		= $this->input->post('nama');
				$harga		= $this->input->post('harga');
				$panjang	= $this->input->post('panjang');
				$lebar		= $this->input->post('lebar');
				$ukuran		= $panjang." x ".$lebar. " cm";
				$stok		= $this->input->post('stok');
				$deskripsi	= $this->input->post('deskripsi');
				$gambar		= $_FILES['gambar'];
				$ext		= $gambar['name'];
				$ext		= explode(".", $ext);
				$ext		= strtolower(end($ext));

				if (!isset($_FILES['gambar'])){
					$gambar = $gambarlama;
				} else {
					$config['upload_path']		= './assets/images/uploaded_image';
					$config['allowed_types']	= 'jpg|png|jpeg';
					$config['file_name']		= uniqid("", true).".".$ext;

					$this->upload->initialize($config);
					if (!$this->upload->do_upload('gambar')){
						echo "Upload Gagal";
						die();
					} else {
						$gambar = $this->upload->data('file_name');
					}
				}

				$data = array(
					'nama_batik'		=> $nama,
					'harga'				=> $harga,
					'ukuran'			=> $ukuran,
					'stok'				=> $stok,
					'deskripsi'			=> $deskripsi,
					'gambar'			=> $gambar,
				);

				$this->m_produk->input_data($data, 'batik');
				redirect('adminproduk');
			}
		}

		$data['produk'] = $this->m_produk->tampil_produk()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminproduk', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function hapus_produk()
	{
		$id			= $this->uri->segment(3);
		$gambar		= $this->uri->segment(4);
		$nama		= $this->input->post('nama');
		$where		= array ('id_batik' => $id);
		$this->m_produk->hapus_data($where, 'batik');
		unlink('./assets/images/uploaded_image/'.$gambar);
		redirect('adminproduk');
	}

	public function edit_produk($id){
		$submit = $this->input->post('input');
		if ($submit == "Ubah") {
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('harga', 'Harga', 'integer');
			$this->form_validation->set_rules('panjang', 'Panjang', 'integer');
			$this->form_validation->set_rules('lebar', 'Lebar', 'integer');
			$this->form_validation->set_rules('stok', 'Stok', 'integer');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');

			$this -> form_validation -> set_message('integer', '{field} harus berupa angka.');

			if ($this->form_validation->run() == true){
				$id			= $this->input->post('id');
				$nama		= $this->input->post('nama');
				$harga		= $this->input->post('harga');
				$panjang	= $this->input->post('panjang');
				$lebar		= $this->input->post('lebar');
				$ukuran		= $panjang." x ".$lebar. " cm";
				$stok		= $this->input->post('stok');
				$deskripsi	= $this->input->post('deskripsi');
				$gambarlama	= $this->input->post('gambarlama');
				$gambar		= $_FILES['gambar'];
				$ext		= $gambar['name'];
				$ext		= explode(".", $ext);
				$ext		= strtolower(end($ext));

				if (isset($_FILES['gambar'])){
					$gambar = $gambarlama;
				} else {
					$config['upload_path']		= './assets/images/uploaded_image';
					$config['allowed_types']	= 'jpg|png|jpeg';
					$config['file_name']		= uniqid("", true).".".$ext;

					$this->upload->initialize($config);
					if (!$this->upload->do_upload('gambar')){
						echo "Upload Gagal";
						die();
					} else {
						$gambar = $this->upload->data('file_name');
						if ($gambarlama != ""){
							unlink('./assets/images/uploaded_image/'.$gambarlama);
						}
					}
				}

				$data = array(
					'nama_batik'		=> $nama,
					'harga'				=> $harga,
					'ukuran'			=> $ukuran,
					'stok'				=> $stok,
					'deskripsi'			=> $deskripsi,
					'gambar'			=> $gambar,
				);

				$where = array(
					'id_batik'			=> $id,
				);
				$this->m_artikel->edit_artikel($where, $data, 'batik');
				redirect('adminproduk');
			}
		}

		$where = array('id_batik' => $id);
		$data['produk'] = $this->m_produk->edit_data($where, 'batik')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editproduk', $data);
		$this->load->view('OnlineShop/template/footer');
	}

	public function adminpengiriman()
	{
		$submit = $this->input->post('input');
		if ($submit == "Tambah") {
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('harga', 'Harga', 'integer');

			$this -> form_validation -> set_message('integer', '{field} harus berupa angka.');

			if ($this->form_validation->run() == true) {
				$nama		= $this->input->post('nama');
				$harga		= $this->input->post('harga');

				$data = array(
					'nama_kurir'		=> $nama,
					'harga_kurir'		=> $harga,
				);

				$this->m_kurir->input_data($data, 'kurir');
				redirect('adminpengiriman');
			}
		}

		$data['pengiriman'] = $this->m_kurir->tampil_kurir()->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminpengiriman', $data);
		$this->load->view('OnlineShop/template/footer');
	}

	public function hapus_kurir($id)
	{
		$where		= array ('id_kurir' => $id);
		$this->m_kurir->hapus_data($where, 'kurir');
		redirect('adminproduk');
	}

	public function edit_kurir($id){
		$submit = $this->input->post('input');
		if ($submit == "Ubah") {
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('harga', 'Harga', 'integer');

			$this -> form_validation -> set_message('integer', '{field} harus berupa angka.');

			if ($this->form_validation->run() == true) {
				$id			= $this->input->post('id');
				$nama		= $this->input->post('nama');
				$harga		= $this->input->post('harga');

				$data = array(
					'nama_kurir'		=> $nama,
					'harga_kurir'		=> $harga,
				);

				$where = array(
					'id_kurir'			=> $id,
				);
				$this->m_kurir->edit_kurir($where, $data, 'kurir');
				redirect('adminpengiriman');
			}
		}

		$where = array('id_kurir' => $id);
		$data['pengiriman'] = $this->m_kurir->edit_data($where, 'kurir')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editpengiriman', $data);
		$this->load->view('OnlineShop/template/footer');
	}

	public function admintransaksi()
	{
		$data['transaksi'] = $this->m_transaksi->tampil_transaksi()->result();

		foreach ($data['transaksi'] as $row) {
			$detail = $this -> m_transaksi -> detailPembelian($row->id_order);
			$data['detail'][$row->id_order] = $detail;
		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();
		$submit = $this -> input -> post('submit');

		if ($submit == 'kirimResi') {
			$this -> form_validation -> set_rules('resi', 'Nomor Resi', 'required|trim|strip_tags|numeric');

			$this -> form_validation -> set_message('required', '{field} harus di isi.');
			$this -> form_validation -> set_message('numeric', '{field} harus terdiri dari angka saja.');

			if ($this -> form_validation -> run() === true) {
				$resi	= $this -> input -> post('resi');
				$id = $this -> input -> post('idOrder');

				$upd = array(
					'status' => "Proses Pengiriman",
					'resi' => $resi
				);
				$this -> m_transaksi -> updatePembelian($id, $upd);

				echo "<script>alert('Data berhasil disimpan'); window.location = '".base_url()."admintransaksi'</script>";
			}
		}

    $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/admintransaksi', $data);
    $this->load->view('OnlineShop/template/footer');
	}

	public function update_transaksi()
	{
		$id			= $this->uri->segment(3);
		$status		= $this->uri->segment(4);

		$where		= array ('id_transaksi' => $id);
		$dataselect['produk'] = $this->m_transaksi->get_data($where, 'daftar_order')->result();
		$id_order = $dataselect['produk'][0]->id_order;
		$id_user = $dataselect['produk'][0]->id_user;
		$nama_pembeli = $dataselect['produk'][0]->nama;
		$tanggal = $dataselect['produk'][0]->tanggal;
		$alamat = $dataselect['produk'][0]->alamat;
		$notelp = $dataselect['produk'][0]->notelp;
		$total_harga = $dataselect['produk'][0]->total;
		$kurir = $dataselect['produk'][0]->kurir;
		if ($status == 'kirim'){
			$status = "Proses Pengiriman";
		}
		elseif ($status == 'batal'){
			$status = "Pesanan Dibatalkan";
		}

		$data = array(
			'id_order'				=> $id_order,
			'id_user'				=> $id_user,
			'nama'					=> $nama_pembeli,
			'tanggal'				=> $tanggal,
			'alamat'				=> $alamat,
			'notelp'				=> $notelp,
			'total'					=> $total_harga,
			'kurir'					=> $kurir,
			'status'				=> $status,
		);

		$this->m_transaksi->edit_transaksi($where, $data, 'daftar_order');
		redirect('admintransaksi');
	}

	public function export($table)
	{
		if ($table == "produk") {
			$data['produk'] = $this->m_produk->tampil_produk()->result();
			$this->load->view('OnlineShop/admin/produkexport', $data);
		} elseif ($table == "transaksi") {
			$data['transaksi'] = $this->m_transaksi->tampil_transaksi()->result();
			$this->load->view('OnlineShop/admin/transaksiexport', $data);
		}
	}

	// public function pdf()
	// {
	// 	$this->load->library('dompdf_gen');

	// 	$data['produk'] = $this->m_produk->tampil_produk()->result();

	// 	$this->load->view('OnlineShop/admin/produkpdf', $data);

	// 	$paper_size = "A4";
	// 	$orientation = 'landscape';
	// 	$html = $this->output->get_output();
	// 	$this->dompdf->set_paper($paper_size, $orientation);

	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream("Daftar_Produk.pdf", array('Attachment' => 0));
	// }

	// public function excel()
	// {
	// 	$data['produk'] = $this->m_produk->tampil_produk()->result();

	// 	require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
	// 	require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

	// 	$object = new PHPExcel();

	// 	$object->getProperties()->setCreator("Kelompok Batik Jetis");
	// 	$object->getProperties()->setLastModifiedBy("Kelompok Batik Jetis");
	// 	$object->getProperties()->setTitle("Daftar Produk");

	// 	$object->setActiveSheetIndex(0);

	// 	$object->getActiveSheet()->setCellValue('A1', 'NO');
	// 	$object->getActiveSheet()->setCellValue('B1', 'Nama Produk');
	// 	$object->getActiveSheet()->setCellValue('C1', 'Harga Produk');
	// 	$object->getActiveSheet()->setCellValue('D1', 'Ukuran Produk');
	// 	$object->getActiveSheet()->setCellValue('E1', 'Stok Produk');
	// 	$object->getActiveSheet()->setCellValue('F1', 'Deskripsi Produk');

	// 	$baris = 2;
	// 	$no = 1;

	// 	foreach ($data['produk'] as $prd){
	// 		$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
	// 		$object->getActiveSheet()->setCellValue('B'.$baris, $prd->nama_batik);
	// 		$object->getActiveSheet()->setCellValue('C'.$baris, $prd->harga);
	// 		$object->getActiveSheet()->setCellValue('D'.$baris, $prd->ukuran);
	// 		$object->getActiveSheet()->setCellValue('E'.$baris, $prd->stok);
	// 		$object->getActiveSheet()->setCellValue('F'.$baris, $prd->deskripsi);

	// 		$baris++;
	// 	}

	// 	$filename = "Data_Produk".'.xlsx';
	// 	$object->getProperties()->setTitle("Data Produk");

	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	header('Content-Disposition: attachment;filename="'.$filename.'"');
	// 	header('Chace-Control: max-age=0');

	// 	$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
	// 	$writer->save('php://output');

	// 	exit;
	// }
}
