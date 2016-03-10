<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: liuyu
 * @Date:   2015-11-16 11:31:54
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-11-19 14:29:01
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