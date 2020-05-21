<?php

class ResetPassword extends CI_Controller
{
	
	public function Reset()
	{
		$data['page_name_1']='Reset';
		$data['page_name']='Password';

		$this->load->view("admin/ResetPassword");
	}
	public function newPassword(){
		extract($_POST);
			
			if($password===$cpassword){
				$data = array('password' =>password_hash($password,PASSWORD_DEFAULT));
				$this->Patient_Model->updateData('admin',$data,'email_Id',$this->session->admin_email);
			
			    echo "changed!";

			    $this->load->model("Communication_Model");

			    $this->Communication_Model->password_changed_send_mail($this->session->admin_email,$password);

			}
		
	}
	public function nPass()
	{
		$data['page_name_1']='Reset';
		$data['page_name']='Password';

		$this->load->view("admin/ForgotPassword");
	}
	public function forgot(){
		extract($_POST);

			$records=$this->Admin_Model->getData('admin');
			foreach ($records as $admin) {
			
				if($admin->email_Id==$email){
					$this->session->admin_email=$email;
					echo "matched!";
				}
			
		}
	}
}

?>