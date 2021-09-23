<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerawatanController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('PerawatanModel');
		$this->load->model('GeneralModel');
	}

    public function index() {
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Perawatan ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-perawatan', $data);
		}else{
			redirect(base_url('login'));
		}	
	}
	
	public function dataManajemenPerawatan(){
		$url = '/pusat/data-manajemen-perawatan';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}

	public function detailDataPerawatan(){
		$url = '/pusat/detail-perawatan';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailEditDataPerawatan(){
		$url = '/pusat/detail-edit-perawatan';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataPerawatan(){
		$url = '/pusat/hapus-perawatan';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataPerawatan(){
		$url = '/pusat/edit-perawatan';
		$data = array(
			'id' => $this->input->post('id'),
			'id_pasien' => $this->input->post('id_pasien'),
			'alasan' => $this->input->post('alasan'),
			'jenis_perawatan' => $this->input->post('jenis_perawatan'),
			'status_rujuk_balik' => $this->input->post('status_rujuk_balik'),
			'status_kemandirian' => $this->input->post('status_kemandirian')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function lihatMenuPerawatan(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Menu Perawatan",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-perawatan', $data);
		}else{
			redirect(base_url('login'));
		}
        
    }
	
	public function lihatFormPerawatan(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Formulir Perawatan ODGJ",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-perawatan-form', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function daftarPasienSehat(){
		$user = $this->session->user;
		if ($user) {
			$url = '/puskesmas/daftar-pasien-sehat';
			$data = array(
				'id_puskesmas' => $user['id_puskesmas']
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}

	public function inputDataPerawatan(){
		$url = '/puskesmas/input-perawatan';
		$data = array(
			'id_pasien' => $this->input->post('id_pasien'),
			'alasan' => $this->input->post('alasan'),
			'jenis_perawatan' => $this->input->post('jenis_perawatan'),
			'status_rujuk_balik' => $this->input->post('status_rujuk_balik'),
			'status_kemandirian' => $this->input->post('status_kemandirian')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function datatablePerawatan(){
		$user = $this->session->user;
		if ($user) {
			$url = '/pusat/filter-datatable-perawatan';
			$data = array(
				'id_puskesmas' => $user['id_puskesmas']
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}
	
	public function datatableAdminPerawatan(){
		$url = '/pusat/filter-datatable-perawatan';
		$data = array(
		    'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas')
		);

		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}