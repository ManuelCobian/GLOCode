<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 


/**
* 
*/
class clientes extends CI_Model
{
	function get_user_id($id=''){//sacar tu id de provedor

		$this->db->select('provedores.id');
		$this->db->from('users');
		$this->db->join('provedores', 'provedores.id = users.users_id');
		$this->db->like('users.Correo',$id);

		$query=$this->db->get();

		if ($query->num_rows()) {
			
			return $query->row_array();
		}

		else{
            return false;
		}



	}


	function get_clientes_id($id = ''){

		$this->db->select('id');
		$this->db->from('client');
		$this->db->like('Correo',$id);

		$query=$this->db->get();

		if ($query->num_rows()) {
			
			return $query->result_array();
		}

		else{
            return false;
		}
	}

	
}








?>