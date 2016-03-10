<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: Perry.Zhang
 * @Date:   2015-11-16 11:31:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-10 18:20:35
 */

class Error404 extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();       
    }

    public function index()
    {
    	$data['title']='not found';
        $this->load->view('extra_404');
    }
}
?>