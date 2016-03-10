<?php 
/**
 * @Author: Jane.Hoo
 * @Date:   2015-11-25 10:48:54
 * @Last Modified by:   Jane.Hoo
 * @Last Modified time: 2015-11-25 10:48:54
 */
class Norm_model extends CI_Model{
   protected $table='normative_info';
    
    /*
     * 保存规范信息
     */
   public function insert($data){      
        $this->db->insert($this->table, $data);
    }
    
    /*
     * 更新规范信息
    */
    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
 
    /*
     * 删除规范信息
    */
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }    
    
    /*
     * 查询不同状态下的规范数据量
     * written by Jane.Hoo
     * written at 2015/11/25 11:12
     */
    public function get_normnum_by_status(){
    	$sql='select status,count(*) num from '.$this->table.' group by status';
    	$query=$this->db->query($sql)->result_array();
    	$norm_status=array('draft'=>0,'inbox'=>0,'trash'=>0);
    
    	for($i=0;$i<count($query);$i++){
    		$item=$query[$i]; 	
    		if($item['status']=='0'){
    			$norm_status['draft']=$item['num'];
    		}else if($item['status']=='1'){
    			$norm_status['inbox']=$item['num'];
    		}else if($item['status']=='2'){
    			$norm_status['trash']=$item['num'];
    		}    	
    	}
    	
    	return $norm_status;
    }

   /*
    * 得到表的列名
    * written by 刘东发
    * date       20151118
    */
    function get_normative_info_by_flag($status)
    {

        $this->db->select('id,author,theme,date_format(create_time,\'%b %d\') create_time');
        $this->db->where('status', $status);
        $query = $this->db->get($this->table);
        $result['normativelist'] = $query->result_array();
        return  $result;

    }

     /*
     * 内容详细信息
     * written by  刘东发
     * date  20151125
     */
    function  get_normative_info_by_id($id)
    {
        $this->db->select('id,author,article_url,theme,content,date_format(create_time,\'%b %d\') create_time' );
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        $result['normativelist'] = $query->result_array();
        return  $result;

    }
    
    /*
     * 修改表的状态
     * written by  连石峰
     * date  20151123
     * modified by:Jane.Hoo
     * modified at:2015/11/28
     */
    public function alter_normative_info_status($id)
    {
    	$table_name=$this->table;
    	$this->db->where_in('id',$id);
    	$this->db->set('status','2',FALSE);
    	$this->db->update($table_name);
    }
    
    /*
     *
     * 删除表中信息
     * written by  lianshifeng
     * date  20151124
     */
    public function delete_normative_info_message($id)
    {
    	$table_name=$this->table;
    	$this->db->where_in('id',$id);
    	$this->db->delete($table_name);
    }
    
    /*
     * inbox 分页
     * written by  lianshifeng
     * date 20151124
     * @param $time [时间]
     * @param $limit [每页条数]
     * @param $offset [偏移量]
     */
    public function getDataByInbox($time,$limit,$offset)
    {
    	//以创建时间排序
    	$this->db->order_by('create_time','desc');
    	$query = $this->db->get($this->table_name,$limit,$offset);
    	$res = $query->result_array();
    	return $res ;
    }
}

/* End of file norm_model.php */
/* Location: ./application/models/norm_model.php */