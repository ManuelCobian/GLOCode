<?php 

/**
* 
*/
class Register extends CI_Controller
{
	
	function admin(){

		$nombres=$this->input->post('nombre');

		$apellidos=$this->input->post('apellidos');

		$direccion=$this->input->post('direccion');

		$pass=$this->input->post('pass');

		$pass1=$this->input->post('pass1');

		$email=$this->input->post('email');

		$tel=$this->input->post('tel');


		$rfc=$this->input->post('rfc');


		$contra=md5($pass);


		$data = array(
			'Nombre' =>$nombres ,
			'Apellidos'=>$apellidos,
			'Telefono'=>$tel,
			'Password'=>$contra,
			'Correo'=>$email,
			'Tipo_usuario'=>'admin',
			'Direccion'=>$direccion );


			$this->registro->admin($data,$email);

			 redirect("http://glologistics.com.mx");


		
	}

	

	function users(){

		$nombres=$this->input->post('nombre');

		$apellidos=$this->input->post('apellidos');

		$direccion=$this->input->post('direccion');

		$pass=$this->input->post('pass');

		$pass1=$this->input->post('pass1');

		$email=$this->input->post('email');

		$tel=$this->input->post('tel');


		$rfc=$this->input->post('rfc');


		$contra=md5($pass);
		
		$id_user=$this->registro->get_user_id($email);
		
		
		
		
		

		$data = array(
			'Nombre' =>$nombres ,
			'Apellidos'=>$apellidos,
			'Telefono'=>$tel,
			'Contra'=>$contra,
			'Correo'=>$email,
			'nivel_id'=>'user',
			'users_id'=>$id_user['users_id'],
			'Direccion'=>$direccion );





			$this->registro->user($data,$email);

			

			 redirect("http://glologistics.com.mx");


		
	}






	function clients(){

		$nombres=$this->input->post('nombre');

		$apellidos=$this->input->post('apellidos');

		$direccion=$this->input->post('direccion');

		$pass=$this->input->post('pass');

		$pass1=$this->input->post('pass1');

		$email=$this->input->post('email');

		$tel=$this->input->post('tel');

		$empresa=$this->input->post('empresa');
		
		$rfc=$this->input->post('rfc');


		$contra=md5($pass);
		
		$id_client=$this->registro->get_client_id($email);
		
		
		
		
		

		$data = array(
			'Nombre' =>$nombres ,
			'Apellidos'=>$apellidos,
			'Telefono'=>$tel,
			'Contra'=>$contra,
			'Correo'=>$email,
			'nivel_id'=>'client',
			'Empresa'=>$empresa,
			'RFC'=>$rfc,
			'users_id'=>$id_client['users_id'],
			'Direccion'=>$direccion );





			$this->registro->clients($data,$email);

			

			 redirect("http://glologistics.com.mx");


		
	}



     




}








 ?>