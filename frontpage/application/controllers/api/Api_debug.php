<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-14 11:50:41
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-23 16:45:34
 */

class Api_debug extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();  
        //$this->load->model('user_model','user');
        $this->load->library('curl');
    }
 
    function debug_get()
    {
        // For debug
        
        $url = "http://127.0.0.1:8000/api/status/2/";
        $auth_url='http://127.0.0.1:8000/api/token/';
        $auth_data='{"username":"admin","password":"admin"}';

        $data = '{"id":"2"}';
        #$result = $this->curl->request_interface($auth_url,"GET_TOKEN",$auth_data);
        #$result = $this->curl->request_interface($url,"GET");
        #$result = $this->curl->request_interface($url,"POST",$data);
        #$result = $this->curl->request_interface($url,"PUT",$data);
        $result = $this->curl->request_interface($url,"DELETE",$data);
        var_dump($result);
    }



}