<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class provedores extends CI_Model 
{
	
	function get_user_id($id=''){

		$this->db->select('id');
		$this->db->from('provedores');
		$this->db->like('Correo',$id);

		$query=$this->db->get();

		if ($query->num_rows()) {
			
			return $query->row_array();
		}

		else{
            return false;
		}



	}
}

