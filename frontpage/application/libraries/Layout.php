<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @Author: Perry.Zhang
 * @Date:   2015-10-26 11:38:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2015-11-09 12:57:24
 **/

class Layout
{
    var $obj;
    var $layout;
    function Layout($layout = "main/layout_main")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
    }
    function setLayout($layout)
    {
        $this->layout = $layout;
    }
    function view($view, $data=NULL, $return=FALSE)
    {
        $data['content_for_layout'] = $this->obj->load->view($view,$data,TRUE);
        if($return)
        {
            $output = $this->obj->load->view($this->layout,$data, TRUE);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout,$data, FALSE);
        }
    }
}
