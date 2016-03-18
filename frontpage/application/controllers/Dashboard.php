<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2015-10-26 11:38:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-16 10:08:06
 * 
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2015-11-10 16:30:00
 */

class Dashboard extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();  
        $this->load->model('user_model','user');
        $this->load->library('encryption');
    }
    
    /**
     * modify  by Perry.Zhang
     * modify  by Perry.Zhang
     * date     20151119
     */    
    public function index()
    {
        $data = $this->user->get_total_user();
        $data['title'] = "Dashboard";
        $data['active_nav'] = "Dashboard_index";
        $data['active_sub_nav'] = "default";        
       	$this->layout->view('main/index',$data);
    }
	
    /*
     * written by Perry.Zhang
     * written at 2015/11
     *  更新用户信息
     * modified  by Perry.Zhang
     * modified at :2015/11/30
     */
    public function save_usermsg()
    {  
        foreach ($_GET as $key=>$value){
            $data[$key]=$value;
        }
        $id=$data["id"];
        if ($id==""){ 
            //清空空字符id
            unset($data["id"]);
            // 设置初始密码为okm963  
            $data['password']=$this->encryption->encrypt('okm963');
            $this->user->insert($data);
        }else{
            $this->user->update($data,$id);
        }        
    }
    
    /*
     * written by Perry.Zhang
     * written at 2015/11
     * 删除用户信息，根据id删除
     */
    public function del_usermsg() 
    {
        $data["id"] = $_GET["id"];
        $this->user->delete($data["id"]);
        $response = "id为：".$data["id"]."的信息已删除";
        echo $response;
    }

   	/**
     * 前端reload 调用的方法
     * written by  Perry.Zhang
     */
     function reload(){        
            $this->load->helper('url');
            $users=$this->user->get_total_user();
            $users['title'] = "用户管理中心";
            $data[0] =$this->load->view('main/index',$users,true);
            echo json_encode($data);          
            
    }
}