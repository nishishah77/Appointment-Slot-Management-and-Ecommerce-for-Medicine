<?php

class About_us extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    
    	$this->load->model('client/Get_Model');
	}
	public function index()
	{
		$data["active"]=1;
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		$this->load->view("client/about-us",$data);
	}

}


?>