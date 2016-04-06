<?php
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-30 14:26:27
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-06 15:00:02
 */
class Host_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->library('curl');
        $this->backend_url = $this->config->item('backend_url');
    }

    /*
     * 保存主机信息
     */
    public function insert($data)
    {      
        $this->db->insert($this->table, $data);
    }
    
    /*
     * 获取主机表中所有主机信息
     */
    function get_total_hosts()
    {
        $request_url = $this->backend_url."/host/";
        $auth_url = $this->backend_url."/api/token/";
        $result = $this->curl->request_interface($request_url,"GET");

        if (count($result) > 0)
        {
            $result['hostlist'] = $result;
            $result['hostcount'] = count($result);
            return $result;
        }

    }
}