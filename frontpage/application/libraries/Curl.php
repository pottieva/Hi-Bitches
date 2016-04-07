<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @Author: Perry.Zhang
 * @Date:   2016-03-15 15:08:17
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2016-04-07 09:31:30
 */

class Curl
{
    protected $obj;

    public function __construct()
    {
        $this->obj =& get_instance();
    }

    public function request_interface($url,$type,$data=NULL)
    {     
        // 初始化curl对象
        if($type!="GET_TOKEN"){
            $token = $this->get_token();
            // 定义HTTP请求头，包含Type  
            $http_header = array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Token '.$token
            );
            $this->curl = curl_init($url);
            curl_setopt ($this->curl, CURLOPT_HTTPHEADER, $http_header);  

            // 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

            switch ($type){  
            case "GET" :    
                curl_setopt($this->curl, CURLOPT_HTTPGET, true);
                break;  
            case "POST" :   
                curl_setopt($this->curl, CURLOPT_POST,true);   
                curl_setopt($this->curl, CURLOPT_POSTFIELDS,$data);
                break;  
            case "PUT" :  
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");   
                curl_setopt($this->curl, CURLOPT_POSTFIELDS,$data);
                break;  
            case "DELETE" : 
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");   
                curl_setopt($this->curl, CURLOPT_POSTFIELDS,$data);
                break;
            }
            // 执行请求
            $result = curl_exec($this->curl);
            $error = curl_error($this->curl);
            curl_close($this->curl);

            if ($error)
                throw new Exception('请求发生错误：' . $error);
            return json_decode($result); 
        }
        else{  
            // 初始化curl对象
            $this->curl = curl_init($url);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-type: application/json')); 
            curl_setopt($this->curl, CURLOPT_POST,true);   
            curl_setopt($this->curl, CURLOPT_POSTFIELDS,$data);
            // 执行请求
            $result = curl_exec($this->curl);
            $error = curl_error($this->curl);
            curl_close($this->curl);
            if ($error)
                throw new Exception('请求发生错误：' . $error);
            return $result;
        }
    }

    function get_token($auth_url='http://127.0.0.1:8000/api/token/',$auth_data='{"username":"admin","password":"admin"}')
    {
        $raw_token = json_decode($this->request_interface($auth_url,"GET_TOKEN",$auth_data));
        $token = $raw_token->token;
        return $token;
    }

    
}