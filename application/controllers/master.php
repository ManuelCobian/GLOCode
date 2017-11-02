<?php 
/**
* 
*/
class Master extends CI_Controller
{


	function __construct()
		{
			parent::__construct();
			
			$this->_modulo_id = "PERFIL DEL MASTER";
			$this->_plantilla = "master/template/head";//el nav y head

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

        			if ($this->session->userdata('nivel')=="master"){
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
				$this->load->view('master/web/provedores',(array)$salida);
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

				$pagina="master/web/inicial";
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
						$crud->set_table('users');
						$crud->set_primary_key('id'); // Indicar el campo Llave
						//$crud->where('users_id',$provedor['id']);
						$crud->set_subject('Provedores del Sistema');
						//$crud->required_fields('Provedores del Sistema');
						
						
						$crud->columns('Nombre','Apellidos','Correo','Telefono','Direccion','nivel_id','users_id'); 
						$crud->display_as('Nombre','Nombre del Usuario');
						$crud->display_as('Apellidos','Apellidos del Usuario');
						$crud->display_as('Direccion','Direccion del Usuario');
						$crud->display_as('Correo','Correo del Usuario');
						$crud->display_as('Telefono','Telefono del Usuario');
						
						$crud->display_as('Direccion','Direccion del Usuario');
						
						$crud->display_as('nivel_id','Tipo Usuario');
						
						$crud->display_as('users_id','Provedor');
							
							
						
						
						$crud->fields('Nombre','Apellidos','Correo','nivel_id','users_id');

						$crud->set_primary_key('id','provedores');
									$crud->set_relation('users_id','provedores','Correo');
						
						
						$crud->unset_bootstrap();
						
						$crud->unset_delete();
						$crud->unset_edit();
						//$crud->unset_jquery();
						$crud->add_action('Enviar Confirmacion', '', '','fa fa-envelope-o"', array($this,'_admin'));
						
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
						$crud->set_table('client');
						$crud->set_primary_key('id'); // Indicar el campo Llave
						//$crud->where('users_id',$provedor['id']);
						$crud->set_subject('Provedores del Sistema');
						//$crud->required_fields('Provedores del Sistema');
						
						
						$crud->columns('Nombre','Apellidos','Correo','Telefono','Empresa','RFC','Direccion','nivel_id','users_id'); 
						$crud->display_as('Nombre','Nombre del Usuario');
						$crud->display_as('Apellidos','Apellidos del Usuario');
						$crud->display_as('Direccion','Direccion del Usuario');
						$crud->display_as('Correo','Correo del Usuario');
						$crud->display_as('Telefono','Telefono del Usuario');
						$crud->display_as('Empresa','Empresa del Usuario');
						$crud->display_as('Direccion','Direccion del Usuario');
						$crud->display_as('RFC','RFC del Usuario');
						$crud->display_as('nivel_id','Tipo Usuario');
						
						$crud->display_as('users_id','Provedor');
							
							
						
						
						$crud->fields('Nombre','Apellidos','Correo','nivel_id','users_id');

						$crud->set_primary_key('id','provedores');
									$crud->set_relation('users_id','provedores','Correo');
						
						
						$crud->unset_bootstrap();
						
						$crud->unset_delete();
						$crud->unset_edit();
						//$crud->unset_jquery();
						$crud->add_action('Enviar Confirmacion', '', '','fa fa-envelope-o"', array($this,'_admin'));
						
						$output = $crud->render();

						$this->_example_output($output,null);
						
						



					}
					catch(Exception $e){
						show_error($e->getMessage().' --- '.$e->getTraceAsString());
					}
					
					
			}





		function Movimientos()
					
                    {
							 
							 $this->load->library('session');



							 $email=$this->session->userdata('email');

							$provedor=$this->provedores->get_user_id($email);

							$clientes=$this->provedores->get_client_id($provedor['id']);

							$id_clientes;

							foreach ($clientes as $key ) {
								

								$id_clientes=$key['id'];
							}




						


							
							 	try{
									
									$this->db = $this->load->database("default", TRUE);
									
									$crud = new grocery_CRUD();
									
									$crud->set_theme('bootstrap');
									$crud->set_table('movimientos');
									//$crud->where('id_clients',$id_clientes );
									$crud->set_primary_key('id'); // Indicar el campo Llave
									$crud->set_subject('Clientes del Sistema');
									//$crud->required_fields('Provedores del Sistema');
									
									
									$crud->columns('Movimiento','Confirmacion','Origen','Destino','id_status','id_clients','ruta','Comentarios'); 


									
									$crud->display_as('Movimiento','Movimiento');
									$crud->display_as('Confirmacion','Confirmacion');
									$crud->display_as('Origen','Origen');
									$crud->display_as('id_status','Estado del Movimiento');
									$crud->display_as('ruta','Documento del Movimiento');
									$crud->display_as('Comentarios','Comentarios del Movimiento');
									$crud->display_as('id_clients','Cliente');



									
									
									
									$crud->fields('Movimiento','Confirmacion','Origen','Destino','id_status','id_clients','ruta','Comentarios');


										$crud->set_field_upload('ruta', RUTA_DOCUMENTOS);

									$crud->set_primary_key('id','client');
									$crud->set_relation('id_clients','client','Nombre');

								

									//$crud->where('nivel_id','client');

									$crud->unset_bootstrap();
									//$crud->unset_jquery();
									$crud->add_action('Hacer Confirmacion', '', '','fa fa-list fa-fw""');
									
									$output = $crud->render();

									$this->_example_output($output,null);
									
									



								}
								catch(Exception $e){
									show_error($e->getMessage().' --- '.$e->getTraceAsString());
								}	
					
					}



		function Movimientos_Facturas()
					
                    {
							 
							 $this->load->library('session');



							 $email=$this->session->userdata('email');

							$provedor=$this->provedores->get_user_id($email);

							$clientes=$this->provedores->get_client_id($provedor['id']);

							
							 	try{
									
									$this->db = $this->load->database("default", TRUE);
									
									$crud = new grocery_CRUD();
									
									$crud->set_theme('bootstrap');
									$crud->set_table('movimientos_facturas');
									//$crud->where('id_clients',$id_clientes );
									$crud->set_primary_key('id'); // Indicar el campo Llave
									$crud->set_subject('Clientes del Sistema');
									//$crud->required_fields('Provedores del Sistema');
									
									
									$crud->columns('id_movimiento','id_client','pdf','status_factura'); 


									
									$crud->display_as('id_movimiento','Movimiento');
									$crud->display_as('id_client','Cliente');
									$crud->display_as('pdf','Factura');

									$crud->display_as('status_factura','Estado de la Factura');
									

									
									
									
									$crud->fields('id_movimiento','id_client','pdf','status_factura');


										$crud->set_field_upload('pdf', RUTA_DOCUMENTOS);
										$crud->set_field_upload('xml', RUTA_DOCUMENTOS);

									$crud->set_primary_key('id','client');
									$crud->set_relation('id_client','client','Nombre');


									$crud->set_primary_key('id','movimientos');
									$crud->set_relation('id_movimiento','movimientos','movimiento');

								

									//$crud->where('nivel_id','client');

									$crud->unset_bootstrap();
									//$crud->unset_jquery();
									$crud->add_action('Hacer Confirmacion', '', '','fa fa-list fa-fw""');
									
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

			return base_url('master/enviar_correo/'.$row->Correo.'/'.$row->Nombre.'/'.$tipo);
	
			
		}

		function _user($primary_key, $row)
		{
			
			//$this->Mcontacto->resolver($row->id_coment);



			$tipo="user";

			return base_url('master/enviar_correo/'.$row->Correo.'/'.$row->Nombre.'/'.$tipo);
	
			
		}


		function _cliente($primary_key, $row)
		{
			
			//$this->Mcontacto->resolver($row->id_coment);


			$tipo="client";

			return base_url('master/enviar_correo/'.$row->Correo.'/'.$row->Nombre.'/'.$tipo);
	
			
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

		function Contacto(){
					 $this->load->library('session');

				$pagina="master/web/contact";
				$app="Home";
				$name="GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0";
				$title="Mis Horarios";			
			
		 		$this->_example_output((object)array('name'=>$name,'title'=>$title,'pagina_interna'=>$pagina,'output' => '', 'js_files' =>array(), 'css_files' => array(), 'app' => $app,'name'=>$name,$title=>'GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0'),(object)array('pagina_interna'=>$pagina,'title'=>$title,'output' => '', 'js_files' =>array(), 'css_files' => array(), 'app' => $app,'name'=>$name,$title=>'GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0')  );
				

		}





		

}







 ?>