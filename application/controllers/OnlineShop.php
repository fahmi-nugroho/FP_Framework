<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineShop extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this -> load -> model('model_olshop', 'batik');
	}

	public function index()
	{
		$data['db'] = $this -> batik -> views_batik();
	  $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/index', $data);
    $this->load->view('OnlineShop/template/footer');
	}

	public function products()
	{
		unset($_SESSION['cart']);
		$data['db'] = $this -> batik -> views_batik();
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
		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/checkout');
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
    $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/blog');
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
