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
		$data['artikel'] = $this->m_artikel->tampil_artikel()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminartikel', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function tambah_artikel()
	{
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
		$where = array('id_artikel' => $id);
		$data['artikel'] = $this->m_artikel->edit_data($where, 'artikel')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editartikel', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function ubah_artikel(){
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

	public function adminproduk()
	{
		$data['produk'] = $this->m_produk->tampil_produk()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminproduk', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function tambah_produk()
	{
		$nama		= $this->input->post('nama');
		$harga		= $this->input->post('harga');
		$panjang	= $this->input->post('panjang');
		$lebar		= $this->input->post('lebar');
		$ukuran		= $panjang." x ".$lebar;
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
		$where = array('id_batik' => $id);
		$data['produk'] = $this->m_produk->edit_data($where, 'batik')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editproduk', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function ubah_produk(){
		$id			= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$harga		= $this->input->post('harga');
		$panjang	= $this->input->post('panjang');
		$lebar		= $this->input->post('lebar');
		$ukuran		= $panjang." x ".$lebar;
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

	public function adminpengiriman()
	{
		$data['pengiriman'] = $this->m_kurir->tampil_kurir()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminpengiriman', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function tambah_kurir()
	{
		$nama		= $this->input->post('nama');
		$harga		= $this->input->post('harga');

		$data = array(
			'nama_kurir'		=> $nama,
			'harga_kurir'		=> $harga,
		);

		$this->m_kurir->input_data($data, 'kurir');
		redirect('adminpengiriman');
	}

	public function hapus_kurir($id)
	{
		$where		= array ('id_kurir' => $id);
		$this->m_kurir->hapus_data($where, 'kurir');
		redirect('adminproduk');
	}

	public function edit_kurir($id){
		$where = array('id_kurir' => $id);
		$data['pengiriman'] = $this->m_kurir->edit_data($where, 'kurir')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editpengiriman', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function ubah_kurir(){
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

	public function admintransaksi()
	{
		$data['transaksi'] = $this->m_transaksi->tampil_transaksi()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/admintransaksi', $data);
        $this->load->view('OnlineShop/template/footer');
	}

	public function update_transaksi()
	{
		$id			= $this->uri->segment(3);
		$status		= $this->uri->segment(4);

		$where		= array ('id_transaksi' => $id);
		$dataselect['produk'] = $this->m_transaksi->get_data($where, 'transaksi')->result();
		$id_order = $dataselect['produk'][0]->id_order;
		$tanggal = $dataselect['produk'][0]->id_order;
		$nama_pembeli = $dataselect['produk'][0]->nama_pembeli;
		$alamat = $dataselect['produk'][0]->alamat;
		$total_harga = $dataselect['produk'][0]->total_harga;
		if ($status == 'kirim'){
			$status = "Proses Pengiriman";
		}
		elseif ($status == 'batal'){
			$status = "Pesanan Dibatalkan";
		}

		$data = array(
			'id_order'				=> $id_order,
			'tanggal'				=> $tanggal,
			'nama_pembeli'			=> $nama_pembeli,
			'alamat'				=> $alamat,
			'total_harga'			=> $total_harga,
			'status'				=> $status,
		);

		$this->m_transaksi->edit_transaksi($where, $data, 'transaksi');
		redirect('admintransaksi');
	}
}