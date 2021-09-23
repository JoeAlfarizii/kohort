<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuskesmasController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('GeneralModel');
	}

	public function index() {
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Puskesmas ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-puskesmas', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function lihatPengaturanAkun(){
		$user = $this->session->user;
        if($user){
			$data = array(
				'title' => "Pengaturan Akun",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-akun', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function showDaftarUserPuskesmas(){
		$user = $this->session->user;

		$url = '/puskesmas/user-setting';
		$data = array(
			'id' => $user['id_user']
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function updateDataUserPuskesmas(){
		$user = $this->session->user;

		$url = '/puskesmas/user-update-setting';
		$data = array(
			'id' => $user['id_user'],
			'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);

		$data_session = array(
			'id_user' => $user['id_user'],
			'namalengkap' => $data['nama'],
			'username' => $data['username'],
			'role' => $user['role'],
			'id_puskesmas' => $user['id_puskesmas']
		);
		$this->session->set_userdata('user',$data_session);
		echo json_encode($request);
	}

    public function lihatFormPuskesmas(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Formulir Daftar Puskesmas",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-puskesmas-form', $data);
		}else{
			redirect(base_url('login'));
		}
    }
	
	public function lihatFormPuskesmasPusat(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Puskesmas ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-puskesmas-form', $data);
		}else{
			redirect(base_url('login'));
		}
	}

    public function lihatMenuPuskesmas(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Menu Puskesmas",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-puskesmas', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function daftarPuskesmas(){
		$url = '/puskesmas/daftar-puskesmas';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}
	
	public function daftarProvinsi(){
		$url = '/puskesmas/daftar-provinsi';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}

	public function daftarKota(){
		$url = '/puskesmas/daftar-kota';
		$data = array(
			'id_provinsi' => $this->input->post('id_provinsi')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function daftarKecamatan(){
		$url = '/puskesmas/daftar-kecamatan';
		$data = array(
			'id_kota' => $this->input->post('id_kota')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function daftarDesa(){
		$url = '/puskesmas/daftar-desa';
		$data = array(
			'id_kecamatan' => $this->input->post('id_kecamatan')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function inputDataPuskesmas(){
		$url = '/puskesmas/input-puskesmas';
		$data = array(
			'nama' => $this->input->post('nama'),
			'id_provinsi' => $this->input->post('provinsi'),
			'id_kota' => $this->input->post('kota'),
			'id_kecamatan' => $this->input->post('kecamatan'),
			'id_desa' => $this->input->post('desa'),
			'alamat' => $this->input->post('alamat')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailDataPuskesmas(){
		$url = '/pusat/detail-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailEditDataPuskesmas(){
		$url = '/pusat/detail-edit-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataPuskesmas(){
		$url = '/pusat/edit-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'id_kota' => $this->input->post('id_kota'),
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'id_desa' => $this->input->post('id_desa'),
            'alamat' => $this->input->post('alamat')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataPuskesmas(){
		$url = '/pusat/hapus-puskesmas';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function datatablePuskesmas(){
		$url = '/pusat/filter-datatable-puskesmas';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_provinsi' => $this->input->post('id_provinsi')
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}