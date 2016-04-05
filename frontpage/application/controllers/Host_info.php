<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 14:00:03
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-30 16:28:55
 */
class Host_info extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('host_model','host');
    }

    public function index()
    {
        $data['title']='主机信息';
        $data['active_nav']='infomation_index';
        $data['active_sub_nav']='host_info_index';
        $this->layout->view('info/host_info',$data);
    }

}