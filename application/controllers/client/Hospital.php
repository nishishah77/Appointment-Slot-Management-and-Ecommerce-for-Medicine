<?php

class Hospital extends CI_Controller
{
		public function __construct(){
		parent::__construct();
    
    	$this->load->model('client/Get_Model');
    	
    	
	}
	
	public function index()
	{
      				$data["active"]=3;
      		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		
      		if(isset($_REQUEST['hospital']))
		{
				 $speciality = $_REQUEST['hospital'];				 
				 $data['HospitalList'] = $this->Get_Model->getHospitalBySpeciality($speciality);						         
		    $this->load->view("client/Hospital",$data);			
		}
        else
        {
				 $speciality=0;			 
				 $data['HospitalList'] = $this->Get_Model->getHospitalBySpeciality($speciality);						         
		    $this->load->view("client/Hospital",$data);			        	
        }

   
	}


	public function ViewMore()
	{
      		if(isset($_REQUEST['hospital']))
		{
				 $hospital = $_REQUEST['hospital'];				 
				 $data['HospitalList'] = $this->Get_Model->getMoreHospital($hospital);	
				 $data['DoctorList']=$this->Get_Model->getDoctorByHospital($hospital);
				 	         
		        $this->load->view("client/ViewMore",$data);			
		}
	}

		public function search()
	{
		extract($_POST);
		if(isset($_REQUEST['doctor']))
		{
			$hospital=$_REQUEST['doctor'];
		$sql="select * from speciality s,hospital_information h,city c,state st where h.speciality_id=s.speciality_id and c.city_id=h.city and st.state_id=h.state and speciality_id=$hospital and (hospital_name like '%$search%' or address like '%$search%' or city_name like '%$search%' or state_name like '%$search%' or contact_number like '%$search%')";	
		}
		else
		{
		$sql="select * from speciality s,hospital_information h,city c,state st where h.speciality_id=s.speciality_id and c.city_id=h.city and st.state_id=h.state and (hospital_name like '%$search%' or address like '%$search%' or city_name like '%$search%' or state_name like '%$search%' or contact_number like '%$search%')";		
		}

		$result=$this->Get_Model->searchDoctor($sql);
		$data['hospitalList']=$result;
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