<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * @Author: liudongfa
 * @Date:   2015-12-23 10:30:00
 */
class Duty_info extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->model('duty_model','duty');	
	}


	public function index()
	{
		$data['title']='值班信息';
		$data['active_nav']='Infomation_index';
		$data['active_sub_nav']='duty_info_index';
		//var_dump(9876);
		$this->layout->view('duty/duty_info',$data);
	}


	public function get_duty_by_month_member()
	{
		$monthflag=$_GET["monthflag"];
		$member=$_GET["member"];
		$nowfrist=date('Y-m-01');
		$datefrist=date('Y-m-d',strtotime("$nowfrist  $monthflag  month"));
		$query['members']=$this->duty->get_total_members();
		$query['dutyinfo']=$this->duty->get_duty_info($datefrist,$member);

		$query['year_month']=date('Y-m',strtotime("$nowfrist  $monthflag  month"));
		$view=isset($_GET["flag"]) ? 'duty/duty_select':'duty/list';
		$data[0] =$this->load->view($view,$query,true);
		echo json_encode($data);

	}


	public function create_duty()
	{
		$monthflag=$_GET["monthflag"];
		$nowfrist=date('Y-m-01');
		$datefrist=date('Y-m-d',strtotime("$nowfrist  $monthflag  month"));
		$query['dutyinfo']=$this->duty->create_duty_info($datefrist);
		$query['year_month']=date('Y-m',strtotime("$nowfrist  $monthflag  month"));
		//var_dump(date('Y-m'));
		$data[0] =$this->load->view('duty/list',$query,true);
		echo json_encode($data);
	}


	public function get_total_duty_person(){
		$data = $this->duty->get_total_members();
    	$data['title'] = "值班用户信息";
    	$data[0] =$this->load->view('duty/duty_set',$data,true);
    	echo json_encode($data);
    	
	}


	 // 保存、更新排班用户信息。根据id来判断是insert 还是update.
 
    public function save_usermsg()
    {  
        foreach ($_GET as $key=>$value){
            $data[$key]=$value;
        }
        $id=$data["id"];
        if ($id==""){ 
            //清空空字符id
            unset($data["id"]);
            $this->duty->insert($data);
        }else{
            $this->duty->update($data,$id);
        }        
    }

   
     // 删除用户信息，根据id删除
    
    public function del_usermsg() 
    {
        $data["id"] = $_GET["id"];
        $this->duty->delete($data["id"]);
        $response = "id为：".$data["id"]."的信息已删除";
        echo $response;
    }

   /**
    * 前端用户信息reload：调用的方法。
    * 前端请求类型：ajax，只刷新部分数据。提高用户的体验度；减少数据传输提高响应速度
    */
     function reload(){         
            $this->load->helper('url');
            $users=$this->duty->get_total_members();
            $users['title'] = "值班用户信息";
            $data[0] =$this->load->view('duty/duty_set',$users,true);
            echo json_encode($data);                      
    }


  /**
  * 值班数据初始化
  */
  public function init_duty(){
  	    // 获取值班人信息
     	$data = $this->duty->get_total_members();
     	// 获取当前月上个月末
     	$nowfrist=date('Y-m-01');
		$date=date('Y-m-d',strtotime("$nowfrist  -1  day"));
	    $data['date']=$date;
	    // 获取月末初始化值班人
	    $init_members=$this->duty->get_init_members($date);
	    if(!empty($init_members)){
	    	 foreach ($init_members as $member){
	    	if($member['category']==1){
               $data['oracle']=$member['member'];
	    	}elseif ($member['category']==2) {
	    		 $data['mysql']=$member['member'];
	    	}
	      }

	    }	   
	    //print_r($data['mysql']);
    	$data[0] =$this->load->view('duty/duty_init',$data,true);
    	echo json_encode($data);
  }

  /**
   *  保存值班初始化数据
   */
  function save_duty_init(){
  	$data=array();
  	unset($_GET['_']);
  	foreach ($_GET as $key => $value) {
  		$data[$key]=$value;
  	}
  	$this->duty->replace_duty($data);

  }

}
