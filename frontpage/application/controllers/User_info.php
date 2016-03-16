<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2015-11-16 09:05:06
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-15 16:09:38
 */

class User_info extends CI_Controller 
{
            
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('user_model','user');
        $this->load->library('encryption');
    }

    /*
     * modified by:Perry.Zhang
     * modified at:2015/11/26 19:42
     */
    public function index($name=null)
    {
    	$data = $this->user->get_total_user();
    	$data['title'] = "用户信息";
    	$data['active_nav'] = "Infomation_index";
    	$data['active_sub_nav'] = "user_info_index";
    	$this->layout->view('info/user_info',$data);
    }

   /* 保存、更新用户信息。根据id来判断是insert 还是update.
    * written by Perry.Zhang
    * written at 2015/11
    * modify by  Perry.Zhang
    * date       2015/11/30
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
    * 前端用户信息reload：调用的方法。
    * 前端请求类型：ajax，只刷新部分数据。提高用户的体验度；减少数据传输提高响应速度
    * written by  Perry.Zhang
    */
     function reload(){         
            $this->load->helper('url');
            $users=$this->user->get_total_user();
            $users['title'] = "用户管理中心";
            $data[0] =$this->load->view('info/user_info',$users,true);
            echo json_encode($data);                      
    }
}