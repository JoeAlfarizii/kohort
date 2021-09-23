<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokterController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('GeneralModel');
	}

	public function index()
	{
		$user = $this->session->user;

		if ($user) {
			$data = array(
				'title' => "Dokter ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-dokter', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function detailDataDokter()
	{
		$url = '/pusat/detail-dokter';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataDokter()
	{
		$url = '/pusat/edit-dokter';
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function deleteDataDokter()
	{
		$url = '/pusat/hapus-dokter';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function lihatMenuDokter()
	{
		$user = $this->session->user;

		if ($user) {
			$data = array(
				'title' => "Menu Dokter",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-dokter', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function lihatFormDokter()
	{
		$user = $this->session->user;

		if ($user) {
			$data = array(
				'title' => "Formulir Tenaga Kesehatan Dokter",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-dokter-form', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function inputDataDokter()
	{
		$user = $this->session->user;

		if ($user) {
			$url = '/puskesmas/input-dokter';
			$data = array(
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'id_puskesmas' => $user['id_puskesmas']
			);
			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}

	public function datatableDokter(){
		$user = $this->session->user;
		if ($user) {
			$url = '/pusat/filter-datatable-dokter';
			$data = array(
				'id_puskesmas' => $user['id_puskesmas']
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}
	
	public function datatableAdminDokter(){
		$url = '/pusat/filter-datatable-dokter';
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas')
		);

		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}
