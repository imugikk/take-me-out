<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$this->CI =& get_instance();
$this->CI->load->database();
$query = $this->CI->db->get('config');
if($query->num_rows()>0)
{
	// return $query;

}else
{
	$query->free_result();
	// return $query;
}

foreach($query->result_array() as $row){
	$config['key_value_'.$row['id_config']]	= $row['value'];
}