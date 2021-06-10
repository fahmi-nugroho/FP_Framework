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
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1 || !isset($_SESSION['cart']) || $_SESSION['cart']['total'] == 0){
			echo "<script>window.history.back()</script>";
		}

		$submit = $this->input->post('bayar');

		if ($submit == 'bayar') {
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|strip_tags|numeric|min_length[10]');

			$metode = $this->input->post('metode');
			if ($metode == "Kirim") {
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|strip_tags');
				$this->form_validation->set_rules('hargaKurir', 'Email', 'trim|strip_tags|numeric');
			}

			$this->form_validation->set_message('min_length', 'Masukkan {field} dengan benar.');
			$this->form_validation->set_message('numeric', '{field} harus terdiri dari angka.');

			if ($this->form_validation->run() === true){
				$id_order = time();
				$id_user = $_SESSION['id'];
				$nama = $_SESSION['nama'];
				$tanggal = date("d-m-Y");
				$alamat = $this->input->post('alamat');
				$notelp = $this->input->post('telepon');
				$total = $this->input->post('bayartotal');
				$kurir = $this->input->post('kurir');

				$data = array(
					'id_order' => $id_order,
					'id_user' => $id_user,
					'nama' => $nama,
					'tanggal' => $tanggal,
					'alamat' => $alamat,
					'notelp' => $notelp,
					'total' => $total,
					'kurir' => $kurir,
					'status' => "Menunggu Pembayaran",
				);

				$this->batik->checkout($data);

				foreach ($_SESSION['cart'] as $key => $value) {
					if (substr($key, 0, 5) == "cart_") {
						$batik = $this -> batik -> view_batik(substr($key, 5))[0];

						$data = array(
							'id_order' => $id_order,
							'id_batik' => $batik->id_batik,
							'jumlah' => $value,
							'harga' => $batik->harga,
						);

						$this->batik->detailCheckout($data);
					}
				}

				unset($_SESSION['cart']);
				// echo "<script>alert('Silahkan Melakukan Pembayaran')</script>";
				redirect();
			}
		}

		$data['batiks'] = array();
		if (isset($_SESSION['cart']) && $_SESSION['cart']['total'] > 0) {
			foreach ($_SESSION['cart'] as $key => $value) {
				if (substr($key, 0, 5) == "cart_") {
					array_push($data['batiks'], $this -> batik -> view_batik(substr($key, 5))[0]);
				}
			}
		}

		$data['kurir'] = $this -> batik -> views_kurir();
		$data['jetis'] = $this -> batik -> view_user(1);
		$data['user'] = $this -> batik -> view_user($_SESSION['id']);

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
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
			echo "<script>window.history.back()</script>";
		}

		$submit = $this->input->post('masuk');

		if ($submit == 'masuk') {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags');

			$this->form_validation->set_message('required', '{field} harus di isi.');
			$this->form_validation->set_message('valid_email', 'Harap isi {field} dengan benar.');

			if ($this->form_validation->run() === true){
				$email	= $this->input->post('email');
				$password	= $this->input->post('password');

				$user = $this -> batik -> login($email);
				if (!empty($user)) {
					if (password_verify($password, $user[0]['password'])) {
						$newdata = array(
							'id' => $user[0]['id_user'],
							'nama' => $user[0]['nama_user'],
							'email' => $user[0]['email'],
							'logged_in' => TRUE
						);

						$this->session->set_userdata($newdata);
						if ($user[0]['email'] == 'Admin@admin.com') {
							redirect('adminartikel');
						} else {
							redirect();
						}
					} else {
						$this->session->set_flashdata('Error', 'ada');
					}
				} else {
					$this->session->set_flashdata('Error', 'ada');
				}
			}
		}

    $this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/login');
    $this->load->view('OnlineShop/template/footer');
	}

	public function register()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
			echo "<script>window.history.back()</script>";
		}

		$submit = $this->input->post('daftar');

		if ($submit == 'daftar') {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags|min_length[8]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim|strip_tags|matches[password]');

			$this->form_validation->set_message('required', '{field} harus di isi.');
			$this->form_validation->set_message('valid_email', 'Harap isi {field} dengan  benar.');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
			$this->form_validation->set_message('min_length', '{field} harus lebih dari {param} karakter.');
			$this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');

			if ($this->form_validation->run() === true){
				$email	= $this->input->post('email');
				$nama = strtolower(explode("@", $email)[0]);
				$password	= password_hash($this->input->post('password'), PASSWORD_BCRYPT);

				$data = array(
					'nama_user' => $nama,
					'email' => $email,
					'password' => $password,
				);

				$this->batik->register($data);
				redirect("login");
			}
		}

		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/register');
		$this->load->view('OnlineShop/template/footer');
	}

	public function logout()
	{
		session_destroy();
		redirect();
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
		$this->load->view('OnlineShop/template/header');
		$this->load->view('OnlineShop/bacablog');
		$this->load->view('OnlineShop/template/footer');
	}

}
