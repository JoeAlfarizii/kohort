<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('GeneralModel');
	}

    public function lihatAdminPusat() {
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Dashboard",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-dashboard', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function lihatFormUserPuskesmas(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Tambah User Puskesmas",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-user-puskesmas-form', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function lihatFormUserPusat(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Tambah User Pusat",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-user-pusat-form', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function lihatMenuUserPuskesmas(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "User Puskesmas",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-user-puskesmas', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function lihatMenuUserPusat(){
		$user = $this->session->user;
        
        if($user){
			if($user['role'] == 99){
				$data = array(
					'title' => "User Puskesmas",
					'namalengkap' => $user['namalengkap'],
					'role' => $user['role']
				);
				$this->load->view('admin/pusat-user-pusat', $data);
			}else{
				redirect(base_url('admin/dashboard'));
			}
			
		}else{
			redirect(base_url('login'));
		}
	}

	public function lihatAdminPuskesmas(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Dashboard",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-dashboard', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function InputDataUserPuskesmas(){
		$url = '/pusat/input-user-puskesmas';
		$data = array(
			'id_puskesmas' => $this->input->post('id_puskesmas'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function InputDataUserPusat(){
		$url = '/pusat/input-user-pusat';
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailDataUserPuskesmas(){
		$url = '/pusat/detail-user-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailDataUserPusat(){
		$url = '/pusat/detail-user-pusat';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataUserPusat(){
		$url = '/pusat/edit-user-pusat';
		$data = array(
			'id' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama_lengkap' => $this->input->post('nama_lengkap')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataUserPuskesmas(){
		$url = '/pusat/edit-user-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_puskesmas' => $this->input->post('id_puskesmas'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataUserPuskesmas(){
		$url = '/pusat/hapus-user-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataUserPusat(){
		$url = '/pusat/hapus-user-pusat';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function dataDashboardPuskesmas(){
		$user = $this->session->user;
		$url = '/puskesmas/dashboard';
		$data = array(
			'id_puskesmas' => $user['id_puskesmas'],
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function dataManajemenDashboard(){
		$url = '/pusat/dashboard-data-manajemen';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function dataMainChart(){
		$url = '/pusat/dashboard-main-chart';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function dataPasungRecent(){
	    $url = '/pusat/dashboard-recent-pasung';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function datatableUserPuskesmas(){
	    $url = '/pusat/filter-datatable-user-puskesmas';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function datatableUserPusat(){
	    $url = '/pusat/filter-datatable-user-pusat';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}