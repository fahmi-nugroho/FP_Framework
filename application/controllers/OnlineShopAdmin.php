<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShopAdmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_artikel');
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
	}

	public function adminartikel()
	{
		$data['artikel'] = $this->m_artikel->tampil_artikel()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminartikel', $data);
        $this->load->view('OnlineShop/footer');
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
        $this->load->view('OnlineShop/footer');
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
        $this->load->view('OnlineShop/footer');
	}

	public function tambah_produk()
	{
		$nama		= $this->input->post('nama');
		$harga		= $this->input->post('harga');
		$stok		= $this->input->post('stok');
		$deskripsi	= $this->input->post('deskripsi');
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
			}
		}

		$data = array(
			'nama_produk'			=> $nama,
			'harga_produk'			=> $harga,
			'stok_produk'			=> $stok,
			'deskripsi_produk'		=> $deskripsi,
			'gambar_produk'			=> $gambar,
		);

		$this->m_produk->input_data($data, 'produk');
		redirect('adminproduk');
	}

	public function hapus_produk()
	{
		$id 		= $this->uri->segment(3);
		$nama		= $this->input->post('nama');
		$harga		= $this->input->post('harga');
		$stok		= $this->input->post('stok');
		$deskripsi	= $this->input->post('deskripsi');
		$this->m_produk->hapus_data($where, 'produk');
		unlink('./assets/images/uploaded_image/'.$gambar);
		redirect('adminproduk');
	}

	public function edit_produk($id){
		$where = array('id_produk' => $id);
		$data['produk'] = $this->m_produk->edit_data($where, 'produk')->result();
		$this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/editproduk', $data);
        $this->load->view('OnlineShop/footer');
	}

	public function ubah_produk(){
		$id			= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$harga		= $this->input->post('harga');
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
			'nama_produk'			=> $nama,
			'harga_produk'			=> $harga,
			'stok_produk'			=> $stok,
			'deskripsi_produk'		=> $deskripsi,
			'gambar_produk'			=> $gambar,
		);

		$where = array(
			'id_produk'				=> $id,
		);
		$this->m_artikel->edit_artikel($where, $data, 'produk');
		redirect('adminproduk');
	}

	public function admintransaksi()
	{
		$data['transaksi'] = $this->m_transaksi->tampil_transaksi()->result();
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/admintransaksi');
        $this->load->view('OnlineShop/footer');
	}
}