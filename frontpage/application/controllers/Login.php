<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**  
 * @author Lianshifeng
 * 
 * create date 2015-11-03 10:27:00
 * modify date 2015-11-16 18:13:20
 */
/**
 * 登录类
 */
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();     
		$this->load->model('user_model','user');
		$this->load->helper(array('form'));
		$this->load->library(array('email','encryption','form_validation'));
		
	}

    /**
     * 判断session是否存在
     */   
	public function check_session()
	{
		if(($this->session->userdata('logged_in') == 1))
		{
			$this->user->update_login($_SESSION['id']);
			redirect('dashboard') ;		
			exit();
		}
	}

    /**
    * 
    * 表单验证规则
    */	
	public function index()
	{
		$this->load->view('login');
		$this->form_validation->set_rules('username','Username','callback_user_check');
		$this->form_validation->set_rules('password','Password','callback_user_check');
		/**
		 * 点击了login按钮，则进行校验
		 */
		
		if(isset($_POST['login']))
		{
			$result = $this->user->check_user($_POST['username']);
			$id = $result['id'];
			$password_data = $result['password'];
			$status = $result['status'];
			$username = $_POST['username'];
		    	if($this->form_validation->run() == FALSE)
		   		{
		   			//显示错误信息并重新加载Login页面
		   	    	echo "<script type='text/javascript'>alert('用户名或密码错误');window.history.back(-1);</script>";
		   		}
		   		else
		   		{
		   			/**
		   		 	* 如果status不等于1，则弹出用户禁止登陆对话框
		   		 	*/
		   			if($status == 1)
		   			{   
		   				//判断是否保存session
 		       			if($_POST['remember'] == 1)
 		       			{
 		       				$this->sess_expiration = $sess_expiration;	       				
 		       			}
 		       			else 
 		       			{	
 		       				$this->sess_expiration = 0;
 		       			}
 		       			$data = array(
 		       					'id' => $id,
 		       					'username'=>$username,
 		       					'status' => $status,
 		       					'time' =>$sess_expriation,
 		       					'logged_in' => TRUE
 		       			);
 		       			$this->session->set_userdata($data);
		       		//更新数据库中的信息，并跳转到dashboard页面
		       			$this->user->update_login($id);
		       			redirect('dashboard');       			       	
		    		}
		    		else
		    		{
		    			echo "<script type='text/javascript'>alert('该用户禁止登陆');window.history.back(-1);</script>";
		    		}
	    	    }	    		
		}				
	}
	
	/**
	 * 忘记密码，进行邮箱验证，并发送邮件
	 */
	public function modify_password()
	{
	 	if(isset($_POST['forget']))
		{
			$email = $this->input->post('email');
			$password_text = $this->user->get_password_by_email($email);
			$password = $this->encryption->decrypt($password_text);
			$this->email->from('lianshifeng336@163.com','admin');
			$this->email->to($email);
			$this->email->subject('Your password');
			$this->email->message('Hello,Your password is '.$password);
			if(!empty($password)){
				$this->email->send();
				echo "<script type='text/javascript'>alert('已将密码发送到您的邮箱');window.history.back(-1);</script>";	
			}
			else
			{
				echo "<script type='text/javascript'>alert('请输入正确邮箱');window.history.back(-1);</script>";
				
			}	
		}
	
	}
	

	/**
	 * 自定义检验函数
	 */
    public function user_check()
    {
    	$username = $this->input->post('username');
    	$password_text = $this->input->post('password');
    	$pword = $this->user->check_user($username);
    	$password_data = $pword['password'];
    	$password = $this->encryption->decrypt($password_data);
    		
    	if( $password_text == $password )
    	{
    		return TRUE;
    	}
    	else
    	{
    		return FALSE;
    	}
    }
    
   /**
   * session 注销
   */  
    public function session_logout()
    {
    	$this->session->unset_userdata('logged_in');
    	$this->session->unset_userdata('id');
    	$this->session->sess_destroy();
    	redirect(base_url());
    }
}

