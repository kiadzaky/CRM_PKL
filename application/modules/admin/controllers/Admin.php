<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

 	public function __construct()
    {
     parent::__construct();
     // $this->load->library('form_validation');
     $this->load->model('Admin_model', 'M_Admin');
    }

	public function index()
	{
		
		$data['module'] = 'admin';
        $data['view_file'] = 'v_dashboard';
		echo Modules::run('template/index',$data);
	}
	function logout()
	{
		session_destroy();
		redirect('auth','refresh');
	}

	function e_ticket()
	{
		$data['module'] = 'admin';
        $data['view_file'] = 'v_e_ticket';
        $data['tiket'] = $this->M_Admin->getQuery('SELECT * FROM `tiket` JOIN menu ON tiket.menu_id = menu.menu_id ORDER BY tiket_update DESC')->result();
		echo Modules::run('template/index',$data);
	}

	function folup($tiket_id)
	{
		$this->db->where('tiket_id', $tiket_id);
		$this->db->update('tiket', array('tiket_status'=>2));
		redirect('admin/e_ticket','refresh');
	}

	function balas_folup($tiket_id)
	{
		$data['module'] = 'admin';
        $data['view_file'] = 'v_balas_folup';
        $data['tiket'] = $this->M_Admin->getQuery("SELECT * FROM `tiket` 
			JOIN menu ON tiket.menu_id = menu.menu_id
			WHERE tiket.tiket_id = '$tiket_id' AND tiket_status = '2'")->row_array();
       
		echo Modules::run('template/index',$data);

		if (isset($_POST['submit'])) {
			$tiket_balas_prod = $this->input->post('tiket_balas_prod');
			$tiket_id = $this->input->post('tiket_id');
			$data = [
				'tiket_balas_prod' => $tiket_balas_prod,
				'tiket_status' => 3
			];
			$this->db->where('tiket_id', $tiket_id);
			$this->db->update('tiket', $data);
			redirect('admin/e_ticket_prod','refresh');
		}
	}

	function balas_tiket($tiket_id)
	{
		$data['module'] = 'admin';
		$data['view_file'] = 'v_balas_tiket';
		$data['tiket'] = $this->M_Admin->getQuery("SELECT * FROM `tiket` 
			JOIN menu ON tiket.menu_id = menu.menu_id
			WHERE tiket.tiket_id = '$tiket_id'")->row_array();
		$data['balas_tiket'] = $this->M_Admin->getQuery("SELECT * FROM `tiket`
			JOIN balas_tiket ON tiket.tiket_id = balas_tiket.tiket_id WHERE tiket.tiket_id = '$tiket_id' ")->row_array();
		
		if(isset($_POST['submit'])){
			$balas_tiket = $this->input->post('balas_tiket');
			$tiket_id = $this->input->post('tiket_id');
			$balas_tiket_id = $this->input->post('balas_tiket_id');
			if($tiket_id <> '' && $balas_tiket_id == '' ){
				$data = [
					'balas_tiket_id' => $this->uuid->v4(),
					'tiket_id' => $tiket_id,
					'balas_tiket_pesan'=> $balas_tiket,
					'balas_tiket_create' => date('Y-m-d G:i:s'),
				];
				$datas = ['tiket_status' => 4];
				$this->db->where('tiket_id', $tiket_id);
				$this->db->update('tiket', $datas);
				$this->db->insert('balas_tiket', $data);
				redirect('admin/e_ticket','refresh');
			}elseif ($balas_tiket_id <> '') {
				$data = [
					'balas_tiket_pesan' => $balas_tiket,
				];
				$datas = ['tiket_status' => 4];
				$this->db->where('balas_tiket_id', $balas_tiket_id);
				$this->db->update('balas_tiket', $data);
				$this->db->where('tiket_id', $tiket_id);
				$this->db->update('tiket', $datas);
				redirect('admin/e_ticket','refresh');
			}
		}
		echo Modules::run('template/index',$data);
	}

	function e_ticket_prod()
	{
		$data['module'] = 'admin';
		$data['view_file'] = 'v_e_ticket_prod';
		$data['tiket'] = $this->M_Admin->getQuery("SELECT * FROM `tiket` 
			JOIN menu ON tiket.menu_id = menu.menu_id WHERE tiket_status = '2' OR tiket_status = '3'")->result();
		echo Modules::run('template/index',$data);
	}

	
}
