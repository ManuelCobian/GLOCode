<?php 

class Login extends CI_Controller
	{
			
			public function index(){
				
				$this->load->model("auth");
				
				$email = $this->input->post("nombre_txt");
						
				$password= $this->input->post("password_txt");

				$contra=md5($password);

				$mensaje="Ingrese los datos";
				
				$fila =$this->auth->getPro($email);

				

				if (isset($fila) and is_array($fila)) {
					# code...

					
					if ($fila['Password']==$contra) {
						
						if ($fila['Tipo_usuario']=='master') {
							$data = array(
							'email' =>$email , 
							'id'  => $fila->id,
							'login'=>true,
							'nivel'=>$fila['Tipo_usuario']
							);

							$this->session->set_userdata($data);
							redirect(base_url('master'));
						}

						if ($fila['Tipo_usuario']=='admin'){

							$data = array(
							'email' =>$email , 
							'id'  => $fila->id,
							'login'=>true,
							'nivel'=>$fila['Tipo_usuario']
							);

							$this->session->set_userdata($data);
							redirect(base_url('admin'));
						}

						else{
							$mensaje="Revise usuario y contraseña";
							$data['error']=$mensaje;
							$this->load->view('login',$data);
						}

						
						
						
					}
					

				
			}

				if ($fila == null) {
					$this->login_client($email,$password);
					
				}
				
					

			}

			public function login_client($email,$password){

				$this->load->model("auth");
				
				

				$contra=md5($password);
				
				$fila =$this->auth->getcliente($email);

				$mensaje="Ingrese los datos";
				

				if (isset($fila) and is_array($fila)) {
					# code...

					
					if ($fila['Contra']==$contra) {
						
						if ($fila['Tipo_usuario']=='user') {
							$data = array(
							'email' =>$email , 
							'id'  => $fila->id,
							'login'=>true,
							'nivel'=>$fila['Tipo_usuario']
							);

							$this->session->set_userdata($data);
							redirect(base_url('users'));
						}

						if ($fila['Tipo_usuario']=='client'){

							$data = array(
							'email' =>$email , 
							'id'  => $fila->id,
							'login'=>true,
							'nivel'=>$fila['Tipo_usuario']
							);

							$this->session->set_userdata($data);
							redirect(base_url('clients'));
						}
						
						
					}
					

				
			}

				if ($fila == null) {
					$mensaje="Revise usuario y contraseña contraseña";
					$data['error']=$mensaje;
					$this->load->view('login',$data);
					
				}

			}

			public function log_out(){
			
			$this->session->sess_destroy();//para destruir sesion
			redirect(base_url('/'));
			
			}
			


		
}










 ?>