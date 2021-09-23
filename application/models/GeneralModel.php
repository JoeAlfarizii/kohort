<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->api = 'https://api.kohort.ub-learningtechnology.com/api';
    }

    function requestGetData($url){
        $this->curl->create($this->api.$url);
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->get();
        $execute = json_decode($this->curl->execute());
        return $execute;
    }

    function requestPostData($data, $url){
        $this->curl->create($this->api.$url);
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->post($data);
        $execute = json_decode($this->curl->execute());
        return $execute;
    }
}