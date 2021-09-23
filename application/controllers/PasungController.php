<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasungController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('GeneralModel');
	}

    public function index() {
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Pasung ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-pasung', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function dataManajemenPasung(){
		$url = '/pusat/data-manajemen-pasung';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}

	public function detailDataPasung(){
		$url = '/pusat/detail-pasung';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailEditDataPasung(){
		$url = '/pusat/detail-edit-pasung';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataPasung(){
		$url = '/pusat/edit-pasung';
		$data = array(
			'id' => $this->input->post('id'),
			'id_pasien' => $this->input->post('id_pasien'),
			'jenis_tindakan' => $this->input->post('jenis_tindakan'),
			'tanggal_penindakan' => $this->input->post('tanggal_penindakan'),
			'alasan' => $this->input->post('alasan'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataPasung(){
		$url = '/pusat/hapus-pasung';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function lihatMenuPasung(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Menu Tindakan Pasung",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-pasung', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function lihatFormPasung(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Formulir Pemasungan",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-pasung-form', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function inputDataPasung(){
		$url = '/puskesmas/input-pasung';
		$data = array(
			'id_pasien' => $this->input->post('id_pasien'),
			'jenis_tindakan' => $this->input->post('jenis_tindakan'),
			'tanggal_penindakan' => $this->input->post('tanggal_penindakan'),
			'alasan' => $this->input->post('alasan'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function datatablePasung(){
		$user = $this->session->user;
		if ($user) {
			$url = '/pusat/filter-datatable-pasung';
			$data = array(
				'id_puskesmas' => $user['id_puskesmas']
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}
	
	public function datatableAdminPasung(){
		$url = '/pusat/filter-datatable-pasung';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas')
		);

		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}