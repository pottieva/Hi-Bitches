<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 14:00:03
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-11 17:55:20
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
        $data = $this->host->get_total_hosts();
        $data['title']='主机信息';
        $data['active_nav']='infomation_index';
        $data['active_sub_nav']='host_info_index';
        $this->layout->view('info/host_info',$data);
    }

    /* 
    * @ Creator: Perry.Zhang
    * @ Date: 2016/04/06
    * @ Annotation: 插入、更新用户信息。根据URL更新。
    */
    function save_host()
    {  
        foreach ($_GET as $key=>$value){
            $data[$key]=$value;
        }
        $host_url = $data["url"]; 
        if ($host_url == "")
        { 
            unset($data["url"]);
            $this->host->insert($data);
        }else
        {
            $this->host->update($data,$host_url);
        }        
    }

    /*
    * written by Perry.Zhang
    * 删除主机信息。根据URL删除。
    */
    function delete_host() 
    {
        foreach ($_GET as $key=>$value){
            $data[$key]=$value;
        }
        $host_url = $data["url"];
        $host_name = $data["host_name"];
        $this->host->delete($host_url);
        $response = "Host Name为：".$host_name."的信息已删除";
        echo $response;
    }

    /*
    * @ Creator: Perry.Zhang
    * @ Date: 2016/04/06
    * @ Annotation:
    * @     前端用户信息reload：调用的方法。
    * @     前端请求类型：ajax，只刷新部分数据。提高用户的体验度；减少数据传输提高响应速度。
    */
    function reload()
    {         
        $data = $this->host->get_total_hosts();
        $data['title'] = "主机信息";
        $data[0] = $this->load->view('info/host_info',$data,true);
        echo json_encode($data);                      
    }

}