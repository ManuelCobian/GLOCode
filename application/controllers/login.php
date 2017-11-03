<?php 
class Login extends CI_Controller
	{
			
			 function index(){
				
				$this->load->model("auth");
				
				$email = $this->input->post("nombre_txt");
						
				$password= $this->input->post("password_txt");
				$contra=md5($password);
				$mensaje="Ingrese los datos";
				
				$fila =$this->auth->getPro($email);
				
				if (!isset($fila)) {
					# code...
					$this->login_user($email,$password);
					
				}
				else{
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
					}
					else{
						//imprimi un mensaje de erro
							$mensaje="Revise usuario y contraseña";
							$data['error']=$mensaje;
							$this->load->view('login',$data);
					}
				}
			}
				
				
			 function login_user($email,$password){
				$this->load->model("auth");
				
				
				$contra=md5($password);
				
				$fila =$this->auth->getuser($email);

				;
				
				if (!isset($fila)){
					$this->login_client($email,$password);


				}

				
				else{
					if ($fila['Contra']==$contra) {
						# code...
							$data = array(
							'email' =>$email , 
							'id'  => $fila->id,
							'login'=>true,
							'nivel'=>$fila['nivel_id']
							);
							$this->session->set_userdata($data);
							redirect(base_url('users'));
					}

					else{
							$mensaje="Revise usuario y contraseña";
							$data['error']=$mensaje;
							$this->load->view('login',$data);
					}
					
				}
				
		}
			 
					
			
		 function login_client($email,$password){
				$this->load->model("auth");
				
				
				$contra=md5($password);
				
				$fila =$this->auth->getcliente($email);
							
				if (!isset($fila)){
					
				  echo "<H1>USUARIO NO ENCONTRADO</H1>";
				}
				else{
					if ($fila['Contra']==$contra) {
						$data = array(
							'email' =>$email , 
							'id'  => $fila->id,
							'login'=>true,
							'nivel'=>$fila['nivel_id']
							);
							$this->session->set_userdata($data);
							redirect(base_url('clients'));
					}

					else{
						    $mensaje="Revise usuario y contraseña";
							$data['error']=$mensaje;
							$this->load->view('login',$data);
					}

				}
					
					
		}
		





			 function log_out(){
			
			$this->session->sess_destroy();//para destruir sesion
			redirect(base_url('/'));
			
			}



			
		
}
 ?>