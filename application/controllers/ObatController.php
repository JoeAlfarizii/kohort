<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ObatController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('GeneralModel');
	}

    public function index() {
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Jenis Obat",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-obat', $data);
		}else{
			redirect(base_url('login'));
		}
	}

	public function detailDataObat(){
		$url = '/pusat/detail-obat';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataObat(){
		$url = '/pusat/edit-obat';
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'kategori' => $this->input->post('kategori'),
			'komposisi' => $this->input->post('komposisi'),
			'deskripsi' => $this->input->post('deskripsi'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataObat(){
		$url = '/pusat/hapus-obat';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function lihatMenuObat(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Menu Obat",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-obat', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}
	
	public function lihatFormObat(){
		$user = $this->session->user;
        
        if($user){
			$data = array(
				'title' => "Formulir Daftar Jenis Obat",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-obat-form', $data);
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function inputDataObat(){
		$url = '/puskesmas/input-obat';
		$data = array(
			'nama' => $this->input->post('nama'),
			'kategori' => $this->input->post('kategori'),
			'komposisi' => $this->input->post('komposisi'),
			'deskripsi' => $this->input->post('deskripsi'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
	
	public function datatableAdminObat(){
		$url = '/pusat/filter-datatable-obat';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'kategori' => $this->input->post('kategori'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}