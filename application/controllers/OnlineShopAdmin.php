<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShopAdmin extends CI_Controller {
	public function adminartikel()
	{
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminartikel');
        $this->load->view('OnlineShop/footer');
	}

	public function adminproduk()
	{
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/adminproduk');
        $this->load->view('OnlineShop/footer');
	}

	public function admintransaksi()
	{
        $this->load->view('OnlineShop/admin/headeradmin');
		$this->load->view('OnlineShop/admin/admintransaksi');
        $this->load->view('OnlineShop/footer');
	}
}