<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2015-10-26 11:38:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2015-11-17 10:47:06
 */

class Demo extends CI_Controller
{
	/*
	 * modified by:Jane.Hoo
	 * modified at:2015/11/26 20:40
	 */
    function __construct()
    {
        parent::__construct();  
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        //在html中使用base_url()方法，加载辅助函数
        $this->load->helper('url');
    }


}