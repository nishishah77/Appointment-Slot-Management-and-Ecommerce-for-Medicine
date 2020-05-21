<?php

class Doctor extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    
    	$this->load->model('client/Get_Model');
    }
	public function index()
	{
		extract($_REQUEST);
		$data["active"]=2;
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		
		if(isset($_REQUEST['doctor']))
		{
				 $speciality = $_REQUEST['doctor'];				 
		}
        else
        {

				 $speciality=0;			 
				 
        }
       if(!isset($search))
       {
       	  $search=0;
        }	
        
			  $data['DoctorList'] = $this->Get_Model->getDoctorBySpeciality($speciality,$search);						         
		    $this->load->view("client/Doctor",$data);	

		
	}

		public function search()
	{
		extract($_POST);
		if(isset($_REQUEST['doctor']))
		{
			$doctor_speciality=$_REQUEST['doctor'];

		$sql="select * from doctor_information d,speciality s,doctor_visiting_hospital dh,hospital_information h where d.specialty=s.speciality_id and speciality_id=$doctor_speciality and dh.doctor_id=d.doctor_id and h.hospital_id=dh.hospital_id and (doctor_name like '%$search%' or experience like '%$search%' or qualification like '%$search%' or hospital_name like '%$search%')";	
		}
		else
		{
		$sql="select * from doctor_information d,speciality s,doctor_visiting_hospital dh,hospital_information h where d.specialty=s.speciality_id and dh.doctor_id=d.doctor_id and h.hospital_id=dh.hospital_id and (doctor_name like '%$search%' or experience like '%$search%' or qualification like '%$search%' or hospital_name like '%$search%')";		
		}

		$result=$this->Get_Model->searchDoctor($sql);
		$data['doctorList']=$result;
			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);

	}

}


?>