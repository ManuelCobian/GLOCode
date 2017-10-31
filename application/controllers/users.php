<?php 

/**
* 
*/
class Users extends CI_Controller
{
	
	function __construct()
		{
			parent::__construct();
			
			$this->_modulo_id = "PERFIL DEL USUARIO";
			$this->_plantilla = "user/template/head";//el nav y head

			///$this->_plant = "template/admin_lte.php";//el nav y head			
			$this->load->database();
			$this->load->helper('url');

			$this->load->library('grocery_CRUD');
			$this->load->model('grocery_crud_model');
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

        			if ($this->session->userdata('nivel')=="user"){
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
					 
					$this->load->view($this->_plantilla, (array)$output);
				$this->load->view('user/web/provedores',(array)$salida);
					}

				}
				
					else{
		        	$this->session->sess_destroy();//para destruir sesion
					redirect("http://glologistics.com.mx/login.html");
        		 }


        	}			
						
	}

		 function index()
		{
		 $this->load->library('session');

				$pagina="user/web/inicial";
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
						$crud->set_subject('Administradores del Sistema');
						//$crud->required_fields('Provedores del Sistema');
						
						
						$crud->columns('Nombre','Apellidos','Direccion','Correo'); 
						$crud->display_as('Nombre','Nombre del provedor');
						$crud->display_as('Apellidos','Apellidos del provedor');
						$crud->display_as('Direccion','Direccion del provedor');
						$crud->display_as('Correo','Correo del provedor');
							
						
						
						$crud->fields('Nombre','Apellidos','Correo');
						
						
						$crud->unset_bootstrap();
						$crud->unset_add();
						$crud->unset_delete();
						$crud->unset_edit();
						//$crud->unset_jquery();
						//$crud->add_action('Enviar Confirmacion', '', '','fa fa-envelope-o"', array($this,'_admin'));
						
						$output = $crud->render();

						$this->_example_output($output,null);
						
						



					}
					catch(Exception $e){
						show_error($e->getMessage().' --- '.$e->getTraceAsString());
					}

	
		}
	



}



 ?>