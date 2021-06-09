<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShop extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this -> load -> model('model_olshop', 'batik');
			$this -> load -> model('m_artikel');
	}

	public function index()
	{
		$data['db'] = $this -> batik -> pagiBatik(6, 0);
	  $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/index', $data);
    $this->load->view('OnlineShop/template/footer');
	}

	public function products()
	{
		$config['base_url'] = base_url().'batik';
		$config['total_rows'] = $this->batik->countBatik();
		$config['per_page'] = 9;

		$config['num_links'] = 2;
		// $config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pages">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = false;
		$config['last_link'] = false;

		$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this -> pagination -> initialize($config);

		$data['start'] = $this -> uri -> segment(2);
		$data['db'] = $this -> batik -> pagiBatik($config['per_page'], $data['start']);

		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/products', $data);
		$this->load->view('OnlineShop/template/footer');
	}

	public function product($id)
	{
		$data['db'] = $this -> batik -> view_batik($id);
		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/product', $data);
		$this->load->view('OnlineShop/template/footer');
	}

	public function keranjang()
	{
		$action = $this -> input -> post('action');
		$id = $this -> input -> post('id');

		if ($action == "tambah") {
			$batik = $this -> batik -> view_batik($id);
			$jumlah = $this -> input -> post('jumlah');

			if (isset($_SESSION['cart']['cart_'.$id]) && $_SESSION['cart']['cart_'.$id] < $batik[0]->stok) {
				$_SESSION['cart']['cart_'.$id] += $jumlah;
			} else {
				if (isset($_SESSION['cart']['total'])) {
					$_SESSION['cart']['total'] += 1;
				} else {
					$_SESSION['cart']['total'] = 1;
				}

				$_SESSION['cart']['cart_'.$id] = $jumlah;
			}

			echo json_encode(array(
					'stok' => $batik[0]->stok,
					'sisa' => $batik[0]->stok - $_SESSION['cart']['cart_'.$id]
			));
		} else if ($action == "kurang") {
			$batik = $this -> batik -> view_batik($id);

			if ($_SESSION['cart']['cart_'.$id] > 1) {
				$_SESSION['cart']['cart_'.$id] --;

				echo json_encode(array(
					'stok' => $batik[0]->stok,
					'sisa' => $batik[0]->stok - $_SESSION['cart']['cart_'.$id]
				));
			} else {
				unset($_SESSION['cart']['cart_'.$id]);
				$_SESSION['cart']['total'] --;

				echo json_encode(array(
					'stok' => $batik[0]->stok,
					'sisa' => $batik[0]->stok
				));
			}

		} else if ($action == "ubah") {
			$batik = $this -> batik -> view_batik($id);
			$jumlah = $this -> input -> post('jumlah');

			$_SESSION['cart']['cart_'.$id] = $jumlah;

			echo json_encode(array(
				'stok' => $batik[0]->stok,
				'sisa' => $batik[0]->stok - $_SESSION['cart']['cart_'.$id]
			));
		} else {
			$total = 0;
			if (isset($_SESSION['cart']) && $_SESSION['cart']['total'] > 0) {
				foreach ($_SESSION['cart'] as $key => $value) {
					if (substr($key, 0, 5) == "cart_") {
						$batiks = $this -> batik -> view_batik(substr($key, 5));
						$avail = $batiks[0]->stok - $value;
						?>
						<div class="border-bottom py-3">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0">
									<div class="d-flex align-items-center justify-content-center keranjang-img">
										<img class="img-fluid" src="<?php echo base_url() ?>assets/images/Batik/<?php echo $batiks[0]->gambar ?>" alt="...">
									</div>
								</div>
								<div class="flex-grow-1 ms-3">
									<div class="row pb-2">
										<span class="col"><?php echo $batiks[0]->nama_batik ?></span>
									</div>
									<div class="row justify-content-between">
										<div class="col">
											<div class="input-group">
												<button class="btn btn-outline-secondary btn-sm" type="button" onclick="button('#itemKeranjang-<?= $batiks[0]->id_batik ?>', 0)">-</button>
												<input type="number" id="itemKeranjang-<?= $batiks[0]->id_batik ?>" class="form-control text-center p-0 inputTextCustom" value="<?php echo $value ?>" max="<?php echo $avail ?>" onkeyup="jumlahProduct('#itemKeranjang-<?= $batiks[0]->id_batik ?>', <?= $batiks[0]->stok ?>)" required>
												<button class="btn btn-outline-secondary btn-sm" type="button" onclick="button('#itemKeranjang-<?= $batiks[0]->id_batik ?>', 1)" <?php echo ($value == $batiks[0]->stok) ? "disabled" : "" ?>>+</button>
											</div>
										</div>
										<div class="col align-self-center text-end">
											X&nbsp;&nbsp;Rp <?php echo number_format($batiks[0]->harga, 0, ',', '.') ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$("#itemKeranjang-<?= $batiks[0]->id_batik ?>").focusout(function() {
								if (!$(this).hasClass("is-invalid")) {
									ubahKeranjang(<?= $batiks[0]->id_batik ?>);
								}
							})
						</script>
						<?php
						$total += $batiks[0]->harga * $value;
					}
				}
				?>
					<div class="row justify-content-between py-2 px-3 border-bottom text-secondary">
						<div class="col">
							Subtotal
						</div>
						<div class="col text-end">
							Rp <?php echo number_format($total, 0, ',', '.') ?>
						</div>
					</div>

					<div class="text-center">
						<a class="btn btn-secondary btn-sm w-75 mt-4" href="<?php echo base_url() ?>checkout">Checkout</a>
						<!-- <button class="btn btn-secondary btn-sm w-75 mt-4" type="button" name="button">Checkout</button> -->
					</div>
				<?php
			} else {
				?>
					<div class="text-center border-bottom py-4">
						<h4>Kosong</h4>
					</div>
				<?php
			}
			print_r($_SESSION);
		}
	}

	public function checkout()
	{
		$data['batiks'] = array();
		if (isset($_SESSION['cart']) && $_SESSION['cart']['total'] > 0) {
			foreach ($_SESSION['cart'] as $key => $value) {
				if (substr($key, 0, 5) == "cart_") {
					array_push($data['batiks'], $this -> batik -> view_batik(substr($key, 5))[0]);
				}
			}
		}

		$data['kurir'] = $this -> batik -> views_kurir();
		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/checkout', $data);
		$this->load->view('OnlineShop/template/footer');
	}

  public function about()
	{
    $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/about');
    $this->load->view('OnlineShop/template/footer');
	}

	public function login()
	{
    $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/login');
    $this->load->view('OnlineShop/template/footer');
	}

	public function register()
	{
    $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/register');
    $this->load->view('OnlineShop/template/footer');
	}
	public function blog()
	{
		$data['artikel'] = $this -> m_artikel -> tampil_artikel()->result();
    	$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/blog', $data);
    	$this->load->view('OnlineShop/template/footer');
	}
	public function bacablog()
	{
		// $data['db'] = $this -> batik -> view_batik($id);
		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/bacablog');
		$this->load->view('OnlineShop/template/footer');
	}

}
