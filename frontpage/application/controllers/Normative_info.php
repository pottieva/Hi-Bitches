<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2015-11-25 10:59:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-10 18:20:04
 */
class Normative_info extends CI_Controller
{
	/*
	 * modified by:Perry.Zhang
	 * modified at:2015/11/26 20:40
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('norm_model','norm');
		$this->load->library('pagination');
	}
	
	public function index()
	{
		//在html中使用base_url()方法，加载辅助函数
		$this->load->helper('url');
		$data['norm_status']=$this->norm->get_normnum_by_status();
		$data['title'] = "用户管理中心";
		$data['active_nav'] = "Infomation_index";
		$data['active_sub_nav'] = "norm_info_index";
		$this->layout->view('info/normative_info',$data);
	}
	
	/*
	 * written by :Perry.Zhang
	 * modified by:Perry.Zhang
	 * modified at:2015/11/26 20:40
	 */
	public function save(){
		$data = array();
		$arr  = array();
		foreach ($_GET as $key=>$value){
			$data[$key]=$value;
		}
	
       if(array_key_exists('username',$_SESSION)){
       	$data['author'] = $_SESSION['username'];
       }else{
       	$data['author'] = 'dongfa';
       } 

		$this->norm->insert($data);
	}
	
	/*
	 * written by : Perry.Zhang
	 * modified by: Perry.Zhang
	 * modified at: 2015/11/25
	 */
	public function normative_info_inbox(){
		$normative_infos=$this->norm->get_normative_info_by_flag($_GET['status']);
		// 添加不同种类的记录数 
		$data[1]=$this->norm->get_normnum_by_status();
		if($_GET['status'] == 1)
		{
			$data[0] =$this->load->view('info/inbox_inbox',$normative_infos,true);
			echo json_encode($data);
		}
		//add by:Perry.Zhang & add at:2015/11/25 15:04
		if($_GET['status'] == 0)
		{
			$data[0] =$this->load->view('info/inbox_inbox',$normative_infos,true);
			echo json_encode($data);
		}
		if($_GET['status'] == 2)
		{
			$data[0] =$this->load->view('info/inbox_delete',$normative_infos,true);
			echo json_encode($data);
		}
	}
	
	/*
	 * lianshifeng  添加了一个删除功能
	 * date  2015-11-23
	 * modified by: Perry.Zhang
	 * modified at: 2015/11/28
	 */
	public function  delete(){
		$status=$_GET['status'];
	//	$this->norm->alter_normative_info_status('normative_info',$_GET['id']);
		$this->norm->alter_normative_info_status($_GET['id']);
		$normative_infos = $this->norm->get_normative_info_by_flag($status);
		$data[0] = $this->load->view('info/inbox_inbox',$normative_infos,true);
		// 添加不同种类的记录数  Perry.Zhang  2015/11/27
		$data[1]=$this->norm->get_normnum_by_status();
		echo json_encode($data);
	}
	
	/*
	 * lianshifeng  添加了一个彻底删除功能
	 * date 2015-11-24
	 * modified by: Perry.Zhang
	 * modified at: 2015/11/28
	 */
	public function  complete_delete(){
		//$this->norm->delete_normative_info_message('normative_info',$_GET['id']);
		$this->norm->delete_normative_info_message($_GET['id']);
		if($_GET['title'] == 'Trash')
		{
			$status = 2;
		}
		elseif($_GET['title'] == 'Inbox')
		{
			$status = 1;
		}elseif($_GET['title'] == 'Draft')
		{
			$status = 0;
		}
		$normative_infos=$this->norm->get_normative_info_by_flag($status);
		$data[0] =$this->load->view('info/inbox_delete',$normative_infos,true);
		// 添加不同种类的记录数  Perry.Zhang  2015/11/27
		$data[1]=$this->norm->get_normnum_by_status();
		echo json_encode($data);
	}
	 
	/*
	 * lianshifeng 创建分页器
	 * date  2015-11-24
	 * @param  $pageNo [默认为第一页]
	 */
	public function inbox($pageNo=1)
	{
		$time = $this->getMillisecond();
		$limit = PAGESIZE;
		$offset = ($pageNo - 1) * PAGESIZE;
	}
	
	/*
	 * written by : Perry.Zhang
	 * date: 20151125
	 */
	public function loadMessage (){
		$normative_infos=$this->norm->get_normative_info_by_id($_GET['id']);
		//var_dump($normative_infos);
		$data[0] =$this->load->view('info/inbox_view',$normative_infos,true);
		echo json_encode($data);
	}
	
	/*
	 * written by : fanxinlei Perry.Zhang
	 * date:        20151125
	 * 实现代码上传到服务器
	 */
	public function do_upload()
	{
		// 设置上传的初始化参数
		$config['upload_path']      = './uploads/';
		$config['file_path'] = FCPATH .'\uploads';
		$config['allowed_types']    = 'gif|jpg|png|txt|word|doc|docx';
		$config['max_size']     = 1000000;
		$config['max_width']        = 1024;
		$config['max_height']       = 768;
		$this->load->library('upload', $config);

	    /**
	     * 根据上传input控件的name=filename,
	     * 调用CI的upload对象do_upload方法，执行上传功能
	     * 成功则返回ture 否则 返回 false
	     */
		if ( $this->upload->do_upload('filename')){
			// 功能：上传成功，给前端页面还回上传文件名，以便保存在数据库中
			// $this->upload->data('file_name') 获取上传文件名，
			// do_upload(): 上传文件功能时获取文件的一系类属性，data()：封装一系类文件属性
			// iconv('gb2312','utf-8',$this->upload->data('file_name')) ？？？
			// 上传文件后文件内容正常，文件名称乱码，修改do_upload 中file_name编码
			// 之后返回给前端的file_name 乱码，重新翻转file_name 编码
			// 上传的word文件将转换成html文件
			$file_name = $this->upload->data('file_name');
			$arry_filename=explode('.', $file_name);
			$html_filename=$arry_filename[0].'.html';
			$file_path = $this->upload->data('file_path');
			$flname = $file_path .$file_name;
			echo json_encode(iconv('gb2312','utf-8',$html_filename));
			$py_path = FCPATH .'\custom_script\word2html.py';
			$com ="D:\python27\Python\python.exe ".$py_path." ".$flname;
			pclose(popen($com,'r'));
		}else {
			// 上传文件失败后 给前端还回0,jquery upload再根据其值，显示上传空文件
			// 上传失败只能是0，前端的js限制的
			echo  0;
		}
	}	
}