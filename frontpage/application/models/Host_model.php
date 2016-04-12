<?php
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 14:26:27
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-11 12:37:16
 */
class Host_model extends CI_Model
{
    public function __construct($auth_data = '{"username":"admin","password":"admin"}')
    {
        parent::__construct();  
        $this->load->library('curl');
        $this->backend_url = $this->config->item('backend_url');
        $this->auth_url = $this->backend_url."/api/token/";
        $this->auth_data = $auth_data;
    }

    /*
     * 保存主机信息
     */
    public function insert($data)
    {   
        $request_url = $this->backend_url."/host/";
        $token = $this->curl->get_token($this->auth_url,$this->auth_data);
        $result = $this->curl->request_interface($request_url,"POST",$token,json_encode($data));
    }

    /*
     * 更新主机信息
     */
    public function update($data,$host_url)
    {
        $token = $this->curl->get_token($this->auth_url,$this->auth_data);
        $result = $this->curl->request_interface($host_url,"PUT",$token,json_encode($data)); 
    }

    /*
     * 删除主机信息
     */
    public function delete($host_url)
    {
        $token = $this->curl->get_token($this->auth_url,$this->auth_data);
        $result = $this->curl->request_interface($host_url,"DELETE",$token,json_encode($data));
    }

    /*
     * 获取主机表中所有主机信息
     */
    function get_total_hosts()
    {
        $request_url = $this->backend_url."/host/";
        $token = $this->curl->get_token($this->auth_url,$this->auth_data);
        $result = $this->curl->request_interface($request_url,"GET",$token);

        if (count($result) > 0)
        {
            $result['hostlist'] = $result;
            $result['hostcount'] = count($result);
            return $result;
        }

    }
}