<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @Author: Perry.Zhang
 * @Date:   2015-10-26 11:38:54
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2015-11-09 12:57:24
 **/

class Word2html{
	    function index($wfilepath) {
            $word = new COM("word.application") ; 
            $word->visible = 1 ;    
            $word->Documents->Open($wfilepath)or die("wu fa dakai zhege wenjianjia");  
            $htmlpath=substr($wfilepath,0,-4);   
            $word->ActiveDocument->SaveAs($htmlpath,8);   
            $word->quit(0); 
            var_dump('成功啦！！！！');
        }

}