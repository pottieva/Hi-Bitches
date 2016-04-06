<?php
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 14:26:27
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-06 10:22:21
 */
class Host_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->library('curl');
    }

    /*
     * 获取主机表中所有主机信息
     */
    function get_total_hosts()
    {
        $url = "http://127.0.0.1:8000/host/";
        $auth_url='http://127.0.0.1:8000/api/token/';
        $response = $this->curl->request_interface($url,"GET");

        $result['hostlist'] = $query->result_array();
        $result['hostcount'] = $query->num_rows();
        return $result;
    }
}