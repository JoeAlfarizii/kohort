<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedisController extends CI_Controller
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
				'title' => "Rekam Medis ODGJ",
				'namalengkap' => $user['namalengkap'],
				'role' => $user['role']
			);
			$this->load->view('admin/pusat-rekam-medis', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function lihatMenuRekamMedis()
	{
		$user = $this->session->user;

		if ($user) {
			$data = array(
				'title' => "Menu Rekam Medis",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-rekam-medis', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function lihatFormRekamMedis()
	{
		$user = $this->session->user;

		if ($user) {
			$data = array(
				'title' => "Formulir Rekam Medis",
				'namalengkap' => $user['namalengkap']
			);
			$this->load->view('puskesmas/puskesmas-rekam-medis-form', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function daftarDokter()
	{
		$url = '/pusat/daftar-dokter';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}

	public function daftarObat()
	{
		$url = '/pusat/daftar-obat';
		$request = $this->GeneralModel->requestGetData($url);
		echo json_encode($request);
	}

	public function inputDataRekamMedis()
	{
		$user = $this->session->user;
		if ($user) {
			$url = '/puskesmas/input-rekam-medis';
			$id_pasien = $this->input->post('id_pasien');
			$diagnosis = $this->input->post('diagnosis');
			$id_dokter = $this->input->post('id_dokter');
			$id_obat = $this->input->post('id_obat');
			$jumlah = $this->input->post('jumlah');
			$data = array(
				'id_puskesmas' => $user['id_puskesmas'],
				'id_pasien' => $id_pasien,
				'diagnosis' => $diagnosis,
				'id_dokter' => $id_dokter,
				'id_obat' => $id_obat,
				'jumlah' => $jumlah
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}

	public function datatableRekamMedis(){
		$user = $this->session->user;
		if ($user) {
			$url = '/pusat/filter-datatable-rekam-medis';
			$data = array(
				'id_puskesmas' => $user['id_puskesmas']
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}
	
	public function datatableAdminRekamMedis(){
		$user = $this->session->user;
		$url = '/pusat/filter-datatable-rekam-medis';
		$data = array(
		    'tanggal' => $this->input->post('tanggal'),
			'id_puskesmas' => $this->input->post('id_puskesmas')
		);

		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailDataRekamMedis(){
		$url = '/pusat/detail-rekam-medis';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function detailEditDataRekamMedis(){
		$url = '/pusat/detail-edit-rekam-medis';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}

	public function editDataRekamMedis(){
		$user = $this->session->user;
		if ($user) {
			$url = '/pusat/edit-rekam-medis';
			$id = $this->input->post('id');
			$id_pasien = $this->input->post('id_pasien');
			$diagnosis = $this->input->post('diagnosis');
			$id_dokter = $this->input->post('id_dokter');
			$id_obat = $this->input->post('id_obat');
			$jumlah = $this->input->post('jumlah');
			$data = array(
				'id' => $id,
				'id_puskesmas' => $user['id_puskesmas'],
				'id_pasien' => $id_pasien,
				'diagnosis' => $diagnosis,
				'id_dokter' => $id_dokter,
				'id_obat' => $id_obat,
				'jumlah' => $jumlah
			);

			$request = $this->GeneralModel->requestPostData($data, $url);
			echo json_encode($request);
		} else {
			redirect(base_url('login'));
		}
	}

	public function deleteDataRekamMedis(){
		$url = '/pusat/hapus-rekam-medis';
		$data = array(
			'id' => $this->input->post('id'),
		);
		$request = $this->GeneralModel->requestPostData($data, $url);
		echo json_encode($request);
	}
}
