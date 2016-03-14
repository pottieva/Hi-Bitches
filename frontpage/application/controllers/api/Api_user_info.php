<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-14 11:50:41
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-03-14 17:13:05
 */

class Api_user_info extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('user_model','user');
        $this->load->library('encryption');
    }
 
    function user_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL,400);
        }

        $user = $this->user->get_user_by_id($this->get('id'));

        if($user)
        {
            $this->response($user,200);
        }
        else
        {
            $this->response($user,404);
        }
    }



}