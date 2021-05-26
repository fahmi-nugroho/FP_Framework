<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShop extends CI_Controller {

	public function index()
	{
        $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/index');
        $this->load->view('OnlineShop/footer');
	}
    public function about()
	{
        $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/about');
        $this->load->view('OnlineShop/footer');
	}
    public function contact()
	{
        $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/contact');
        $this->load->view('OnlineShop/footer');
	}
    public function products()
	{
        $this->load->view('OnlineShop/header');
		$this->load->view('OnlineShop/products');
        $this->load->view('OnlineShop/footer');
	}
}
