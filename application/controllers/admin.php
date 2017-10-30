<?php 

/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
		{
			parent::__construct();
			
			$this->_modulo_id = "PERFIL DEL ADMIN";
			$this->_plantilla = "admin/template/head";//el nav y head

			///$this->_plant = "template/admin_lte.php";//el nav y head			
			$this->load->database();
			$this->load->helper('url');

			$this->load->library('grocery_CRUD');
			
			$this->load->library('email');
			$this->load->library('upload');
			$this->load->library('form_validation');
			$this->load->library('tooltip_gcrud');  //load the library

			
		}


		public function _example_output($output = null,$salida=null)
	{	

		 if (!$this->session->userdata('login')) 
        	{
        			redirect(base_url('/'));
        	}

        	else{

        			if ($this->session->userdata('nivel')=="admin"){
        			if (isset($salida)) {
					
					$data['jq']='<script src="<?php echo base_url("plantilla/vendor/") ?>/jquery/jquery.min.js"></script>';
					$data['pagina_interna']=$salida;
					 $data['app']="Home";
					 $data['name']="GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0";
					
					 $data['title']="Mis Horarios";
					 
					
					$this->load->view($this->_plantilla, (array)$salida);
					}
					else{

					 $data['app']="Home";
					 $data['name']="GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0";
					
					 $data['title']="Mis Horarios";
					 
					$this->load->view($this->_plantilla,$output);
				$this->load->view('admin/web/provedores',$salida);
					}

				}
				
					else{
		        	$this->session->sess_destroy();//para destruir sesion
					redirect(base_url('/'));
        		 }


        	}			
						
	}

		 function index()
		{
		 $this->load->library('session');

				$pagina="admin/web/inicial";
				$app="Home";
				$name="GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0";
				$title="Mis Horarios";			
			
		 		$this->_example_output((object)array('name'=>$name,'title'=>$title,'pagina_interna'=>$pagina,'output' => '', 'js_files' =>array(), 'css_files' => array(), 'app' => $app,'name'=>$name,$title=>'GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0'),(object)array('pagina_interna'=>$pagina,'title'=>$title,'output' => '', 'js_files' =>array(), 'css_files' => array(), 'app' => $app,'name'=>$name,$title=>'GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0')  );
				

	
		}



	    function Provedores()
		{
				 $this->load->library('session');

				 	try{
						
						$this->db = $this->load->database("default", TRUE);
						
						$crud = new grocery_CRUD();
						
						$crud->set_theme('bootstrap');
						$crud->set_table('provedores');
						$crud->set_primary_key('id'); // Indicar el campo Llave
						$crud->set_subject('Provedores del Sistema');
						//$crud->required_fields('Provedores del Sistema');
						
						
						$crud->columns('Nombre','Apellidos','Direccion','Correo'); 
						$crud->display_as('Nombre','Nombre del provedor');
						$crud->display_as('Apellidos','Apellidos del provedor');
						$crud->display_as('Direccion','Direccion del provedor');
						$crud->display_as('Correo','Correo del provedor');
							
						
						
						$crud->fields('Nombre','Apellidos','Correo');
						
						
						$crud->unset_bootstrap();
						//$crud->unset_jquery();
						$crud->add_action('Enviar Confirmacion', '', '','fa fa-envelope-o"', array($this,'_admin'));
						
						$output = $crud->render();

						$this->_example_output($output,null);
						
						



					}
					catch(Exception $e){
						show_error($e->getMessage().' --- '.$e->getTraceAsString());
					}

	
		}



			function Usuarios()
					
                    {
							 
							 $this->load->library('session');



							 $email=$this->session->userdata('email');

							$provedor=$this->provedores->get_user_id($email);

							
							 	try{
									
									$this->db = $this->load->database("default", TRUE);
									
									$crud = new grocery_CRUD();
									
									$crud->set_theme('bootstrap');
									$crud->set_table('clientes');

									$crud->set_primary_key('id'); // Indicar el campo Llave
									$crud->set_subject('Usuarios del Sistema');
									//$crud->required_fields('Provedores del Sistema');
									
									
									$crud->columns('Nombre','Apellidos','Direccion','Correo','users_id'); 


									
									$crud->display_as('Nombre','Nombre del provedor');
									$crud->display_as('Apellidos','Apellidos del provedor');
									$crud->display_as('Direccion','Direccion del provedor');
									$crud->display_as('Correo','Correo del provedor');
									$crud->display_as('users_id','Correo del provedor');



									
									
									
									$crud->fields('Nombre','Apellidos','Correo','users_id');

									$crud->set_primary_key('id','provedores');
									$crud->set_relation('users_id','provedores','Correo');

									$crud->where('users_id',$provedor['id']);

									$crud->where('nivel_id','user');

									$crud->unset_bootstrap();
									//$crud->unset_jquery();
									$crud->add_action('Enviar Confirmacion', '', '','fa fa-envelope-o"', array($this,'_user'));
									
									$output = $crud->render();

									$this->_example_output($output,null);
									
									



								}
								catch(Exception $e){
									show_error($e->getMessage().' --- '.$e->getTraceAsString());
								}	
					
					}



		function Clientes()
					
                    {
							 
							 $this->load->library('session');



							 $email=$this->session->userdata('email');

							$provedor=$this->provedores->get_user_id($email);

							
							 	try{
									
									$this->db = $this->load->database("default", TRUE);
									
									$crud = new grocery_CRUD();
									
									$crud->set_theme('bootstrap');
									$crud->set_table('clientes');

									$crud->set_primary_key('id'); // Indicar el campo Llave
									$crud->set_subject('Clientes del Sistema');
									//$crud->required_fields('Provedores del Sistema');
									
									
									$crud->columns('Nombre','Apellidos','Direccion','Correo','users_id'); 


									
									$crud->display_as('Nombre','Nombre del provedor');
									$crud->display_as('Apellidos','Apellidos del provedor');
									$crud->display_as('Direccion','Direccion del provedor');
									$crud->display_as('Correo','Correo del provedor');
									$crud->display_as('users_id','Correo del provedor');



									
									
									
									$crud->fields('Nombre','Apellidos','Correo','users_id');

									$crud->set_primary_key('id','provedores');
									$crud->set_relation('users_id','provedores','Correo');

									$crud->where('users_id',$provedor['id']);

									$crud->where('nivel_id','client');

									$crud->unset_bootstrap();
									//$crud->unset_jquery();
									$crud->add_action('Enviar Confirmacion', '', '','fa fa-envelope-o"', array($this,'_cliente'));
									
									$output = $crud->render();

									$this->_example_output($output,null);
									
									



								}
								catch(Exception $e){
									show_error($e->getMessage().' --- '.$e->getTraceAsString());
								}	
					
					}


		


		function _admin($primary_key, $row)
		{
			
			//$this->Mcontacto->resolver($row->id_coment);
			$tipo="admin";

			return base_url('admin/enviar_correo/'.$row->Correo.'/'.$row->Nombre.'/'.$tipo);
	
			
		}

		function _user($primary_key, $row)
		{
			
			//$this->Mcontacto->resolver($row->id_coment);



			$tipo="user";

			return base_url('admin/enviar_correo/'.$row->Correo.'/'.$row->Nombre.'/'.$tipo);
	
			
		}


		function _cliente($primary_key, $row)
		{
			
			//$this->Mcontacto->resolver($row->id_coment);


			$tipo="client";

			return base_url('admin/enviar_correo/'.$row->Correo.'/'.$row->Nombre.'/'.$tipo);
	
			
		}


		function enviar_correo($correo,$nombre,$tipo){
					
		switch ($tipo) {
			case 'admin':
				echo "correo admin";
				break;

			case 'user':
				# code...
			echo "correo user";
				break;

			case 'client':
				# code...

			echo "correo client";
				break;
			
			default:
				# code...
				break;
		}



		}





		

}







 ?>