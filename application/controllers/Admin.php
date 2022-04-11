<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	    $this->load->helper('url');
	    // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

	    if($this->session->userdata('logged_in_admin')){
			$sess_data = $this->session->userdata('logged_in_admin');
			$this->data = array(
			'id_admin' 		=> $sess_data['id_admin'],
			'admin' 		=> $this->m_global->tampil('admin','id_admin'),
			'discount' 		=> $this->m_global->tampil('discount','id_discount'),
			'game' 			=> $this->m_global->tampil('game','id_game'),
			'game_detail'	=> $this->m_global->tampil('game_detail','id_game_detail'),
			'game_asc' 		=> $this->m_global->tampil_asc('game','id_game'),
			'item' 			=> $this->m_global->tampil('item','id_item'),
			'item_price' 	=> $this->m_global->tampil('item_price','id_item_price'),
			'item_price_sort' 	=> $this->m_global->tampil('item_price','qty'),
			'item_price_detail_sort' 	=> $this->m_global->tampil('item_price_detail','qty'),
			'konten' 		=> $this->m_global->tampil('konten','id_konten'),
			'konten_detail'	=> $this->m_global->tampil('konten_detail','id_konten_detail'),
			'payment' 		=> $this->m_global->tampil('payment','id_payment'),
			'user' 			=> $this->m_global->tampil('user','id_user'),
			'actor' 		=> $this->m_global->tampil('actor','id_actor'),
			'menu' 			=> $this->m_global->tampil('menu','id_menu'),
			'konten' 		=> $this->m_global->tampil('konten','id_konten'),
			'konten_detail' => $this->m_global->tampil('konten_detail','id_konten_detail'),
			'hint' 			=> $this->m_global->tampil('hint','id_hint'),
			'item_rel' 		=> $this->m_global->tampil('item_rel','id_item_rel'),
			'form' 			=> $this->m_global->tampil('form','id_form'),
			'input' 		=> $this->m_global->tampil('input','id_input'),
			);
		}else{
			redirect('minminlog','refresh');
		}
	}
	// view
	public function index($param)
	{
		$data = $this->data;
		$data['sidebar'] = $param;
		$data['side_game'] = "";
		foreach ($data['menu'] as $key) {
			if ($key->variable == $param) {
				$data['nama_menu'] = $key->nama_menu;
				$data['variable'] = $key->variable;
				$data['link'] = $key->link;
			}
		}
		date_default_timezone_set('Asia/Jakarta');
		$this->load->view('admin/'.$param,$data);
	}

	// event date
	public function edit_event_date($id_event_date)
	{
		$data = array(
	        "start_date"=> $this->input->post('start_date'),
	        "end_date"=> $this->input->post('end_date'),
	    );
	    $this->m_global->edit($id_event_date,'event_date',$data,'id_event_date');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/');
	}
	
	// tambah slot
	public function tambah_slot($id_slot)
	{
		$data = array(
	        "jumlah_slot"=> $this->input->post('jumlah_slot'),
	    );
	    $this->m_global->edit($id_slot,'slot',$data,'id_slot');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/');
	}

	// menu
	public function ubah_menu($id_menu)
	{
		$data = array(
	        "id_actor"=> $this->input->post('id_actor'),
	        "nama_menu"=> $this->input->post('nama_menu'),
	        "variable"=> $this->input->post('variable'),
	        "link"=> $this->input->post('link'),
	        "icon"=> $this->input->post('icon'),
	    );
	    $this->m_global->edit($id_menu,'menu',$data,'id_menu');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/menu/');
	}
	public function visible_menu($id_menu)
	{
		$data = $this->data;
		foreach ($data['menu'] as $key) {
			if ($key->id_menu == $id_menu) {
				if ($key->visible == '') {
					$data = array(
				        "visible"=> "disable",
				    );
				}else{
					$data = array(
				        "visible"=> "",
				    );
				}
			}
		}
	    $this->m_global->edit($id_menu,'menu',$data,'id_menu');
	    redirect('minmin/menu/');
	}
	public function tambah_menu()
	{
		$data = array(
	        "id_actor"=> $this->input->post('id_actor'),
	        "nama_menu"=> $this->input->post('nama_menu'),
	        "variable"=> $this->input->post('variable'),
	        "link"=> $this->input->post('link'),
	        "icon"=> $this->input->post('icon'),
	    );
	    $this->db->insert("menu",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/menu/');
	}
	public function hapus_menu($id_menu)
	{
		$this->m_global->hapus($id_menu,'menu','id_menu');
		redirect('minmin/menu/');
	}

	// konten
	public function ubah_konten($id_konten_dev)
	{
		$data = array(
	        "nama_konten_dev"=> $this->input->post('nama_konten_dev'),
	        "variable_konten_dev"=> $this->input->post('variable_konten_dev'),
	        "element"=> $this->input->post('element'),
	        "content"=> $this->input->post('content'),
	    );
	    $this->m_global->edit($id_konten_dev,'konten_dev',$data,'id_konten_dev');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/konten/');
	}
	public function visible_konten($id_konten_dev)
	{
		$data = $this->data;
		foreach ($data['konten_dev'] as $key) {
			if ($key->id_konten_dev == $id_konten_dev) {
				if ($key->visible == '') {
					$data = array(
				        "visible"=> "disable",
				    );
				}else{
					$data = array(
				        "visible"=> "",
				    );
				}
			}
		}
	    $this->m_global->edit($id_konten_dev,'konten_dev',$data,'id_konten_dev');
	    redirect('minmin/konten/');
	}
	public function tambah_konten()
	{
		$data = array(
	        "nama_konten_dev"=> $this->input->post('nama_konten_dev'),
	        "variable_konten_dev"=> $this->input->post('variable_konten_dev'),
	        "element"=> $this->input->post('element'),
	        "content"=> $this->input->post('content'),
	    );
	    $this->db->insert("konten_dev",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/konten/');
	}
	public function hapus_konten($id_konten_dev)
	{
		$this->m_global->hapus($id_konten_dev,'konten_dev','id_konten_dev');
		redirect('minmin/konten/');
	}


	// akun admin
	public function ubah_akun_admin($id_admin)
	{
		$data = array(
	        "id_actor"=> $this->input->post('id_actor'),
	        "username"=> $this->input->post('username'),
	        "id_developer"=> $this->input->post('id_developer'),
	        "email"=> $this->input->post('email'),
	        "status"=> $this->input->post('status')
	    );
	    $this->m_global->edit($id_admin,'admin',$data,'id_admin');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/akun_admin/');
	}
	public function visible_akun_admin($id_admin)
	{
		$data = $this->data;
		foreach ($data['admin'] as $key) {
			if ($key->id_admin == $id_admin) {
				if ($key->visible == '') {
					$data = array(
				        "visible"=> "disable",
				    );
				}else{
					$data = array(
				        "visible"=> "",
				    );
				}
			}
		}
	    $this->m_global->edit($id_admin,'admin',$data,'id_admin');
	    redirect('minmin/akun_admin/');
	}
	public function tambah_akun_admin()
	{
		$data = array(
	       	"id_actor"=> $this->input->post('id_actor'),
	       	"id_developer"=> $this->input->post('id_developer'),
	        "username"=> $this->input->post('username'),
	        "email"=> $this->input->post('email'),
	        "password"=> $this->input->post('password'),
	        "status"=> $this->input->post('status')
	    );
	    $this->db->insert("admin",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/akun_admin/');
	}
	public function hapus_akun_admin($id_admin)
	{
		$this->m_global->hapus($id_admin,'admin','id_admin');
		redirect('minmin/akun_admin/');
	}



	public function export_pelamar($id_developer)
	{
		$dat = $this->data;
		$extension = 'xlsx';
	    $this->load->helper('download');
	    foreach ($dat['developer'] as $key) {
	    	if ($key->id_developer == $id_developer) {
	    		$nama_developer = $key->nama_developer;
	    	}
	    }
	    foreach ($dat['kualifikasi'] as $key) {
	    	$kual[$key->id_kualifikasi] = $key->nama_kualifikasi;
	    }
	    $pelamar = $this->m_global->pelamar($id_developer);
	    $data = array();
	    $fileName = 'Data User '.$nama_developer; 
	    $spreadsheet = new Spreadsheet();
	    $sheet = $spreadsheet->getActiveSheet();
	    
	    $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tanggal Lahir');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Nomor HP');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Institusi / Sekolah');
        $sheet->setCellValue('H1', 'Fakultas');
        $sheet->setCellValue('I1', 'Jurusan / Prodi');
        $sheet->setCellValue('J1', 'Kualifikasi');
        $sheet->setCellValue('K1', 'Status');
        $sheet->setCellValue('L1', 'Kota Asal');
        $sheet->setCellValue('M1', 'Alamat');
        $sheet->setCellValue('N1', 'IPK');
        $sheet->setCellValue('O1', 'Lamaran');
	 
	        $rowCount = 2;
	        $a = 1;
	        foreach ($pelamar as $key) { 
	            $sheet->setCellValue('A' . $rowCount, $a);
	            $sheet->setCellValue('B' . $rowCount, $key->nama_lengkap);
	            $sheet->setCellValue('C' . $rowCount, date('d-m-Y',strtotime($key->tanggal_lahir)));
	            $sheet->setCellValue('D' . $rowCount, $key->jenis_kelamin);
	            $sheet->setCellValue('E' . $rowCount, "0".$key->no_telp);
	            $sheet->setCellValue('F' . $rowCount, $key->email);
	            $sheet->setCellValue('G' . $rowCount, $key->institusi);
	            $sheet->setCellValue('H' . $rowCount, $key->jurusan);
	            $sheet->setCellValue('I' . $rowCount, $key->prodi);
	            $sheet->setCellValue('J' . $rowCount, $kual[$key->id_kualifikasi]);
	            $sheet->setCellValue('K' . $rowCount, $key->status_nikah);
	            $sheet->setCellValue('L' . $rowCount, $key->kota_asal);
	            $sheet->setCellValue('M' . $rowCount, $key->alamat);
	            $sheet->setCellValue('N' . $rowCount, $key->ipk);
	            $sheet->setCellValue('O' . $rowCount, $key->nama_lowongan);
	            $rowCount++;
	            $a++;
	        }
	    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
	    $fileName = $fileName.'.xlsx';
	    
	 
	    $this->output->set_header('Content-Type: application/vnd.ms-excel');
	    $this->output->set_header("Content-type: application/csv");
	    $this->output->set_header('Cache-Control: max-age=0');
	    $writer->save(ROOT_UPLOAD_PATH.$fileName); 
	    //redirect(HTTP_UPLOAD_PATH.$fileName); 
	    $filepath = file_get_contents(ROOT_UPLOAD_PATH.$fileName);
	    force_download($fileName, $filepath);
	}
	public function export_all_pelamar()
	{
		$dat = $this->data;
		$extension = 'xlsx';
	    $this->load->helper('download');
	    foreach ($dat['kualifikasi'] as $key) {
	    	$kual[$key->id_kualifikasi] = $key->nama_kualifikasi;
	    }
	    $pelamar_all = $this->m_global->pelamar_all();
	    $data = array();
	    $fileName = 'Data User '.$nama_developer; 
	    $spreadsheet = new Spreadsheet();
	    $sheet = $spreadsheet->getActiveSheet();
	    
	    $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tanggal Lahir');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Nomor HP');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Institusi / Sekolah');
        $sheet->setCellValue('H1', 'Fakultas');
        $sheet->setCellValue('I1', 'Jurusan / Prodi');
        $sheet->setCellValue('J1', 'Kualifikasi');
        $sheet->setCellValue('K1', 'Status');
        $sheet->setCellValue('L1', 'Kota Asal');
        $sheet->setCellValue('M1', 'Alamat');
        $sheet->setCellValue('N1', 'IPK');
        $sheet->setCellValue('O1', 'Lamaran');
        $sheet->setCellValue('P1', 'Perusahaan');
	 
	        $rowCount = 2;
	        $a = 1;
	        foreach ($pelamar_all as $key) { 
	            $sheet->setCellValue('A' . $rowCount, $a);
	            $sheet->setCellValue('B' . $rowCount, $key->nama_lengkap);
	            $sheet->setCellValue('C' . $rowCount, date('d-m-Y',strtotime($key->tanggal_lahir)));
	            $sheet->setCellValue('D' . $rowCount, $key->jenis_kelamin);
	            $sheet->setCellValue('E' . $rowCount, "0".$key->no_telp);
	            $sheet->setCellValue('F' . $rowCount, $key->email);
	            $sheet->setCellValue('G' . $rowCount, $key->institusi);
	            $sheet->setCellValue('H' . $rowCount, $key->jurusan);
	            $sheet->setCellValue('I' . $rowCount, $key->prodi);
	            $sheet->setCellValue('J' . $rowCount, $kual[$key->id_kualifikasi]);
	            $sheet->setCellValue('K' . $rowCount, $key->status_nikah);
	            $sheet->setCellValue('L' . $rowCount, $key->kota_asal);
	            $sheet->setCellValue('M' . $rowCount, $key->alamat);
	            $sheet->setCellValue('N' . $rowCount, $key->ipk);
	            $sheet->setCellValue('O' . $rowCount, $key->nama_lowongan);
	            $sheet->setCellValue('P' . $rowCount, $key->nama_developer);
	            $rowCount++;
	            $a++;
	        }
	    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
	    $fileName = $fileName.'.xlsx';
	    
	 
	    $this->output->set_header('Content-Type: application/vnd.ms-excel');
	    $this->output->set_header("Content-type: application/csv");
	    $this->output->set_header('Cache-Control: max-age=0');
	    $writer->save(ROOT_UPLOAD_PATH.$fileName); 
	    //redirect(HTTP_UPLOAD_PATH.$fileName); 
	    $filepath = file_get_contents(ROOT_UPLOAD_PATH.$fileName);
	    force_download($fileName, $filepath);
	}
	
	public function tambah_konten_txt($id_konten)
	{
		$data = $this->data;
		$dat = array(
	        "id_konten"=> $id_konten,
	        "isi"=> $this->input->post('isi'),
	    );
	    
	    $this->db->insert("konten_detail",$dat);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    $this->session->set_userdata('active', $this->input->post('variable'));
	    redirect('minmin/content/');
	}
	public function tambah_konten_file($id_konten)
	{
		$data = $this->data;
		$foto = "IMG_".time();
		$config['upload_path'] = './assets/img/konten/';
	    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
	    $config['max_size']      = '50000';
	    $config['file_name'] = $foto;

	    $this->load->library('upload', $config);
	    $image_data = $this->upload->data();

	    if (! $this->upload->do_upload('isi')){ // name="upload"
	       	$dat = array(
	       		"id_konten"=> $id_konten,
		        "isi"=> $this->input->post('isi'),
		    );
		    $this->db->insert("konten_detail",$dat);
		}else{
	        $image_data = $this->upload->data();
		    $dat = array(
		    	"id_konten"=> $id_konten,
		        "isi"=> $image_data['file_name'],
		    );
		    $this->db->insert("konten_detail",$dat);
		}
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
		$this->session->set_userdata('active',$this->input->post('variable'));
		redirect('minmin/content/');
	}
	public function hapus_isi_konten($id_konten_detail)
	{
		$this->m_global->hapus($id_konten_detail,'konten_detail','id_konten_detail');
		$this->session->set_userdata('active',$this->input->post('variable'));
		redirect('minmin/content/');
	}
	public function produk($link_game)
	{
		$data = $this->data;
		$data['sidebar'] = 'produk';
		$data['side_game'] = $link_game;
		foreach ($data['menu'] as $key) {
			if ($key->variable == 'produk') {
				$data['nama_menu'] = $key->nama_menu;
				$data['variable'] = $key->variable;
				$data['link'] = $key->link;
			}
		}
		$data['game_id'] = $this->m_global->tampil_id($link_game,'game','link');
		
		foreach ($data['game_id'] as $key) {
			$id_game = $key->id_game;
			$data['nama_game'] = $key->nama_game;
			$data['id_game'] = $key->id_game;
			$data['var_icon'] = $key->var_icon;
			$data['icon'] = $key->icon;
		}
		$data['available'] = 'yes';
		foreach ($data['game_detail'] as $key) {
			if ($key->id_game == $data['id_game']) {
				$data['available'] = 'no';
			}
		}
		$data['item_rel_id'] = $this->m_global->item_rel_id($id_game);
		$data['link_game'] = $link_game;
		$data['id_game_detail'] = 0;
		$data['status_detail'] = '';
		date_default_timezone_set('Asia/Jakarta');
		$this->session->set_userdata('active_game', $this->input->post('id_item'));
		$this->load->view('admin/produk',$data);
	}
	public function produk_detail($link_game,$link_game_detail)
	{
		$data = $this->data;
		$data['sidebar'] = 'produk';
		$data['side_game'] = $link_game;
		foreach ($data['menu'] as $key) {
			if ($key->variable == 'produk') {
				$data['nama_menu'] = $key->nama_menu;
				$data['variable'] = $key->variable;
				$data['link'] = $key->link;
			}
		}
		$data['game_id'] = $this->m_global->tampil_id($link_game,'game','link');
		$data['game_detail_id'] = $this->m_global->tampil_id($link_game_detail,'game_detail','link_detail');
		foreach ($data['game_id'] as $key) {
			$id_game = $key->id_game;
			$data['nama_game'] = $key->nama_game;
			$data['id_game'] = $key->id_game;
			$data['var_icon'] = $key->var_icon;
			$data['icon'] = $key->icon;
		}
		foreach ($data['game_detail'] as $key) {
			if ($key->link_detail == $link_game_detail) {
				$data['id_game_detail'] = $key->id_game_detail;
				$data['nama_game_detail'] = $key->nama_game_detail;
				$data['link_detail'] = $key->link_detail;
				$data['process'] = $key->process;
				$data['available'] = 'yes';
			}
		}
		$data['item_rel_id'] = $this->m_global->item_rel_id($id_game);
		$data['link_game'] = $link_game;
		$data['status_detail'] = 'detail';
		date_default_timezone_set('Asia/Jakarta');
		$this->session->set_userdata('active_game', $this->input->post('id_item'));
		$this->load->view('admin/produk',$data);
	}
	public function tambah_item_list($id_game)
	{
		
		$price_np = $this->input->post('price_np');
		$price_p = $this->input->post('price_p');
		$link_game = $this->input->post('link_game');
		$qty = $this->input->post('qty');
		for ($i=0; $i < count($qty); $i++) { 
			if ($price_p[$i] != "" OR $price_np[$i] != "" OR $qty[$i] != "") {
				// pulsa
				$data = array(
			        "id_game"=> $id_game,
			        "qty"=> $qty[$i],
			        "price"=> $price_p[$i],
			        "kategori"=> "pulsa",
			    );
			    $this->db->insert("item_price",$data);
			    // non pulsa
			    $data = array(
			        "id_game"=> $id_game,
			        "qty"=> $qty[$i],
			        "price"=> $price_np[$i],
			        "kategori"=> "npulsa",
			    );
			    $this->db->insert("item_price",$data);
			}
		}
		$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> '.$i.' Data berhasil ditambahkan!</div>');
	    redirect('minmin/produk/'.$link_game);
	}
	public function tambah_item_list_detail($id_game_detail)
	{
		
		$price_np = $this->input->post('price_np');
		$price_p = $this->input->post('price_p');
		$link_detail = $this->input->post('link_detail');
		$link_game = $this->input->post('link_game');
		$qty = $this->input->post('qty');
		for ($i=0; $i < count($qty); $i++) { 
			if ($price_p[$i] != "" OR $price_np[$i] != "" OR $qty[$i] != "") {
				// pulsa
				$data = array(
			        "id_game_detail"=> $id_game_detail,
			        "qty"=> $qty[$i],
			        "price"=> $price_p[$i],
			        "kategori"=> "pulsa",
			    );
			    $this->db->insert("item_price_detail",$data);
			    // non pulsa
			    $data = array(
			        "id_game_detail"=> $id_game_detail,
			        "qty"=> $qty[$i],
			        "price"=> $price_np[$i],
			        "kategori"=> "npulsa",
			    );
			    $this->db->insert("item_price_detail",$data);
			}
		}
		$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> '.$i.' Data berhasil ditambahkan!</div>');
	    redirect('minmin/produk/'.$link_game.'/'.$link_detail);
	}
	public function ubah_game($id_game)
	{
		$nama_game = $this->input->post("nama_game");
		$status = $this->input->post("status");
		$title = $this->input->post("title");
		$variable = $this->input->post("variable");
		$link = $this->input->post("link");
		$link_url = $this->input->post("link_url");
		$var_icon = $this->input->post("var_icon");
		// $text_link = str_replace(' ', '-', strtolower($nama_game));
		// $text_variable = str_replace(' ', '_', strtolower($nama_game));

		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['nama_game'] 		= $nama_game;
			$dat['status'] 			= $status;
			$dat['title'] 			= $title;
			$dat['link'] 			= $link;
			$dat['variable'] 		= $variable;
			$dat['var_icon'] 		= $var_icon;
		}else{
		    $image_data 			= $this->upload->data();
		    $file_lama				= $this->input->post('file_lama');
			$dat['nama_game'] 		= $nama_game;
			$dat['status'] 			= $status;
			$dat['title'] 			= $title;	
			$dat['link'] 			= $link;
			$dat['variable'] 		= $variable;
			$dat['var_icon'] 		= $var_icon;
			$dat['image'] 			= $image_data['file_name'];
			@unlink($path.$file_lama);
		}
		$this->m_global->edit($id_game,'game',$dat,'id_game');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		redirect('minmin/produk/'.$link,'refresh');
	}
	public function ubah_game_detail($id_game_detail)
	{
		$nama_game_detail = $this->input->post("nama_game_detail");
		$status_detail = $this->input->post("status_detail");
		$title_detail = $this->input->post("title_detail");
		$variable_detail = $this->input->post("variable_detail");
		$link_detail = $this->input->post("link_detail");
		$link_game = $this->input->post("link_game");
		$process = $this->input->post("process");
		// $text_link = str_replace(' ', '-', strtolower($nama_game));
		// $text_variable = str_replace(' ', '_', strtolower($nama_game));

		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['nama_game_detail'] 		= $nama_game_detail;
			$dat['status_detail'] 			= $status_detail;
			$dat['title_detail'] 			= $title_detail;
			$dat['link_detail'] 			= $link_detail;
			$dat['variable_detail'] 		= $variable_detail;
			$dat['process'] 				= $process;
		}else{
		    $image_data 					= $this->upload->data();
		    $file_lama						= $this->input->post('file_lama');
			$dat['nama_game_detail'] 		= $nama_game_detail;
			$dat['status_detail'] 			= $status_detail;
			$dat['title_detail'] 			= $title_detail;	
			$dat['link_detail'] 			= $link_detail;
			$dat['variable_detail'] 		= $variable_detail;
			$dat['process'] 				= $process;
			$dat['image_detail'] 			= $image_data['file_name'];
			@unlink($path.$file_lama);
		}

		$this->m_global->edit($id_game_detail,'game_detail',$dat,'id_game_detail');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		redirect('minmin/produk/'.$link_game.'/'.$link_detail,'refresh');
	}
	public function ubah_game_detail_info($id_game_detail)
	{
		$text_info_detail = $this->input->post("text_info_detail");
		$link_detail = $this->input->post("link_detail");
		$link_game = $this->input->post("link_game");
		// $text_link = str_replace(' ', '-', strtolower($nama_game));
		// $text_variable = str_replace(' ', '_', strtolower($nama_game));

		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();
		
		if (! $this->upload->do_upload('foto')){ 
			$dat['text_info_detail'] 		= $text_info_detail;
		}else{
		    $image_data 					= $this->upload->data();
		    $file_lama						= $this->input->post('file_lama');
			$dat['text_info_detail'] 		= $text_info_detail;
			$dat['image_info_detail'] 		= $image_data['file_name'];
			@unlink($path.$file_lama);
		}

		$this->m_global->edit($id_game_detail,'game_detail',$dat,'id_game_detail');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		redirect('minmin/produk/'.$link_game.'/'.$link_detail,'refresh');
	}
	public function ubah_game_info($id_game)
	{
		$link_url = $this->input->post("link_url");
		$text_info = $this->input->post("text_info");
		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['text_info'] 		= $text_info;
		}else{
		    $image_data 			= $this->upload->data();
		    $file_lama				= $this->input->post('file_lama');
			$dat['text_info'] 		= $text_info;
			$dat['image_info'] 		= $image_data['file_name'];
			@unlink($path.$file_lama);
		}
		$this->m_global->edit($id_game,'game',$dat,'id_game');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		redirect('minmin/produk/'.$link_url,'refresh');
	}
	public function ubah_icon($id_game)
	{
		$link_url = $this->input->post("link_url");

		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png|svg';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
	    	$this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>Gagal!</b> Data Gagal Diubah!</div>');
		}else{
		    $image_data 			= $this->upload->data();
		    $file_lama				= $this->input->post('file_lama');
			$dat['icon'] 			= $image_data['file_name'];
			@unlink($path.$file_lama);
			$this->m_global->edit($id_game,'game',$dat,'id_game');
	    	$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		}
		
		redirect('minmin/produk/'.$link_url,'refresh');
	}
	public function ubah_payment($id_payment)
	{
		$nama_payment = $this->input->post("nama_payment");
		$code_pay = $this->input->post("code_pay");
		$kategori = $this->input->post("kategori");
		$an = $this->input->post("an");
		$status_pay = $this->input->post("status_pay");

		$foto 						= "IMG_".time();
		$path 						= './assets/img/payment/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['nama_payment'] 		= $nama_payment;
			$dat['code_pay'] 			= $code_pay;
			$dat['kategori'] 			= $kategori;
			$dat['an'] 					= $an;
			$dat['status_pay'] 			= $status_pay;
		}else{
		    $image_data 				= $this->upload->data();
		    $file_lama					= $this->input->post('file_lama');
			$dat['nama_payment'] 		= $nama_payment;
			$dat['code_pay'] 			= $code_pay;
			$dat['kategori'] 			= $kategori;
			$dat['an'] 					= $an;
			$dat['status_pay'] 			= $status_pay;
			$dat['image'] 				= $image_data['file_name'];
			@unlink($path.$file_lama);
		}
		$this->m_global->edit($id_payment,'payment',$dat,'id_payment');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		redirect('minmin/payment/');
	}
	public function tambah_payment()
	{
		$nama_payment = $this->input->post("nama_payment");
		$code_pay = $this->input->post("code_pay");
		$kategori = $this->input->post("kategori");
		$an = $this->input->post("an");
		$status_pay = $this->input->post("status_pay");

		$foto 						= "IMG_".time();
		$path 						= './assets/img/payment/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['nama_payment'] 		= $nama_payment;
			$dat['code_pay'] 			= $code_pay;
			$dat['kategori'] 			= $kategori;
			$dat['an'] 					= $an;
			$dat['status_pay'] 			= $status_pay;
		}else{
		    $image_data 				= $this->upload->data();
			$dat['nama_payment'] 		= $nama_payment;
			$dat['code_pay'] 			= $code_pay;
			$dat['kategori'] 			= $kategori;
			$dat['an'] 					= $an;
			$dat['status_pay'] 			= $status_pay;
			$dat['image'] 				= $image_data['file_name'];
		}
		$this->db->insert("payment",$dat);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Ditambahkan!</div>');
		redirect('minmin/payment/');
	}
	public function hapus_payment($id_payment)
	{
		$data = array(
	        "visible_pay"=> "disable",
	    );
	    $this->m_global->edit($id_payment,'payment',$data,'id_payment');
		redirect('minmin/payment/');
	}
	public function ubah_hint($id_hint)
	{
		$isi_hint = $this->input->post("isi_hint");
		$id_game = $this->input->post("id_game");

		$foto 						= "IMG_".time();
		$path 						= './assets/img/hint/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['isi_hint'] 			= $isi_hint;
			$dat['id_game'] 			= $id_game;
		}else{
		    $image_data 				= $this->upload->data();
		    $file_lama					= $this->input->post('file_lama');
			$dat['isi_hint'] 			= $isi_hint;
			$dat['id_game'] 			= $id_game;
			$dat['image'] 				= $image_data['file_name'];
			@unlink($path.$file_lama);
		}
		$this->m_global->edit($id_hint,'hint',$dat,'id_hint');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
		redirect('minmin/hint/');
	}
	public function tambah_hint()
	{
		$isi_hint = $this->input->post("isi_hint");
		$id_game = $this->input->post("id_game");

		$foto 						= "IMG_".time();
		$path 						= './assets/img/hint/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['isi_hint'] 			= $isi_hint;
			$dat['id_game'] 			= $id_game;
		}else{
		    $image_data 				= $this->upload->data();
			$dat['isi_hint'] 			= $isi_hint;
			$dat['id_game'] 			= $id_game;
			$dat['image'] 				= $image_data['file_name'];
		}
		$this->db->insert("hint",$dat);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Ditambahkan!</div>');
		redirect('minmin/hint/');
	}
	public function hapus_hint($id_hint)
	{
		$this->m_global->hapus($id_hint,'hint','id_hint');
		redirect('minmin/hint/');
	}

	public function tambah_game()
	{
		$nama_game = $this->input->post("nama_game");
		$status = $this->input->post("status");
		$text_link = str_replace(' ', '-', strtolower($nama_game));
		$text_variable = str_replace(' ', '_', strtolower($nama_game));

		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['nama_game'] 			= $nama_game;
			$dat['status'] 				= $status;
			$dat['link'] 				= $text_link;
			$dat['variable'] 			= $text_variable;
		}else{
		    $image_data 				= $this->upload->data();
			$dat['nama_game'] 			= $nama_game;
			$dat['status'] 				= $status;
			$dat['link'] 				= $text_link;
			$dat['variable'] 			= $text_variable;
			$dat['image'] 				= $image_data['file_name'];
		}
		$this->db->insert("game",$dat);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Ditambahkan!</div>');
		redirect('minmin/home/');
	}
	public function tambah_paket($id_game)
	{
		$nama_game_detail = $this->input->post("nama_game_detail");
		$title_detail = $this->input->post("title_detail");
		$link_url = $this->input->post("link_url");
		$status = 'on';
		$text_link = str_replace(' ', '-', strtolower($nama_game_detail));
		$text_variable = str_replace(' ', '_', strtolower($nama_game_detail));

		$foto 						= "IMG_".time();
		$path 						= './assets/img/game/';
		$config['upload_path'] 		= $path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']     	= '50000';
		$config['file_name'] 		= $foto;

		$this->load->library('upload', $config);
		$image_data = $this->upload->data();

		if (! $this->upload->do_upload('foto')){ 
			$dat['id_game'] 					= $id_game;
			$dat['nama_game_detail'] 			= $nama_game_detail;
			$dat['status_detail'] 				= $status;
			$dat['link_detail'] 				= $text_link;
			$dat['variable_detail'] 			= $text_variable;
			$dat['title_detail'] 				= $title_detail;
		}else{
			$dat['id_game'] 					= $id_game;
		    $image_data 						= $this->upload->data();
			$dat['nama_game_detail'] 			= $nama_game_detail;
			$dat['status_detail'] 				= $status;
			$dat['link_detail'] 				= $text_link;
			$dat['variable_detail'] 			= $text_variable;
			$dat['title_detail'] 				= $title_detail;
			$dat['image_detail'] 				= $image_data['file_name'];
		}
		$this->db->insert("game_detail",$dat);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Ditambahkan!</div>');
		redirect('minmin/produk/'.$link_url,'refresh');
	}
	public function hapus_game($id_game)
	{
		$this->m_global->hapus($id_game,'game','id_game');
		redirect('minmin/game/');
	}
	public function tambah_kat_item_home($id_game)
	{
		$link_game = $this->input->post('link_game');
		$data = array(
	        "id_game"=> $id_game,
	        "id_item"=> $this->input->post('id_item'),
	    );
	    $this->db->insert("item_rel",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/produk/'.$link_game);
	}
	public function hapus_item_price($id_item_price)
	{
		$link_game = $this->input->post('link_game');
		$data = array(
	        "visible"=> "disable",
	    );
	    $this->m_global->edit($id_item_price,'item_price',$data,'id_item_price');
		redirect('minmin/produk/'.$link_game);
	}
	public function ubah_item_price($id_item_price)
	{
		$link_game = $this->input->post('link_game');
		$data = array(
	        "qty"		=> $this->input->post('qty'),
	        "price"		=> $this->input->post('price'),
	        "kategori"	=> $this->input->post('kategori'),
	    );
	    $this->m_global->edit($id_item_price,'item_price',$data,'id_item_price');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/produk/'.$link_game);
	}
	public function ubah_item_price_detail($id_item_price_detail)
	{
		$link_game = $this->input->post('link_game');
		$link_detail = $this->input->post('link_detail');
		$data = array(
	        "qty"		=> $this->input->post('qty'),
	        "price"		=> $this->input->post('price'),
	        "kategori"	=> $this->input->post('kategori'),
	    );
	    $this->m_global->edit($id_item_price_detail,'item_price_detail',$data,'id_item_price_detail');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/produk/'.$link_game.'/'.$link_detail);
	}

	// item
	public function hapus_item($id_item)
	{
		$this->m_global->hapus($id_item,'item','id_item');
		redirect('minmin/item/');
	}
	public function tambah_item()
	{
		$data = array(
	        "nama_item"=> $this->input->post('nama_item'),
	        "icon"=> $this->input->post('icon'),
	        "link"=> $this->input->post('link'),
	        "structure"=> $this->input->post('structure'),
	    );
	    $this->db->insert("item",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/item/');
	}
	public function ubah_item($id_item)
	{
		$data = array(
	        "nama_item"=> $this->input->post('nama_item'),
	        "icon"=> $this->input->post('icon'),
	        "link"=> $this->input->post('link'),
	        "structure"=> $this->input->post('structure'),
	    );
	    $this->m_global->edit($id_item,'item',$data,'id_item');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/item/');
	}

	// input
	public function hapus_input($id_input)
	{
		$this->m_global->hapus($id_input,'input','id_input');
		redirect('minmin/input/');
	}
	public function tambah_input()
	{
		$data = array(
	        "variable_input"=> $this->input->post('variable_input'),
	        "type"=> $this->input->post('type'),
	    );
	    $this->db->insert("input",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/input/');
	}
	public function ubah_input($id_input)
	{
		$data = array(
	        "variable_input"=> $this->input->post('variable_input'),
	        "type"=> $this->input->post('type'),
	    );
	    $this->m_global->edit($id_input,'input',$data,'id_input');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/input/');
	}

	// form
	public function hapus_form($id_form)
	{
		$data = $this->data;
		foreach ($data['form'] as $key) {
			if ($key->id_form == $id_form) {
				$id_game = $key->id_game;
			}
		}
		foreach ($data['game'] as $key) {
			if ($key->id_game == $id_game) {
				$link_game = $key->link;
			}
		}
		$this->m_global->hapus($id_form,'form','id_form');
		redirect('minmin/produk/'.$link_game);
	}
	public function tambah_form($id_game)
	{
		$link_url = $this->input->post('link_url');
		$data = array(
	        "id_game"=> $id_game,
	        "id_input"=> $this->input->post('id_input'),
	        "nama_form"=> $this->input->post('nama_form'),
	    );
	    $this->db->insert("form",$data);
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil ditambahkan!</div>');
	    redirect('minmin/produk/'.$link_url);
	}
	public function ubah_form($id_form)
	{
		$link_url = $this->input->post('link_url');
		$data = array(
	        "nama_form"=> $this->input->post('nama_form'),
	    );
	    $this->m_global->edit($id_form,'form',$data,'id_form');
	    $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Success!</b> Data berhasil Diubah!</div>');
	    redirect('minmin/produk/'.$link_url);
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */