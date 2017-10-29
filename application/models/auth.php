<?php 

class Auth extends CI_Model
{
	public function getPro($id = ""){

		$this->db->where('Correo',$id);
		$this->db->from('provedores');
		$this->db->limit(1);

		$result=$this->db->get();

		
		
		if ($result->num_rows()>0) {
			return $result->row_array();
			# code...
		}

		else{
			return null;
		}
	}


	public function getcliente($id = ""){

		$this->db->where('Correo',$id);
		$this->db->from('clientes');
		$this->db->limit(1);

		$result=$this->db->get();

		
		
		if ($result->num_rows()>0) {
			return $result->row_array();
			# code...
		}

		else{
			return null;
		}
	}


}



 ?>