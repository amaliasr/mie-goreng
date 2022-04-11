<?php
defined('BASEPATH') or exit('No direct script access allowed');
// coba git
class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->data = array(
			'admin' 			=> $this->m_global->tampil('admin', 'id_admin'),
			'discount' 			=> $this->m_global->tampil('discount', 'id_discount'),
			'game' 				=> $this->m_global->tampil('game', 'id_game'),
			'game_detail' 		=> $this->m_global->tampil('game_detail', 'id_game_detail'),
			'game_detail_asc' 	=> $this->m_global->tampil_asc('game_detail', 'id_game_detail'),
			'game_asc' 			=> $this->m_global->tampil_asc('game', 'id_game'),
			'item' 				=> $this->m_global->tampil('item', 'id_item'),
			'item_price' 		=> $this->m_global->tampil('item_price', 'id_item_price'),
			'item_price_detail' => $this->m_global->tampil('item_price_detail', 'id_item_price_detail'),
			'konten' 			=> $this->m_global->tampil('konten', 'id_konten'),
			'konten_detail'		=> $this->m_global->tampil('konten_detail', 'id_konten_detail'),
			'payment' 			=> $this->m_global->tampil('payment', 'id_payment'),
			'payment_asc' 		=> $this->m_global->tampil_asc('payment', 'status_pay'),
			'user' 				=> $this->m_global->tampil('user', 'id_user'),
			'actor' 			=> $this->m_global->tampil('actor', 'id_actor'),
			'menu' 				=> $this->m_global->tampil('menu', 'id_menu'),
			'konten' 			=> $this->m_global->tampil('konten', 'id_konten'),
			'konten_detail' 	=> $this->m_global->tampil('konten_detail', 'id_konten_detail'),
			'hint' 				=> $this->m_global->tampil('hint', 'id_hint'),
			'item_rel' 			=> $this->m_global->tampil('item_rel', 'id_item_rel'),
			'form' 				=> $this->m_global->tampil('form', 'id_form'),
			'input' 			=> $this->m_global->tampil_asc('input', 'id_input'),
			'sosmed' 			=> $this->m_global->sosmed(),
			'game_list'			=> $this->m_global->tampilGame()
		);
		$this->load->model('M_Api', 'mapi');
	}
	public function index()
	{
		$data = $this->data;
		foreach ($data['game_detail'] as $key) {
			$detail[$key->id_game] = $key->id_game_detail;
		}
		$data['detail'] = $detail;
		$this->load->view('home/index', $data);
	}
	public function detail($link)
	{
		$data = $this->data;
		$available = "";
		foreach ($data['game'] as $key) {
			if ($key->link == $link) {
				$data['nama_game'] = $key->nama_game;
				$data['id_game'] = $key->id_game;
				$data['link'] = $key->link;
				$available = "yes";
			}
		}
		// if empty
		if ($available) {
			// print_r($data['item_price_id']);
			$this->load->view('home/detail_game', $data);
		} else {
			$this->load->view('home/error', $data);
		}
	}
	public function fetch_ml_account()
	{

		echo json_encode($this->mapi->getMLAccountData($_POST['user_id'], $_POST['zone_id']));
	}
	public function fill_detail($link)
	{
		$data = $this->data;
		$available = "";
		foreach ($data['game'] as $key) {
			if ($key->link == $link) {
				$data['nama_game'] 	= $key->nama_game;
				$data['id_game'] 	= $key->id_game;
				$data['link'] 		= $key->link;
				$data['image_info'] = $key->image_info;
				$data['text_info'] 	= $key->text_info;
				$available 			= "game";
			}
		}
		foreach ($data['game_detail'] as $key) {
			if ($key->link_detail == $link) {
				$data['id_game'] = $key->id_game;
				$data['nama_game'] = $key->nama_game_detail;
				$data['id_game_detail'] = $key->id_game_detail;
				$data['link_detail'] = $key->link_detail;
				$data['image_info'] = $key->image_info_detail;
				$data['text_info'] = $key->text_info_detail;
				$available = "detail";
			}
		}
		foreach ($data['form'] as $key) {
			if ($key->id_game == $data['id_game']) {
				$inputan[$key->id_input] = $key->nama_form;
			}
		}
		foreach ($data['game'] as $key) {
			if ($key->id_game == $data['id_game']) {
				$data['icon'] 	= $key->icon;
			}
		}
		$data['available'] 	= $available;
		$data['inputan'] 	= $inputan;
		// code transaction
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 30; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$data['code_transaction'] = $randomString;

		// if empty
		if ($available) {
			if ($available == 'game') {
				// $data['item_id'] = $this->m_global->join_id_dinamis_2('item_rel','item','id_item','id_item','id_game',$data['id_game']);
				$data['hint_id'] = $this->m_global->tampil_id($data['id_game'], 'hint', 'id_game');
				$data['item_price_id'] = $this->m_global->grup_by_item_price($data['id_game']);
			} else {
				// $data['item_id'] = $this->m_global->join_id_dinamis_2('item_rel','item','id_item','id_item','id_game',$data['id_game']);
				$data['hint_id'] = $this->m_global->tampil_id($data['id_game'], 'hint', 'id_game');
				$data['item_price_id_detail'] = $this->m_global->grup_by_item_price_detail($data['id_game_detail']);
			}
			$this->load->view('home/detail', $data);
		} else {
			$this->load->view('home/error', $data);
		}
	}

	public function review($code_transaction)
	{
		$data = $this->data;
		$available = "";
		$data['available'] 		= $this->input->post('available'); //kalau 'game' itu game, kalau 'detail' itu 'game_detail'
		$data['id_payment'] 	= $this->input->post('id_payment');
		$data['user_id'] 		= $this->input->post('user_id');
		$data['zone_id'] 		= $this->input->post('zone_id');
		$data['nama_di_game'] 	= $this->input->post('nama_di_game');
		$data['id_item_price'] 	= $this->input->post('id_item_price');

		if ($data['available'] == 'game') {
			$data['id_game'] 		= $this->input->post('id_game');
			foreach ($data['item_price'] as $key) {
				if ($key->id_item_price == $data['id_item_price']) {
					$data['qty'] = $key->qty;
				}
			}
		} else {
			$data['id_game'] 		= $this->input->post('id_game');
			$data['id_game_detail'] = $this->input->post('id_game_detail');
			foreach ($data['game_detail'] as $key) {
				if ($key->id_game_detail == $data['id_game_detail']) {
					$data['link'] = $key->link_detail;
					$data['nama_game'] = $key->nama_game_detail;
					$data['title_game'] = $key->title_detail;
				}
			}
			foreach ($data['item_price_detail'] as $key) {
				if ($key->id_item_price_detail == $data['id_item_price']) {
					$data['qty'] = $key->qty;
				}
			}
		}
		foreach ($data['game'] as $key) {
			if ($key->id_game == $data['id_game']) {
				if ($data['available'] == 'game') {
					$data['link'] = $key->link;
					$data['nama_game'] = $key->nama_game;
					$data['title_game'] = $key->title;
				}
				$data['var_icon'] = $key->var_icon;
			}
		}
		foreach ($data['payment'] as $key) {
			if ($key->id_payment == $data['id_payment']) {
				$data['nama_payment'] = $key->nama_payment;
				$data['code_pay'] = $key->code_pay;
				$data['an'] = $key->an;
				$data['status_pay'] = $key->status_pay;
				$data['kategori_p'] = $key->kategori;
				$available = "yes";
			}
		}

		if ($available) {
			// code transaction
			$characters = '0123456789';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 2; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			$data['code_harga'] = $randomString;
			if ($data['available'] == 'game') {
				$result = $this->m_global->result_detail($data['id_game'], $data['qty'], $data['kategori_p']);
			} else {
				$result = $this->m_global->result_detail2($data['id_game_detail'], $data['qty'], $data['kategori_p']);
			}
			if ($result) {
				foreach ($result as $key) {
					$data['price'] = $key->price;
				}
			} else {
				$data['price'] = 0;
			}
			$data['code_transaction'] = $code_transaction;
			// session
			$this->session->set_userdata('id_payment', $data['id_payment']);
			$this->session->set_userdata('price', $data['price']);
			$this->session->set_userdata('nama_payment', $data['nama_payment']);
			$this->session->set_userdata('code_pay', $data['code_pay']);
			$this->session->set_userdata('an', $data['an']);
			$this->session->set_userdata('status_pay', $data['status_pay']);
			$this->session->set_userdata('code_harga', $data['code_harga']);
			$this->session->set_userdata('user_id', $data['user_id']);
			$this->session->set_userdata('zone_id', $data['zone_id']);
			$this->session->set_userdata('nama_game', $data['nama_game']);
			$this->session->set_userdata('nama_di_game', $data['nama_di_game']);
			$this->session->set_userdata('qty', $data['qty']);
			$this->session->set_userdata('code_transaction', $data['code_transaction']);
			$this->session->set_userdata('id_game', $data['id_game']);
			$this->session->set_userdata('title_game', $data['title_game']);
			$this->session->set_userdata('nama_item', $data['var_icon']);
			$this->load->view('home/review', $data);
		} else {
			$this->load->view('home/error', $data);
		}
	}
	public function send($code_transaction)
	{
		$user_id = $this->session->userdata('user_id');
		$zone_id = $this->session->userdata('zone_id');
		$id_payment = $this->session->userdata('id_payment');
		$code_transaction = $this->session->userdata('code_transaction');
		$id_item_price = $this->session->userdata('id_item_price');
		$nama_item = $this->session->userdata('nama_item');
		$nama_game = $this->session->userdata('nama_game');
		$nama = $this->session->userdata('nama');
		$qty = $this->session->userdata('qty');
		$nama_payment = $this->session->userdata('nama_payment');
		$price = $this->session->userdata('price');
		$structure = $this->session->userdata('structure');
		$code_pay = $this->session->userdata('code_pay');
		$nama_di_game = $this->session->userdata('nama_di_game');
		$an = $this->session->userdata('an');
		$code_harga = $this->session->userdata('code_harga');
		$status_pay = $this->session->userdata('status_pay');
		$id_game = $this->session->userdata('id_game');
		$title_game = $this->session->userdata('title_game');
		$phone = '6287859999037';
		if ($status_pay == 'bank' or $status_pay == 'online' or $status_pay == 'retail') {
			$total = number_format($price + $code_harga);
		} else {
			$total = number_format($price);
		}
		$title = $title_game;
		// if ($id_game == '5') {
		// 	$title = "*Pre Order KOF 12 Juni *";
		// }else{
		// 	$title = "💎 *MLBB @ADW.MLSTORE*";
		// }
		if ($status_pay == 'retail') {
			$kalimat = urlencode("$title

ID (SERVER)	: *$user_id ($zone_id)*
NAMA DI GAME: $nama_di_game
ORDER 		: $qty $nama_item
PEMBAYARAN	: $nama_payment
HARGA 		: Rp *$total*

Aku tunggu kode nya ya kak
");
		} else if ($status_pay == 'online') {
			$kalimat = urlencode("$title

ID (SERVER)	: *$user_id ($zone_id)*
NAMA DI GAME: $nama_di_game
ORDER 		: $qty $nama_item

Nanti aku bayar Rp *$total*
pakai $nama_payment

Bukti transfer akan saya kirim segera
");
		} else if ($status_pay == 'pulsa') {
			$kalimat = urlencode("$title

ID (SERVER)	: *$user_id ($zone_id)*
NAMA DI GAME: $nama_di_game
ORDER 		: $qty $nama_item

Nanti aku transfer pulsa Rp *$total*
Ke $nama_payment $code_pay

Bukti transfer akan saya kirim segera
");
		} else {
			if ($structure == 'txt') {
				$kalimat = urlencode("$title

ID (SERVER)	: *$user_id ($zone_id)*
NAMA DI GAME: $nama_di_game
ORDER 		: $nama

Nanti aku transfer Rp *$total*
Ke Rekening $nama_payment - $code_pay
Atas Nama: $an

Bukti transfer akan saya kirim segera
");
			} else {
				$kalimat = urlencode("$title

ID (SERVER)	: *$user_id ($zone_id)*
NAMA DI GAME: $nama_di_game
ORDER 		: $qty $nama_item

Nanti aku transfer Rp *$total*
Ke Rekening $nama_payment - $code_pay
Atas Nama: $an

Bukti transfer akan saya kirim segera
");
			}
		}
		date_default_timezone_set('Asia/Jakarta');
		// $dataq = array(
		//        "id_number"=> $user_id,
		//        "server"=> $zone_id,
		//        "nama_di_game"=> $nama_di_game,
		//        "id_item_price"=> $id_item_price,
		//        "id_payment"=> $id_payment,
		//        "date_order"=> date('Y-m-d H:i:s'),
		//        "code_trans"=> $code_transaction,
		//        "harga_detail"=> $total,
		//    );
		//    $this->db->insert("user",$dataq);
		redirect('https://api.whatsapp.com/send?phone=' . $phone . '&text=' . $kalimat);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */