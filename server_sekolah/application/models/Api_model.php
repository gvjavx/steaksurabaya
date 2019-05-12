<?php
/**
 * 
 */
class api_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		//Your Own constructor code
		$this->load->database();
	}

	public function insert_img($data_insert){
		return $this->db->insert('user',$data_insert);
	}
}

?>