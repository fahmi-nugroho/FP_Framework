<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShop extends CI_Controller {

	public function index()
	{
	  $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/index');
    $this->load->view('OnlineShop/footer');
	}

  public function product($id)
	{
		$data['id'] = $id;
    $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/product', $data);
    $this->load->view('OnlineShop/footer');
	}

  public function products()
	{
    $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/products');
    $this->load->view('OnlineShop/footer');
	}

  public function about()
	{
    $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/about');
    $this->load->view('OnlineShop/footer');
	}

	public function login()
	{
    $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/login');
    $this->load->view('OnlineShop/footer');
	}

	public function register()
	{
    $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/register');
    $this->load->view('OnlineShop/footer');
	}

	public function adminartikel()
	{
    $this->load->view('OnlineShop/headeradmin');
		$this->load->view('OnlineShop/adminartikel');
    $this->load->view('OnlineShop/footer');
	}

	public function adminproduk()
	{
    $this->load->view('OnlineShop/headeradmin');
		$this->load->view('OnlineShop/adminproduk');
    $this->load->view('OnlineShop/footer');
	}

	public function admintransaksi()
	{
    $this->load->view('OnlineShop/headeradmin');
		$this->load->view('OnlineShop/admintransaksi');
    $this->load->view('OnlineShop/footer');
	}
}
