<?php  


class Login extends CI_Controller
{
	public function index(){
		if(isset($this->session->admin_username)){
			echo("<script>{
					window.location.replace('http://localhost:8080/hugsanddrugs/admin/dashboard');
					} </script>");
		}else{
			$this->load->view("admin/Login");
		}

		
		
	}
	public function logout(){
		$this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_mobno');
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_password');
		//$this->session->sess_destroy();
		header('location:index');
	}	

	public function login_insert(){
	

			extract($_POST);
			
			if($this->Admin_Model->login($username,$password,$rememberme)==false){
				
				
				echo "Invalid!";
				
			}
		
	}

}


?>