<?php 
/**
 * @Author: Perry.Zhang
 * @Date:   2015-10-26 11:38:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-17 13:41:44
 */
class User_model extends CI_Model{


    protected $table='admin_user';
    //protected $database='newbee';
    
    /*
     * 保存用户信息
     */
    public function insert($data)
    {      
        $this->db->insert($this->table, $data);
    }
    
    /*
     * 更新用户信息
    */
    public function update($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
 
    /*
     * 删除信息
    */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    
    /*
     * 更新用户登录信息
     */
    public function update_login($id)
    {
        $data = array(
                'last_login_time'=>date('Y-m-d H:i:s'),
                'last_login_ip'=>$this->input->ip_address(),
        );
        $this->db->set('login_count', 'login_count+1',FALSE);
        $this->db->where('id', $id);
        $this->db->update($this->table,$data);
    }
    
    /*
     * 检查用户密码是否合法
     */
    public function check_user($username)
    {
    	$this->db->select('password');
    	$this->db->select('status');
    	$this->db->select('id');
    	$this->db->where('username', $username);
    	$query = $this->db->get($this->table);
    	if ($query->num_rows() > 0)
    	{
    		foreach ($query->result_array() as $row)
    		{
    			return $row;
    		}
    	}
    }
    
    /*
     * 检查当前用户的原密码是否正确
     */
    public function check_old_password($uid,$password)
    {
        $this->db->where('id', $uid);
        $this->db->where('password', md5($password));
        $this->db->where('status',1);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
    }
    
    /*
     * 根据uid获取用户信息
     */
    function get_user_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id'=>$id));
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
    }
    
    /*
     * 根据用户名查询用户
    */
    function get_user_by_username($username='')
    {
        $query = $this->db->get_where($this->table, array('username'=>$username));
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
    }    

    /*
     * 通过邮箱获取密码
     */
    function get_password_by_email($email)
    {
    	$this->db->select('password');
    	$this->db->where('email', $email);
    	$query=$this->db->get($this->table);
    	if ($query->num_rows() > 0)
    	{
    		foreach ($query->result_array() as $row)
    		{
    			return $row['password'];
    		}
    	}
    }
    
    /*
     * 通过用户名更新用户密码
     */
    public function update_password_by_username($data,$username)
    {
        $this->db->where('username', $username);
        $this->db->update($this->table, $data);
    }
    
    /*
     * 获取用户表中所有用户信息
     */
    function get_total_user()
    {
        $this->db->select('id,username, realname,email,login_count,status');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0)
        {
            $result['userlist'] = $query->result_array();
            $result['usercount'] = $query->num_rows();
            return $result;
        }
    }



/*
    For PHP model layer call Django 
    Example:
*/

    function get_user_by_id_called_by_django($id)
    {
        #$url = 'http://bitch.com/index.php/user_info/';
        $url = "http://baidu.com";
        $header = array('Content-Type: application/json');
        $post_data = array("content" => "Hello world!","alias" => "Test!");
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $data = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error)
            throw new Exception('请求发生错误：' . $error);
        return $data;
        #$url = base_url($uri = "user/id=$id");
        #return $data;
        print_r($data);
    }


    
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */