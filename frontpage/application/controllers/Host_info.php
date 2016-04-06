<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 14:00:03
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-06 10:14:50
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

    /**
    * 前端用户信息reload：调用的方法。
    * 前端请求类型：ajax，只刷新部分数据。提高用户的体验度；减少数据传输提高响应速度
    * written by  Perry.Zhang
    */
    function reload(){         
        $this->load->helper('url');
        $hosts=$this->host->get_total_hosts();
        $hosts['title'] = "主机中心";
        $data[0] =$this->load->view('info/host_info',$hosts,true);
        echo json_encode($data);                      
    }

}