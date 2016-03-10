<?php 
/**
 * @Author: Jane.Hoo
 * @Date:   2015-11-25 10:48:54
 * @Last Modified by:   Jane.Hoo
 * @Last Modified time: 2015-11-25 10:48:54
 */
class Duty_model extends CI_Model
{
   protected $duty_info  = 'duty_info';
   protected $duty_order = 'duty_order';
   protected $duty_init  = 'duty_init';

   public function get_duty_info($month,$member)
   {
   	$sql='call p_duty_query(\''.$month.'\',\''.$member.'\')';
   	$query=$this->db->query($sql)->result_array();
   	return $query;
   }


   public function create_duty_info($month)
   {
   	$sql='call p_duty_generate(\''.$month.'\')';
   	$query=$this->db->query($sql)->result_array();
   	return $query;
   }


   public function get_total_members()
   {
      $this->db->select('id,category, member,duty_order,start_date,end_date');
      $query = $this->db->get($this->duty_order);
      if ($query->num_rows() > 0)
      {
          $result['userlist'] = $query->result_array();
          return $result;
      }
   }   

       /*
     * 保存用户信息
     */
   public function insert($data)
   {      
        $this->db->insert($this->duty_order, $data);
    }
    
    /*
     * 更新用户信息
    */
    public function update($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->duty_order, $data);
    }
 
    /*
     * 删除信息
    */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->duty_order);
    }

  /**
   * 获取上个月末的值班初始化数据
   */
    public function get_init_members($date)
   {
      $this->db->select('category, member');
      $this->db->where('date',$date);
      $query = $this->db->get($this->duty_init);
      if ($query->num_rows() > 0)
      {
          return $query->result_array();
      }
   }  

  /**
   * 初始化值班人员信息
   */
  public function replace_duty($data){
     $this->db->replace($this->duty_init, $data);
  }


}