<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function index()
	{
		$data['konten_detail']	= $this->m_global->tampil('konten_detail','id_konten_detail');
		$this->load->view('maintenance_message', $data);
	}

}

/* End of file Maintenance.php */
/* Location: ./application/controllers/Maintenance.php */