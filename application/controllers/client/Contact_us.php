<?php

class Contact_us extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    
    	$this->load->model('client/Get_Model');
    }
	
	public function index()
	{
		$data["active"]=4;
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		$this->load->view("client/contact-us",$data);
	}

		public function insert()
	{
		extract($_POST);
		//pateint_madical_info
		$sql="insert into contact_us(`name`, `email`, `message`)values('$fname','$email_address','$msg')";
		$this->Get_Model->customQuery_insert($sql);
	}

		public function feedback_insert()
	{
		extract($_POST);
		//pateint_madical_info
		$sql="insert into feedback(`name`, `email`, `message`)values('$fname','$email_address','$msg')";
		$this->Get_Model->customQuery_insert($sql);
		$this->Get_Model->Feedback_email($email_address);

	}


}


?>