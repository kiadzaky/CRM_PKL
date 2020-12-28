<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

 	public function __construct()
    {
     parent::__construct();
     $this->load->model('Customer_model', 'cm');
     // $this->load->library('form_validation');
    }

	public function index()
	{
		$this->form_validation->set_rules('tiket_pesan', 'Pesan Tiket', 'required|min_length[5]');
		if ($this->form_validation->run() == TRUE) {
			$tiket_pesan = $this->input->post('tiket_pesan');
			$menu_id = $this->input->post('menu_id');
			$data = [
				'tiket_id' => $this->uuid->v4(),
				'tiket_pesan' => $tiket_pesan,
				'menu_id' => $menu_id,
				'tiket_create' => date('Y-m-d G:i:s'),

			];
			$this->db->insert('tiket', $data);

			redirect('customer','refresh');
		}else{
		$data['menu'] = $this->cm->getData('menu')->result();
		$this->load->view('v_e_ticket',$data);

		}
	}
	function logout()
	{
		session_destroy();
		redirect('auth','refresh');
	}

}
