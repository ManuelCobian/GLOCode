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

		$this->db->like('Correo',$id);
		$this->db->from('client');
		$this->db->limit(1);

		$result=$this->db->get();

		
		
		if ($result->num_rows()>0) {
			return $result->row_array();
			# code...

		}

		else{
			return null;
		}

		echo $this->db->lastquery();
	}


	public function getuser($id = ""){

		$this->db->where('Correo',$id);
		$this->db->from('users');
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