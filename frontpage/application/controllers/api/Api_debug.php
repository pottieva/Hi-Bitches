<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-14 11:50:41
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-11 13:59:23
 */

class Api_debug extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();  
        //$this->load->model('user_model','user');
        $this->load->library('curl');
    }
 
    function index()
    {
        // For debug
        
        $url = "http://127.0.0.1:8000/host/4/";
        #$url = "http://127.0.0.1:8000/host/";
        $auth_url='http://127.0.0.1:8000/api/token/';
        $auth_data='{"username":"admin","password":"admin"}';

        #$data = '{"host_group":"Web","remark":"test123","host_name":"Localhost","host_ip":"127.0.0.1"}';
        $token = $this->curl->get_token($auth_url,$auth_data);
        var_dump($token);
        #$result = $this->curl->request_interface($url,"GET",$token);
        #$result = $this->curl->request_interface($url,"POST",$token,$data);
        #$result = $this->curl->request_interface($url,"PUT",$data);
        $result = $this->curl->request_interface($url,"DELETE",$token);
        var_dump($result);
    }



}