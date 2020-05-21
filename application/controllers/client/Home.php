<?php

class Home extends CI_Controller
{
		public function __construct(){
		parent::__construct();
    
    	$this->load->model('client/Get_Model');
    	
    	
	}

	
	public function index()
	{
		extract($_REQUEST);
		if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "Paymentsuccess") 
		{
		$this->Get_Model->send_mail2($name,$email,$transactionid,$productinfo,$amount);
		
		$_SESSION['cart']="NULL";
		}

       	//get appointments
		$data['total_doctors']=$this->Admin_Model->getTotalDoctors();
		$data['total_patients']=$this->Admin_Model->getTotalPatients();
		$data['total_hospitals']=$this->Admin_Model->getTotalHospitals();
        
		$date = date('Y-m-d', time());
 		$data['AppointmentList']=$this->Get_Model->getAppointments($date);

 		if(isset($_SESSION['patient_information_id']))
 		{
        $data['PatientAppointmentList']=$this->Get_Model->getPatientAppointments($_SESSION['patient_information_id']);
    	}
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;

		$result = $this->Get_Model->getHospitals();

		$data['HospitalList']=$result;
		
		$result = $this->Get_Model->getDoctors();

		$data['DoctorList']=$result;

		$this->load->view("client/index",$data);

	}
	public function check_session()
	{
			$fname=$lname=$phone=$email=$appointment_date=$gender=$hospital=$hospital_name=$doctor_name=$appointment_time=$doctor="";
		
		extract($_REQUEST);
		if(isset($_SESSION["username"]))
		{
			echo "session started!";
			

		}
		else
		{
			echo "session not started!";
			$_SESSION['app_fname'] = $fname;
			$_SESSION['app_lname'] = $lname;
			$_SESSION['app_phone'] = $phone;
			$_SESSION['app_email'] = $email;
			$_SESSION['app_appointment_date'] = $appointment_date;
			$_SESSION['app_gender'] = $gender;
			$_SESSION['app_hospital'] = $hospital;
			$_SESSION['app_hospital_name'] = $hospital_name;
			$_SESSION['app_doctor_name'] = $doctor_name;
			$_SESSION['app_appointment_time'] = $appointment_time;
			$_SESSION['app_doctor'] = $doctor;

			

		}
	}
 


	function insert(){
		extract($_POST);
		$originalDate = $datepicker;
		$newDate = date("Y-m-d", strtotime($originalDate));
			//$data="";
		$current_date_time=date('d-m-Y h:i:sa',time());
		 if(isset($patient_information_id)){
			$data1 = array("patient_information_id"=>$patient_information_id,"hospital_id"=>$hospital,"doctor_id"=>$doctor,"first_name"=>$app_fname,"last_name"=>$app_lname,"email"=>$app_email_address,"phone_no"=>$app_phone,"appointment_date"=>$newDate,"gender"=>$gender,"appointment_time"=>$appointment_time);
				}
				else
				{
			$data1 = array("patient_information_id"=>$_SESSION['patient_information_id'],"hospital_id"=>$hospital,"doctor_id"=>$doctor,"first_name"=>$app_fname,"last_name"=>$app_lname,"email"=>$app_email_address,"phone_no"=>$app_phone,"appointment_date"=>$newDate,"gender"=>$gender,"appointment_time"=>$appointment_time);
				}

		$this->Get_Model->insert($data1);
	    $this->Get_Model->send_mail1($app_email_address,$hospital_name,$doctor_name,$datepicker,$appointment_time,$app_fname,$app_lname);
		$this->Get_Model->send_msg($app_phone,$msg);

			unset($_SESSION['app_fname']);
			unset($_SESSION['app_lname']);
			unset($_SESSION['app_phone']);
			unset($_SESSION['app_email']);
			unset($_SESSION['app_appointment_date']);
			unset($_SESSION['app_gender']);
			unset($_SESSION['app_hospital']);
			unset($_SESSION['app_hospital_name']);
			unset($_SESSION['app_doctor_name']);
			unset($_SESSION['app_appointment_time']);
			unset($_SESSION['app_doctor']);




	}



	public function login_check(){
		extract($_POST);
        
		 if($username!="" && $password!="")
		{
		 	$result=$this->Get_Model->check_patient_login($username,$password);
		 	if($result!="")
		 	{
		 	foreach ($result as $user) 
		 	{
		 		 $email = $user['email_id'];
             	$first_name=$user['patient_first_name'];
            	$middle_name=$user['patient_middle_name'];
             	$last_name=$user['patient_last_name'];
            	$address = $user['address'];
            	$mobile_number = $user['mobile_number'];
            	$patient_information_id=$user['patient_information_id'];
            
		 	$_SESSION['username']=$email;				
		 	$_SESSION['first_name']=$first_name;
		 	$_SESSION['middle_name']=$middle_name;
		 	$_SESSION['last_name']=$last_name;
		 	$_SESSION['address']=$address;
		 	$_SESSION['mobile_number']=$mobile_number;
		 	$_SESSION['patient_information_id']=$patient_information_id;
		 	
		 	echo $_SESSION['patient_information_id'];

		 	}
			}
			 else
			 {
			 	echo "not login!";
			 }

		 }
		 else
		 {
		 	echo "not login!";
		 }






  if(isset($_REQUEST['page'])){
  	$page=$_REQUEST['page'];
	if($page=="index")
       {
       	$redirect_page="Home";
       }
		if($page == "shop" )
		{
				$redirect_page="shop";
		}
		if(isset($_REQUEST['medicine']))
		{
			$medicine = $_REQUEST['medicine'];
		}

		if($page=="shop-detail")
		{
			$redirect_page="shop/shop_detail";
		}
		if($page=="about-us")
		{
				$redirect_page="About_us";
		}
		if($page=="contact-us")
		{
			$redirect_page="Contact_us";
		}
		if($page=="Doctor")
		{
			$redirect_page="Doctor";
		}
		if($page=="Hospital")
		{
			$redirect_page="Hospital";
		}		

		if(isset($_REQUEST['medicine']))
		{
			$medicine = $_REQUEST['medicine'];
				 redirect(base_url()."client/".$redirect_page."?page=".$page."&medicine=".$medicine);


		}		
	redirect(base_url()."client/".$redirect_page."?page=".$page."&fname=".$fname);
		
	    

		// echo base_url()."client/".$redirect_page."?page=".$page."&medicine=".$medicine;
	

}


}


}



?>