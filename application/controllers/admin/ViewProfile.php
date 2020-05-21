<?php  

class ViewProfile extends CI_Controller
{
	public function index(){
		$this->Admin_Model->checkSess();
		$this->load->view("admin/ViewProfile");

	}
}


?>