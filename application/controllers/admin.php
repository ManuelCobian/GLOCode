<?php 

/**
* 
*/
class Admin extends CI_Controller
{
	
	public function index()
	{
		 if (!$this->session->userdata('login')) 
        	{
        			redirect(base_url('/'));
        	}
        	else{
        			

        		 if ($this->session->userdata('nivel')=="admin") {
        		 	# code...

	        		$datos=array('app' =>'Home');
					$this->load->view("admin/template/head",$datos);
					
					$date=array('name' =>'GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0' );
					$this->load->view("admin/template/nav2",$date);


					$this->load->view("admin/template/content");
        		 }
        		 else{
		        	$this->session->sess_destroy();//para destruir sesion
					redirect(base_url('/'));
        		 }

				
        	}
		

		
	}
}



 ?>