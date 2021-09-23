<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasienController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('PasienModel');
		$this->load->model('GeneralModel');
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Pasien ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-pasien', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function dataManajemenPasien(){
		$url = '/pusat/data-manajemen-pasien';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}

	public function detailDataPasien(){
		$url = '/pusat/detail-pasien';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailEditDataPasien(){
		$url = '/pusat/detail-edit-pasien';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataPasien(){
		$user = $this->session->user;
        
        if($user){
			$url = '/pusat/edit-pasien';
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'id_puskesmas' => $user['id_puskesmas'],
			'alamat' => $this->input->post('alamat'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'id_desa' => $this->input->post('id_desa'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'id_kota' => $this->input->post('id_kota'),
			'id_provinsi' => $this->input->post('id_provinsi'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'status_jkn' => $this->input->post('status_jkn'),
			'status_pengobatan' => $this->input->post('status_pengobatan'),
			'status_pasien' => $this->input->post('status_pasien')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
		}else{
			redirect(base_url('login'));
		}
	}

	public function deleteDataPasien(){
		$url = '/pusat/hapus-pasien';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	//---------------- FUNGSI UNTUK PUSKESMAS ---------------------
	
	public function lihatMenuPasien(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Menu Pasien",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-pasien', $data);
		}else{
			redirect(base_url('login'));
		}
        
    }
	
	public function lihatFormPasien(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Formulir Pasien ODGJ",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-pasien-form', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function inputIdentitasPasien(){
		$user = $this->session->user;
        
        if($user){
			$url = '/puskesmas/input-pasien';
			$data = array(
				'nama' => $this->input->post('nama'),
				'id_puskesmas' => $user['id_puskesmas'],
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'id_desa' => $this->input->post('id_desa'),
				'id_kecamatan' => $this->input->post('id_kecamatan'),
				'id_kota' => $this->input->post('id_kota'),
				'id_provinsi' => $this->input->post('id_provinsi'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'status_jkn' => $this->input->post('status_jkn'),
				'status_pengobatan' => $this->input->post('status_pengobatan'),
				'status_pasien' => $this->input->post('status_pasien')
			);
			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		}else{
			redirect(base_url('login'));
		}
	}

	public function datatablePasien(){
		$user = $this->session->user;
		if ($user) {
			$url = '/pusat/filter-datatable-pasien';
			$data = array(
				'id_puskesmas' => $user['id_puskesmas']
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}
	
	public function datatableAdminPasien(){
		$url = '/pusat/filter-datatable-pasien';
		$data = array(
		    'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas')
		);

		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}