<?php  

class Dashboard extends CI_Controller
{
		public function __construct(){
		parent::__construct();
    	$this->load->model('Admin_Model');
    	$this->Admin_Model->checkSess();
    	$this->load->model('Get_Model');
    	$this->load->model("Communication_Model");
   
	}

	public function index(){
		$data['page_name_1']='Home';
		$data['page_name']='Dashboard';
		$data['active']=0;
		$data['admin_name']=$this->session->admin_name;
		$data['admin_id']=$this->session->admin_id;
		$data['admin_email']=$this->session->admin_email;
		$data['contact_usList']=$this->Get_Model->customQuery("select * from contact_us");
		$data['total_doctors']=$this->Admin_Model->getTotalDoctors();
		$data['total_patients']=$this->Admin_Model->getTotalPatients();
		$data['total_hospitals']=$this->Admin_Model->getTotalHospitals();
		$data['adminimg']=$this->session->adminimg;
		$this->Communication_Model->send_sms();
		$this->load->view("admin/Dashboard",$data);
	}
	public function disp_Contact_us(){
    	
			$result = 
			$data['contact_usList']=$result;
			
    }
	
}


?>