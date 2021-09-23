<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasienModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->api = 'http://localhost/sim-odgj-server/api';
    }

    function requestShowDaftarPasien(){
        $this->curl->create($this->api.'/pusat/daftar-pasien');
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->get();
        $execute = json_decode($this->curl->execute());
        return $execute;
    }

    function requestInputIdentitasPasien($data){
        $this->curl->create($this->api.'/puskesmas/input-pasien');
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->post($data);
        $execute = json_decode($this->curl->execute());
        return $execute;
    }
}