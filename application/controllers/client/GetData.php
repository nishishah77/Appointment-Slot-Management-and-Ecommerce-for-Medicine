<?php
	class GetData extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
	    	$this->load->model('client/Get_Model');
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

		public function getDoctor()
		{
			extract($_POST);
			//$result = $this->Get_Model->getState($country);
			//$data['sateList'] = $result;
			//print_r($result);

			$result = $this->Get_Model->customQuery1("select d.doctor_id,d.doctor_name,s.doctor_speciality from doctor_information d,doctor_visiting_hospital dh,hospital_information h,speciality s where  h.hospital_id = $Hospital and h.hospital_id = dh.hospital_id and d.doctor_id = dh.doctor_id and d.is_active=1 and d.is_delete=0 and dh.is_active=1 and dh.is_delete=0 and h.is_active=1 and h.is_delete=0 and s.is_active=1 and s.is_delete=0 and s.speciality_id = d.specialty");
			$data['doctorList']=$result;
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

		public function getAppointments()
		{
			//get appointments
        extract($_POST);
		
			
 		$Date = date("Y-m-d", strtotime($appointment_date));
 		$data['AppointmentList']=$this->Get_Model->getAppointments($Date);
 		//print_r($data['AppointmentList']);
			if(sizeof($data['AppointmentList'])>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);

 		
		}
		public function getAppointmentslots()
		{
			 extract($_REQUEST);
			 $Date = date("Y-m-d", strtotime($appointment_date));
 		 $result=$this->Get_Model->getAppointmentslot("select appointment_time from  appointment  where  appointment_date ='".$Date."'");
			
			 if(sizeof($result)>0){
			 	foreach ($result as $time) 
			 	{
					
			 		
			 		if($time['appointment_time']=="11:00-11:30")
			 		{
			 			echo "o1";
			 		}
			 		if($time['appointment_time']=="11:30-12:00")
			 		{
			 			echo "o2";
			 		}
			 		if($time['appointment_time']=="12:00-12:30")
			 		{
			 			echo "o3";
			 		}
			 		if($time['appointment_time']=="12:30-01:00")
			 		{
					echo "o4";
					}

				}
			}else{
				
			}

 		// header('Content-Type: application/json');
			// echo json_encode($data);
		}
}
	
?>
