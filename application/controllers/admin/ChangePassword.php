<?php

class ChangePassword extends CI_Controller
{
			public function __construct(){
		parent::__construct();
    	$this->load->model("Communication_Model");
    	$this->Admin_Model->checkSess();
}
	public function Change()
	{
		$data['page_name']='Change Password';
		$data['page_name_1']='Admin';
		$data['admin_name']=$this->session->admin_name;
				$data['adminimg']=$this->session->adminimg;

		$this->load->view("admin/ChangePassword",$data);
	}
	
	public function new_password(){
		extract($_POST);
			if(password_verify($old_pass, $this->session->admin_pass)){
				if($new_cpass===$new_pass){
					$data = array('password' =>password_hash($new_pass,PASSWORD_DEFAULT));

					$this->load->Model('Patient_Model');

					$this->Patient_Model->updateData('admin',$data,'admin_id',$this->session->admin_id);
					
					echo "success!";

					$this->Communication_Model->password_changed_send_mail($this->session->admin_email,$new_pass);
				}
			
		}
	}
}

?>