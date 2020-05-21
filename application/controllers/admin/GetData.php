<?php
	class GetData extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
	    	$this->load->model('Get_Model');
	    	$this->load->model('Admin_Model');
		}

		public function getDoctorSpeciality()
		{
			extract($_POST);
			$result = $this->Get_Model->customQuery("select speciality_id,doctor_speciality from speciality");
			$data['DoctorSpecialityList']=$result;

		}
		public function getHospitalSpeciality()
		{
			extract($_POST);
			$result = $this->Get_Model->customQuery("select speciality_id,hospital_speciality from speciality");
			$data['HospitalSpecialityList']=$result;

		}

		public function getState()
		{
			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select state_id,state_name from state where is_active = 1 and is_delete = 0 and country_id = $country");
			$data['stateList']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function getCity()
		{
			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select city_id,city_name from city where is_active = 1 and is_delete = 0 and state_id = $state");
			$data['cityList']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}
    		public function getState2()
		{
			//extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select * from state s,country c where s.country_id=c.country_id and s.is_active=1 and s.is_delete=0");
			$data['stateList']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function getCity2()
		{
			//extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select * from city c,state s where c.state_id=s.state_id and c.is_active=1 and c.is_delete=0");
			$data['cityList']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function getCountry2()
		{
			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select * from country where is_delete = 0");
			$data['countrylist']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1";
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}

    public function disp_Pateint(){
    	$this->load->model('Patient_Model');
    	$id=$_GET['id'];
    	$data['patientList'] = $this->Patient_Model->getDataById('patient_information',$id);
    	$data['patientMedicalInfo'] = $this->Patient_Model->getDataById('patient_medical_information',$id);
    	$data['patientDiseaseInfo'] = $this->Patient_Model->getDataById('patient_disease_details',$id);
    	$data['patientOpInfo'] = $this->Patient_Model->getDataById('patient_operation',$id);
    	//$data['patientMedicalInfo'] = $this->Patient_Model->getDataById('patient_medical_information',$id);
		//print_r($result);
   		$this->load->view('admin/Patient-Edit',$data);
    }
     public function disp_Doctor(){
    	$this->load->model('Doctor_Model');
    	$id=$_GET['id'];
    	$data['doctorList'] = $this->Doctor_Model->getDataById('doctor_information',$id);
    	$data['drvisitinghosinfo'] = $this->Doctor_Model->getDataById('doctor_visiting_hospital',$id);
    	
    	//$data['patientMedicalInfo'] = $this->Patient_Model->getDataById('patient_medical_information',$id);
		//print_r($result);
   		$this->load->view('admin/Doctor-Edit',$data);	
    }
     public function disp_Hospital(){
    	$this->load->model('Hospital_Model');
    	$id=$_GET['id'];
    	$data['hospitalList'] = $this->Hospital_Model->getDataById('hospital_information',$id);
   		$this->load->view('admin/Hospital-Edit',$data);
    }

     public function disp_Medicine(){
    	$this->load->model('Medicine_Model');
    	$id=$_GET['id'];
    	$data['medicineList'] = $this->Medicine_Model->getDataById('medicine',$id);
   		$this->load->view('admin/Medicine-Edit',$data);
    }
     
   public function getPatient()
		{
			$query="";
			
			extract($_REQUEST);

			if(isset($_POST['page']))
			{
				$page=$_POST['page'];

			}
			else
			{
				$page=1;
			}
			
			$limit = (($page * 10)-10);

			$query="select pi.*,c.city_name from patient_information pi,city c  where c.city_id = pi.city and pi.is_delete = 0 LIMIT $limit,10";
			if($keyword!=""){
				$search_query = " or pi.patient_first_name like '".$keyword."'";
			 $search_query .= " or pi.patient_middle_name like '".$keyword."'";
				 $search_query .=" or pi.patient_last_name like '".$keyword."'";
				$query=$query." ".$search_query;

				
				echo $query;die();
			
		    }
		    $result = $this->Get_Model->customQuery($query);
		   	$data['patientList']=$result;

		    $total = $this->Admin_Model->getTotalPatients();
		    $data['totalPatients']=$total;

			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
	public function getDoctor()
		{
			$page=1;
			extract($_REQUEST);
			if(isset($_POST['page']))
			{
				$page=$_POST['page'];

			}
			else
			{
				$page=1;
			}

			$limit = (($page * 10)-10);

			$result = $this->Get_Model->customQuery("select * from doctor_information pi, city c,speciality s where c.city_id = pi.city and pi.specialty = s.speciality_id and pi.is_delete = 0 LIMIT $limit,10");
			$data['doctorlist']=$result;
			$total = $this->Admin_Model->getTotalDoctors();
		    $data['totalDoctors']=$total;

			if(sizeof($result)>0){
				$data['success'] = "1";
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}
	public function getHospital()
		{
			extract($_POST);

			if(isset($_POST['page']))
			{
				$page=$_POST['page'];

			}
			else
			{
				$page=1;
			}
			$limit = (($page * 10)-10);


			$result = $this->Get_Model->customQuery("select pi.*,c.city_name from hospital_information pi left join city c on c.city_id = pi.city where pi.is_delete = 0 LIMIT $limit,10");
			$data['hospitallist']=$result;
			$total = $this->Admin_Model->getTotalHospitals();
		    $data['totalHospitals']=$total;

			if(sizeof($result)>0){
				$data['success'] = "1";
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}

		public function getMedicine()
		{
			extract($_POST);
			
			if(isset($_POST['page']))
			{
				$page=$_POST['page'];

			}
			else
			{
				$page=1;
			}
			
			$limit = (($page * 10)-10);


			$result = $this->Get_Model->customQuery("
	select * from medicine m,medicine_category c,medicine_details md where m.medicine_id=md.medicine_id and m.medicine_category_id=c.medicine_category_id and m.is_delete=0 and md.is_delete=0 LIMIT $limit,10");
			//$result.=$this->Get_Model->customQuery("select medicine_category_name from medicine_category where is_delete=0");
			$data['medicineList']=$result;
			
			if(sizeof($result)>0){
				$data['success'] = "1";
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function getCategory()
	{

			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select medicine_category_id,medicine_category_name from medicine_category");
			$data['categoryList']=$result;

	}
	public function getContact()
		{
			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select * from contact_us");
			$data['contact_usList']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1";
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function getFeedback()
		{
			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery("select * from feedback");
			$data['feedbackList']=$result;
			/*
				Success = 1 True or success;
				Success = 0 False or error;
			*/
			if(sizeof($result)>0){
				$data['success'] = "1";
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);
		}
		// public function getvisitinghours()
		// {
		// 	extract($_POST);
		// 	//$result = $this->Get_Model->getState($country);
		// 	//$data['sateList'] = $result;
		// 	//print_r($result);

		// 	$result = $this->Get_Model->customQuery("select h.hospital_name,v.visiting_hours from hospital_information h left join doctor_visiting_hospital v on h.
		// 		hospital_id = v.hospital_id where h.is_delete = 0");
		// 	$data['visitinghour']=$result;
		// 	/*
		// 		Success = 1 True or success;
		// 		Success = 0 False or error;
		// 	*/
		// 	if(sizeof($result)>0){
		// 		$data['success'] = "1";
		// 	}else{
		// 		$data['success'] = "0";
		// 	}

		// 	header('Content-Type: application/json');
		// 	echo json_encode($data);
		// }


	}
?>
