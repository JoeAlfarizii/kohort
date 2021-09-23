<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('GeneralModel');
	}

    public function login(){
        $user = $this->session->user;
        
        if($user){
            if($user['role'] == 1){
                redirect(base_url('puskesmas/dashboard'));
            }else if($user['role'] == 2){
                redirect(base_url('admin/dashboard'));
            }else if($user['role'] == 99){
                redirect(base_url('admin/dashboard'));
            }
        }else{
            $data = array(
                'title' => "Login"
            );
            $this->load->view('auth/login', $data);
        }
    }

    public function login_process(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $url = '/user/auth';
        $request = $this->GeneralModel->requestPostData($data, $url);

        if(!empty($request->data)){
            $result = $request->data;
            $data_session = array(
                'id_user' => $result->id_user,
                'namalengkap' => $result->namalengkap,
                'username' => $result->username,
                'role' => $result->role,
                'id_puskesmas' => $result->id_puskesmas
            );
            $this->session->set_userdata('user',$data_session);

            if($result->role == 1){
                // redirect(base_url('puskesmas/dashboard'));
                $data = array(
                    "data" => true
                );
                echo json_encode($data);
            }else if($result->role == 2){
                // redirect(base_url('admin/dashboard'));
                $data = array(
                    "data" => true
                );
                echo json_encode($data);
            }else if($result->role == 99){
                // redirect(base_url('admin/dashboard'));
                $data = array(
                    "data" => true
                );
                echo json_encode($data);
            }
        }else{
            $data = array(
                "data" => false
            );
            echo json_encode($data);
        }
        // $data_session = array(
        //     'username' => $username,
        //     'password' => $password,
        // );

        //$this->session->sess_destroy();   
        //$this->session->set_userdata('user',$data_session);

        // $user = $this->session->user;
        // print_r($user);
        // if($username == "admin" && $password == "admin"){
        //     redirect(base_url('admin/dashboard'));
        // }
        // else if($username == "puskesmas" && $password == "puskesmas"){
        //     redirect(base_url('puskesmas/dashboard'));
        // }
        // else{
        //     
        // }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}