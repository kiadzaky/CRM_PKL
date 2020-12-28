<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

 	public function __construct()
    {
     parent::__construct();
     $this->load->model('Auth_model', 'am');
     // $this->load->library('form_validation');
    }

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[16]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[30]');
		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$get_akun = $this->db->get_where('akun', ['akun_username'=>$username])->row_array();
			if($get_akun['akun_username'] == $username){
				if(password_verify($password, $get_akun['akun_password'])){
					
					$data = [
						'username' => $get_akun['akun_username'],
						// 'nama' => $get_akun['akun_nama_lengkap'],
						// 'role_id'=> $get_akun['role_id'],
						'log_in' => TRUE,
					];
					$this->session->set_userdata($data);
					redirect('admin/index','refresh');
				}else{
					$this->session->set_flashdata('message', 'Salah Password');
					redirect('auth','refresh');
				}
			}else{
				$this->session->set_flashdata('message', 'Salah Username');
				redirect('auth','refresh');
			}
		} else {
			$data['title'] = 'LogIn';
			$this->load->view('auth/v_login', $data);
		}
		// $data['module'] = 'auth';
  //       $data['view_file'] = 'v_login';
		// echo Modules::run('template/index',$data);
	}
	function logout()
	{
		session_destroy();
		redirect('auth','refresh');
	}
}
