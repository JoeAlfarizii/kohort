<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerawatanModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->api = 'http://localhost/sim-odgj-server/api';
    }

    function requestInputDataPerawatan($data){
        $this->curl->create($this->api.'/puskesmas/input-perawatan');
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->post($data);
        $execute = json_decode($this->curl->execute());
        return $execute;
    }
}