<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}
	public function DoLogin()
	{
		$this->load->library('session');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if ($username != '' OR $password != '') {
			$login = $this->m_global->login_admin($username,$password);

			if ($login->num_rows() == 1) {
				foreach ($login->result() as $sess) {
					$sess_data['logged_in_admin'] = 'LogIn';
					$sess_data['id_admin'] = $sess->id_admin;
				}
				$this->session->set_userdata('logged_in_admin',$sess_data);
				redirect('minmin','refresh');
			}
			else{
				$this->form_validation->set_message("Login Gagal Username dan Password tidak valid");
				redirect('minminlog','refresh');
			}
		}else{
			redirect('minminlog','refresh');
		}
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('minminlog','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */