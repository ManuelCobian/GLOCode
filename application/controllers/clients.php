<?php 
/**
* 
*/
class Clients extends CI_Controller
{
	
		public function index()
	{
		if (!$this->session->userdata('login')) 
        	{
        			redirect(base_url('/'));
        	}
        	else{

        		 if ($this->session->userdata('nivel')=="client") {

			        $datos=array('app' =>'Home');
					$this->load->view("client/template/head",$datos);
					
					$date=array('name' =>'GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0' );
					$this->load->view("client/template/nav2",$date);


					$this->load->view("client/template/content");
				}
				else{
		        	$this->session->sess_destroy();//para destruir sesion
					redirect(base_url('/'));
        		 }
        	
        	}
		
		

		
	}
}


 ?>